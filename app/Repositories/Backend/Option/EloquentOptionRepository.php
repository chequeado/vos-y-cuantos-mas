<?php

namespace App\Repositories\Backend\Option;

use App\Models\Option;
use App\Exceptions\GeneralException;

/**
 * Class EloquentOptionRepository
 * @package App\Repositories\Option
 */
class EloquentOptionRepository implements OptionRepositoryContract
{
    /**
     * @param  $id
     * @param  bool $withPermissions
     * @throws GeneralException
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Support\Collection|null|static
     */
    public function findOrThrowException($id)
    {
        if (! is_null(Option::find($id))) {
            return Option::find($id);
        }

        throw new GeneralException(trans('exceptions.backend.access.roles.not_found'));
    }

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return mixed
     */
    public function getOptionsPaginated($per_page, $order_by = 'sort', $sort = 'asc')
    {
        return Option::sortable()
            ->paginate($per_page);
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllOptions($order_by = 'sort', $sort = 'asc')
    {
        return Option::orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        $new = new Option;
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

    public function insertAll($question_id,$items) {

        foreach (Option::where('question_id',$question_id)->get() as $key => $opt) {
            $opt->delete();
        }

        foreach ($items as $key => $value) {
            $op = new Option();
            $op->key = $key;
            $op->question_id = $question_id;
            $op->fill($value);
            $op->save();
        }

    }
}
