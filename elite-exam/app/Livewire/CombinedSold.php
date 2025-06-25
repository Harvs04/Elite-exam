<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;

class CombinedSold extends Component
{

    public Collection $albums;

    public function mount(Collection $albums)
    {   
        $this->albums = $albums;
    }

    public function render()
    {
        return view('livewire.combined-sold');
    }
}
