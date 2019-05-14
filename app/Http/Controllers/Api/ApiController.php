<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Category\CategoryRepositoryContract;
use App\Repositories\Backend\Question\QuestionRepositoryContract;
use App\Repositories\Backend\Option\OptionRepositoryContract;
use App\Repositories\Backend\Vote\VoteRepositoryContract;
use Illuminate\Http\Request;
use Mail;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class ApiController extends Controller
{

    public function __construct(
        CategoryRepositoryContract $categories,
        VoteRepositoryContract $vote,
        OptionRepositoryContract $option,
        QuestionRepositoryContract $questions
    )
    {
        $this->categories       = $categories;
        $this->questions        = $questions;
        $this->votes            = $vote;
        $this->options          = $option;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('api.home');
    }

    public function questionsByCategory(Request $request)
    {
        $idCategory = ($request->has('category_id'))?$request->input('category_id'):1;
        $cat = $this->categories->findFullOrThrowException($idCategory, true);

        $records = collect([]);
        $temp = $cat->questions->where('published',1);

        $limit = $request->has('limit')?intval($request->input('limit')):$temp->count();
        $limit = $limit>$temp->count()?$temp->count():$limit;

        if($limit === 1){
            $temp = collect([$temp->first()]);
        } else {
            $temp = $temp->random()->get()->slice(0,$limit);
        }
        $records = $records->merge($temp);

    	return response()->json(array('metadata'=>array('limit'=>$limit,'category'=>array('id'=>$cat->id,'name'=>$cat->name)),'records'=>$records));
    }

    public function votesByQuestion(Request $request){
        return response()->json(array('records'=>$this->votes->totalByQuestion($request->input('question_id'))));
    }

    public function registerVote(Request $request)
    {
        $response = false;
        //if($request->ajax()) {
            $all = $request->all();
            if($request->has('option_id') && $request->has('question_id') && $this->options->existByQuestion($all['question_id'],$all['option_id'])){
                $response = $this->votes->create($all);
            }
        //}
        return response()->json(array('response'=>$response));
    }

    public function receiveSuggest(Request $request,$type)
    {
        $response = false;
        //if($request->ajax()) {
            $fields = $request->all();
            $fields['type'] = $type;

            Mail::send('emails.'.$type, ['fields' => $fields], function ($m) use ($fields) {
                $m->from($fields['email'], $fields['nombre']);
                $m->subject('VYCM: '.$fields['type']);
            });

        //}
        return response()->json(array('response'=>$fields));
    }


}
