<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Tag;
use Illuminate\Http\Request;

class ClientHomeController extends Controller
{
    private $slider;
    private $menu;
    private $category;
    private $product;
    private $tag;
    function __construct(Setting $setting, Slider $slider, Menu $menu, Category $category, Product $product, Tag $tag){
        $this->slider = $slider;
        $this->menu = $menu;
        $this->category = $category;
        $this->product = $product;
        $this->tag = $tag;
    }

    function index(){
        $menus = $this->menu->where('parent_id', 0)->get();

        $sliders = $this->slider->latest()->get();

        $categories = $this->category->where([
            'type'=> 'product',
            'parent_id' => 0
            ])->get();

        $featureProducts = $this->product->latest()->take(6)->get();

        $tags = $this->tag->selectRaw('tags.id, tags.name')->join('product_tags as pt', 'tags.id', '=', 'pt.tag_id')
            ->join('products as pr', 'pt.product_id', '=', 'pr.id')
            ->distinct()
            ->get();

        $recommenedProducts = $this->product->orderBy('view', 'desc')->take(6)->get();

        return view('clientlayouts.index.index', compact('menus', 'sliders', 'categories', 'featureProducts', 'tags', 'recommenedProducts'));
    }
}
