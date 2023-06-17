<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'book_id',
        'amount',
        'forfeit',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
        // return $this->hasMany(category::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // public function PenaltyPayment(){
    //     return $this->hasOne(PenaltyPayment::class);
    // }
}
