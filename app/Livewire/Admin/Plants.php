<?php

namespace App\Livewire\Admin;
use App\Enums\AlertIcons;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Plants extends Component
{
    use WithPagination;
    public $searchInput;
    public $searchResult;
    public function search(): void
    {
        $user=User::query()->where('email',$this->searchInput)->first();
        if ($user){
            $this->searchResult=\App\Models\Plants::query()
                ->where('name',$this->searchInput)
                ->orWhere('userID',$user->id)
                ->get();
        }else{
            $this->searchResult=\App\Models\Plants::query()
                ->where('name',$this->searchInput)
                ->get();
        }
    }
    public function delete($plantID): void
    {
        $plant = \App\Models\Plants::find($plantID);
        $plant->delete();
            Storage::disk('public')->delete($plant->image);
            $this->dispatch(
                'alert',
                icon:AlertIcons::SUCCESS,
                title:$plant->name.' удалено!',
                position:'top'
            );
            redirect()->route('admin.plants');
            request()->session()->flash('success',$plant->name.' удалена!');
    }
    #[Title('Администратор')]
    public function render()
    {
        return view('livewire.admin.plants',[
            'plants'=>\App\Models\Plants::orderBy('id')->with('user')->paginate(10),
            'searchResult' => $this->searchResult,
        ]);
    }
}
