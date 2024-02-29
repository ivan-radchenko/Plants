                <div>
    <link href="{{ asset('css/care-today.css') }}" rel="stylesheet">
    <div class="wrapper">
        <div class="sub-header">
            <img src="{{asset('images/header/left-subheader-image.svg')}}" alt="" class="left-subheader-image">
            <img src="{{asset('images/header/right-subheader-image.svg')}}" alt="" class="right-subheader-image">
            <div class="messages">
                @if (session('status'))
                    <span class="error">{{ session('status') }}</span>
                @endif
                @foreach ($errors->all() as $error)
                    <span class="error">{{ $error }}</span>
                @endforeach
            </div>
        </div>
        <div class="plants-wrapper">
        @if($plants)
            <div class="water-wrapper">
                <h3 class="section-title">Полив:</h3>
                <button wire:click="wateringAll" type="button" id="water-plant-all" class="button">
                    Полить все
                </button>
            </div>
            <div class="cards-wrapper" wire:ignore>
                @foreach($plants as $plant)
                    <div wire:key="{{$plant->id}}"  class="plant-card" i>
                        <img class="cart-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                        <div>{{$plant->name}}</div>
                        <svg wire:click="wateringThis({{$plant->id}})" id="drop{{$plant->id}}" data-name="drop{{$plant->id}}" class="drop"  xmlns="http://www.w3.org/2000/svg" width="69.46" height="93.9" viewBox="0 0 69.46 93.9">
                            <path d="M35.13,1.5s20.01,31.27,27.68,43.14c7.67,11.86,6.9,27.27-3.12,37.44-10.03,10.17-24.55,10.32-24.55,10.32,0,0-13.52.31-24.43-10.01C-.21,72.06-.53,56.29,5.12,47.72,9.19,41.53,35.13,1.5,35.13,1.5Z" style="fill: none; stroke: #9df2db; stroke-linecap: round; stroke-linejoin: round; stroke-width: 3px;"/>
                            <path d="M14.81,63.14s1.81,16.77,16.77,15.94" style="fill: none; stroke: #9df2db; stroke-linecap: round; stroke-miterlimit: 10; stroke-width: 3px;"/>
                        </svg>
                    </div>
                @endforeach
            </div>
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

        document.getElementById("drop{{$plant->id}}").addEventListener("click", function() {
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
