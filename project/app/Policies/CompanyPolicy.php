<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CompanyPolicy
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

    public function update(User $user, Company $company): bool
    {
        if ($user->role==1 && $user->id==$company->user_id){
            return true;
        }
        else{
            return false;
        }
    }
    public function delete(User $user, Company $company): bool
    {
        if (($user->role==1 && $user->id==$company->user_id) || ($user->role==2)){
            return true;
        }
        else{
            return false;
        }

    }
}


