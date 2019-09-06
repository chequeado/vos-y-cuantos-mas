<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Question\QuestionRepositoryContract;
use Illuminate\Http\Request;

/**
 * Class QuestionController
 * @package App\Http\Controllers
 */
class QuestionController extends Controller
{

    public function __construct(
        QuestionRepositoryContract $questions
    )
    {
        $this->questions = $questions;
    }

    public function view($id, Request $request)
    {
        $theme = \Config::get('site.theme');

        $obj = $this->questions->findPublishedOrThrowException($id);
        if($obj){
            $obj->load('options');
            return view('frontend.themes.'.$theme.'.questions.view')
                ->withTheme($theme)
                ->withObj($obj);
        } else {
            return view('frontend.themes.'.$theme.'.questions.not_found')
                ->withTheme($theme);
        }

    }

}
