<div>
    <link href="{{ asset('css/like-other.css') }}" rel="stylesheet">
    <div class="wrapper">
        <div class="sub-header">
            <img src="{{asset('images/header/left-subheader-image.svg')}}" alt="" class="left-subheader-image desktop">
            <img src="{{asset('images/header/right-subheader-image.svg')}}" alt="" class="right-subheader-image desktop">
            <img src="{{asset('images/header/left-subheader-image-mobile.svg')}}" alt="" class="left-subheader-image mobile">
            <img src="{{asset('images/header/right-subheader-image-mobile.svg')}}" alt="" class="right-subheader-image mobile">
        </div>
        <div class="search-wrapper">
                <label for="search">
                <input wire:model="searchInput" wire:keydown.enter="search" type="text" class="search" name="search" id="search" autocomplete="off" placeholder="Поиск по растенькам" onfocusout="this.placeholder ='Поиск по растенькам'" onfocus="this.placeholder =''" required>
                </label>
        </div>
        <div class="stats-wrapper">
            @if($averageStats)
                <div class="stat-title">СТАТИСТИКА</div>
                <div class="stat-text">Время между поливами летом:
                    <span class="stat-text-data">{{$averageStats['waterSummer']}} дн</span>
                </div>
                <div class="stat-text">Время между поливами зимой:
                    <span class="stat-text-data">{{$averageStats['waterWinter']}} дн</span>
                </div>
                <div class="stat-text">Свет летом:
                    <span class="stat-text-data">{{$averageStats['lightSummer']}} час</span>
                </div>
                <div class="stat-text">Свет зимой:
                    <span class="stat-text-data">{{$averageStats['lightWinter']}} час</span>
                </div>
                <div class="stat-text">Интенсивность освещения:
                    <span class="stat-text-data">{{$averageStats['light']}}</span>
                </div>
                <div class="stat-text">Влажность:
                    <span class="stat-text-data">{{$averageStats['wet']}}</span>
                </div>
            @endif
        </div>

        @if($searchResult)
            <div class="plants-wrapper">
                @foreach($searchResult as $plant)
                    <div wire:key="{{$plant->id}}" class="plant-card" wire:ignore>
                        <img x-on:click="$dispatch('open-modal',{modalID:'{{$plant->id}}'})" class="cart-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                        <div x-on:click="$dispatch('open-modal',{modalID:'{{$plant->id}}'})">{{$plant->name}}</div>
                    </div>
                    <div wire:key="{{$plant->id}}-modal" class="modal"
                         x-data="{open:false, modalID:'{{$plant->id}}'}"
                         x-show="open"
                         x-on:open-modal.window="open=($event.detail.modalID === modalID)"
                         x-on:close-modal.window="open=false"
                         x-transition.duration.700ms
                         style="display: none;">

                        <div class="modal-bg"
                             x-on:click="open=false">
                        </div>

                        <div class="modal-content-wrapper">
                            <svg x-on:click="open=false" class="modal-close" id="_Слой_2" data-name="Слой 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.53 31.53">
                                <g>
                                    <rect width="31.53" height="31.53" rx="6" ry="6"/>
                                    <g>
                                        <rect x="13.27" y="3.14" width="5.29" height="25.41" transform="translate(-6.55 15.89) rotate(-45)" style="fill: #77afaf; stroke-width: 0px;"/>
                                        <rect x="2.92" y="12.91" width="25.41" height="5.29" transform="translate(-6.43 15.6) rotate(-45)" style="fill: #77afaf; stroke-width: 0px;"/>
                                    </g>
                                </g>
                            </svg>
                            <div class="modal-body">
                                <img class="modal-image" src="{{Storage::disk('public')->url($plant->image)}}" alt="plant">
                                <div class="modal-footer">
                                    <p class="modal-title">{{$plant->name}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($searchResultAll->count() > $count)
                <button wire:click="loadMore" type="button"  class="button">Загрузить еще</button>
            @endif
        @endif
    </div>
</div>
