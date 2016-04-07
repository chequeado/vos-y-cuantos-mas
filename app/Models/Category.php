<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	use \Sortable;

    protected $table = 'category';

    protected $guarded = ['id'];
}
