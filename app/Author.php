<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    public function books(){
        return $this->hasMany('App\Book','authors_id','id');
    }

    public function deleteAll(){
        $this->books()->delete();
        return parent::delete();
    }
    public function getBooks(){

        return $this->books()->where("authors_id","=",$this->id)->get();
    }
}


