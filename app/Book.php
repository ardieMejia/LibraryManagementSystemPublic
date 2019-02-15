<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    public function category(){

        return $this->belongsTo('App\Category','categories_id','id');
    }
   public function author(){
       return $this->belongsTo('App\Author','authors_id','id');

    }
}
