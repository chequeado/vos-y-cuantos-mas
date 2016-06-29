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
        $theme = \Config::get('site.theme');
        
        javascript()->put([
            'theme' => $theme
        ]);

        $cats = $this->categories->getAllCategories();

        return view('frontend.themes.'.$theme.'.index')->withCats($cats)->withTheme($theme);
    }

    public function app(Request $request)
    {
        $theme = \Config::get('site.theme');
        
        javascript()->put([
            'theme' => $theme
        ]);

        $cat = ($request->has('cat'))?$request->input('cat'):1;

        return view('frontend.themes.'.$theme.'.app.index')->withCat($cat)->withTheme($theme);
    }

}
