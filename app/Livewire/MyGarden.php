<?php

namespace App\Livewire;

use App\Enums\AlertIcons;
use App\Models\Plants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class MyGarden extends Component
{
    #[Rule('string')]
    public $search=null;
    #[Locked]
    public $plants;

    public function searchFunction()
    {
        $searchInput = $this->validate()['search'];
        if ($searchInput !== null and $searchInput !== ""){
            $this->plants=Plants::query()
                ->where('userID','=',Auth::user()->id)
                ->where('name','ilike','%' .$searchInput. '%')
                ->get();
        }else{
            $this->redirect(route('my-garden'));
        }
    }
    public function delete($plantID): void
    {
        $plant = Plants::find($plantID);
        if($plant->userID === Auth::user()->id){
            $plant->delete();
            Storage::disk('public')->delete($plant->image);
            $this->dispatch(
                'alert',
                icon:AlertIcons::SUCCESS,
                title:$plant->name.' удалена!',
                position:'top'
            );
        }
    }

    public function likeOther($plantName): void
    {
        $this->redirect('like-other?searchInput='.$plantName);
    }
    public function mount(){
        $this->plants=Plants::query()
            ->where('userID','=',Auth::user()->id)
            ->get();
        $this->plantsAll=Plants::query()
            ->where('userID','=',Auth::user()->id)
            ->get();
    }
    #[Title('Мой сад')]
    public function render()
    {

        if (session('success'))
        {
            $this->dispatch(
                'alert',
                icon:AlertIcons::SUCCESS,
                title:session('success'),
                position:'top'
            );
        }

        return view('livewire.my-garden',[
            'plants' => $this->plants,
        ]);
    }
}
