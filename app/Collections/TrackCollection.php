<?php
namespace App\Collections;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;

class TrackCollection extends Collection
{
    public function byDate()
    {
        return $this->mapToGroups(function ($tracked, $key) {
            $date = $tracked->started_at->toDateString();

            return  [
                $date => [
                    'id' => $tracked->id,
                    'title' => $tracked->title,
                    'started_at' => $tracked->started_at->toTimeString(),
                    'ended_at' => $tracked->ended_at->toTimeString(),
                    'diff' => $tracked->started_at->longAbsoluteDiffForHumans($tracked->ended_at),
                    'phase' => $tracked->phase->name,
                    'project' => $tracked->phase->project->name
                ]
            ];
        })->sort();
    }
}
