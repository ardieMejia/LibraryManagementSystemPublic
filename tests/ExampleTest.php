<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DB;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    // public function testBasicExample()
    // {
    //     $this->visit('/')
    //          ->see('Laravel 5');
    // }

    public function test_basic_navigation(){
        $this->visit('/')->see('Admin')->click('Ready?')
             ->see('Book search');
    }

    public function test_create_author_category_from_scratch(){
        $this->visit('/')->see('Admin')->click('Ready?')
             ->see('Book search')->click('admin level')
        // now creating new author
             ->click('Author')->click('new author')->type('Peter','firstname')->type('Hamilton','lastname')
             ->press('author entry')->see('Data saved')->click('Back to admin page')
        // now creating new author
             ->click('Author')->click('new author')->type('Greg','firstname')->type('Bear','lastname')
             ->press('author entry')->see('Data saved')->click('Back to admin page')
        // now creating new author
             ->click('Author')->click('new author')->type('Stephen','firstname')->type('King','lastname')
             ->press('author entry')->see('Data saved')->click('Back to admin page')
        // now creating new author
             ->click('Author')->click('new author')->type('Philip','firstname')->type('Roth','lastname')
             ->press('author entry')->see('Data saved')->click('Back to admin page')
        // new category!!
             ->click('Categories')->click('new category')->type('Science Fiction','categoryname')
             ->press('create category entry')->see('Data saved')->click('Back to admin page')
        // new category!!
             ->click('Categories')->click('new category')->type('Horror','categoryname')
             ->press('create category entry')->see('Data saved')->click('Back to admin page')
        // new category!!
             ->click('Categories')->click('new category')->type('Fantasy','categoryname')
             ->press('create category entry')->see('Data saved')->click('Back to admin page')
        // new category!!
             ->click('Categories')->click('new category')->type('Childrens','categoryname')
             ->press('create category entry')->see('Data saved')->click('Back to admin page');


    }


    public function test_create_4_book(){


        $category_id=DB::table('categories')->skip(1)->first()->id;
        $author_id=DB::table('authors')->skip(2)->first()->id;
        $this->visit('/book/create')
            ->type('The Dark Tower','title')->select($author_id,'author_id')
            ->select($category_id,'category_id')
            ->press('Book Entry')->see('Data saved')->click('Back to books');

        $category_id=DB::table('categories')->skip(0)->first()->id;
        $author_id=DB::table('authors')->skip(0)->first()->id;
        $this->visit('/book/create')
            ->type('The Dreaming Void','title')->select($author_id,'author_id')
            ->select($category_id,'category_id')
            ->press('Book Entry')->see('Data saved')->click('Back to books');

        $category_id=DB::table('categories')->skip(0)->first()->id;
        $author_id=DB::table('authors')->skip(0)->first()->id;
        $this->visit('/book/create')
            ->type('The Evolutionary Void','title')->select($author_id,'author_id')
            ->select($category_id,'category_id')
            ->press('Book Entry')->see('Data saved')->click('Back to books');

        $category_id=DB::table('categories')->skip(0)->first()->id;
        $author_id=DB::table('authors')->skip(1)->first()->id;
        $this->visit('/book/create')
            ->type('Blood Music','title')->select($author_id,'author_id')
            ->select($category_id,'category_id')
            ->press('Book Entry')->see('Data saved')->click('Back to books');

        
    }
    // fuck it delete function hasnt worked yet
    public function test_delete_ScienceFiction_category_along_with_its_books(){
        $this->visit('/admin/categories')->press('delete')->press('Proceed')
            ->see('Data removed')->see('The Evolutionary Void')->see('The Dreaming Void')->see('Blood Music');


    }



}




