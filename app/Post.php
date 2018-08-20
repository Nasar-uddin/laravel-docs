<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table name can be changed by this
    protected $table = 'posts';
    //primary key
    public $primaryKey = 'id';
    //timestamps 
    public $timestamps = true;
}
