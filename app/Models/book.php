<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'type_book',
        'amount_id',
        'author',
        'year',
        'add',
        'file_book',
        'cover_book',
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
        // return $this->hasMany(category::class);
    }

}
