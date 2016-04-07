<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerType extends Model {

	use \Sortable;

    protected $table = 'answer_type';

    protected $guarded = ['id'];
}
