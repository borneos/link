<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Biodata extends Component
{
    public $title = 'Judul';
    public function render()
    {
        return view('livewire.biodata');
    }
}
