<div>
    <link href="{{ asset('css/care-today.css') }}" rel="stylesheet">
    <div class="wrapper">
        <div>
        @if($plants)
            <h3>Полив:</h3>
            <div class="cards-wrapper" wire:ignore>
                @foreach($plants as $plant)
                    <div wire:key="{{$plant->id}}"  class="plant-card">
                        <img class="cart-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                        <div>{{$plant->name}}</div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="drop" id="drop{{$plant->id}}" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10a5 5 0 0 0 10 0c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z"/>
                            <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87z"/>
                        </svg>
                        <button wire:click="wateringThis({{$plant->id}})" id="water-plant{{$plant->id}}" type="button">
                            полить
                        </button>
                    </div>
                @endforeach
            </div>
            <button wire:click="wateringAll" type="button" id="water-plant-all">
                полить все
            </button>
        @else
            <div>just расслабься</div>
        @endif
        </div>
        <div>
        @if($changeLighting)
            <h3 class="light-title">Освещение:</h3>
                @foreach($changeLighting as $plantGroup)
                    <div>
                        @if(\App\Services\SeasonNow::season() === \App\Enums\PlantStatus::SUMMER->value)
                            <div wire:key="lightGroup-{{$plantGroup[0]->lightSummer}}">
                                <h4 class="lightGroup">
                                    Увеличить освещение до {{$plantGroup[0]->lightSummer}}ч.
                                </h4>
                                <button wire:click="changeSeason({{$plantGroup[0]->lightSummer}})" id="light-group-{{$plantGroup[0]->lightSummer}}">перевести группу на летнее освещение</button>
                            </div>
                            <div class="cards-wrapper" wire:ignore>
                                @foreach($plantGroup as $plant)
                                    <div wire:key="light-{{$plant->id}}" class="plant-card">
                                        <img class="cart-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                                        <div>{{$plant->name}}</div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="clock clock-{{$plantGroup[0]->lightSummer}}" viewBox="0 0 16 16">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                        </svg>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div wire:key="lightGroup-{{$plantGroup[0]->lightWinter}}">
                                <h4 class="lightGroup">
                                    Сократить освещение до {{$plantGroup[0]->lightWinter}}ч.
                                </h4>
                                <button wire:click="changeSeason({{$plantGroup[0]->lightWinter}})" id="light-group-{{$plantGroup[0]->lightWinter}}">перевести группу на зимнее освещение</button>
                            </div>
                            <div class="cards-wrapper" wire:ignore>
                                @foreach($plantGroup as $plant)
                                    <div wire:key="light-{{$plant->id}}" class="plant-card">
                                        <img class="cart-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                                        <div>{{$plant->name}}</div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="clock clock-{{$plantGroup[0]->lightWinter}}" viewBox="0 0 16 16">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                        </svg>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
        @endif
        </div>

    </div>
    <script>
        @if($plants)
        @foreach($plants as $plant)

        document.getElementById("water-plant{{$plant->id}}").addEventListener("click", function() {
            document.getElementById("drop{{$plant->id}}").classList.add("open")
        });

        @endforeach

        document.getElementById("water-plant-all").addEventListener("click", function() {
            Array.from(document.getElementsByClassName("drop")).forEach(
                function(element, index, array) {
                    element.classList.add("open")
                }
            );
        });
        @endif

        @if($changeLighting)
        @if(\App\Services\SeasonNow::season() === \App\Enums\PlantStatus::SUMMER->value)
        @foreach($changeLighting as $plantGroup)

        document.getElementById("light-group-{{$plantGroup[0]->lightSummer}}").addEventListener("click", function() {
            Array.from(document.getElementsByClassName("clock-{{$plantGroup[0]->lightSummer}}")).forEach(
                function(element, index, array) {
                    element.classList.add("open")
                }
            );
        });

        @endforeach

        @else

        @foreach($changeLighting as $plantGroup)

        document.getElementById("light-group-{{$plantGroup[0]->lightWinter}}").addEventListener("click", function() {
            Array.from(document.getElementsByClassName("clock-{{$plantGroup[0]->lightWinter}}")).forEach(
                function(element, index, array) {
                    element.classList.add("open")
                }
            );
        });

        @endforeach
        @endif
        @endif
    </script>
</div>
