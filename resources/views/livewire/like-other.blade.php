<div>
    <link href="{{ asset('css/like-other.css') }}" rel="stylesheet">
    <div class="wrapper">
        <div class="search-wrapper">
            <form wire:submit="search">
                <label for="search">Поиск по растенькам</label>
                <input wire:model="searchInput" type="text" name="search" id="search" autocomplete="off" required>
                <button type="submit">поиск</button>
            </form>
        </div>
        <div class="stats-wrapper">
            @if($averageStats)
                <h3>Усредненная статистика {{$searchInput}}:</h3>
                <div class="stat-text">Время между поливами летом: {{$averageStats['waterSummer']}} дн.</div>
                <div class="stat-text">Время между поливами зимой: {{$averageStats['waterWinter']}} дн.</div>
                <div class="stat-text">Свет летом: {{$averageStats['lightSummer']}} час.</div>
                <div class="stat-text">Свет зимой: {{$averageStats['lightWinter']}} час.</div>
                <div class="stat-text">интенсивность освещения: {{$averageStats['light']}} </div>
                <div class="stat-text">влажность: {{$averageStats['wet']}} </div>
            @endif
        </div>
        <div class="searchResult-wrapper">
            @if($searchResult)
                @foreach($searchResult as $plant)
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
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
