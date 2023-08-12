<?php

namespace App\Actions;


use App\Models\User;

class CreateUserAction extends Action
{

    public function __invoke($data)
    {
        User::create($data);
        return back();
    }
}
