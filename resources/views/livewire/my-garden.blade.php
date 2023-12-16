<div>
    <link href="{{ asset('css/my-garden.css') }}" rel="stylesheet">
    <div>
        <label for="search">поиск по моему саду</label>
        <input wire:model.live.debounce.500ms="search" type="text" class="search" name="search" id="search">
    </div>
    <div class="wrapper">
        @foreach($plants as $plant)

            <div wire:key="{{$plant->id}}" class="plant-card">
                <img x-on:click="$dispatch('open-modal',{modalID:'{{$plant->id}}'})" class="cart-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                <h4 x-on:click="$dispatch('open-modal',{modalID:'{{$plant->id}}'})">{{$plant->name}}</h4>
            </div>

            <div wire:key="{{$plant->id}}-modal" class="modal"
                 x-data="{open:false, modalID:'{{$plant->id}}'}"
                 x-show="open"
                 x-on:open-modal.window="open=($event.detail.modalID === modalID)"
                 x-on:close-modal.window="open=false"
                 x-transition.duration.700ms
                 style="display: none;">
                <div class="modal-header">
                    <h4 class="modal-title">{{$plant->name}}</h4>
                    <button x-on:click="open=false" class="modal-close">X</button>
                </div>
                <div class="modal-body">
                    <img class="modal-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                    <div class="modal-text">Время между поливами летом: {{$plant->waterSummer}} дн.</div>
                    <div class="modal-text">Время между поливами зимой: {{$plant->waterWinter}} дн.</div>
                    <div class="modal-text">Свет летом: {{$plant->lightSummer}} час.</div>
                    <div class="modal-text">Свет зимой: {{$plant->lightWinter}} час.</div>
                    <div class="modal-text">интенсивность освещения: {{$plant->light}} </div>
                    <div class="modal-text">влажность: {{$plant->wet}} </div>
                    <div class="modal-text">заметки: {{$plant->notes}} </div>
                </div>
                <div class="modal-buttons">
                    <button class="modal-button"><a class="modal-button" href="{{route('edit-plant',['plant'=>$plant->id])}}">изменить</a></button>
                    <button wire:click="likeOther('{{{$plant->name}}}')" class="modal-button">как у других</button>
                    <button wire:click="delete({{$plant->id}})" wire:confirm="Вы точно хотите удалить {{$plant->name}}?" class="modal-button">удалить</button>
                </div>
            </div>

        @endforeach
        <div class="add">
            <button><a href="{{route('create-plant')}}">добавить растеньку</a> </button>
        </div>
    </div>
</div>

