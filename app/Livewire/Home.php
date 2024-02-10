<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Home extends Component
{
    #[Validate('required | string', as: 'поиск')]
    public $searchInput;

    public function search(): void
    {
        $url=$this->validate()['searchInput'];
        $this->redirect('like-other?searchInput='.$url);
    }
    #[Title('Мои растеньки')]
    public function render()
    {
        return view('livewire.home');
    }
}
