<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LOCATAIRE;

class Tables extends Component
{

    public $allData;
    public $locataire;
    public $deletetask;

    public function render()
    // {
    //     $this->allData=LOCATAIRE::all();
    //     return view('livewire.tables');
    // }

    {
        $this->allData=LOCATAIRE::all();
        return view('livewire.tables');
    }
    
    
}
