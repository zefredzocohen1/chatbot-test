<?php

namespace App\Repositories;


use Illuminate\Support\Facades\Log;
use App\PasswordReset;

class PasswordResetRepository extends BaseRepository
{

    public function __construct(PasswordReset $reset)
    {
        $this->model = $reset;
    }

    public function store($inputs)
    {
        $reset = new $this->model;
        $reset->email                   = @$inputs['email'];
        $reset->token                   = @$inputs['token'];

        $reset->save();
        return $reset;
    }


}
