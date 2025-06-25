<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Album;

class Dashboard extends Component
{
    public string $artist = "";

    public function render()
    {
        $query = Album::query()
            ->join('artists', 'albums.artist_id', '=', 'artists.id')
            ->select('albums.*', 'artists.name as artist_name', 'artists.code');

        if (strlen($this->artist) >= 1) {
            $query->where(function($query) {
                $query->where('artists.code', 'like', '%' . $this->artist . '%');
            });
        }

        $albums = $query->latest()->get();

        return view('livewire.dashboard', ['albums' => $albums]);
    }
}
