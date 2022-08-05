<?php

namespace App\Repositories\Backend\Vote;

/**
 * Interface CategorieRepositoryContract
 * @package App\Repositories\Categorie
 */
interface VoteRepositoryContract
{

    public function create($input);

    public function getByHash($key);

}
