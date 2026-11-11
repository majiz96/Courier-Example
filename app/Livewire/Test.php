<?php

namespace App\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $text = 'show';
    public bool $show = false;

    public string $status ='';


    public function render()
    {
        return view('livewire.test');
    }
}
