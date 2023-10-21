<?php

namespace App\Http\Controllers;

use App\Helpers\PagesVue;
use App\Http\Requests\CreateShortcutRequest;
use App\Models\Shortcut;

class ShortcutController extends Controller
{
    public function __construct(private readonly Shortcut $shortcut)
    {
    }

    public function show(Shortcut $shortcut)
    {
        return Inertia(PagesVue::PAGE_SHORTCUT_SHOW, ['shortcut' => $shortcut]);
    }

    public function create()
    {
        return Inertia(PagesVue::PAGE_SHORTCUT_CREATE, ['images' => []]);
    }

    public function store(CreateShortcutRequest $request)
    {
        $createdShortcut = $this->shortcut->create($request->all());
        return Inertia(PagesVue::PAGE_SHORTCUT_SHOW, ['shortcut' => $createdShortcut])->with('success', 'Criado com sucesso!');
    }
}
