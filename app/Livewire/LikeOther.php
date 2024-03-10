<?php

namespace App\Livewire;

use App\Models\Plants;
use App\Services\PlantsSearch;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LikeOther extends Component
{

    #[Url()]#[Validate('required | string', as: 'поиск')]
    public $searchInput;
    #[Locked]
    public $searchResultAll;
    #[Locked]
    public $searchResult;
    #[Locked]
    public $averageStats;
    #[Locked]
    public $count=0;

    public function loadMore(): void
    {
        if ($this->searchResultAll->count() > $this->count) {
            $this->count=$this->count + 4;
            $this->searchResult=$this->searchResultAll->take($this->count);
        }
    }

    public function search(): void
    {
        $this->searchResultAll=PlantsSearch::search($this->validate()['searchInput']);
        $this->averageStats=PlantsSearch::avg($this->searchResultAll);
        if ($this->searchResultAll){
            if ($this->searchResultAll->count() === 0){
                $this->averageStats=null;
                $this->searchResult=null;
                $this->dispatch(
                    'alert',
                    icon:'error',
                    title:'не удалось найти растение в базе данных =(',
                    position:'center'
                );
            }
            if ($this->searchResultAll->count() > 0){
                $this->count=4;
                $this->searchResult=$this->searchResultAll->take($this->count);
            }
        }
    }

    public function mount(): void
    {
        $this->search();
    }
    #[Title('Как у других')]
    public function render()
    {
        return view('livewire.like-other');
    }
}
