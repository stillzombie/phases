<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Collections\PhaseCollection;

class Phase extends Model
{
    const FILTER_ACTIVE = 'active';
    const FILTER_CLOSE = 'close';

    protected $fillable = [
        'name',
        'project_id',
        'billable',
        'assigned_hours',
        'spend_hours',
        'started_at',
    ];

    protected $with = ['project'];

    /**
     * Create a new Eloquent Collection instance.
     *
     * @param  array  $models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function newCollection(array $models = [])
    {
        return new PhaseCollection($models);
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function tracks()
    {
        return $this->hasMany('App\Track');
    }

    public function scopeActive($query)
    {
        $query->where('closed', false);
    }

    public function scopeClose($query)
    {
        $query->where('closed', true);
    }
}
