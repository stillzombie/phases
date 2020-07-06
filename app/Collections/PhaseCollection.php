<?php
namespace App\Collections;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;

class PhaseCollection extends Collection
{
    public function stack()
    {
        return $this->mapToGroups(function ($phase, $key) {
            return  [
                $phase->project->name => [
                    'id' => $phase['id'],
                    'name' => $phase->name
                ]
            ];
        });
    }

    public function byName($search)
    {
        return $this->filter(function ($phase) use ($search) {
            return Str::contains(strtolower($phase->name), strtolower($search));
        })->stack();
    }
}
