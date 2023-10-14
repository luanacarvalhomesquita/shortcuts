<?php

namespace App\Http\Controllers;

use App\Helpers\PagesVue;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return inertia(PagesVue::PAGE_LOGIN);
    }

    public function store()
    {

    }

    public function destroy()
    {

    }
}
