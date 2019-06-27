<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $guarded     = [
        'id',
    ];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function book()
    {
        return $this->hasMany(Book::class);
    }
    public function loanDetail()
    {
        return $this->hasMany(LoanDetail::class);
    }
}
