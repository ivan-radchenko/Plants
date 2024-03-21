<div>
    <link href="{{ asset('css/share-plant.css') }}" rel="stylesheet">
    <div class="wrapper">
        <div class="sub-header">
            <img src="{{asset('images/header/left-subheader-image.svg')}}" alt="" class="left-subheader-image desktop">
            <img src="{{asset('images/header/right-subheader-image.svg')}}" alt="" class="right-subheader-image desktop">
            <img src="{{asset('images/header/left-subheader-image-mobile.svg')}}" alt="" class="left-subheader-image mobile">
            <img src="{{asset('images/header/right-subheader-image-mobile.svg')}}" alt="" class="right-subheader-image mobile">
        </div>
        <div class="plant-wrapper">
            <div class="title">{{$plant->name}}</div>
            <div class="properties">
                <div class="text">Время между поливами летом:
                    <span class="text-data">{{$plant->waterSummer}} дн</span>
                </div>
                <div class="text">Время между поливами зимой:
                    <span class="text-data">{{$plant->waterWinter}} дн</span>
                </div>
                <div class="text">Свет летом:
                    <span class="text-data">{{$plant->lightSummer}} час</span>
                </div>
                <div class="text">Свет зимой:
                    <span class="text-data">{{$plant->lightWinter}} час</span>
                </div>
                <div class="text">Интенсивность освещения:
                    <span class="text-data">{{$plant->light}}</span>
                </div>
                <div class="text">Влажность:
                    <span class="text-data">{{$plant->wet}}</span>
                </div>
                @if($plant->notes)
                    <div class="text">Заметки:
                        <span class="text-data">{{$plant->notes}}</span>
                    </div>
                @endif
            </div>
            <img class="image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
        </div>
    </div>
</div>
