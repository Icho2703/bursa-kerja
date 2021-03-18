<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Profession extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function authorr()
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
}
