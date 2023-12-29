<?php

namespace App\Http\Repositories;

use App\Models\Profile;

class ProfileRepository
{
    public function store($data)
    {
        $data['resume'] = $data['resume']->store("resumes");
        $data['user_id'] = auth()->id();
        return Profile::create($data);
    }

    public function update($data,$profile)
    {
        if(isset($data['resume'])){
            //delete file
            $data['resume'] = $data['resume']->store("resumes");
        }
        return $profile->update($data);
    }
}
