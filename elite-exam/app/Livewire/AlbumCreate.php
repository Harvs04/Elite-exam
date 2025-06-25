<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Artist;

class AlbumCreate extends Component
{
    public function render()
    {
        $artists = Artist::orderBy('name')->get();
        return view('livewire.album-create', ['artists' => $artists]);
    }
}
