<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Author;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthorsController extends Controller
{

    public function show()
    {
        //

        $page=0;
        $paginate=2;


        $authors=DB::table('authors')->offset($page*$paginate)->take($paginate)->get();

        $firstOrLast="first";



        return view('/admin/authors',['authors'=>$authors,'page'=>$page,'firstOrLast'=>$firstOrLast,'paginate'=>$paginate]);
    }

    public function showfilter(Request $request)
    {


        $page=$request->page;
        $paginate=$request->paginate;


        $page=$page+$request->direction;


        $count=Author::count();
        $authors=DB::table('authors')->offset($page*$paginate)->take($paginate)->get();



        $rowsLeft=$count-($page)*$paginate;
        if($page==0)
            $firstOrLast="first";
        elseif($rowsLeft>$paginate)
            $firstOrLast="middle";
        else
            $firstOrLast="last";

        return view('/admin/authors',['authors'=>$authors,'page'=>$page,'firstOrLast'=>$firstOrLast,'paginate'=>$paginate]);
    }

    public function create()
    {
        //
        return view('admin/authorform');
    }


    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'authorname'=>'required'
        ]);
        $author=new Author;
        $author->authorname=$request->authorname;
        $author->save();
        return view('/misc/temp',['performed'=>'saved']);
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
        //


        //        $Details=Author::find($id)->books()->where("authors_id","=","$id")->get();

        $parentDetails=Author::find($id);
        $Details=Author::find($id)->getBooks();


        //        $Details=Author::find($id);
        //        Author::find($id)->deleteAll();

        return view('misc/temp',['performed'=>'removed','Details'=>$Details,'parentDetails'=>$parentDetails]);

    }

    public function verifydelete($id){
        return view('/misc/verifydelete',['id'=>$id,'propertyname'=>'authors']);
    }


    public function ardieInsertsData(){

        DB::table('authors')->insert(["authorname"=>"Peter F Hamilton"]);

        DB::table('authors')->insert(["authorname"=>"Alastair Reynolds"]);

        DB::table('authors')->insert(["authorname"=>"Stephen King"]);

        DB::table('authors')->insert(["authorname"=>"Deitel and Deitel"]);

        DB::table('authors')->insert(["authorname"=>"Phillip Roth"]);

        DB::table('authors')->insert(["authorname"=>"Greg Bear"]);

        return "DONE";


    }
}
