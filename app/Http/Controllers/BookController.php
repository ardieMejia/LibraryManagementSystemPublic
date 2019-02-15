<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Book;
use App\Category;
use App\Author;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BookController extends Controller
{

    public function show()
    {

        $page=1;
        $paginate=2;
        $order="asc";
        $column="title";

        $books=DB::table('books')->join('authors','books.authors_id','=','authors.id')
              ->join('categories','books.categories_id','=','categories.id')
              ->select('books.id','ISBN','title','firstname','lastname','categoryname','books.created_at','books.updated_at');
        $books=$books->offset(($page-1)*$paginate)->take($paginate)->get();

        $firstOrLast="first";

        return view('booksearch',['books'=>$books,'page'=>$page,'firstOrLast'=>$firstOrLast,'paginate'=>$paginate,'order'=>$order,'column'=>$column]);
    }
    public function showfilter(Request $request)
    {

        $order=$request->order;
        $page=$request->page;
        $page=$page+$request->direction;
        $paginate=$request->paginate;

        $column=$request->column;

        $count=Book::count();

        $books=DB::table('books')->join('authors','books.authors_id','=','authors.id')
              ->join('categories','books.categories_id','=','categories.id')
              ->select('books.id','ISBN','title','firstname','lastname','categoryname','books.created_at','books.updated_at');
        $books=$books->orderBy($column,$order)->offset(($page-1)*$paginate)->take($paginate)->get();

        $rowsLeft=$count-($page)*$paginate;
        if($page==1)
            $firstOrLast="first";
        elseif($rowsLeft>$paginate)
            $firstOrLast="middle";
        else
            $firstOrLast="last";

        return view('booksearch',['books'=>$books,'page'=>$page,'firstOrLast'=>$firstOrLast,'paginate'=>$paginate,'order'=>$order,'column'=>$column]);
    }

    public function create(){

        $categories=Category::all();
        $authors=Author::all();
        return view('book/bookform',['categories'=>$categories,'authors'=>$authors]);

    }

    public function store(Request $request){

        $this->validate($request,[
            'title'=>'required|unique:books',
            'author_id'=>'required',
            'category_id'=>'required'
        ]);

        $book=new Book;
        $book->ISBN=null;
        $book->title=$request->title;
        $book->authors_id=$request->author_id;
        $book->categories_id=$request->category_id;
        $book->save();
        $Details=$book;

        return view('misc/savenotify',['performed'=>'saved','Details'=>$Details]);

    }

    public function edit($id)

    {
        //
        $book=Book::find($id);
        $categories=Category::all();
        $authors=Author::all();
        return view('/book/bookedit',['book'=>$book,'categories'=>$categories,'authors'=>$authors]);

    }

    public function update(Request $request, $id){

        $this->validate($request,[
            'title'=>'required',
            'author_id'=>'required',
            'category_id'=>'required'
        ]);

        $book=Book::find($id);
        $book->title=$request->title;
        $book->authors_id=$request->author_id;
        $book->categories_id=$request->category_id;
        $book->save();
        $Details=$book;

        return view('/misc/savenotify',['performed'=>'changed','Details'=>$Details]);

    }

    public function verifydelete($id){

        return view('/misc/verifydelete',['id'=>$id,'propertyname'=>'book']);

    }
       public function destroy($id)
    {

        $book=Book::find($id);
        $Details=$book;
        $book->delete();


        return view('misc/deletenotify',['performed'=>'removed','Details'=>$Details]);

    }


    public function ardieInsertsData(){

        DB::table('books')->insert(["title"=>"The Dreaming Void","authors_id"=>13,"categories_id"=>14]);

        DB::table('books')->insert(["title"=>"The Naked God","authors_id"=>13,"categories_id"=>14]);

        DB::table('books')->insert(["title"=>"Blood Music","authors_id"=>18,"categories_id"=>14]);

        DB::table('books')->insert(["title"=>"Eon","authors_id"=>18,"categories_id"=>14]);

        DB::table('books')->insert(["title"=>"Pandoras Star","authors_id"=>13,"categories_id"=>14]);

        DB::table('books')->insert(["title"=>"The Great North Road","authors_id"=>13,"categories_id"=>14]);

        DB::table('books')->insert(["title"=>"Judas Unchained","authors_id"=>13,"categories_id"=>14]);


        //---------- horror
        DB::table('books')->insert(["title"=>"From A Buick 8","authors_id"=>15,"categories_id"=>15]);

        DB::table('books')->insert(["title"=>"Pet Cemetary","authors_id"=>15,"categories_id"=>15]);

        DB::table('books')->insert(["title"=>"The Shining","authors_id"=>15,"categories_id"=>15]);

        DB::table('books')->insert(["title"=>"The Dark Tower","authors_id"=>15,"categories_id"=>15]);
        
        DB::table('books')->insert(["title"=>"IT","authors_id"=>15,"categories_id"=>15]);

        //---------- biography/history
        DB::table('books')->insert(["title"=>"American Pastoral","authors_id"=>17,"categories_id"=>16]);

        DB::table('books')->insert(["title"=>"Nemesis","authors_id"=>17,"categories_id"=>16]);

        DB::table('books')->insert(["title"=>"Indignation","authors_id"=>17,"categories_id"=>16]);

        //---------- science and tech
        DB::table('books')->insert(["title"=>"Operating Systems","authors_id"=>16,"categories_id"=>18]);

        DB::table('books')->insert(["title"=>"Java","authors_id"=>16,"categories_id"=>18]);

        DB::table('books')->insert(["title"=>"C & C++","authors_id"=>16,"categories_id"=>18]);

        return "DONE";

    }
}
