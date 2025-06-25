<?php

namespace App\Livewire;

use App\Models\Album;
use Illuminate\Support\Collection;
use Livewire\Component;

class AlbumSold extends Component
{
    public Collection $albums;

    public function mount(Collection $albums)
    {   
        $this->albums = $albums;
    }

    public function render()
    {
        return view('livewire.album-sold');
    }
}
