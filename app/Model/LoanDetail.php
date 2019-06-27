<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LoanDetail extends Model
{
    protected $fillable     = [
        'book_id','qty','status','created_at','updated_at',
    ];
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
