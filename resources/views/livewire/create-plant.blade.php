<div>
    <link href="{{ asset('css/create-plant.css') }}" rel="stylesheet">
    <form wire:submit="create" class="form" method="post">
        @csrf
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach

        <label for="name">Имя</label>
        <input wire:model="name" type="text" name="name" id="name">

        <label for="image">Фото</label>
        <input wire:model="image" type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg">
        @if($image)
            <img class="img-prev" src="{{$image->temporaryUrl()}}" alt="uploaded-image">
        @endif

        <label for="waterSummer" id="it">Время между поливами летом:
            <input wire:model="waterSummer" type="number" min="1" max="30" name="waterSummer" id="waterSummer">
            дн.
        </label>

        <label for="waterWinter">Время между поливами зимой:
            <input wire:model="waterWinter" type="number" min="1" max="30" name="waterWinter" id="waterWinter">
            дн.
        </label>

        <label for="lightSummer">Свет летом:
            <input wire:model="lightSummer" min="1" max="24" type="number" name="lightSummer" id="lightSummer">
            час.
        </label>

        <label for="lightWinter">Свет зимой:
            <input wire:model="lightWinter" min="1" max="24" type="number" name="lightWinter" id="lightWinter">
            час.
        </label>

        <label for="light">Интенсивность освещения:
            <select wire:model="light" name="light" id="light">
                <option>{{\App\Enums\Light::BRIGHT->value}}</option>
                <option>{{\App\Enums\Light::DIFFUSED->value}}</option>
                <option>{{\App\Enums\Light::PENUMBRA->value}}</option>
            </select>
        </label>

        <label for="wet">Влажность воздуха:
                <select wire:model="wet" name="wet" id="wet">
                    <option>{{\App\Enums\Wet::LOW->value}}</option>
                    <option>{{\App\Enums\Wet::MEDIUM->value}}</option>
                    <option>{{\App\Enums\Wet::HIGH->value}}</option>
                </select>
        </label>

        <label for="notes">Заметки:</label>
        <textarea wire:model="notes" type="text" name="notes" id="notes" class="notes"></textarea>

        <button type="submit">добавить в мой сад</button>
    </form>
</div>
