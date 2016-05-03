<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Category\CategoryRepositoryContract;
use App\Repositories\Backend\Question\QuestionRepositoryContract;
use Illuminate\Http\Request;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class ApiController extends Controller
{

    public function __construct(
        CategoryRepositoryContract $categories,
        QuestionRepositoryContract $questions
    )
    {
        $this->categories       = $categories;
        $this->questions       = $questions;
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
    	return response()->json(array('metadata'=>array('category'=>array('id'=>$cat->id,'name'=>$cat->name)),'records'=>$cat->questions));
    }

}