<?php

namespace App\Policies;

use App\Models\Resume;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ResumePolicy
{


    public function create(User $user): bool
    {
        if ($user->role==0){
            return true;
        }
        else{
            return false;
        }
    }

    public function update(User $user, Resume $resume): bool
    {
        if ($user->role==0 && $user->id==$resume->user_id){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete(User $user, Resume $resume): bool
    {
        if (($user->role==1 && $user->id==$resume->user_id) || ($user->role==2)){
            return true;
        }
        else{
            return false;
        }
    }


}
