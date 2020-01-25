<?php

namespace App\Repositories;

use App\User;

class UserRepository extends Repository
{
    /**
     * @var array $searchableFields
     */
    private $searchableFields = ['name', 'email', 'mobile', 'created_at', 'companies.name', 'companies.subdomain'];

    /**
     * To initialize class objects/variables.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Fetch all users.
     * @todo: apply global logic of pagination.
     *
     * @return mixed
     */
    public function getAllUsers()
    {
        $query = $this->model
            ->where('is_superadmin', 0)
            ->orderBy('created_at', 'desc');

        $this->attachSearchResult($query, $this->searchableFields);
        $this->attachFilters($query);

        return $query->with('companies')->paginate(10);
    }

    /**
     * Method to get active/in-active users.
     *
     * @param $query
     * @return mixed
     */
    public function attachFilters(&$query)
    {
        if (request()->has('status')) {
            $value = ( trim(request()->get('status')) == 'active' ) ? 1 : 0;
            $query->where('is_active', $value);
        }

        return $query;
    }
}
