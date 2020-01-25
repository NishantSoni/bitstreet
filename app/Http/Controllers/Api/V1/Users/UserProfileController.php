<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Api\V1\BaseApiController;
use App\Services\Users\UserProfileService;
use Illuminate\Http\Response;

class UserProfileController extends BaseApiController
{
    /**
     * @var UserProfileService $userProfileService
     */
    private $userProfileService;

    /**
     * UserController constructor.
     *
     * @param UserProfileService $userProfileService
     */
    public function __construct(UserProfileService $userProfileService)
    {
        $this->userProfileService = $userProfileService;
    }

    /**
     * Get user profile
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show()
    {
        $result = $this->userProfileService->getProfile();

        if ($result) {
            return $this->sendResponse($result, Response::HTTP_OK);
        }

        return $this->sendResponse(
            [],
            Response::HTTP_UNAUTHORIZED,
            trans('api/user.auth.profile_failed')
        );
    }
}
