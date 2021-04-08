<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    public $name;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $status;
    public $featured;
    public $quantity;
    public $images;
    public $category_id;

    public function AllProduct(){
        $products = Product::paginate(5);
        return view('admin.admin-product-list', compact('products'));
    }

    public function AddProduct(){
        $categories = CategoryProduct::get();
        return view('admin.admin-add-product', compact('categories'));
    }

    public function AddSubmitProduct(Request $request){
        $product = new Product();
        $product -> name = $request ->name;
        $product -> short_description = $request ->short_description;
        $product -> description = $request ->description;
        $product -> regular_price = $request ->regular_price;
        $product -> sale_price = $request ->sale_price;
        $product -> SKU = $request ->SKU;
        $product -> status = $request ->status;
        $product -> featured = $request ->featured;
        $product -> quantity = $request ->quantity;
        $product -> category_id = $request ->category_id;

        $images = $request->image;
        $imageName = $images->getClientOriginalName();
        $image_resize = Image::make($images->getRealPath());
        $image_resize->resize(300,300);
        $image_resize->save(public_path('assets/uploads/products/'.$imageName));
        $request->image->storeAs('products', $imageName);
        $product -> image = $imageName;
        $product->save();
        return back()->with('product_create','Post has been created successfully!');
    }

    public function EditProduct($id){
        $product = Product::where('id', $id)->first();
        $categories = CategoryProduct::get();
        return view('admin.admin-edit-product', compact('product', 'categories'));
    }

    public function UpdateProduct(Request $request){

        $product = Product::find($request->id);
        $product -> name = $request ->name;
        $product -> short_description = $request ->short_description;
        $product -> description = $request ->description;
        $product -> regular_price = $request ->regular_price;
        $product -> sale_price = $request ->sale_price;
        $product -> SKU = $request ->SKU;
        $product -> status = $request ->status;
        $product -> featured = $request ->featured;
        $product -> quantity = $request ->quantity;
        $product -> category_id = $request ->category_id;
        $images = $request->image;
        $imageName = $images->getClientOriginalName();
        $image_resize = Image::make($images->getRealPath());
        $image_resize->resize(300,300);
        $image_resize->save(public_path('assets/uploads/products/'.$imageName));
        $request->image->storeAs('products', $imageName);
        $product -> image = $imageName;
        $product->save();
        return back()->with('category_update','Post has been update successfully!');
    }

    public function DeleteProduct($id){
        $product = Product::find($id);
        unlink(public_path('assets/uploads/products').'/'.$product->image);
        $product->delete();
        return back()->with('product_delete', 'Post has been deleted successfully!');
    }
}
