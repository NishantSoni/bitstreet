<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface
{
    /**
     * Method to get all the records from the database.
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Method to create new record.
     *
     * @param array $attributes
     * @return Collection
     */
    public function create(array $attributes);

    /**
     * Method to insert multiple records at once.
     *
     * @param array $attributes
     * @return mixed
     */
    public function insertMultipleRows(array $attributes);

    /**
     * Method to find record by its primary key.
     *
     * @param int $id
     * @return Collection
     */
    public function find($id);

    /**
     * Method to update existing record.
     * It will not use "mass update" via eloquent, so that it will fire eloquent events while updating.
     *
     * @param int $id
     * @param array $attributes
     * @return boolean
     */
    public function update($id, array $attributes);

    /**
     * Method to update existing record via where condition.
     * It will use "mass update" via eloquent, so it will not fire eloquent events while updating.
     *
     * @param array $where
     * @param array $attributes
     * @return boolean
     */
    public function updateWhere(array $where, array $attributes);

    /**
     * Method to delete a record.
     * It will not use "mass delete" via eloquent.
     *
     * @param int $id
     * @return boolean
     */
    public function delete($id);

    /**
     * To delete record by matching multiple attributes
     *
     * @param array $attributes
     * @return boolean
     */
    public function deleteBy(array $attributes);

    /**
     * Method to update/create the records.
     *
     * @param array $whereAttributes
     * @param array $insertAttributes
     * @return mixed
     */
    public function updateOrCreate(array $whereAttributes, array $insertAttributes);
}
