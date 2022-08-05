<?php

namespace App\Repositories\Backend\Question;

/**
 * Interface CategorieRepositoryContract
 * @package App\Repositories\Categorie
 */
interface QuestionRepositoryContract
{
    /**
     * @param  $id
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function findOrThrowException($id);
    public function findPublishedByCategory($idCat);
    public function findPublishedOrThrowException($id);

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return mixed
     */
    public function getQuestionsPaginated($per_page, $order_by = 'id', $sort = 'asc');

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllQuestions($order_by = 'id', $sort = 'asc');
    public function getListQuestions($order_by = 'id', $sort = 'asc');

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
