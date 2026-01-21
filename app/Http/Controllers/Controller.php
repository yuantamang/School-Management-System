<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function __construct()
    {
        throw new \Exception('Not implemented');
    }
}
