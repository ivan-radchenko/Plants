<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;

class Email extends Component
{
    #[Title('Администратор')]
    public function render()
    {
        return view('livewire.admin.email');
    }
}
