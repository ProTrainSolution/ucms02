<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution_id', 'program_code', 'program',
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id', 'id');
    }
}
