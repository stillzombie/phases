<?php

namespace App;

use App\Collections\TrackCollection;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [ 'started_at',  'ended_at', 'title', 'phase_id' ];

    public function newCollection(array $models = [])
    {
        return new TrackCollection($models);
    }

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    public function phase()
    {
        return $this->belongsTo('App\Phase');
    }
}
