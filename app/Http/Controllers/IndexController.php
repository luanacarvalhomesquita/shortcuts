<?php

namespace App\Http\Controllers;

use App\Helpers\RouteName;
use App\Models\Shortcut;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __construct(private readonly Shortcut $shortcut)
    {
    }

    public function __invoke()
    {
        if(!Auth::check()) {
            return redirect()->route('login');
        }

        return redirect()->route(RouteName::PAGE_SHORTCUT_INDEX);
    }
}
