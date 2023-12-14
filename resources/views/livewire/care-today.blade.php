<div>
    <div>
        <h3>Полив:</h3>
        @if($plants)
            @foreach($plants as $plant)
                <div wire:key="${{$plant->id}}">
                    <div>{{$plant->name}}</div>
                </div>
            @endforeach

        @else
            <div>just расслабься</div>
        @endif

        <button type="button">полить все</button>
    </div>
    @if($changeLighting)
    <div>
        <h3>Освещение:</h3>
        @foreach($changeLighting as $plantGroup)
            @if(\App\Services\SeasonNow::season() === \App\Enums\PlantStatus::SUMMER->value)
                <div>Увеличить освещение до {{$plantGroup[0]->lightSummer}}ч.</div>
            @else
                <div>Сократить освещение до {{$plantGroup[0]->lightWinter}}ч.</div>
            @endif
            @foreach($plantGroup as $plant)
                <div>{{$plant->name}}</div>
            @endforeach
        @endforeach
    </div>
    @endif
</div>
