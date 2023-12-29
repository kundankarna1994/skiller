<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProfileRepository;
use App\Http\Requests\ProfileStoreRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Resources\ProfileResource;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{

    private ProfileRepository $repository;

    public function __construct(ProfileRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(ProfileStoreRequest $request): ProfileResource
    {
        $data = $request->validated();
        $profile = $this->repository->store($data);
        return new ProfileResource($profile);
    }

    public function update(ProfileUpdateRequest $request,Profile $profile): ProfileResource
    {
        $data = $request->validated();
        $profile = $this->repository->updaye($data,$profile);
        return new ProfileResource($profile);
    }
}
