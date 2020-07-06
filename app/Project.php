<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    const FILTER_ACTIVE = 'active';
    const FILTER_ARCHIVE = 'archive';

    protected $fillable = [
        'name',
        'client',
        'archive'
    ];

    public function scopeActive($query)
    {
        $query->where('archive', false);
    }

    public function scopeArchive($query)
    {
        $query->where('archive', true);
    }

    public function isRecently($days = 10)
    {
    }

    public function getLastActivityAtAttribute()
    {
        return $this->tracks()->first()->updated_at->diffForHumans();
    }

    public function getHasTracksAttribute()
    {
        return $this->tracks()->count();
    }

    public function phases()
    {
        return $this->hasMany('App\Phase');
    }

    public function tracks()
    {
        return $this->hasManyThrough('App\Track', 'App\Phase')->orderBy('updated_at', 'desc');
    }
}
