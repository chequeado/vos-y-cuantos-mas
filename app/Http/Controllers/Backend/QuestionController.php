<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Question\QuestionRepositoryContract;
use App\Repositories\Backend\Category\CategoryRepositoryContract;
use App\Repositories\Backend\AnswerType\AnswerTypeRepositoryContract;

/**
 * Class QuestionController
 * @package App\Http\Controllers
 */
class QuestionController extends Controller
{
    /**
     * @var QuestionRepositoryContract
     */
    protected $questions;

    /**
     * @param QuestionRepositoryContract       $questions
     * @param PermissionRepositoryContract $permissions
     */
    public function __construct(
        QuestionRepositoryContract $questions,
        AnswerTypeRepositoryContract $answer_type,
        CategoryRepositoryContract $categories
    )
    {
        $this->questions       = $questions;
        $this->categories       = $categories;
        $this->answer_type       = $answer_type;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view('backend.questions.index')
            ->withList($this->questions->getQuestionsPaginated(50));
    }

    /**
     * @param  $request
     * @return mixed
     */
    public function create()
    {
        return view('backend.questions.create')
            ->withCategories($this->categories->getListCategories())
            ->withAnswerTypes($this->answer_type->getListAnswerTypes());
    }

    /**
     * @param  $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->questions->create($request->all());
        return redirect()->route('admin.questions.index')->withFlashSuccess(trans('custom.backend.messages.created'));
    }

    /**
     * @param  $id
     * @param  $request
     * @return mixed
     */
    public function edit($id, Request $request)
    {
        $obj = $this->questions->findOrThrowException($id, true);
        return view('backend.questions.edit')
            ->withObj($obj)
            ->withCategories($this->categories->getListCategories())
            ->withAnswerTypes($this->answer_type->getListAnswerTypes());
    }

    /**
     * @param  $id
     * @param  $request
     * @return mixed
     */
    public function update($id, Request $request)
    {
        $this->questions->update($id, $request->all());
        return redirect()->route('admin.questions.index')->withFlashSuccess(trans('custom.backend.messages.updated'));
    }

    /**
     * @param  $id
     * @param  $request
     * @return mixed
     */
    public function destroy($id, Request $request)
    {
        $this->questions->destroy($id);
        return redirect()->route('admin.questions.index')->withFlashSuccess(trans('custom.backend.messages.deleted'));
    }
}
