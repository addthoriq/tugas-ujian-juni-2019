<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    protected $fillable     = [
        'name',
    ];
    public function member()
    {
        return $this->hasMany(Member::class);
    }
    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
