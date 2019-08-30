<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.add-category');
    }
    public function saveCategory(Request $request){
        $category = new Category();
        $this->validate($request,[
            'category_name'=>'required',
            'category_description'=>'required'
        ]);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        return redirect('/category/add')->with('message','Category Info Save Successfully');
    }
    public function manageCategory(){
        $categories = Category::all();
        return view('admin.category.manage-category',['categories'=>$categories]);
    }
    public function unpublishedCategoryInfo($id){
        $categoryById = Category::find($id);
        $categoryById->publication_status=0;
        $categoryById->save();
        return redirect('/category/manage')->with('message','Category Info unpublished Successfully');
    }
    public function publishedCategoryInfo($id){
        $categoryById = Category::find($id);
        $categoryById->publication_status=1;
        $categoryById->save();
        return redirect('/category/manage')->with('message','Category Info unpublished Successfully');
    }
    public function editCategoryInfo($id){
        $categoryById = Category::find($id);
        return view('admin.category.edit-category',['categoryById'=>$categoryById]);
    }
    public function updateCategoryInfo(Request $request){
        $category = Category::find($request->category_id);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        return redirect('/category/manage')->with('message','Category Info Update Successfully');
    }
    public function deleteCategoryInfo($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('/category/manage')->with('message','Category Info Delete Successfully');
    }
}
