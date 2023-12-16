<div>
    <link href="{{ asset('css/like-other.css') }}" rel="stylesheet">
    <div class="wrapper">
        <div class="search-wrapper">
            <form wire:submit="search">
                <label for="search">Поиск по растенькам</label>
                <input wire:model="searchInput" type="text" name="search" id="search" required>
                <button type="submit">поиск</button>
            </form>
        </div>
        <div class="stats-wrapper">
            @if($averageStats)
                <h3>Усредненная статистика {{$searchInput}}:</h3>
                <div class="modal-text">Время между поливами летом: {{$averageStats['waterSummer']}} дн.</div>
                <div class="modal-text">Время между поливами зимой: {{$averageStats['waterWinter']}} дн.</div>
                <div class="modal-text">Свет летом: {{$averageStats['lightSummer']}} час.</div>
                <div class="modal-text">Свет зимой: {{$averageStats['lightWinter']}} час.</div>
                <div class="modal-text">интенсивность освещения: {{$averageStats['light']}} </div>
                <div class="modal-text">влажность: {{$averageStats['wet']}} </div>
            @endif
        </div>
        <div class="searchResult-wrapper">
            @if($searchResult)
                @foreach($searchResult as $plant)
                    <div wire:key="{{$plant->id}}" class="plant-card">
                        <img class="cart-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                        <h4>{{$plant->name}}</h4>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
