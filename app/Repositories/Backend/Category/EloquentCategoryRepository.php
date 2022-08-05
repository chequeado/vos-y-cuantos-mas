<?php

namespace App\Repositories\Backend\Category;

use App\Models\Category;
use App\Exceptions\GeneralException;

/**
 * Class EloquentCategoryRepository
 * @package App\Repositories\Category
 */
class EloquentCategoryRepository implements CategoryRepositoryContract
{
    /**
     * @param  $id
     * @param  bool $withPermissions
     * @throws GeneralException
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Support\Collection|null|static
     */
    public function findOrThrowException($id)
    {
        if (! is_null(Category::find($id))) {
            return Category::find($id);
        }

        throw new GeneralException(trans('exceptions.backend.access.roles.not_found'));
    }

    public function findFullOrThrowException($id)
    {
        if (! is_null(Category::find($id))) {
            return Category::where('id',$id)->with(['questions','questions.options','questions.answer_type'])->first();
        }

        throw new GeneralException(trans('exceptions.backend.access.roles.not_found'));
    }

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return mixed
     */
    public function getCategoriesPaginated($per_page, $order_by = 'sort', $sort = 'asc')
    {
        return Category::sortable()
            ->paginate($per_page);
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllCategories($order_by = 'name', $sort = 'asc')
    {
        return Category::orderBy($order_by, $sort)
            ->get();
    }

    public function getPublicCategories($order_by = 'name', $sort = 'asc')
    {
        return Category::orderBy($order_by, $sort)
            ->where('inhome',true)
            ->get();
    }

    public function getListCategories($order_by = 'name', $sort = 'asc')
    {
        return Category::orderBy($order_by, $sort)->lists('name', 'id');
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        $new = new Category;
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
            $item = Category::firstOrNew(['fecha' => $value['fecha'],'municipio_id' => $value['municipio_id']]);
            $item->fill($value);
            $item->save();
        }

    }
}
