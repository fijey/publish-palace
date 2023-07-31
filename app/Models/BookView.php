<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APp\Models\BookModel;

class BookView extends Model
{
    use HasFactory;
    
    protected $table = 'book_views';
    protected $guarded = ['id'];

    public function book()
    {
        return $this->belongsTo(BookModel::class, 'book_id');
    }

    public static function uniqueViewsCount($bookId)
    {
        return self::where('book_id', $bookId)->distinct('ip_address')->count('ip_address');
    }
}
