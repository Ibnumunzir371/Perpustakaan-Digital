<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_id',
        'start_date',
        'end_date',
        'book_name',
        'status_id',
        'regs_back',
    ];
}
