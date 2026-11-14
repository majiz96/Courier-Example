<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class Test extends Component
{
    public $text = 'show';
    public bool $show = false;

    public string $status ='';

    #[Validate('date')]
    public $birthday;


    public function render()
    {
        return view('livewire.test');
    }
}
