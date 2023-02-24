<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientCategoryController extends Controller
{
    private $menu;
    private $category;

    function __construct(Menu $menu, Category $category)
    {
        $this->menu = $menu;
        $this->category = $category;
    }

    function index($slug)
    {
        try {
            $menus = $this->menu->where('parent_id', 0)->get();

            $categories = $this->category->where([
                'type' => 'product',
                'parent_id' => 0
            ])->get();

            $mainCategory = $this->category->where('slug', $slug)->first();

            if(!empty($mainCategory)) $categoryProducts = $mainCategory->products()->latest()->paginate(12);

            return view('clientlayouts.products.category.index', compact('menus', 'categories', 'mainCategory', 'categoryProducts'));
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
            return abort(500);
        }
    }
}
