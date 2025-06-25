<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Album;

class TopArtist extends Component
{
    public Object $top_album;

    public function mount(Object $top_album)
    {   
        $this->top_album = $top_album;
    }

    public function render()
    {
        return view('livewire.top-artist');
    }
}
