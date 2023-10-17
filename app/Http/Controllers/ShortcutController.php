<?php

namespace App\Http\Controllers;

use App\Helpers\PagesVue;
use App\Models\Shortcut;

class ShortcutController extends Controller
{
    public function __construct(private readonly Shortcut $shortcut)
    {
    }

    public function __invoke(Shortcut $shortcut)
    {
        return Inertia(PagesVue::PAGE_SHORTCUT_SHOW, ['shortcut' => $shortcut]);
    }
}
