<?php

namespace App\Repositories\Backend\AnswerType;

/**
 * Interface CategorieRepositoryContract
 * @package App\Repositories\Categorie
 */
interface AnswerTypeRepositoryContract
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
    public function getAnswerTypesPaginated($per_page, $order_by = 'id', $sort = 'asc');

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllAnswerTypes($order_by = 'id', $sort = 'asc');
    public function getListAnswerTypes($order_by = 'name', $sort = 'asc');

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
