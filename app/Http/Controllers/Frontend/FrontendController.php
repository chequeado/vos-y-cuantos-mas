<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Category\CategoryRepositoryContract;
use Illuminate\Http\Request;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{

    public function __construct(
        CategoryRepositoryContract $categories
    )
    {
        $this->categories       = $categories;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        javascript()->put([
            'test' => 'it works!',
        ]);

        $cats = $this->categories->getAllCategories();

        return view('frontend.index')->withCats($cats);
    }

    public function app(Request $request)
    {
        $cat = ($request->has('cat'))?$request->input('cat'):1;

        return view('frontend.app.index')->withCat($cat);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
}
