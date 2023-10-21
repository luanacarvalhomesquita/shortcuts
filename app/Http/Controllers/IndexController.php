<?php

namespace App\Http\Controllers;

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

        return redirect()->route('shortcut.index');
    }
}
