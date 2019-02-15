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
        return view('admin/categories',["categories"=>$categories,'page'=>$page,'firstOrLast'=>$firstOrLast,'paginate'=>$paginate]);
    }

    public function showfilter(Request $request)
    {

        // using the technique with the silly name: eager-loading
        // long-winded way to filter results per page


        $page=$request->page;
        $paginate=$request->paginate;

        $page=$page+$request->direction;


        $count=Category::count();


        $categories=DB::table('categories')->offset($page*$paginate)->take($paginate)->get();

        $rowsLeft=$count-($page)*$paginate;
        if($page==0)
            $firstOrLast="first";
        elseif($rowsLeft>$paginate)
            $firstOrLast="middle";
        else
            $firstOrLast="last";


        return view('/admin/categories',['categories'=>$categories,'page'=>$page,'firstOrLast'=>$firstOrLast,'paginate'=>$paginate]);
    }

    public function create()
    {
        //
        return view('admin/categoryform');
    }


    public function store(Request $request)
    {
        //

        $this->validate($request,[
            'categoryname'=>'required'
        ]);

        $category=new Category;

        $category->categoryname=$request->categoryname;
        // this what the model does, magic behind the scene, generating queries
        $category->save();
        return view('misc/temp',['performed'=>'saved']);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {


        $parentDetails=Category::find($id);
        $Details=Category::find($id)->getBooks();

        //        $Details=Category::find($id);
        //        Category::find($id)->deleteAll();

        return view('misc/temp',['performed'=>'removed','Details'=>$Details,'parentDetails'=>$parentDetails]);


    }

    public function verifydelete($id){
        return view('/misc/verifydelete',['id'=>$id,'propertyname'=>'categories']);
    }


    //-------------------- for inserting data, not used, and called through routes,
    //-------------------- will study better way to insert data later
    public function ardieInsertsData(){

        DB::table('categories')->insert(["categoryname"=>"Science Fiction"]);

        DB::table('categories')->insert(["categoryname"=>"Horror"]);

        DB::table('categories')->insert(["categoryname"=>"Biography/History"]);

        DB::table('categories')->insert(["categoryname"=>"Natural Science"]);

        DB::table('categories')->insert(["categoryname"=>"Science and Technology"]);

        return "done";

    }
}
