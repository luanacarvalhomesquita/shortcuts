<?php

namespace App\Models;

use App\Http\Requests\Shortcut\ShareShortcutRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Shortcut extends Model
{
    use HasFactory;
    use SoftDeletes;

    const DEFAULT_COLOR = '#FFFFFF';

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'note',
        'link',
        'color',
        'deleted_at',
    ];

    public function filterShortcuts(int $userId, Request $request)
    {
        $pageNumber = $request->input('page_number', 1);
        $pageSize = $request->input('page_size', 12);

        $query = $this->query()->where('user_id', $userId);

        $textFilter = $request->input('text_filter');
        if($textFilter) {
            $query->where('title', 'like', "%$textFilter%");
            $query->orWhere('note', 'like', "%$textFilter%");
        }

        return $query->paginate($pageSize, ['*'], 'page', $pageNumber);
    }

    public function filterShortcutsByUserHash(ShareShortcutRequest $request)
    {
        $pageNumber = $request->input('page_number', 1);
        $pageSize = $request->input('page_size', 12);
        $hash = $request->input('hash');

        $query = $this->query()
            ->join('users', 'shortcuts.user_id', '=', 'users.id')
            ->where('users.hash_share', $hash);

        $textFilter = $request->input('text_filter');
        if($textFilter) {
            $query->where('title', 'like', "%$textFilter%");
            $query->orWhere('note', 'like', "%$textFilter%");
        }

        return $query->paginate($pageSize, ['*'], 'page', $pageNumber);
    }
}
