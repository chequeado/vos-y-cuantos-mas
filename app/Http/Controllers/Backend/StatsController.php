<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\Category\CategoryRepositoryContract;

/**
 * Class StatsController
 * @package App\Http\Controllers\Backend
 */
class StatsController extends Controller
{

	protected $categories;

    /**
     * @param CategoryRepositoryContract       $categories
     * @param PermissionRepositoryContract $permissions
     */
    public function __construct(
        CategoryRepositoryContract $categories
    )
    {
        $this->categories       = $categories;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
    	$cat = ($request->has('cat'))?$request->input('cat'):1;
    	$cats = $this->categories->getAllCategories();
        return view('backend.stats.votes')->withCat($cat)->withCats($cats);
    }
}