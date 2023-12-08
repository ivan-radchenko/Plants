<div>
    <link href="{{ asset('css/create-plant.css') }}" rel="stylesheet">
    <form wire:submit="create" class="form" method="post">
        @csrf
        <label for="name">Имя</label>
        <input wire:model="name" type="text" name="name" id="name">
        @error('name')
        <span class="error">{{ $message }}</span>
        @enderror

        <label for="image">Фото</label>
        <input wire:model="image" type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg">
        @error('image')
        <span class="error">{{ $message }}</span>
        @enderror

        <label for="waterSummer">Полив летом раз в
            <input wire:model="waterSummer" type="number" name="waterSummer" id="waterSummer">
            дня
        </label>
        @error('waterSummer')
        <span class="error">{{ $message }}</span>
        @enderror

        <label for="waterWinter">Полив зимой раз в
            <input wire:model="waterWinter" type="number" name="waterWinter" id="waterWinter">
            дня
        </label>
        @error('waterWinter')
        <span class="error">{{ $message }}</span>
        @enderror

        <label for="lightSummer">Свет летом:
            <input wire:model="lightSummer" type="number" name="lightSummer" id="lightSummer">
            часа
        </label>
        @error('lightSummer')
        <span class="error">{{ $message }}</span>
        @enderror

        <label for="lightWinter">Свет зимой:
            <input wire:model="lightWinter" type="number" name="lightWinter" id="lightWinter">
            часа
        </label>
        @error('lightWinter')
        <span class="error">{{ $message }}</span>
        @enderror

        <label for="wet">Влажность воздуха
            <input wire:model="wet" type="number" name="wet" id="wet">
            %
        </label>
        @error('wet')
        <span class="wet">{{ $message }}</span>
        @enderror

        <button type="submit">добавить в мой сад</button>
    </form>
</div>
