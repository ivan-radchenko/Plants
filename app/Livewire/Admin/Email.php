<?php

namespace App\Livewire\Admin;

use App\Enums\AlertIcons;
use App\Jobs\SendEmailAllUsers;
use App\Models\User;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class Email extends Component
{
    #[Rule('required | string')]
    public $text;

    #[NoReturn] public function sendEmail(): void
    {
        $text=$this->validate()['text'];
        $users=User::get('email');
        foreach ($users as $user){
            SendEmailAllUsers::dispatch($text,$user->email);
        }
        redirect()->route('admin.email');
        request()->session()->flash('success','Сообщение отправлено!');
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
        return view('livewire.admin.email');
    }
}
