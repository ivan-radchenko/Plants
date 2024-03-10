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
                <p class="section-title">ПОЛИВ</p>
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
            <div class="just-relax">JUST РАССЛАБЬСЯ</div>
        @endif
        </div>
        <div class="light-wrapper">
        @if($changeLighting)
            <p class="section-title section-title-light">ОСВЕЩЕНИЕ</p>
                @foreach($changeLighting as $plantGroup)
                    @if(\App\Services\SeasonNow::season() === \App\Enums\PlantStatus::SUMMER->value)
                        <div wire:key="lightGroup-{{$plantGroup[0]->lightSummer}}" class="light-group-title-button">
                            <h4 class="lightGroup">
                                Увеличить освещение до {{$plantGroup[0]->lightSummer}}
                                @if($plantGroup[0]->lightSummer === 1 or $plantGroup[0]->lightSummer === 21)
                                    часа
                                @else
                                    часов
                                @endif
                            </h4>
                            <button wire:click="changeSeason({{$plantGroup[0]->lightSummer}})" id="light-group-{{$plantGroup[0]->lightSummer}}" class="button">Перевести группу на летнее освещение</button>
                        </div>
                        <div class="cards-wrapper" wire:ignore>
                            @foreach($plantGroup as $plant)
                                <div wire:key="light-{{$plant->id}}" class="plant-card light-plant-card">
                                    <img class="cart-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                                    <div>{{$plant->name}}</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.67 122.67" class="clock clock-{{$plantGroup[0]->lightSummer}}">
                                        <path d="M61.45,87.76c-14.5,0-26.29-11.85-26.29-26.42s11.79-26.42,26.29-26.42,26.29,11.85,26.29,26.42-11.79,26.42-26.29,26.42ZM61.45,37.91c-12.84,0-23.29,10.51-23.29,23.42s10.45,23.42,23.29,23.42,23.29-10.51,23.29-23.42-10.45-23.42-23.29-23.42ZM62.78,24.21V1.5c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5,1.5v22.71c0,.83.67,1.5,1.5,1.5s1.5-.67,1.5-1.5ZM62.78,121.17v-22.71c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5,1.5v22.71c0,.83.67,1.5,1.5,1.5s1.5-.67,1.5-1.5ZM122.67,61.63c0-.83-.67-1.5-1.5-1.5h-22.58c-.83,0-1.5.67-1.5,1.5s.67,1.5,1.5,1.5h22.58c.83,0,1.5-.67,1.5-1.5ZM25.58,61.63c0-.83-.67-1.5-1.5-1.5H1.5c-.83,0-1.5.67-1.5,1.5s.67,1.5,1.5,1.5h22.58c.83,0,1.5-.67,1.5-1.5ZM20.38,105.05l15.97-16.06c.58-.59.58-1.54,0-2.12-.59-.58-1.54-.58-2.12,0l-15.97,16.06c-.58.59-.58,1.54,0,2.12.29.29.67.44,1.06.44s.77-.15,1.06-.44ZM88.52,36.54l15.97-16.06c.58-.59.58-1.54,0-2.12-.59-.58-1.54-.58-2.12,0l-15.97,16.06c-.58.59-.58,1.54,0,2.12.29.29.67.44,1.06.44s.77-.15,1.06-.44ZM35.81,36.38c.59-.58.59-1.53,0-2.12l-15.97-16.06c-.58-.59-1.53-.59-2.12,0-.59.58-.59,1.53,0,2.12l15.97,16.06c.29.29.68.44,1.06.44s.77-.15,1.06-.44ZM104.6,105.55c.59-.58.59-1.53,0-2.12l-15.97-16.06c-.58-.59-1.54-.59-2.12,0-.59.58-.59,1.53,0,2.12l15.97,16.06c.29.29.68.44,1.06.44s.77-.15,1.06-.44Z" style="fill: #9df2db; stroke-width: 0px;"/>
                                    </svg>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div wire:key="lightGroup-{{$plantGroup[0]->lightWinter}}" class="light-group-title-button">
                            <h4 class="lightGroup">
                                Сократить освещение до {{$plantGroup[0]->lightWinter}}
                                @if($plantGroup[0]->lightWinter === 1 or $plantGroup[0]->lightWinter === 21)
                                    часа
                                @else
                                    часов
                                @endif
                            </h4>
                            <button wire:click="changeSeason({{$plantGroup[0]->lightWinter}})" id="light-group-{{$plantGroup[0]->lightWinter}}" class="button">Перевести группу на зимнее освещение</button>
                        </div>
                        <div class="cards-wrapper" wire:ignore>
                            @foreach($plantGroup as $plant)
                                <div wire:key="light-{{$plant->id}}" class="plant-card light-plant-card">
                                    <img class="cart-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                                    <div>{{$plant->name}}</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 110.7 122.67" class="clock clock-{{$plantGroup[0]->lightWinter}}">
                                        <path d="M109.93,31.17l-19.92,11.21,15.61,9.94c.7.45.91,1.37.46,2.07-.28.45-.77.7-1.26.7-.28,0-.56-.08-.81-.24l-16.98-10.8-28.08,15.8,27.96,15.77,15.06-10.07c.69-.46,1.62-.27,2.08.42.46.69.28,1.62-.41,2.08l-13.8,9.22,19.22,10.84c.72.4.97,1.32.56,2.04-.27.49-.78.76-1.3.76-.25,0-.51-.06-.74-.19l-19.1-10.77v18.5c0,.82-.67,1.5-1.5,1.5s-1.5-.68-1.5-1.5v-20.19l-28.62-16.14v31.39l16.81,11.4c.68.47.86,1.4.4,2.09-.29.42-.76.66-1.24.66-.29,0-.59-.09-.85-.26l-15.12-10.26v24.03c0,.83-.67,1.5-1.5,1.5s-1.5-.67-1.5-1.5v-24.03l-14.91,10.25c-.68.47-1.62.3-2.09-.39-.47-.68-.29-1.61.39-2.08l16.61-11.41v-30.8l-28.88,16.25.3,18.87c.02.82-.64,1.51-1.47,1.52h-.03c-.81,0-1.48-.65-1.5-1.47l-.27-17.25-19.78,11.13c-.23.13-.49.19-.74.19-.52,0-1.03-.28-1.3-.77-.41-.72-.15-1.63.57-2.04l19.79-11.13-16.19-10.27c-.69-.44-.9-1.37-.46-2.07.45-.7,1.37-.9,2.07-.46l17.54,11.13,29.33-16.49-27.68-15.61-19.05,9.85c-.22.12-.45.17-.69.17-.54,0-1.06-.29-1.33-.81-.38-.73-.09-1.64.64-2.02l17.31-8.95L1.99,31.17c-.72-.41-.98-1.32-.57-2.04.41-.72,1.32-.98,2.04-.57l20.02,11.29-1.19-15.57c-.06-.82.55-1.54,1.38-1.61.8-.08,1.55.56,1.61,1.38l1.35,17.58,27.23,15.35v-28.46l-16.88-13.1c-.65-.51-.77-1.45-.26-2.11.51-.65,1.45-.77,2.1-.26l15.04,11.67V1.5c0-.83.68-1.5,1.5-1.5s1.5.67,1.5,1.5v23.14l14.52-11.58c.65-.51,1.59-.41,2.11.24.52.65.41,1.59-.24,2.11l-16.39,13.08v29.09l28.72-16.15-.1-16.95c0-.82.67-1.5,1.5-1.51.83,0,1.5.67,1.5,1.5l.09,15.28,19.89-11.19c.72-.41,1.64-.15,2.05.57.4.72.14,1.63-.58,2.04Z" style="fill: #9df2db; stroke-width: 0px;"/>
                                    </svg>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
        @endif
        </div>

    </div>
    <script>
        @if($plants)
        @foreach($plants as $plant)
        //карточка
        document.getElementById("drop{{$plant->id}}").addEventListener("click", function() {
            document.getElementById("drop{{$plant->id}}").classList.add("open")
        });

        @endforeach
        //кнопка полить все
        document.getElementById("water-plant-all").addEventListener("click", function() {
            Array.from(document.getElementsByClassName("drop")).forEach(
                function(element, index, array) {
                    element.classList.add("open")
                }
            );
        });
        document.getElementById("water-plant-all").addEventListener("mouseover", function() {
            Array.from(document.getElementsByClassName("drop")).forEach(
                function(element, index, array) {
                    element.classList.add("open")
                }
            );
        });
        document.getElementById("water-plant-all").addEventListener("mouseout", function() {
            Array.from(document.getElementsByClassName("drop")).forEach(
                function(element, index, array) {
                    element.classList.remove("open")
                }
            );
        });
        @endif

        @if($changeLighting)
        @if(\App\Services\SeasonNow::season() === \App\Enums\PlantStatus::SUMMER->value)
        @foreach($changeLighting as $plantGroup)
        //кнопка перевести группу
        document.getElementById("light-group-{{$plantGroup[0]->lightSummer}}").addEventListener("click", function() {
            Array.from(document.getElementsByClassName("clock-{{$plantGroup[0]->lightSummer}}")).forEach(
                function(element, index, array) {
                    element.classList.add("open")
                }
            );
            document.getElementById("light-group-{{$plantGroup[0]->lightSummer}}").removeEventListener("mouseout",removeSummer{{$plantGroup[0]->lightSummer}})
        });

        document.getElementById("light-group-{{$plantGroup[0]->lightSummer}}").addEventListener("mouseover", function() {
            Array.from(document.getElementsByClassName("clock-{{$plantGroup[0]->lightSummer}}")).forEach(
                function(element, index, array) {
                    element.classList.add("open")
                }
            );
        });
        function removeSummer{{$plantGroup[0]->lightSummer}}(event){
            Array.from(document.getElementsByClassName("clock-{{$plantGroup[0]->lightSummer}}")).forEach(
                function (element, index, array) {
                    element.classList.remove("open")
                }
            );
        }
        document.getElementById("light-group-{{$plantGroup[0]->lightSummer}}").addEventListener("mouseout", removeSummer{{$plantGroup[0]->lightSummer}});

        @endforeach

        @else

        @foreach($changeLighting as $plantGroup)
        //кнопка перевести группу
        document.getElementById("light-group-{{$plantGroup[0]->lightWinter}}").addEventListener("click", function() {
            Array.from(document.getElementsByClassName("clock-{{$plantGroup[0]->lightWinter}}")).forEach(
                function(element, index, array) {
                    element.classList.add("open")
                }
            );
            document.getElementById("light-group-{{$plantGroup[0]->lightWinter}}").removeEventListener("mouseout",removeWinter{{$plantGroup[0]->lightWinter}})
        });

        document.getElementById("light-group-{{$plantGroup[0]->lightWinter}}").addEventListener("mouseover", function() {
            Array.from(document.getElementsByClassName("clock-{{$plantGroup[0]->lightWinter}}")).forEach(
                function(element, index, array) {
                    element.classList.add("open")
                }
            );
        });
        function removeWinter{{$plantGroup[0]->lightWinter}}(event){
            Array.from(document.getElementsByClassName("clock-{{$plantGroup[0]->lightWinter}}")).forEach(
                function (element, index, array) {
                    element.classList.remove("open")
                }
            );
        }
        document.getElementById("light-group-{{$plantGroup[0]->lightWinter}}").addEventListener("mouseout", removeWinter{{$plantGroup[0]->lightWinter}});

        @endforeach
        @endif
        @endif
    </script>
</div>
