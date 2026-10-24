<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ucapan extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'ucapan',
    ];

    /**
     * Scope query untuk mengurutkan ucapan paling baru di atas.
     */
    public function scopeTerbaru($query)
    {
        return $query->latest();
    }
}
