<?php

namespace App\Http\Controllers;

use App\Helpers\PagesVue;
use App\Http\Requests\CreateShortcutRequest;
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
        return Inertia(PagesVue::PAGE_SHORTCUT_CREATE, ['images' => []]);
    }

    public function store(CreateShortcutRequest $request)
    {
        $createdShortcut = $this->shortcut->create($request->all());
        return Inertia(PagesVue::PAGE_SHORTCUT_SHOW, ['shortcut' => $createdShortcut])->with('success', 'Criado com sucesso!');
    }

    public function destroy(int $id)
    {
        $this->shortcut->destroy($id);

        return response()->json(status: 204);
    }

    public function restore($id)
    {
        $shortcut = Shortcut::withTrashed()->find($id);

        if ($shortcut) {
            $shortcut->restore();
        }

        return response()->json(status: 204);
    }
}
