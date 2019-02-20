<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                // long-winded to insert books into table, but at least the names make sense
        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "The Temporal Void",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "The Dreaming Void",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "The Evolutionary Void",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "Rogue Planet",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "Garden of Eden",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "Reality Dysfunction",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "The Naked God",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "American Pastoral",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "IT",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "From A Buick 8",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "Darwins Radio",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "Blood Music",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "Operating Systems",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "Exit Ghost",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "nemesis",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "The Martian",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "Judas Unchained",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);

        $randomAuthorRow=rand(1,9);
        $randomCategoryRow=rand(1,4);
        $authors_id=DB::table('authors')->skip($randomAuthorRow)->first()->id;
        $categories_id=DB::table('categories')->skip($randomCategoryRow)->first()->id;
        App\Book::insert([
            'ISBN' => NULL,
            'title' => "Neutronium Alchemist",
            'authors_id' => $authors_id,
            'categories_id' => $categories_id,
        ]);


    }
}
