<?php

namespace App\Livewire;

use App\Models\Plants;
use App\Services\PlantsSearch;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LikeOther extends Component
{
    #[Validate('required | string', as: 'поиск')]
    #[Url()]
    public $searchInput;
    #[Locked]
    public $searchResultAll;
    #[Locked]
    public $searchResult;
    #[Locked]
    public $averageStats;
    #[Locked]
    public $count=5;

    public function loadMore(): void
    {
        $this->count= $this->count + 5;
        if ($this->searchResultAll->count() < $this->count){
            $this->searchResult=$this->searchResultAll->take($this->count);
        }
    }

    public function search(): void
    {
        $this->searchResultAll=PlantsSearch::search($this->searchInput);
        $this->averageStats=PlantsSearch::avg($this->searchResultAll);
        if ($this->searchResultAll){
            if ($this->searchResultAll->count() === 0){
                $this->averageStats=null;

                $this->dispatch(
                    'alert',
                    icon:'error',
                    title:'не удалось найти растение в базе данных =(',
                    position:'center'
                );
            }
        }
        $this->count=5;
        $this->searchResult=$this->searchResultAll->take($this->count);
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
