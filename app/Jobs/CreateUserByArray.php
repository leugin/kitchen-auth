<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CreateUserByArray
{

    public function __invoke(array $attributes):null|User|Model
    {
        return User::query()->create($attributes);
    }
}
