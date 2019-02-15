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

        // using the technique with the funny name: eager-loading

        $page=0;
        $paginate=2;


        $books=Book::with('author')->with('category')->offset($page*$paginate)->take($paginate)->get();

        $firstOrLast="first";
        return view('booksearch',['books'=>$books,'page'=>$page,'firstOrLast'=>$firstOrLast,'paginate'=>$paginate]);
    }
    public function showfilter(Request $request)
    {

        // using the technique with the silly name: eager-loading
        // long-winded way to filter results per page


        $page=$request->page;
        $paginate=$request->paginate;
        // if($request->direction=="forward")
        //     $page++;
        // elseif($request->direction=="back")
        //     $page--;

        $page=$page+$request->direction;


        $count=Book::count();

        $books=Book::with('author')->with('category')->offset($page*$paginate)->take($paginate)->get();

        $rowsLeft=$count-($page)*$paginate;
        if($page==0)
            $firstOrLast="first";
        elseif($rowsLeft>$paginate)
            $firstOrLast="middle";
        else
            $firstOrLast="last";


        return view('booksearch',['books'=>$books,'page'=>$page,'firstOrLast'=>$firstOrLast,'paginate'=>$paginate]);
    }

    public function create(){

        $categories=Category::all();
        $authors=Author::all();



        return view('book/bookform',['categories'=>$categories,'authors'=>$authors]);

    }
    public function store(Request $request){


        $this->validate($request,[
            'title'=>'required',
            'author_id'=>'required',
            'category_id'=>'required'
        ]);


        $book=new Book;
        $book->ISBN=null;
        $book->title=$request->title;
        $book->authors_id=$request->author_id;
        $book->categories_id=$request->category_id;
        $Details=$book;
        $book->save();


        return view('misc/savenotify',['performed'=>'saved','Details'=>$Details]);

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
