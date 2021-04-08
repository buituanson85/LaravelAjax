<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{

    public function index(Request $request)
    {

        $categorys = CategoryProduct::latest()->get();

        if ($request->ajax()) {
            $data = CategoryProduct::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCategory">Edit</a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCategory">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('category',compact('categorys'));
    }

    public function store(Request $request)
    {
        CategoryProduct::updateOrCreate(['id' => $request->id],
            ['name' => $request->name, 'description' => $request->description, 'status' => $request->status]);

        return response()->json(['success'=>'Category saved successfully.']);
    }

    public function edit($id)
    {
        $category = CategoryProduct::find($id);
        return response()->json($category);
    }

    public function destroy($id)
    {
        CategoryProduct::find($id)->delete();

        return response()->json(['success'=>'Category deleted successfully.']);
    }
}
