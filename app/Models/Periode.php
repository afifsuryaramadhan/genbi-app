<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $table = 'periode';
    protected $fillable = [
        'periode',
        'status'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id_periode', 'id');
    }
}
