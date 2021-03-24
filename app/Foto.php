<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'path', 'survey_id'
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
