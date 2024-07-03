<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution_id', 'institution',
    ];

    public function programs()
    {
        return $this->hasMany(Program::class, 'institution_id', 'id');
    }
}
