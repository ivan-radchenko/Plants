<div>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <div class="desktop" wire:key="desktop">
        <div class="section-1">
            <div class="wrapper">
                <img class="search-bg" src="{{ asset('images/home/home-bg.svg') }}" alt="image">
                <svg class="search-grass" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 538.59 53.35">
                    <path d="M510.09,45.82c2.78-6.06,8.61-10.05,14.17-13.73.41,7.09.81,14.17,1.21,21.26-3.96-1.93-8.42-3.02-13.13-3.02H12.34c-4.4,0-8.58.95-12.34,2.66.46-5.32,2.05-11.33,3.83-15.6,1.33,2.48,2.66,4.96,3.99,7.44,1.89-9.27,4.82-18.32,8.73-26.93.14,9.23.28,18.45.42,27.68,1.66-4.06,4.16-7.78,7.29-10.85.45,3.26.9,6.53,1.35,9.79,2.34-10.37,1.01-21.54-3.72-31.07,9.41,8.59,15.78,20.44,17.75,33.03,1.21-5.05,3.45-9.84,6.54-14.01.22,4.44.45,8.89.67,13.33,2.2-4.48,3.02-9.62,2.33-14.56,2.9,3.84,4.6,8.58,4.8,13.4.76-15.72-6.44-31.62-18.77-41.4,18.42,6.08,33.61,21.17,39.81,39.55-1.79-5.93-2.13-12.29-.97-18.38,3.6,7.28,7.19,14.56,10.79,21.84-.56-8.18,1.26-16.52,5.18-23.73,1.08,8.51,2.16,17.02,3.24,25.53,1.75-1.44,3.08-3.4,3.76-5.56,2.02.96,5.16,2.02,7.81,3.53-2.03-2.73-4.38-5.2-7.01-7.36,5.43.15,10.76,2.61,14.4,6.65-1.52-16.25,4.87-33.06,16.82-44.19-9.25,12.16-10.98,29.59-4.31,43.32.84-6.2,3.43-12.16,7.39-17.01-.27,6.41,2.14,12.9,6.52,17.6,3.96-3.74,7.92-7.48,11.89-11.21,2.82,3.5,5.65,7.01,8.48,10.52,1.25-3.9.64-8.34-1.6-11.76,5.36,2.99,9.89,7.45,12.96,12.76,3.95-.77,7.29-4.08,8.09-8.04,1.45,2.71,2.9,5.43,4.35,8.14,2.83-1.83,4.7-5.04,4.91-8.4,1.82,2.9,3.65,5.8,5.47,8.7,1.03-2.57,2.07-5.15,3.1-7.72.48,3.17,2.66,6.02,5.59,7.31,1.43-2.63,2.86-5.27,4.29-7.9,3.34,4.63,8.46,7.93,14.06,9.04,1.29-1.41,2.58-2.82,3.88-4.23,1.32,1.22,2.64,2.44,3.96,3.66,7.85-3.5,13.91-10.8,15.9-19.17.49,6.8,3.51,13.38,8.35,18.18,1.9-6.35,1-13.49-2.42-19.18,5.15,6.09,10.3,12.17,15.45,18.25,4.73-3.52,7.41-9.62,6.79-15.48,2.12,5.06,4.24,10.12,6.36,15.18,4.24-2.79,7.44-7.1,8.89-11.96,1.3,3.91,2.6,7.82,3.9,11.73,2.93-.74,5.39-3.11,6.23-6.01,1.03,2.33,2.06,4.65,3.09,6.98,1.72-4.25,1.77-9.15.12-13.44,2.62,4.45,5.24,8.89,7.86,13.33.92-1.67,1.83-3.34,2.74-5.01,1.33,2.4,2.67,4.8,4,7.21,1.33-2.29,2.66-4.58,3.98-6.87,1.1,2.34,2.21,4.68,3.31,7.02,2.32-1.71,3.99-4.29,4.58-7.11,1.26,2.53,2.51,5.06,3.77,7.59,5.23-1.26,9.69-5.32,11.45-10.41,1.17,3.56,2.35,7.11,3.52,10.67,3.21-1.74,5.81-4.58,7.27-7.93,1.25,2.39,2.51,4.78,3.77,7.17,5.83-1.19,10.64-6.31,11.46-12.2.81,3.84,1.62,7.68,2.44,11.53,4.13-3.09,6.84-8.02,7.22-13.17,3.49,3.73,5.5,8.82,5.5,13.93,4.93-4.33,7.45-11.23,6.46-17.7,2.22,4.64,3.28,9.82,3.09,14.95,9.53-10.32,15.85-23.58,17.86-37.49,1.24,12.95.48,26.09-2.25,38.81,5.54-5.01,8.24-12.96,6.91-20.3,1.71,7.23,3.41,14.46,5.12,21.7.6-4.06,3.57-7.67,7.43-9.05-1.71,3.23-2.26,7.02-1.67,10.62,2.32-6.66,12.1-13.64,16.74-16.19-3.29,4.9-2.62,12.09,1.52,16.3,6.49-9.28,9.02-21.24,6.84-32.36,5.56,9.19,8.41,19.99,8.11,30.73,3.01-2.94,4.82-7.08,4.93-11.28,1.48,4.29,2.43,8.77,2.84,13.29,4.74-8.15,11.84-14.92,20.21-19.25-2.86,5.07-5.81,11.04-3.66,16.46,8.5-23.39,30.03-41.54,54.51-45.97-17.08,8.27-28.64,26.85-28.5,45.82Z" style="fill: #93c360; stroke-width: 0px;"/>
                </svg>
                <input wire:model="searchInput" wire:keydown.enter="search" class="search" type="text" name="search" id="search"
                       placeholder="Найти растеньку" onfocusout="this.placeholder ='Найти растеньку'" onfocus="this.placeholder =''">
                <label class="search-label" for="search">
                    <a wire:click="search">
                        <svg class="icon-search" xmlns="http://www.w3.org/2000/svg" width="35.82" height="30.88" viewBox="0 0 35.82 30.88"><ellipse cx="12.62" cy="12.28" rx="12.12" ry="11.78" style="fill:none; stroke:#a7a9ac; stroke-miterlimit:10;"/><line x1="22.24" y1="19.45" x2="35.5" y2="30.5" style="fill:none; stroke:#a7a9ac; stroke-miterlimit:10;"/></svg>
                    </a>
                </label>
            </div>
        </div>
        <div class="section-2">
            <div class="wrapper">
                <div class="my-plants-wrapper">
                    <h1 class="my-plants-text-top">МOИ</h1>
                    <h1 class="my-plants-text-bot">РАСТЕНЬКИ</h1>
                    <h2 class="second-section-text">гармония между вами <br>
                        и зелеными друзьями</h2>
                </div>
            </div>
        </div>
        <div class="section-3">
            <div class="wrapper">
                <div class="wrapper-image">
                    <a class="img-1" href="{{route('my-garden')}}">
                        <img class="img-1" src="{{ asset('images/home/section-3-1.svg') }}" alt="создавай свой сад">
                        <div class="animate-wrapper">
                            <p class="img-text">создавай <br> свой сад</p>
                        </div>
                    </a>
                    <a class="img-2" href="{{route('like-other')}}">
                        <img class="img-2" src="{{ asset('images/home/section-3-2.svg') }}" alt="находи информацию">
                        <div class="animate-wrapper">
                            <p class="img-text">находи <br> информацию</p>
                        </div>
                    </a>
                    <a class="img-3" href="{{route('care-today')}}">
                        <img class="img-3" src="{{ asset('images/home/section-3-3.svg') }}" alt="отслеживай уход">
                        <div class="animate-wrapper">
                            <p class="img-text">отслеживай <br> уход</p>
                        </div>
                    </a>
                    <a class="img-4" href="{{route('create-plant')}}">
                        <img class="img-4" src="{{ asset('images/home/section-3-4.svg') }}" alt="делись знаниями">
                        <div class="animate-wrapper">
                            <p class="img-text">делись <br> знаниями</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile" wire:key="mobile">
        <div class="section-1">
            <div class="wrapper">
                <img class="search-bg" src="{{ asset('images/home/home-bg.svg') }}" alt="image">
                <svg class="search-grass" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 538.59 53.35">
                    <path d="M510.09,45.82c2.78-6.06,8.61-10.05,14.17-13.73.41,7.09.81,14.17,1.21,21.26-3.96-1.93-8.42-3.02-13.13-3.02H12.34c-4.4,0-8.58.95-12.34,2.66.46-5.32,2.05-11.33,3.83-15.6,1.33,2.48,2.66,4.96,3.99,7.44,1.89-9.27,4.82-18.32,8.73-26.93.14,9.23.28,18.45.42,27.68,1.66-4.06,4.16-7.78,7.29-10.85.45,3.26.9,6.53,1.35,9.79,2.34-10.37,1.01-21.54-3.72-31.07,9.41,8.59,15.78,20.44,17.75,33.03,1.21-5.05,3.45-9.84,6.54-14.01.22,4.44.45,8.89.67,13.33,2.2-4.48,3.02-9.62,2.33-14.56,2.9,3.84,4.6,8.58,4.8,13.4.76-15.72-6.44-31.62-18.77-41.4,18.42,6.08,33.61,21.17,39.81,39.55-1.79-5.93-2.13-12.29-.97-18.38,3.6,7.28,7.19,14.56,10.79,21.84-.56-8.18,1.26-16.52,5.18-23.73,1.08,8.51,2.16,17.02,3.24,25.53,1.75-1.44,3.08-3.4,3.76-5.56,2.02.96,5.16,2.02,7.81,3.53-2.03-2.73-4.38-5.2-7.01-7.36,5.43.15,10.76,2.61,14.4,6.65-1.52-16.25,4.87-33.06,16.82-44.19-9.25,12.16-10.98,29.59-4.31,43.32.84-6.2,3.43-12.16,7.39-17.01-.27,6.41,2.14,12.9,6.52,17.6,3.96-3.74,7.92-7.48,11.89-11.21,2.82,3.5,5.65,7.01,8.48,10.52,1.25-3.9.64-8.34-1.6-11.76,5.36,2.99,9.89,7.45,12.96,12.76,3.95-.77,7.29-4.08,8.09-8.04,1.45,2.71,2.9,5.43,4.35,8.14,2.83-1.83,4.7-5.04,4.91-8.4,1.82,2.9,3.65,5.8,5.47,8.7,1.03-2.57,2.07-5.15,3.1-7.72.48,3.17,2.66,6.02,5.59,7.31,1.43-2.63,2.86-5.27,4.29-7.9,3.34,4.63,8.46,7.93,14.06,9.04,1.29-1.41,2.58-2.82,3.88-4.23,1.32,1.22,2.64,2.44,3.96,3.66,7.85-3.5,13.91-10.8,15.9-19.17.49,6.8,3.51,13.38,8.35,18.18,1.9-6.35,1-13.49-2.42-19.18,5.15,6.09,10.3,12.17,15.45,18.25,4.73-3.52,7.41-9.62,6.79-15.48,2.12,5.06,4.24,10.12,6.36,15.18,4.24-2.79,7.44-7.1,8.89-11.96,1.3,3.91,2.6,7.82,3.9,11.73,2.93-.74,5.39-3.11,6.23-6.01,1.03,2.33,2.06,4.65,3.09,6.98,1.72-4.25,1.77-9.15.12-13.44,2.62,4.45,5.24,8.89,7.86,13.33.92-1.67,1.83-3.34,2.74-5.01,1.33,2.4,2.67,4.8,4,7.21,1.33-2.29,2.66-4.58,3.98-6.87,1.1,2.34,2.21,4.68,3.31,7.02,2.32-1.71,3.99-4.29,4.58-7.11,1.26,2.53,2.51,5.06,3.77,7.59,5.23-1.26,9.69-5.32,11.45-10.41,1.17,3.56,2.35,7.11,3.52,10.67,3.21-1.74,5.81-4.58,7.27-7.93,1.25,2.39,2.51,4.78,3.77,7.17,5.83-1.19,10.64-6.31,11.46-12.2.81,3.84,1.62,7.68,2.44,11.53,4.13-3.09,6.84-8.02,7.22-13.17,3.49,3.73,5.5,8.82,5.5,13.93,4.93-4.33,7.45-11.23,6.46-17.7,2.22,4.64,3.28,9.82,3.09,14.95,9.53-10.32,15.85-23.58,17.86-37.49,1.24,12.95.48,26.09-2.25,38.81,5.54-5.01,8.24-12.96,6.91-20.3,1.71,7.23,3.41,14.46,5.12,21.7.6-4.06,3.57-7.67,7.43-9.05-1.71,3.23-2.26,7.02-1.67,10.62,2.32-6.66,12.1-13.64,16.74-16.19-3.29,4.9-2.62,12.09,1.52,16.3,6.49-9.28,9.02-21.24,6.84-32.36,5.56,9.19,8.41,19.99,8.11,30.73,3.01-2.94,4.82-7.08,4.93-11.28,1.48,4.29,2.43,8.77,2.84,13.29,4.74-8.15,11.84-14.92,20.21-19.25-2.86,5.07-5.81,11.04-3.66,16.46,8.5-23.39,30.03-41.54,54.51-45.97-17.08,8.27-28.64,26.85-28.5,45.82Z" style="fill: #93c360; stroke-width: 0px;"/>
                </svg>
                <input wire:model="searchInput" wire:keydown.enter="search" class="search" type="text" name="search" id="searchMobile"
                       placeholder="Найти растеньку" onfocusout="this.placeholder ='Найти растеньку'" onfocus="this.placeholder =''">
                <label class="search-label" for="searchMobile">
                    <a wire:click="search">
                        <svg class="icon-search" xmlns="http://www.w3.org/2000/svg" width="35.82" height="30.88" viewBox="0 0 35.82 30.88"><ellipse cx="12.62" cy="12.28" rx="12.12" ry="11.78" style="fill:none; stroke:#a7a9ac; stroke-miterlimit:10;"/><line x1="22.24" y1="19.45" x2="35.5" y2="30.5" style="fill:none; stroke:#a7a9ac; stroke-miterlimit:10;"/></svg>
                    </a>
                </label>
            </div>
        </div>
        <div class="section-2">
            <div class="wrapper">
                <div class="my-plants-wrapper">
                    <h1 class="my-plants-text-top">МOИ</h1>
                    <h1 class="my-plants-text-bot">РАСТЕНЬКИ</h1>
                    <h2 class="second-section-text">гармония между вами <br>
                        и зелеными друзьями</h2>
                </div>
            </div>
        </div>
        <div class="section-3">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="{{route('my-garden')}}">
                            <img class="img" src="{{ asset('images/home/section-3-1.svg') }}" alt="создавай свой сад">
                            <div class="animate-wrapper">
                                <p class="img-text">создавай <br> свой сад</p>
                            </div>
                        </a>
                        <a href="{{route('my-garden')}}">
                            <img class="img" src="{{ asset('images/home/section-3-1.svg') }}" alt="создавай свой сад">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{route('like-other')}}">
                            <img class="img" src="{{ asset('images/home/section-3-2.svg') }}" alt="находи информацию">
                            <div class="animate-wrapper">
                                <p class="img-text">находи <br> информацию</p>
                            </div>
                        </a>
                        <a href="{{route('like-other')}}">
                            <img class="img" src="{{ asset('images/home/section-3-2.svg') }}" alt="находи информацию">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{route('care-today')}}">
                            <img class="img" src="{{ asset('images/home/section-3-3.svg') }}" alt="отслеживай уход">
                            <div class="animate-wrapper">
                                <p class="img-text">отслеживай <br> уход</p>
                            </div>
                        </a>
                        <a href="{{route('care-today')}}">
                            <img class="img" src="{{ asset('images/home/section-3-3.svg') }}" alt="отслеживай уход">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{route('create-plant')}}">
                            <img class="img" src="{{ asset('images/home/section-3-4.svg') }}" alt="делись знаниями">
                            <div class="animate-wrapper">
                                <p class="img-text">делись <br> знаниями</p>
                            </div>
                        </a>
                        <a href="{{route('create-plant')}}">
                            <img class="img" src="{{ asset('images/home/section-3-4.svg') }}" alt="делись знаниями">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: "1",
            slidesPerGroup: 2,
            slidesPerGroupSkip:2,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });
    </script>
</div>
