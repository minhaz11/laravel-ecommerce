<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        //
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
            'publication_status' => 'required'
        ]);
        $category =new Category;
       $category->categoryName = $request->categoryName;
       $category->description = $request->description;
       $category->publication_status = $request->publication_status;
       $category->save();

       return back()->with('message', $category->categoryName . ' is successfully added as new category');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
