<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable     = [
        'id',
    ];
    public function loan()
    {
        return $this->hasMany(Loan::class);
    }
}
