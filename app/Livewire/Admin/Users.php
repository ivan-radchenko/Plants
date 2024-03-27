<?php

namespace App\Livewire\Admin;

use App\Enums\AlertIcons;
use App\Models\Plants;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    public $searchInput;
    public $searchResult;
    public function search()
    {
        $this->searchResult=User::query()
            ->where('email',$this->searchInput)
            ->orWhere('name',$this->searchInput)
            ->get();
    }
    public function delete($userID)
    {
        $user = User::find($userID);
        if($user->id !== Auth::user()->id){
            $user->delete();
            Storage::disk('public')->delete($user->image);
            $this->dispatch(
                'alert',
                icon:AlertIcons::SUCCESS,
                title:$user->name.' удален!',
                position:'top'
            );
            redirect()->route('admin.users');
            request()->session()->flash('success',$user->name.' удалена!');
        }
    }
    #[Title('Администратор')]
    public function render()
    {
        return view('livewire.admin.users',[
            'users' => User::orderBy('id')->paginate(10),
            'searchResult' => $this->searchResult,
        ]);
    }
}
