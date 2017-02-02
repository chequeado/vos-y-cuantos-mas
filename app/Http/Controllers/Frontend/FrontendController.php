<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Category\CategoryRepositoryContract;
use App\Repositories\Backend\Vote\VoteRepositoryContract;
use Illuminate\Http\Request;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{

    public function __construct(
        CategoryRepositoryContract $categories,
        VoteRepositoryContract $votes
    )
    {
        $this->categories       = $categories;
        $this->votes       = $votes;
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

        return redirect()->route('frontend.app');
        //return view('frontend.themes.'.$theme.'.index')->withCats($cats)->withTheme($theme);
    }

    public function app(Request $request)
    {
        \Session::regenerateToken();

        $theme = \Config::get('site.theme');
        
        javascript()->put([
            'theme' => $theme
        ]);

        $cat = ($request->has('cat'))?$request->input('cat'):1;

        return view('frontend.themes.'.$theme.'.app.index')->withCat($cat)->withTheme($theme);
    }

    public function summary(Request $request)
    {
        $theme = \Config::get('site.theme');
        
        javascript()->put([
            'theme' => $theme
        ]);

        $cat = ($request->has('cat'))?$request->input('cat'):1;

        return view('frontend.themes.'.$theme.'.app.summary')->withCat($cat)->withVotes($this->votes->getByHash($request->input('key')))->withTheme($theme);
    }

}
