<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExampleRequest;

class ExampleController
{
    public function __invoke(ExampleRequest $request)
    {
        return;
    }
}
