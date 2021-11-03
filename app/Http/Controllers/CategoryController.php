<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function index(){

        $categorias=Category::get();
        return view('admin.category.index',compact('categories'));
    }  

    public function create(){

        return view('admin.category.create',compact('categories'));

    }
    public function store(StoreRequest $request,Category $category){

       
        $category->my_story($request);
        return redirect()->route('categories.index');
    }


    public function show(Category $category){
        return view('admin.category.show',compact('category'));
    }

    public function edit(){

        return view('admin.category.edit',compact('categories'));

    }

    public function update(StoreRequest $request,Category $category){

        $category->my_update($request);
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('categories.index');

    }
    }