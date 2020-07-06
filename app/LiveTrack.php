<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveTrack extends Model
{
    const BREAK_FIXED = 'fixed';
    const BREAK_IN_PROGRESS = 'ongoing';

    protected $fillable = [ 'phase_id',  'started_at',  'in_break',  'breaks', 'title' ];

    protected $casts = [
        'breaks' => 'collection',
    ];

    public function phase()
    {
        return $this->belongsTo('App\Phase');
    }
}
