<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
class NewShopController extends Controller
{
    public function index(){
        $newProducts = Product::where('publication_status', 1)
                                      ->orderBy('id','DESC')
                                      ->take(8)
                                      ->get();
        $sliders = Slider::where('publication_status',1)->orderby('id', 'desc')->paginate(3);
        return view('front-end.home.home',['newProducts'=>$newProducts,'sliders'=>$sliders]);
    }
    public function categoryProduct($id){
        $categoryProducts = Product::where('category_id',$id)
                                    ->where('publication_status', 1)
                                    ->get();
        return view('front-end.category.category-content',['categoryProducts'=>$categoryProducts]);
    }
    public function productDetails($id){
        $product = Product::find($id);
        return view('front-end.product.product-details',['product'=>$product]);
    }
}
