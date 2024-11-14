<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = [
        'alert_type',
        'waste_id',
        'message',
    ];

    /**
     * Relation avec le déchet lié à cette alerte.
     */
    public function waste()
    {
        return $this->belongsTo(Waste::class);
    }
}
