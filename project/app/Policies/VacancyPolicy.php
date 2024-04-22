<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Auth\Access\Response;

class VacancyPolicy
{
    public function create(User $user): bool
    {
        if ($user->role==1){
            return true;
        }
        else{
            return false;
        }

    }

    public function update(User $user, Vacancy $vacancy): bool
    {
        if ($user->role==1 && $user->id==$vacancy->user_id){
            return true;
        }
        else{
            return false;
        }
    }
    public function delete(User $user,Vacancy $vacancy): bool
    {
        if (($user->role==1 && $user->id==$vacancy->user_id) || ($user->role==2)){
            return true;
        }
        else{
            return false;
        }

    }
}
