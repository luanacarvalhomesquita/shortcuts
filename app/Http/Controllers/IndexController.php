<?php

namespace App\Http\Controllers;

use App\Helpers\PagesVue;
use App\Models\Shortcut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __construct(private readonly Shortcut $shortcut)
    {
    }

    public function __invoke(Request $request)
    {
        if(!Auth::check()) {
            return redirect()->route('login');
        }

        $userId = $request->user()->id;

        $shortcuts = $this->shortcut->filterShortcuts($userId, $request);


        return Inertia(PagesVue::PAGE_INDEX, [
            'shortcuts' => $shortcuts,
            'filters' => $request->all([
                'text_filter',
                'page_size',
                'page_number',
            ]),
        ]);
    }
}
