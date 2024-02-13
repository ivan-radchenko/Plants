<div>
    <link href="{{ asset('css/my-garden.css') }}" rel="stylesheet">
    <div class="wrapper">
        <div class="sub-header">
            <img src="{{asset('images/header/left-subheader-image.svg')}}" alt="" class="left-subheader-image">
            <img src="{{asset('images/header/right-subheader-image.svg')}}" alt="" class="right-subheader-image">
        </div>
        <div class="search-wrapper">
            <label for="search">
                <input wire:model.live.debounce.500ms="search" type="text" class="search" name="search" id="search" placeholder="Поиск по моему саду" onfocusout="this.placeholder ='Поиск по моему саду'" onfocus="this.placeholder =''">
            </label>
        </div>
        <div class="plants-wrapper">
            @foreach($plants as $plant)

                <div wire:key="{{$plant->id}}" class="plant-card">
                    <img x-on:click="$dispatch('open-modal',{modalID:'{{$plant->id}}'})" class="cart-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                    <span x-on:click="$dispatch('open-modal',{modalID:'{{$plant->id}}'})">{{$plant->name}}</span>
                </div>

                <div wire:key="{{$plant->id}}-modal" class="modal"
                     x-data="{open:false, modalID:'{{$plant->id}}'}"
                     x-show="open"
                     x-on:open-modal.window="open=($event.detail.modalID === modalID)"
                     x-on:close-modal.window="open=false"
                     x-transition.duration.700ms
                     style="display: none;">
                    <div class="modal-header">
                        <h4 class="modal-title">{{$plant->name}}</h4>
                        <button x-on:click="open=false" class="modal-close">X</button>
                    </div>
                    <div class="modal-body">
                        <img class="modal-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                        <div class="modal-text">Время между поливами летом: {{$plant->waterSummer}} дн.</div>
                        <div class="modal-text">Время между поливами зимой: {{$plant->waterWinter}} дн.</div>
                        <div class="modal-text">Свет летом: {{$plant->lightSummer}} час.</div>
                        <div class="modal-text">Свет зимой: {{$plant->lightWinter}} час.</div>
                        <div class="modal-text">интенсивность освещения: {{$plant->light}} </div>
                        <div class="modal-text">влажность: {{$plant->wet}} </div>
                        <div class="modal-text">заметки: {{$plant->notes}} </div>
                    </div>
                    <div class="modal-buttons">
                        <button class="modal-button"><a class="modal-button" href="{{route('edit-plant',['plant'=>$plant->id])}}">изменить</a></button>
                        <button wire:click="likeOther('{{$plant->name}}')" class="modal-button">как у других</button>
                        <button wire:click="delete({{$plant->id}})" wire:confirm="Вы точно хотите удалить {{$plant->name}}?" class="modal-button">удалить
                        </button>
                        <div class="ya-share2" data-curtain data-shape="round" data-limit="0" data-more-button-type="long" data-services="vkontakte,telegram,whatsapp" data-title="{{$plant->name}}" data-url="{{URL::signedRoute('share-plant',['plant'=>$plant->id])}}" {{--data-image="{{Storage::disk('public')->url($plant->image)}}"--}} data-use-links>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="add">
                <a href="{{route('create-plant')}}" class="add-button">
                    <svg id="add-button" data-name="add-button" class="add-button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 123 123">
                        <path d="M61.5,123C27.59,123,0,95.41,0,61.5S27.59,0,61.5,0s61.5,27.59,61.5,61.5-27.59,61.5-61.5,61.5ZM61.5,3C29.24,3,3,29.24,3,61.5s26.24,58.5,58.5,58.5,58.5-26.24,58.5-58.5S93.76,3,61.5,3Z" />
                        <rect x="36.5" y="60" width="50" height="3"/>
                        <rect x="60" y="36.5" width="3" height="50"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <script src="{{asset('js/yandexShare.js')}}" defer></script>
</div>

