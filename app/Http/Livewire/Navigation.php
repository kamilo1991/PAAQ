<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\planaqui;


class Navigation extends Component
{
    public function render()
    {
        //$paa = planaqui::all();

        return view('livewire.navigation');
    }
}
