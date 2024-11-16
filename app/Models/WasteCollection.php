<?php

namespace App\Models;

use App\Models\Waste;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WasteCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'waste_id',
        'provider_id',
        'scheduled_date',
        'status',
        'collection_date',
        'collected_volume',
        'cost',
    ];

    /**
     * Relation avec le type de déchet collecté.
     */
    public function waste()
    {
        return $this->belongsTo(Waste::class, 'waste_id');
    }

    /**
     * Relation avec le fournisseur de la collecte.
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
