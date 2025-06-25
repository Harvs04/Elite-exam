<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;

class Artists extends Component
{
    public Collection $artists;

    public function mount(Collection $artists)
    {   
        $this->artists = $artists;
    }

    public function render()
    {
        return view('livewire.artists');
    }
}
