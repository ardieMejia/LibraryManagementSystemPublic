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


        // using the technique with the retarded name: eager-loading

        $page=0;
        $paginate=2;


        $firstOrLast="first";
        $authors=DB::table('authors')->offset($page*$paginate)->take($paginate)->get();
        return view('/admin/authors', ['authors'=>$authors,'page'=>$page,'firstOrLast'=>$firstOrLast,'paginate'=>$paginate]);
    }

    public function showfilter(Request $request)
    {
        $page=$request->page;
        $paginate=$request->paginate;
        $page=$page+$request->direction;

        $count=Author::count();

        $authors=DB::table('authors')->offset($page*$paginate)->take($paginate)->get();

        $rowsLeft=$count-($page)*$paginate;
        if ($page==0) {
            $firstOrLast="first";
        } elseif ($rowsLeft>$paginate) {
            $firstOrLast="middle";
        } else {
            $firstOrLast="last";
        }

        return view('/admin/authors', ['authors'=>$authors,'page'=>$page,'firstOrLast'=>$firstOrLast,'paginate'=>$paginate]);
    }


    public function create()
    {
        //

        return view('admin/authorform');
    }


    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'firstname'=>'required|unique:authors',
            'lastname'=>'required|unique:authors'
        ]);
        $author=new Author;
        $author->firstname=$request->firstname;
        $author->lastname=$request->lastname;
        $author->save();
        $Details=$author;
        return view('/misc/savenotify', ['performed'=>'saved','Details'=>$Details]);
    }


    public function edit($id)
    {
        //

        $author=Author::find($id);
        return view('/admin/authoredit', ['author'=>$author]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname'=>'required|unique:authors',
            'lastname'=>'required|unique:authors'
        ]);

        $author=Author::find($id);
        $author->firstname=$request->firstname;
        $author->lastname=$request->lastname;

        $Details=$author;
        $author->save();
        return view('/misc/savenotify', ['performed'=>'changed','Details'=>$Details]);
    }

    public function destroy($id)
    {

        //        $Details=Author::find($id)->books()->where("authors_id","=","$id")->get();

        $Details=Author::find($id);
        $childDetails=Author::find($id)->getBooks();

        Author::find($id)->deleteAll();

        return view('misc/deletenotify', ['performed'=>'removed','Details'=>$Details,'childDetails'=>$childDetails]);
    }

    public function verifydelete($id)
    {
        return view('/misc/verifydelete', ['id'=>$id,'propertyname'=>'authors']);
    }
}
