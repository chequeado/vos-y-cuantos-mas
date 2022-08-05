<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\AnswerType\AnswerTypeRepositoryContract;

/**
 * Class AnswerTypeController
 * @package App\Http\Controllers
 */
class AnswerTypeController extends Controller
{
    /**
     * @var AnswerTypeRepositoryContract
     */
    protected $answer_types;

    /**
     * @param AnswerTypeRepositoryContract       $answer_types
     * @param PermissionRepositoryContract $permissions
     */
    public function __construct(
        AnswerTypeRepositoryContract $answer_types
    )
    {
        $this->answer_types       = $answer_types;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view('backend.answer_types.index')
            ->withList($this->answer_types->getAnswerTypesPaginated(50));
    }

    /**
     * @param  $request
     * @return mixed
     */
    public function create()
    {
        return view('backend.answer_types.create');
    }

    /**
     * @param  $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->answer_types->create($request->all());
        return redirect()->route('admin.answer_types.index')->withFlashSuccess(trans('custom.backend.messages.created'));
    }

    /**
     * @param  $id
     * @param  $request
     * @return mixed
     */
    public function edit($id, Request $request)
    {
        $obj = $this->answer_types->findOrThrowException($id, true);
        return view('backend.answer_types.edit')
            ->withObj($obj);
    }

    /**
     * @param  $id
     * @param  $request
     * @return mixed
     */
    public function update($id, Request $request)
    {
        $this->answer_types->update($id, $request->all());
        return redirect()->route('admin.answer_types.index')->withFlashSuccess(trans('custom.backend.messages.updated'));
    }

    /**
     * @param  $id
     * @param  $request
     * @return mixed
     */
    public function destroy($id, Request $request)
    {
        $this->answer_types->destroy($id);
        return redirect()->route('admin.answer_types.index')->withFlashSuccess(trans('custom.backend.messages.deleted'));
    }
}
