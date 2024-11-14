<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'service_type',
        'cost_per_unit',
        'currency',
    ];

    /**
     * Relation avec les collectes de déchets.
     */
    public function collections()
    {
        return $this->hasMany(WasteCollection::class);
    }
}
