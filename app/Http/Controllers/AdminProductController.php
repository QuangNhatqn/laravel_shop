<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductEditRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Traits\StoreImageTraits;
use App\Traits\DeleteModelTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminProductController extends Controller
{
    use StoreImageTraits;
    use DeleteModelTraits;

    private $model, $product, $category, $productImage, $tag;
    private $model_name = 'product';
    private $model_names = 'products';

    public function __construct(Product $product, Category $category, ProductImage $productImage, Tag $tag)
    {
        $this->model = $this->product = $product;
        $this->category = $category;
        $this->productImage = $productImage;
        $this->tag = $tag;
    }

    public function index()
    {
        if(empty($_GET['post_status'])) $post_status = '';
        else $post_status = $_GET['post_status'];

        $all = $this->model->get();
        $trash = $this->model->onlyTrashed()->get();
        $countAll = count($all);
        $countTrash = count($trash);

        if($post_status == 'trash') $models = $this->model->onlyTrashed()->latest()->paginate(10);
        else $models = $this->model->latest()->paginate(10);

        $model_name = $this->model_name;
        $model_names = $this->model_names;

        return view('adminlayouts.products.index', compact('models','model_name', 'model_names', 'post_status', 'countAll', 'countTrash'));
    }

    public function getCategory($category_id = "")
    {
        $data = $this->category->where('type', 'product')->get();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->optionCategoryRecusive(0, $category_id);
        return $htmlOption;
    }

    public function create()
    {
        $htmlOption = $this->getCategory();
        return view('adminlayouts.products.add', compact('htmlOption'));
    }

    public function store(ProductAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataStore = [
                'name' => $request->name,
                'price' => $request->price,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'content' => $request->contents,
            ];
            if ($request->hasFile('feature_image_path')) {
                $data = $this->storeTraitUpload($request->file('feature_image_path'), 'products');
                if (!empty($data)) {
                    $dataStore['feature_image_name'] = $data['name'];
                    $dataStore['feature_image_path'] = $data['path'];
                }
            }
            $product = $this->product->create($dataStore);
            if ($request->hasFile('image_path')) {
                foreach ($request->file('image_path') as $file) {
                    $dataFile = $this->storeTraitUpload($file, 'products');
                    if (!empty($dataFile)) {
                        $product->images()->create([
                            'image_name' => $dataFile['name'],
                            'image_path' => $dataFile['path'],
                            'parent_type' => 'products'
                        ]);
                    }
                }
            }
            if ($request->tag) {
                foreach ($request->tag as $tag) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tag]);
                    $tagId[] = $tagInstance->id;
                }
                $product->tags()->attach($tagId);
            }

            DB::commit();
            return redirect()->route('products.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
            return abort(500);
        }
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('adminlayouts.products.edit', compact('htmlOption', 'product'));
    }

    public function update(ProductEditRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            //update product
            $dataStore = [
                'name' => $request->name,
                'price' => $request->price,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'content' => $request->contents,
            ];
            $product = $this->product->find($id);
            if ($request->hasFile('feature_image_path')) {
                $data = $this->storeTraitUpload($request->file('feature_image_path'), 'products');
                if (!empty($data)) {
                    $dataStore['feature_image_name'] = $data['name'];
                    $dataStore['feature_image_path'] = $data['path'];
                }
                $this->deleteTraitUpload($product->feature_image_path);
            }
            $product->update($dataStore);

            //update product image
            if ($request->hasFile('image_path')) {
                //delete old image
                $productImages = $this->productImage->where('parent_id', $id);
                foreach ($productImages->get() as $productImage) {
                    $this->deleteTraitUpload($productImage->image_path);
                }
                $productImages->delete();
                foreach ($request->file('image_path') as $file) {
                    $dataFile = $this->storeTraitUpload($file, 'products');
                    if (!empty($dataFile)) {
                        $product->images()->create([
                            'image_name' => $dataFile['name'],
                            'image_path' => $dataFile['path'],
                            'parent_type' => 'products'
                        ]);
                    }
                }
            }

            //update product tags
            if ($request->tag) {
                foreach ($request->tag as $tag) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tag]);
                    $tagId[] = $tagInstance->id;
                }
                $product->tags()->sync($tagId);
            }else $product->tags()->sync([]);
            DB::commit();
            return redirect()->route('products.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
            return abort(500);
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTraits($id, $this->product);
    }

    public function mutipleDelete(Request $request)
    {
        return $this->deleteMutipleTraits($request->listItemId, $this->model_name, $this->model);
    }

    public function removeTrash(Request $request)
    {
        return $this->removeTrashTraits($request->listItemId, $this->model_name, $this->model);
    }

    public function recovery(Request $request)
    {
        return $this->recoveryTraits($request->listItemId, $this->model_name, $this->model);
    }
}
