<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	use \Sortable;

    protected $table = 'category';

    protected $hidden = ['created_at','updated_at'];

    protected $guarded = ['id'];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

}
