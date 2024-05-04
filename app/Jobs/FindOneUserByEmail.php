<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class FindOneUserByEmail
{


    public function __invoke(string $email):null|User|Model
    {
        return User::query()->firstWhere('email', $email);
    }
}
