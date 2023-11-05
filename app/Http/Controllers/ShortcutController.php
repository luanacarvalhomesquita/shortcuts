<?php

namespace App\Http\Controllers;

use App\Helpers\PagesVue;
use App\Http\Requests\Shortcut\CreateShortcutRequest;
use App\Http\Requests\Shortcut\ShareShortcutRequest;
use App\Http\Requests\Shortcut\UpdateShortcutRequest;
use Illuminate\Http\Request;
use App\Models\Shortcut;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ShortcutController extends Controller
{
    public function __construct(
        private readonly Shortcut $shortcut,
        private readonly User $user,
    ) {
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

    public function store(CreateShortcutRequest $request)
    {
        $fieldsToSave = array_merge($request->all(), ['user_id' => $request->user()->id]);
        $createdShortcut = $this->shortcut->create($fieldsToSave);

        return Inertia(PagesVue::PAGE_SHORTCUT_SHOW, ['shortcut' => $createdShortcut])->with('success', 'Criado com sucesso!');
    }

    public function destroy(Shortcut $shortcut)
    {
        $this->shortcut->destroy($shortcut->id);

        return response()->json(status: 204);
    }

    public function restore(Shortcut $shortcut)
    {
        $shortcut = Shortcut::withTrashed()->find($shortcut->id);

        if ($shortcut) {
            $shortcut->restore();
        }

        return response()->json(status: 204);
    }

    public function edit(Shortcut $shortcut)
    {
        $shortcut = Shortcut::find($shortcut->id);

        return Inertia(PagesVue::PAGE_SHORTCUT_EDIT, ['shortcut' => $shortcut]);
    }

    public function update(UpdateShortcutRequest $request, Shortcut $shortcut)
    {
        $shortcut->update($request->all());

        return Inertia(PagesVue::PAGE_SHORTCUT_SHOW, ['shortcut' => $shortcut]);
    }

    public function share(ShareShortcutRequest $request)
    {
        $shortcuts = new Collection();
        $authorName = null;

        $hash = $request->input('hash');
        $existent = $this->user::where('hash_share', $hash)->first();
        if ($existent) {
            $shortcuts = $this->shortcut->filterShortcutsByUserHash($request);
            $author = $this->user->getUserByHash($hash);
            $authorName = $author->name;
        }

        return Inertia(PagesVue::PAGE_SHORTCUT_SHARE, [
            'shortcuts' => $shortcuts,
            'filters' => $request->all([
                'text_filter',
                'hash',
                'page_size',
                'page_number',
            ]),
            'authorName' => $authorName,
        ]);
    }
}
