<div>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <div class="section-1">
        <div class="wrapper">
            <img class="search-bg" src="{{ asset('images/home/home-bg.svg') }}" alt="image">
            <input class="search" type="text" name="search" id="search" placeholder="Найти растеньку" onfocusout="this.placeholder ='Найти растеньку'" onfocus="this.placeholder =''">
            <label class="search-label" for="search">
                <a href="#">
                    <svg class="icon-search" xmlns="http://www.w3.org/2000/svg" width="35.82" height="30.88" viewBox="0 0 35.82 30.88"><ellipse cx="12.62" cy="12.28" rx="12.12" ry="11.78" style="fill:none; stroke:#a7a9ac; stroke-miterlimit:10;"/><line x1="22.24" y1="19.45" x2="35.5" y2="30.5" style="fill:none; stroke:#a7a9ac; stroke-miterlimit:10;"/></svg>
                </a>
            </label>
        </div>
    </div>
    <div class="section-2">
        <div class="wrapper">
            <div class="my-plants-wrapper">
                <img class="my-plants-text" src="{{ asset('images/home/my-plants-text.svg') }}" alt="Мои растеньки">
                <h2 class="second-section-text">гармония между вами <br>
                    и зелеными друзьями</h2>
            </div>
        </div>
    </div>
    <div class="section-3">
        <div class="wrapper">
            <div class="wrapper-image">
                <div class="img-1">
                    <img class="img-1" src="{{ asset('images/home/section-3-1.svg') }}" alt="создавай свой сад">
                    <div class="animate-wrapper">
                        <p class="img-text">создавай <br> свой сад</p>
                    </div>
                </div>
                <div class="img-2">
                    <img class="img-2" src="{{ asset('images/home/section-3-2.svg') }}" alt="находи информацию">
                    <div class="animate-wrapper">
                        <p class="img-text">находи <br> информацию</p>
                    </div>
                </div>
                <div class="img-3">
                    <img class="img-3" src="{{ asset('images/home/section-3-3.svg') }}" alt="отслеживай уход">
                    <div class="animate-wrapper">
                        <p class="img-text">отслеживай <br> уход</p>
                    </div>
                </div>
                <div class="img-4">
                    <img class="img-4" src="{{ asset('images/home/section-3-4.svg') }}" alt="делись знаниями">
                    <div class="animate-wrapper">
                        <p class="img-text">делись <br> знаниями</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
