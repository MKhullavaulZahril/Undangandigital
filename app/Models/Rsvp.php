<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'status',
        'jumlah',
    ];

    /**
     * Type casting atribut model.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'jumlah' => 'integer',
        ];
    }
}
