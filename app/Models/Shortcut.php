<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Shortcut extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'note',
        'link',
        'image',
    ];

    public function filterShortcuts(int $userId, Request $request)
    {
        $pageNumber = $request->input('page_number', 1);
        $pageSize = $request->input('page_size', 10);

        $query = $this->query();

        $textFilter = $request->input('text_filter');
        if($textFilter) {
            $query->where('title', 'like', "%$textFilter%");
            $query->where('note', 'like', "%$textFilter%");
        }


        return $query->paginate($pageSize, ['*'], 'page', $pageNumber);
    }


}
