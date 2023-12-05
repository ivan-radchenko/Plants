<footer class="footer">
    <div class="footer-wrapper">
        <div class="footer-left">
            <img class="footer-img" src="{{ asset('images/footer/contacts.svg') }}" alt="контакты">
            <p class="footer-text">Тел: +7(925)777-61-40</p>
            <p class="footer-text">e-mail: sonysakura.rf@gmail.com</p>
        </div>
        <div class="footer-center">
            <label for="footer-search">
                <img class="footer-img" src="{{ asset('images/footer/search.svg') }}" alt="поиск">
            </label>
            <input class="footer-search" id="footer-search" name="footer-search" type="text" placeholder="Найти растеньку" onfocusout="this.placeholder ='Найти растеньку'" onfocus="this.placeholder =''">
            <div class="footer-social">
                <a href="#"><img class="footer-social-img" src="{{ asset('images/footer/youtube.svg') }}" alt="youtube"></a>
                <a href="#"><img class="footer-social-img" src="{{ asset('images/footer/telegram.svg') }}" alt="telegram"></a>
                <a href="#"><img class="footer-social-img" src="{{ asset('images/footer/vk.svg') }}" alt="vk"></a>
            </div>
        </div>
        <div class="footer-right">
            <img class="footer-img" src="{{ asset('images/footer/logo.svg') }}" alt="логотип">
        </div>
    </div>
</footer>
