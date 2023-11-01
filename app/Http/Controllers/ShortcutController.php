<?php

namespace App\Http\Controllers;

use App\Helpers\PagesVue;
use App\Http\Requests\Shortcut\CreateShortcutRequest;
use App\Http\Requests\Shortcut\UpdateShortcutRequest;
use Illuminate\Http\Request;
use App\Models\Shortcut;

class ShortcutController extends Controller
{
    public function __construct(private readonly Shortcut $shortcut)
    {
    }

    public function index(Request $request)
    {
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

    public function show(Shortcut $shortcut)
    {
        return Inertia(PagesVue::PAGE_SHORTCUT_SHOW, ['shortcut' => $shortcut]);
    }

    public function create()
    {
        return Inertia(PagesVue::PAGE_SHORTCUT_CREATE);
    }

    public function store(CreateShortcutRequest $request)
    {
        $fieldsToSave = array_merge($request->all(), ['user_id' => $request->user()->id]);
        $createdShortcut = $this->shortcut->create($fieldsToSave);

        return Inertia(PagesVue::PAGE_SHORTCUT_SHOW, ['shortcut' => $createdShortcut])->with('success', 'Criado com sucesso!');
    }

    public function destroy(int $id)
    {
        $this->shortcut->destroy($id);

        return response()->json(status: 204);
    }

    public function restore(int $id)
    {
        $shortcut = Shortcut::withTrashed()->find($id);

        if ($shortcut) {
            $shortcut->restore();
        }

        return response()->json(status: 204);
    }

    public function edit(int $id)
    {
        $shortcut = Shortcut::find($id);

        return Inertia(PagesVue::PAGE_SHORTCUT_EDIT, ['shortcut' => $shortcut]);
    }

    public function update(UpdateShortcutRequest $request, Shortcut $shortcut)
    {
        $shortcut->update($request->all());

        return Inertia(PagesVue::PAGE_SHORTCUT_SHOW, ['shortcut' => $shortcut]);
    }
}
