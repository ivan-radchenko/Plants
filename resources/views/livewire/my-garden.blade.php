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
            <a href="{{route('create-plant')}}" class="button">Добавить</a>
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
                     x-transition.duration.350ms
                     style="display: none;">

                    <div class="modal-bg"
                         x-on:click="open=false">
                    </div>

                    <div class="modal-content-wrapper">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$plant->name}}</h4>
                            <svg x-on:click="open=false" class="modal-close" id="_Слой_2" data-name="Слой 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.53 31.53">
                                <g>
                                    <rect width="31.53" height="31.53" rx="6" ry="6"/>
                                    <g>
                                        <rect x="13.27" y="3.14" width="5.29" height="25.41" transform="translate(-6.55 15.89) rotate(-45)" style="fill: #77afaf; stroke-width: 0px;"/>
                                        <rect x="2.92" y="12.91" width="25.41" height="5.29" transform="translate(-6.43 15.6) rotate(-45)" style="fill: #77afaf; stroke-width: 0px;"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="modal-body">
                            <img class="modal-image " id="modal-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                            <div class="modal-text-wrapper">
                                <div class="modal-text">Интервал поливов летом: {{$plant->waterSummer}} дн</div>
                                <div class="modal-text">Интервал поливов зимой: {{$plant->waterWinter}} дн</div>
                                <div class="modal-text">Свет летом: {{$plant->lightSummer}} час</div>
                                <div class="modal-text">Свет зимой: {{$plant->lightWinter}} час</div>
                                <div class="modal-text">Интенсивность освещения: {{$plant->light}} </div>
                                <div class="modal-text">Влажность: {{$plant->wet}}</div
                                @if($plant->notes)
                                    <div class="modal-text modal-notes"> {{$plant->notes}}
                                    </div>
                                @else
                                    <div class="modal-text modal-notes">
                                        Заметки...&#128393;
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="modal-buttons">
                            <a class="modal-button" href="{{route('edit-plant',['plant'=>$plant->id])}}">Изменить</a>
                            <button wire:click="likeOther('{{$plant->name}}')" class="modal-button">Как у других</button>
                            <button wire:click="delete({{$plant->id}})" wire:confirm="Вы точно хотите удалить {{$plant->name}}?" class="modal-button">Удалить
                            </button>
                            <div class="ya-share2"
                                 data-curtain data-shape="round" data-limit="0" data-more-button-type="long" data-services="vkontakte,telegram,whatsapp" data-title="{{$plant->name}}" data-url="{{URL::signedRoute('share-plant',['plant'=>$plant->id])}}" {{--data-image="{{Storage::disk('public')->url($plant->image)}}"--}} data-use-links>
                            </div>
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

