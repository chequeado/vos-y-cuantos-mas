<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Category\CategoryRepositoryContract;
use App\Repositories\Backend\Question\QuestionRepositoryContract;

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

    public function questionsByCategory($idCategory)
    {
    	$cat = $this->categories->findFullOrThrowException($idCategory, true);
    	return response()->json($cat);
    }

}