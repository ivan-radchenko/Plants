<?php

namespace App\Livewire;

use App\Models\Plants;
use App\Services\PlantsSearch;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LikeOther extends Component
{
    #[Validate('required | string', as: 'поиск')]
    #[Url()]
    public $searchInput;
    public $searchResult;
    public $averageStats;

    public function search(): void
    {
        $this->searchResult=PlantsSearch::search($this->searchInput);
        $this->averageStats=PlantsSearch::avg($this->searchResult);
        if ($this->searchResult){
            if ($this->searchResult->count() === 0){
                $this->averageStats=null;
                $this->dispatch(
                    'alert',
                    icon:'error',
                    title:'не удалось найти растение в базе данных =(',
                    position:'center'
                );
            }
        }
    }

    public function mount(): void
    {
        $this->search();
    }

    public function render()
    {
        return view('livewire.like-other');
    }
}
