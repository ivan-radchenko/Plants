<?php

namespace App\Livewire\Admin;

use App\Enums\AlertIcons;
use App\Http\Middleware\isAdmin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditUser extends Component
{
    use WithFileUploads;

    #[Rule('sometimes |nullable|image|mimes:jpg,jpeg,png| max: 5500')]
    public $image;
    #[Rule('required | string | min:3 | max:20 ')]
    public $name;
    #[Rule('required | email')]
    public $email;
    #[Rule('sometimes|nullable|string | min:6 | max:20')]
    public $password;
    #[Rule('required')]
    public $isAdmin;
    #[Locked]
    public $userID;
    public $imageOld;
    public function updateImage($image,$user):void
    {

        $path='storage/users/'.Str::beforeLast($image->hashName(),'.').'.jpeg';
        $image=Image::read($image)->cover(200,200,'center')->toJpeg(75);
        $image->save($path);

        $path=Str::after($path,'storage/');

        if ($user->image !== 'users/default.svg') {
            Storage::disk('public')->delete($user->image);
        }

        User::find($user->id)->update(['image'=>$path]);
        request()->session()->flash('success','Данные сохранены.');
    }
    public function updateName($name,$user): void
    {
        User::find($user->id)->update(['name'=>$name]);
        request()->session()->flash('success','Данные сохранены.');
    }
    public function updateEmail($email,$user): void
    {
        User::find($user->id)->update(['email'=>$email]);
        request()->session()->flash('success','Данные сохранены.');
    }
    public function updatePassword($password,$user): void
    {
        $user->forceFill([
            'password' => Hash::make($password)
        ]);
        $user->save();
        request()->session()->flash('success','Данные сохранены.');
    }

    public function updateIsAdmin($isAdmin,$user): void
    {
        User::find($user->id)->update(['is_admin'=>$isAdmin]);
        request()->session()->flash('success','Данные сохранены.');
    }

    public function update()
    {
        $validated = $this->validate();
        $user=User::find($this->userID);
        if($validated['image']) {
            $this->updateImage($validated['image'],$user);
        }
        if($validated['name'] !== $user->name) {
            $this->updateName($validated['name'],$user);
        }
        if($validated['email'] !== $user->email) {
            $emailUniq=$this->validate([
                'email' => 'unique:users'
            ]);
            $this->updateEmail($emailUniq['email'],$user);
        }
        if($validated['password']) {
            $this->updatePassword($validated['password'],$user);
        }
        if($validated['isAdmin'] !== $user->is_admin) {
            $this->updateIsAdmin($validated['isAdmin'],$user);
        }
    }

    public function mount(User $user)
    {
        $this->userID=$user->id;
        $this->name=$user->name;
        $this->email=$user->email;
        $this->isAdmin=$user->is_admin;
    }

    #[Title('Администратор')]
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
        return view('livewire.admin.edit-user');
    }
}
