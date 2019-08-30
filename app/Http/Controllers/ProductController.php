<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use DB;
class ProductController extends Controller
{
    public function index(){
        $categories = Category::where('publication_status',1)->get();
        $manufacturers = Manufacturer::where('publication_status',1)->get();
        return view('admin.product.add-product',['categories'=>$categories,'manufacturers'=>$manufacturers]);
    }
    protected function productInfoValidate($request){
        $this->validate($request,[
            'product_name'=>'required'
        ]);
    }
    protected function productImageUpload($request){
        $productImage = $request->file('product_image');
        $fileType = $productImage->getClientOriginalExtension();
        $imageName = $request->product_name.'.'.$fileType;
        $directory = 'product-images/';
        $imageUrl = $directory.$imageName;
        Image::make($productImage)->save($imageUrl);
        return $imageUrl;
    }
    protected function saveProductBasicInfo($request ,$imageUrl ){
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->productShortDescription = $request->productShortDescription;
        $product->productLongDescription = $request->productLongDescription;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();
    }
    public function saveProductInfo(Request $request){

        $this->productInfoValidate($request);
        $imageUrl = $this->productImageUpload($request);
        $this->saveProductBasicInfo($request, $imageUrl);
        return redirect('/product/add')->with('message','Product Info Save Successfully');
    }
    public function manageProductInfo(){
        $products = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
                ->select('products.id', 'products.product_name','products.product_image', 'products.product_price', 'products.product_quantity', 'products.publication_status', 'categories.category_name', 'manufacturers.manufacturer_name')
                ->get();
        /* echo '<pre>';
          print_r($products);
          exit(); */
        return view('admin.product.manage-product', ['products' => $products]);
    }
    public function editProductInfo($id){
        $product = Product::find($id);
        $categories = Category::where('publication_status',1)->get();
        $manufacturers = Manufacturer::where('publication_status',1)->get();
        return view('admin.product.edit-product', ['product' => $product, 'categories'=>$categories, 'manufacturers'=>$manufacturers]);
    }
    public function productBasicInfoUpdate($product,$request,$imageUrl=null ){
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->productShortDescription = $request->productShortDescription;
        $product->productLongDescription = $request->productLongDescription;
        if($imageUrl){
        $product->product_image = $imageUrl;
        }
        $product->publication_status = $request->publication_status;
        $product->save();
    }
    public function updateProductInfo(Request $request){

        $productImage = $request->file('product_image');
        $product = Product::find($request->product_id);
        if($productImage){
            unlink($product->product_image);
            $imageUrl = $this->productImageUpload($request);
            $this->productBasicInfoUpdate($product,$request,$imageUrl);
        }else{
            $this->productBasicInfoUpdate($product, $request);  
        }
        return redirect('/product/manage')->with('message','Product Info Updated Successfully');
    }
}
