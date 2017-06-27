<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	use \Sortable;

    protected $hidden = ['created_at','updated_at'];

    protected $table = 'question';

    protected $guarded = ['id'];

    protected $relations = ['options'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function answer_type()
    {
        return $this->belongsTo('App\Models\AnswerType');
    }

    public function options()
    {
        return $this->hasMany('App\Models\Option');
    }

    public function optionsByKey()
    {
        return $this->options->keyBy('key');
    }

}
