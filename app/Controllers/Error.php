<?php

namespace App\Controllers;

class Error extends BaseController
{
    public function error403()
    {

        return view('403');
    }
}
