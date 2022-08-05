<?php

namespace App\Repositories\Backend\Category;

/**
 * Interface CategorieRepositoryContract
 * @package App\Repositories\Categorie
 */
interface CategoryRepositoryContract
{
    /**
     * @param  $id
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function findOrThrowException($id);

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return mixed
     */
    public function getCategoriesPaginated($per_page, $order_by = 'id', $sort = 'asc');

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllCategories($order_by = 'id', $sort = 'asc');
    public function getListCategories($order_by = 'name', $sort = 'asc');

    public function getPublicCategories($order_by = 'name', $sort = 'asc');

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  $id
     * @param  $input
     * @return mixed
     */
    public function update($id, $input);

    /**
     * @param  $id
     * @return mixed
     */
    public function destroy($id);

    public function insertOrUpdateAll($items);

}
