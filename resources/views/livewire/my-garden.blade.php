<div class="wrapper">
    <link href="{{ asset('css/my-garden.css') }}" rel="stylesheet">
    @foreach($plants as $plant)
        <div wire:key="{{$plant->id}}" class="plant-card">
            <img class="cart-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
            <h4>{{$plant->name}}</h4>
        </div>
    @endforeach
    <div class="add">
        <button><a href="{{route('create-plant')}}">добавить растеньку</a> </button>
    </div>
</div>
