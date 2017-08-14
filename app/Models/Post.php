<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public function countPost()
    {
    	$posts = POst::all();
    	return $this->getLastIndexOfPost($posts);
    }
}
