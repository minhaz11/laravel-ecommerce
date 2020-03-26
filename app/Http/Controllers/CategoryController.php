<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{

    public function index()
    {
       
    }


    public function create()
    {
        return view('adminDashboard.Category.CategoryAddForm');
    }


    public function store(Request $request)
    {

        $request->validate([
            'categoryName'=> 'required|unique:categories,categoryName',
            'description' => 'required',
            'categoryImage' => 'required',
            'publication_status' => 'required'
        ]);
        $fileName = $request->file('categoryImage')->getClientOriginalName();
        if($request->hasFile('categoryImage')){
            Image::make($request->file('categoryImage'))->save(public_path().'/uploads/category_image/'.$fileName);
        }

        $category =new Category;
       $category->categoryName = $request->categoryName;
       $category->description = $request->description;
       $category->categoryImage = $fileName;
       $category->publication_status = $request->publication_status;
       $category->save();

       return back()->with('message', $category->categoryName . ' is successfully added as new category');

    }


    public function show()
    {
        $categories = Category::paginate(10);
        return view('adminDashboard.Category.categoryManage', ['categories'=> $categories ]);
    }


    public function edit($id)
    {
        $edit = Category::find($id);
        return view('adminDashboard.Category.categoryUpdate', ['edit' => $edit]);
    }


    public function update(Request $request, $id)
    {
        $update = Category::find($id);
        $request->validate([
            'categoryName'=> 'required',
            'description' => 'required',
            'categoryImage' => 'required',
            'publication_status' => 'required'
        ]);
        $fileName = $request->file('categoryImage')->getClientOriginalName();
        if($request->hasFile('categoryImage')){
            unlink(public_path().'/uploads/category_image/'.$update->categoryImage);
            Image::make($request->file('categoryImage'))->save(public_path().'/uploads/category_image/'.$fileName);
        }
        $update->categoryName = $request->categoryName;
        $update->description = $request->description;
        $update->categoryImage = $fileName;
        $update->publication_status = $request->publication_status;
        $update->save();

        return back()->with('message', $update->categoryName . ' is successfully updated');

    }


    public function destroy($id)
    {
       $cat = Category::find($id);
       $cat->delete();
        return back()->with('message', 'Your desired category is deleted successfully');
    }

    public function publicationManage($id)
    {
        $message ="";
       $publication =  Category::find($id);
        if($publication->publication_status == 1){
            $publication->publication_status = 0;
            $publication->save();
            $message = " is Unpublished successfully";
        } else{
            $publication->publication_status = 1;
            $publication->save();
            $message = " is Published successfully";

        }
        return back()->with('message', $publication->categoryName . $message);
    }

}
