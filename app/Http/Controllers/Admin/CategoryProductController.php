<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function AllCategoryProduct(){
        $categories = CategoryProduct::paginate(3);
        return view('admin.admin-category-list', compact('categories'));
    }

    public function AddCategoryProduct(){
        return view('admin.admin-add-category-product');
    }

    public function AddSubmitCategory(Request $request){
        $category = new CategoryProduct();
        $category -> name = $request -> name;
        $category -> description = $request -> description;
        $category -> status = $request -> status;
        $category->save();
        return back()->with('category_create','Post has been created successfully!');
    }
    public function DeleteCategoryProduct($id){
        CategoryProduct::where('id', $id)->delete();
        return back()->with('category_delete', 'Post has been deleted successfully!');
    }

    public function EditCategoryProduct($id){
        $category = CategoryProduct::find($id);
        return view('admin.admin-edit-category-product', compact('category'));
    }

    public function UpdateCategoryProduct(Request $request){
//        CategoryProduct::where('id', $request->id)->update([
//            'name' => $request->name,
//            'description' => $request ->description,
//            'status' => $request->status,
//        ]);
        $category = CategoryProduct::find($request->id);
        $category -> name = $request -> name;
        $category -> description = $request -> description;
        $category -> status = $request -> status;
        $category->save();
        return back()->with('category_update','Post has been update successfully!');
    }
}
