<?php

namespace App\Livewire;

use App\Models\Plants;
use Illuminate\Http\Request;
use Livewire\Component;

class SharePlant extends Component
{
    public function render(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(403);
        }
        $plant=Plants::find($request->route()->parameters()['plant']);

        return view('livewire.share-plant',['plant'=>$plant]);
    }
}
