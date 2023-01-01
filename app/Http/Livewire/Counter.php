<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{  
    public $count;
 
    public function dodo()
    {
       return redirect('/login');
    }
    public function render()
    {
        return view('livewire.counter');
    }
   
}
