<div>
    <link href="{{ asset('css/share-plant.css') }}" rel="stylesheet">
    <div class="wrapper">
        <img class="image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
        <div class="properties">
            <h2 class="title">{{$plant->name}}</h2>
            <div class="text">Время между поливами летом: {{$plant->waterSummer}} дн.</div>
            <div class="text">Время между поливами зимой: {{$plant->waterWinter}} дн.</div>
            <div class="text">Свет летом: {{$plant->lightSummer}} час.</div>
            <div class="text">Свет зимой: {{$plant->lightWinter}} час.</div>
            <div class="text">интенсивность освещения: {{$plant->light}} </div>
            <div class="text">влажность: {{$plant->wet}} </div>
            <div class="text">заметки: {{$plant->notes}} </div>
        </div>
    </div>
</div>
