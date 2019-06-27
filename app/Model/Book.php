<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded     = [
        'id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function age()
    {
        return $this->belongsTo(Age::class);
    }
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
