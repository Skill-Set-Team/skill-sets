<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    /**
     * @var string[] Mass-assignable properties
     */
    protected $fillable = [
        'solution',
        'isCorrect'
    ];

    /**
     * Exercise that the answer belongs to (one-to-many relationship)
     */
    function exercise() {
        return $this->belongsTo(Exercise::class);
    }
}
