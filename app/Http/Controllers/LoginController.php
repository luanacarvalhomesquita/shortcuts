<?php

namespace App\Http\Controllers;

use App\Helpers\PagesVue;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke()
    {
        return Inertia(PagesVue::PAGE_LOGIN);
    }
}
