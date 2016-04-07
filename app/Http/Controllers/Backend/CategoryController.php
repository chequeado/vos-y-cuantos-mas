<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Category\CategoryRepositoryContract;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * @var CategoryRepositoryContract
     */
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
     * @return mixed
     */
    public function index()
    {
        return view('backend.categories.index')
            ->withList($this->categories->getCategoriesPaginated(50));
    }

    /**
     * @param  $request
     * @return mixed
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * @param  $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->categories->create($request->all());
        return redirect()->route('admin.categories.index')->withFlashSuccess(trans('custom.backend.messages.created'));
    }

    /**
     * @param  $id
     * @param  $request
     * @return mixed
     */
    public function edit($id, Request $request)
    {
        $obj = $this->categories->findOrThrowException($id, true);
        return view('backend.categories.edit')
            ->withObj($obj);
    }

    /**
     * @param  $id
     * @param  $request
     * @return mixed
     */
    public function update($id, Request $request)
    {
        $this->categories->update($id, $request->all());
        return redirect()->route('admin.categories.index')->withFlashSuccess(trans('custom.backend.messages.updated'));
    }

    /**
     * @param  $id
     * @param  $request
     * @return mixed
     */
    public function destroy($id, Request $request)
    {
        $this->categories->destroy($id);
        return redirect()->route('admin.categories.index')->withFlashSuccess(trans('custom.backend.messages.deleted'));
    }
}
