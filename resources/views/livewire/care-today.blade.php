<div>
    <link href="{{ asset('css/care-today.css') }}" rel="stylesheet">
    <div class="wrapper">
        <div>
        @if($plants)
            <h3>Полив:</h3>
            <div class="cards-wrapper">
                    @foreach($plants as $plant)
                        <div wire:key="{{$plant->id}}"  class="plant-card">
                            <img class="cart-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                            <div>{{$plant->name}}</div>
                            <button type="button">полить</button>
                        </div>
                    @endforeach
            </div>
            <button type="button">полить все</button>
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
                            <button>перевести группу на летнее освещение</button>
                        </div>
                    @else
                        <div wire:key="lightGroup-{{$plantGroup[0]->lightWinter}}">
                            <h4 class="lightGroup">
                                Сократить освещение до {{$plantGroup[0]->lightWinter}}ч.
                            </h4>
                            <button>перевести группу на зимнее освещение</button>
                        </div>
                    @endif
                    </div>
                    <div class="cards-wrapper">
                    @foreach($plantGroup as $plant)
                        <div wire:key="light-{{$plant->id}}" class="plant-card">
                            <img class="cart-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                            <div>{{$plant->name}}</div>
                        </div>
                    @endforeach
                    </div>
                @endforeach
        @endif
        </div>
    </div>
</div>
