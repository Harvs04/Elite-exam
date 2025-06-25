<?php

namespace App\Livewire;

use Livewire\Component;

class ArtistsView extends Component
{
    public int $id;

    public function mount(int $id)
    {
        $this->id = $id;
    }

    public function render()
    {
        return view('livewire.artists-view');
    }
}
