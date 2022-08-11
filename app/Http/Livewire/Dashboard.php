<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LOCATAIRE;

class Dashboard extends Component
{
    // public $id = 0 ;

    public function render()
    {

        $count = LOCATAIRE::count();

        return view('livewire.dashboard',[
            'count' => $count
        ]);
    }
}
