<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Shortcut extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'note',
        'link',
        'image',
        'deleted_at',
    ];

    public function filterShortcuts(int $userId, Request $request)
    {
        $pageNumber = $request->input('page_number', 1);
        $pageSize = $request->input('page_size', 12);

        $query = $this->query();

        $textFilter = $request->input('text_filter');
        if($textFilter) {
            $query->where('title', 'like', "%$textFilter%");
            $query->orWhere('note', 'like', "%$textFilter%");
        }


        return $query->paginate($pageSize, ['*'], 'page', $pageNumber);
    }


}
