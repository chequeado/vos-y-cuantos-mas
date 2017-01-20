<?php

namespace App\Repositories\Backend\Vote;

use App\Models\Vote;
use App\Exceptions\GeneralException;

/**
 * Class EloquentVoteRepository
 * @package App\Repositories\Vote
 */
class EloquentVoteRepository implements VoteRepositoryContract
{

    public function create($input)
    {
        try{
            $new = new Vote;
            $new->fill($input);

            if ($new->save()) {
                return array(
                    'total_option' => $this->getCountByOption($input['option_id']),
                    'total_question' => $this->getCountByQuestion($input['question_id'])
                    );
            } else {
                return false;
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }

    }

    public function getCountByOption($option){
        return Vote::where('option_id',$option)->count();
    }

    public function getCountByQuestion($question){
        return Vote::where('question_id',$question)->count();
    }

    public function totalByQuestion($question){
        return Vote::select(\DB::raw('option_id as id,count(1) as total'))
            ->where('question_id',$question)
            ->groupBy('option_id')
            ->get();
    }

}
