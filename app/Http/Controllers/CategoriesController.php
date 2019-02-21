<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function show()
    {
        //


        $page=0;
        $paginate=2;

        $categories=DB::table('categories')->offset($page*$paginate)->take($paginate)->get();


        $firstOrLast="first";
        return view('admin/categories', ["categories"=>$categories,'page'=>$page,'firstOrLast'=>$firstOrLast,'paginate'=>$paginate]);
    }

    public function showfilter(Request $request)
    {
        $page=$request->page;
        $paginate=$request->paginate;
        $page=$page+$request->direction;


        $count=Category::count();


        $categories=DB::table('categories')->offset($page*$paginate)->take($paginate)->get();

        $rowsLeft=$count-($page)*$paginate;
        if ($page==0) {
            $firstOrLast="first";
        } elseif ($rowsLeft>$paginate) {
            $firstOrLast="middle";
        } else {
            $firstOrLast="last";
        }


        return view('admin/categories', ['categories'=>$categories,'page'=>$page,'firstOrLast'=>$firstOrLast,'paginate'=>$paginate]);
    }


    public function create()
    {
        //
        return view('admin/categoryform');
    }


    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'categoryname'=>'required|unique:categories'
        ]);

        $category=new Category;

        $category->categoryname=$request->categoryname;

        $category->save();
        $Details=$category;
        return view('misc/savenotify', ['performed'=>'saved','Details'=>$Details]);
    }


    public function edit($id)
    {
        //
        $category=Category::find($id);
        return view('/admin/categoryedit', ['category'=>$category]);
    }

    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
            'categoryname'=>'required|unique:categories'
        ]);

        $category=Category::find($id);
        $category->categoryname=$request->categoryname;
        $category->save();
        $Details=$category;

        return view('misc/savenotify', ['performed'=>'not really changed','Details'=>$Details]);
    }


    public function destroy($id)
    {
        $Details=Category::find($id);
        $childDetails=Category::find($id)->getBooks();

        //        $Details=Category::find($id);
        //        Category::find($id)->deleteAll();

        return view('misc/deletenotify', ['performed'=>'removed','Details'=>$Details,'childDetails'=>$childDetails]);
    }

    public function verifydelete($id)
    {
        return view('/misc/verifydelete', ['id'=>$id,'propertyname'=>'categories']);
    }
}
