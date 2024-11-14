<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_type',
        'content',
    ];

    /**
     * Optionnel : méthode pour transformer le contenu en format structuré, comme JSON.
     */
    public function getContentAsJsonAttribute()
    {
        return json_decode($this->content, true);
    }
}
