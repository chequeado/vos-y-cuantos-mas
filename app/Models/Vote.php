<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model {

    protected $table = 'vote';

    protected $guarded = ['id'];

    protected $fillable = ['question_id','option_id','_token'];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function option()
    {
        return $this->belongsTo('App\Models\Option');
    }

}
