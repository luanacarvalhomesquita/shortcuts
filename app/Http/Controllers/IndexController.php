<?php

namespace App\Http\Controllers;

use App\Helpers\PagesVue;
use App\Models\Shortcut;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(private readonly Shortcut $shortcut)
    {
    }

    public function __invoke(Request $request)
    {
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 10);

        $shortcuts = $this->shortcut->paginate($pageSize, ['*'], 'page', $page);

        return Inertia(PagesVue::PAGE_INDEX, ['shortcuts' => $shortcuts]);
    }
}