<?php

namespace App\Services\Users;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserProfileService
{
    /**
     * @var UserRepository $userRepository
     */
    private $userRepository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Return user profile.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getProfile()
    {
        return $this->userRepository->find(Auth::id());
    }
}
