<div>
    <link href="{{ asset('css/create-plant.css') }}" rel="stylesheet">
    <div class="wrapper">
        <div class="sub-header">
            <img src="{{asset('images/header/left-subheader-image.svg')}}" alt="" class="left-subheader-image desktop">
            <img src="{{asset('images/header/right-subheader-image.svg')}}" alt="" class="right-subheader-image desktop">
            <img src="{{asset('images/header/left-subheader-image-mobile.svg')}}" alt="" class="left-subheader-image mobile">
            <img src="{{asset('images/header/right-subheader-image-mobile.svg')}}" alt="" class="right-subheader-image mobile">
                <div class="messages">
                @if (session('status'))
                    <span class="error">{{ session('status') }}</span>
                @endif
                @foreach ($errors->all() as $error)
                    <span class="error">{{ $error }}</span>
                @endforeach
            </div>
        </div>
        <div class="form-wrapper">
            <form wire:submit="create" class="form" method="post">
                @csrf
                <div class="form-item">
                    <label for="name">Имя</label>
                    <input wire:model="name" type="text" name="name" id="name" class="form-input" placeholder="Название" onfocusout="this.placeholder ='Название'" onfocus="this.placeholder =''">
                </div>
                <div class="form-item">
                    <span>Фото</span>
                    @if($image)
                        <img class="img-prev" src="{{$image->temporaryUrl()}}" alt="uploaded-image">
                    @endif
                    <label class="image-label" for="image">
                        <div class="button">Выбрать Фото</div>
                    </label>
                    <input wire:model="image" class="input-image" type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg">
                </div>
                <div class="form-item">
                    <label for="waterSummer" class="label-relative" id="it">
                        <span>Интервал поливов летом:</span>
                        <div class="inc-dec-water desktop">
                            <span wire:click="decrement('waterSummer')" class="increment-button">-</span>
                            <span wire:click="increment('waterSummer')" class="increment-button">+</span>
                        </div>
                        <input wire:model="waterSummer" type="text" min="1" max="30" name="waterSummer" id="waterSummer" class="form-input-number" pattern="[0-9]*">
                         <span>дн</span>
                    </label>
                </div>
                <div class="form-item">
                    <label for="waterWinter" class="label-relative">
                        <span>Интервал поливов зимой:</span>
                        <div class="inc-dec-water desktop">
                            <span wire:click="decrement('waterWinter')" class="increment-button">-</span>
                            <span wire:click="increment('waterWinter')" class="increment-button">+</span>
                        </div>
                        <input wire:model="waterWinter" type="text" min="1" max="30" name="waterWinter" id="waterWinter" class="form-input-number" pattern="[0-9]*">
                        <span>дн</span>
                    </label>
                </div>
                <div class="form-item">
                    <label for="lightSummer" class="label-relative">
                        <span>Свет летом:</span>
                        <div class="inc-dec-light desktop">
                            <span wire:click="decrement('lightSummer')" class="increment-button">-</span>
                            <span wire:click="increment('lightSummer')" class="increment-button">+</span>
                        </div>
                        <input wire:model="lightSummer" min="1" max="24" type="text" name="lightSummer" id="lightSummer" class="form-input-number" pattern="[0-9]*">
                        <span>час</span>
                    </label>
                </div>
                <div class="form-item">
                    <label for="lightWinter" class="label-relative">
                        <span>Свет зимой:</span>
                        <div class="inc-dec-light desktop">
                            <span wire:click="decrement('lightWinter')" class="increment-button">-</span>
                            <span wire:click="increment('lightWinter')" class="increment-button">+</span>
                        </div>
                        <input wire:model="lightWinter" min="1" max="24" type="text" name="lightWinter" id="lightWinter" class="form-input-number" pattern="[0-9]*">
                        <span>час</span>
                    </label>
                </div>
                <div class="form-item">
                    <label for="light">Интенсивность освещения:
                        <select wire:model="light" name="light" id="light" class="form-input-select">
                            <option>{{\App\Enums\Light::BRIGHT->value}}</option>
                            <option selected>{{\App\Enums\Light::DIFFUSED->value}}</option>
                            <option>{{\App\Enums\Light::PENUMBRA->value}}</option>
                        </select>
                    </label>
                </div>
                <div class="form-item">
                    <label for="wet">Влажность воздуха:
                        <select wire:model="wet" name="wet" id="wet" class="form-input-select">
                            <option>{{\App\Enums\Wet::LOW->value}}</option>
                            <option selected>{{\App\Enums\Wet::MEDIUM->value}}</option>
                            <option>{{\App\Enums\Wet::HIGH->value}}</option>
                        </select>
                    </label>
                </div>
                <div class="form-item">
                    <label for="notes"></label>
                    <textarea wire:model="notes" type="text" maxlength="130" name="notes" id="notes" class="notes" placeholder="Заметки...&#128393;" onfocusout="this.placeholder ='Заметки...&#128393;'" onfocus="this.placeholder =''"></textarea>
                </div>
                <button class="button" type="submit" onClick="window.scrollTo(0,0);">Добавить в мой сад</button>
            </form>
        </div>
    </div>
</div>
