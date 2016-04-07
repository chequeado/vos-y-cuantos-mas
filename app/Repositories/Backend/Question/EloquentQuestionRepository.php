<?php

namespace App\Repositories\Backend\Question;

use App\Models\Question;
use App\Exceptions\GeneralException;

/**
 * Class EloquentQuestionRepository
 * @package App\Repositories\Question
 */
class EloquentQuestionRepository implements QuestionRepositoryContract
{
    /**
     * @param  $id
     * @param  bool $withPermissions
     * @throws GeneralException
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Support\Collection|null|static
     */
    public function findOrThrowException($id)
    {
        if (! is_null(Question::find($id))) {
            return Question::find($id);
        }

        throw new GeneralException(trans('exceptions.backend.access.roles.not_found'));
    }

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return mixed
     */
    public function getQuestionsPaginated($per_page, $order_by = 'sort', $sort = 'asc')
    {
        return Question::sortable()
            ->paginate($per_page);
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllQuestions($order_by = 'sort', $sort = 'asc')
    {
        return Question::orderBy($order_by, $sort)
            ->get();
    }

    public function getListQuestions($order_by = 'title', $sort = 'asc')
    {
        return Question::orderBy($order_by, $sort)->lists('name', 'id');
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        $new = new Question;
        $new->fill($input);
        if ($new->save()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.roles.create_error'));
    }

    /**
     * @param  $id
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $input)
    {
        $obj = $this->findOrThrowException($id);
        $obj->fill($input);
        if ($obj->save()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.roles.update_error'));
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        $obj = $this->findOrThrowException($id, true);
        if ($obj->delete()){
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.access.roles.delete_error'));
    }

    public function insertOrUpdateAll($items) {

        foreach ($items as $key => $value) {
            $item = Question::firstOrNew(['fecha' => $value['fecha'],'municipio_id' => $value['municipio_id']]);
            $item->fill($value);
            $item->save();
        }

    }
}
