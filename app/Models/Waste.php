<?php

namespace App\Models;

use App\Models\WasteCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Waste extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'category',
        'origin',
        'volume',
        'unit',
    ];

    /**
     * Relation avec les collectes de déchets.
     */
    public function collections()
    {
        return $this->hasMany(WasteCollection::class);
    }

    /**
     * Relation avec les alertes liées à ce type de déchet.
     */
    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }
}
