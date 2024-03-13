<footer class="footer">
    <div class="footer-wrapper">
        <div class="footer-left">
            <h4 class="footer-title">КОНТАКТЫ</h4>
            <p class="footer-text">Для вопросов и предложений: </p>
            <p class="footer-text">email: sonysakura.rf@gmail.com</p>
        </div>
        <div class="footer-center footer-desktop">
            <label for="footer-search">
                <h4 class="footer-title">ПОИСК</h4>
            </label>
            <input wire:model="searchInput" wire:keydown.enter="search" class="footer-search" id="footer-search" name="footer-search" type="text" placeholder="Найти растеньку" onfocusout="this.placeholder ='Найти растеньку'" onfocus="this.placeholder =''">
            <div class="footer-social">
                <a href="">
                    <svg class="footer-social-img" xmlns="http://www.w3.org/2000/svg" width="29.92" height="20" viewBox="0 0 29.92 20"><path d="m29.88,8.32c0,.25-.02.5,0,.75.05.55.03,1.1.02,1.65-.02.56-.02,1.12-.05,1.68-.02.33-.04.67-.06,1-.02.3-.04.6-.07.9-.02.22-.06.45-.08.67-.03.22-.05.43-.08.65-.02.16-.05.33-.08.49-.05.23-.11.45-.16.68-.07.32-.2.61-.36.89-.26.46-.61.83-1.05,1.14-.18.13-.37.24-.57.34-.27.12-.55.23-.85.28-.1.01-.19.04-.28.06-.53.09-1.06.15-1.59.19-.41.03-.82.07-1.23.1-.09,0-.19,0-.28.01-.22.01-.45.03-.67.04-.2,0-.4.01-.59.02-.35.01-.71.03-1.06.04-.32.01-.64.01-.97.02-.27,0-.54.02-.81.03-.01,0-.02,0-.03,0-.39,0-.78.02-1.18.02-.56,0-1.12,0-1.68.01-.66,0-1.32.01-1.98,0-.8,0-1.59,0-2.39-.02-.68-.01-1.36-.04-2.04-.06-.36-.01-.72-.02-1.08-.03-.36-.01-.72-.02-1.08-.05-.31-.03-.63-.03-.94-.05-.38-.02-.77-.06-1.15-.09-.09,0-.17,0-.26-.02-.3-.03-.6-.07-.9-.1-.19-.02-.38-.05-.58-.08-.46-.07-.9-.21-1.3-.43-.68-.37-1.19-.9-1.53-1.57-.18-.36-.28-.73-.36-1.12-.07-.35-.13-.7-.18-1.06-.08-.56-.14-1.13-.17-1.69-.01-.28-.04-.55-.06-.83-.02-.39-.04-.77-.05-1.16,0-.24,0-.48-.02-.72-.05-.54-.02-1.08-.02-1.62,0-.23.02-.46.03-.7,0-.17,0-.33.01-.5.01-.3.03-.6.04-.89,0-.1,0-.19.01-.29.02-.21.03-.42.05-.63.03-.32.05-.64.08-.96,0-.01,0-.02,0-.03.04-.33.09-.67.14-1,.04-.23.08-.47.13-.7.05-.24.11-.48.19-.72.07-.2.17-.4.28-.59.23-.4.54-.74.91-1.03.33-.26.7-.45,1.11-.6.25-.09.52-.13.78-.18.21-.04.42-.07.63-.1.28-.03.57-.05.86-.08.05,0,.11,0,.16-.01.15-.01.29-.03.44-.04.31-.02.62-.04.93-.06.15,0,.3-.01.45-.02.28-.01.55-.03.83-.04.22-.01.44-.02.66-.02.5-.02,1-.03,1.5-.04.44-.01.88-.03,1.32-.04.66-.01,1.32-.02,1.98-.02C14.26.01,14.99,0,15.72,0c.82,0,1.63.01,2.45.02.26,0,.52.01.78.02.51.01,1.02.03,1.54.04.34.01.67.03,1.01.04.28.01.55.02.83.03.1,0,.2.02.3.02.19.01.37.02.56.03.38.02.77.04,1.15.07.33.03.66.06.98.1.37.04.73.08,1.09.17.19.04.39.08.57.15.31.12.62.26.89.45.25.18.49.38.69.61.17.19.31.39.43.62.08.15.17.31.22.47.05.19.11.38.16.58.04.17.08.34.11.51.07.45.14.9.19,1.35.04.36.07.73.1,1.09.02.3.05.6.07.89.02.26.03.52.04.78,0,.09,0,.18,0,.28,0,0,.01,0,.02,0Zm-17.94,5.9s.09-.04.13-.06c.14-.07.27-.15.41-.23.48-.26.96-.52,1.45-.78.47-.25.94-.51,1.42-.76.37-.2.75-.4,1.12-.61.19-.1.38-.21.57-.32.33-.18.66-.35.99-.53.27-.15.54-.3.81-.44.25-.13.49-.26.74-.4.13-.07.13-.12,0-.2-.26-.14-.52-.29-.79-.43-.28-.15-.57-.31-.85-.46-.42-.23-.84-.45-1.26-.68-.31-.17-.62-.34-.93-.51-.5-.27-.99-.53-1.49-.8-.27-.15-.55-.3-.82-.44-.46-.25-.92-.5-1.38-.75-.04-.02-.09-.04-.13-.06-.05.08-.03.15-.03.23,0,2.47,0,4.93,0,7.4,0,.22,0,.44,0,.66,0,.05-.01.1.05.14Z"/>
                    </svg>
                </a>
                <a href="">
                    <svg class="footer-social-img" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="m10.07,20c-2.79,0-5.4-1.11-7.28-3.07-.37-.38-.7-.8-1.01-1.23-.2-.29-.39-.59-.56-.91-.24-.44-.44-.89-.61-1.35-.14-.39-.26-.78-.35-1.18-.06-.25-.1-.49-.14-.74-.02-.17-.05-.33-.06-.5-.04-.36-.06-.72-.05-1.08.02-1.66.41-3.22,1.2-4.68.29-.54.63-1.04,1.01-1.52.15-.19.31-.37.47-.55.13-.15.27-.29.42-.43.14-.13.28-.25.42-.37.17-.15.35-.29.53-.43.09-.07.19-.13.28-.2.16-.12.34-.22.51-.33.15-.09.29-.17.45-.25.1-.05.2-.11.31-.16.19-.09.38-.17.57-.25.26-.11.53-.21.8-.3.2-.06.39-.12.59-.17.09-.02.18-.04.27-.06.19-.04.38-.08.58-.12.29-.05.59-.08.88-.1.34-.03.69-.03,1.03-.02.48.01.96.06,1.44.15.83.15,1.63.4,2.4.75.58.26,1.13.58,1.65.95.11.08.21.16.32.24.2.15.39.31.57.48.09.08.18.17.28.25.05.04.09.09.13.14.17.18.34.36.5.54.17.19.32.4.48.61.12.17.24.34.35.51.08.13.16.26.23.39.05.09.11.18.16.28.07.13.12.26.19.38.06.11.11.23.16.34.08.2.17.39.23.6.05.13.09.27.14.4.07.21.13.43.18.65.02.08.06.15.05.24.1.37.15.76.19,1.14.05.48.06.97.03,1.46-.04.82-.18,1.62-.42,2.4-.59,1.91-1.64,3.51-3.17,4.79-1.2,1-2.57,1.68-4.09,2.05-.41.1-.82.17-1.23.21-.36.04-.72.06-1.01.06Zm4.57-13.32c0-.09,0-.18-.02-.27-.03-.15-.09-.27-.24-.33-.13-.06-.27-.07-.41-.05-.14.02-.28.05-.41.09-.15.05-.3.1-.45.15-.26.1-.52.2-.79.3-.18.07-.35.14-.53.21-.14.06-.28.11-.42.17-.18.08-.36.15-.55.23-.24.1-.49.19-.73.3-.23.1-.46.2-.69.3-1.54.66-3.08,1.33-4.61,2-.2.09-.41.16-.6.26-.14.07-.26.15-.36.27-.05.06-.07.13-.07.2,0,.09.05.17.12.23.09.08.2.13.31.17.21.08.43.15.65.22.15.05.3.09.44.13.16.05.32.09.48.13.13.03.26.05.39.07.27.05.54.02.8-.08.2-.08.38-.18.55-.3,1.16-.78,2.33-1.57,3.5-2.34.21-.14.42-.28.64-.41.06-.03.11-.05.18-.04.07,0,.12.04.13.12.01.06,0,.11-.03.16-.06.07-.11.13-.17.2-.3.32-.62.61-.93.92-.63.6-1.28,1.18-1.9,1.8-.12.11-.23.23-.33.36-.05.07-.1.15-.11.24-.01.1,0,.19.05.27.04.07.09.13.14.19.09.09.19.16.29.23.95.64,1.9,1.27,2.84,1.92.14.1.28.18.43.25.17.07.35.11.54.1.13,0,.24-.06.33-.15.08-.07.13-.16.18-.26.08-.16.13-.33.17-.5.09-.47.17-.93.26-1.4.08-.44.15-.87.23-1.31.07-.43.14-.86.21-1.29.06-.37.12-.74.17-1.12.05-.34.1-.68.15-1.02.04-.29.08-.57.11-.86.02-.15.04-.29.04-.44Z"/>
                    </svg>
                </a>
                <a href="">
                    <svg class="footer-social-img" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="m5.04.07C5.57.02,6.13,0,6.68,0c2.4,0,4.8,0,7.19.01.45,0,.9.04,1.35.08.5.05.99.11,1.47.24.77.2,1.48.52,2.02,1.11.36.39.6.84.77,1.35.21.61.32,1.24.39,1.88.05.52.08,1.04.09,1.56.05,1.76,0,3.52.02,5.28,0,.59,0,1.18,0,1.77,0,.49-.02.99-.06,1.48-.05.65-.12,1.31-.29,1.94-.16.59-.38,1.15-.76,1.64-.45.57-1.05.93-1.73,1.17-.55.19-1.11.3-1.68.36-.41.05-.82.09-1.23.1-2.56.06-5.12,0-7.67.03-.39,0-.79-.02-1.18-.04-.44-.02-.88-.07-1.32-.15-.41-.07-.82-.15-1.21-.29-1.02-.35-1.8-.98-2.24-1.99-.22-.51-.36-1.04-.45-1.59-.07-.42-.11-.85-.14-1.27C0,14.1,0,13.53,0,12.95c0-2.47,0-4.94.02-7.4,0-.6.09-1.2.21-1.79.12-.59.29-1.15.58-1.67.46-.81,1.16-1.32,2.03-1.61.6-.2,1.23-.32,1.86-.37.1,0,.2-.04.33-.03Zm6.11,8.26h0c0-.5.01-.99,0-1.49-.02-.44-.15-.52-.53-.52-.67,0-1.34,0-2.01,0-.2,0-.4-.01-.5.2-.1.21.03.36.15.51.28.33.38.72.39,1.13.01.69,0,1.37,0,2.06,0,.13,0,.26-.05.38-.06.17-.18.23-.34.15-.21-.11-.37-.28-.51-.46-.41-.5-.73-1.07-1.03-1.64-.32-.62-.57-1.26-.81-1.91-.07-.19-.18-.36-.41-.38-.58-.06-1.16-.04-1.74-.02-.32.01-.46.23-.39.53.08.36.18.71.31,1.05.51,1.36,1.24,2.6,2.08,3.77.75,1.05,1.71,1.84,2.92,2.3.62.24,1.27.3,1.93.22.37-.05.57-.11.56-.63,0-.43,0-.86,0-1.3,0-.09,0-.17.03-.26.04-.1.1-.14.21-.15.26-.02.5.05.71.2.35.24.66.51.95.81.33.35.66.7.99,1.05.16.16.34.3.57.31.54,0,1.08.01,1.62,0,.36,0,.5-.24.42-.58-.06-.25-.2-.45-.34-.65-.49-.68-1.05-1.29-1.64-1.87-.12-.11-.23-.23-.31-.37-.08-.13-.11-.25-.01-.39.08-.12.15-.24.22-.36.54-.8,1.08-1.6,1.52-2.46.12-.23.23-.46.29-.72.08-.34-.04-.5-.39-.51-.52,0-1.05,0-1.57,0-.18,0-.33.07-.44.2-.07.08-.12.18-.16.28-.29.66-.62,1.3-1.02,1.91-.3.47-.62.93-1.06,1.28-.12.1-.26.21-.42.14-.17-.08-.16-.26-.16-.41,0-.47,0-.94,0-1.41Z"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="footer-right footer-desktop">
            <img class="footer-img" src="{{ asset('images/footer/logo.svg') }}" alt="логотип">
        </div>
        <div class="footer-mobile">
            <div class="footer-center">
                <label for="footer-search">
                    <h4 class="footer-title">ПОИСК</h4>
                </label>
                <input wire:model="searchInput" wire:keydown.enter="search" class="footer-search" id="footer-search" name="footer-search" type="text" placeholder="Найти растеньку" onfocusout="this.placeholder ='Найти растеньку'" onfocus="this.placeholder =''">
                <div class="footer-social">
                    <a href="">
                        <svg class="footer-social-img" xmlns="http://www.w3.org/2000/svg" width="29.92" height="20" viewBox="0 0 29.92 20"><path d="m29.88,8.32c0,.25-.02.5,0,.75.05.55.03,1.1.02,1.65-.02.56-.02,1.12-.05,1.68-.02.33-.04.67-.06,1-.02.3-.04.6-.07.9-.02.22-.06.45-.08.67-.03.22-.05.43-.08.65-.02.16-.05.33-.08.49-.05.23-.11.45-.16.68-.07.32-.2.61-.36.89-.26.46-.61.83-1.05,1.14-.18.13-.37.24-.57.34-.27.12-.55.23-.85.28-.1.01-.19.04-.28.06-.53.09-1.06.15-1.59.19-.41.03-.82.07-1.23.1-.09,0-.19,0-.28.01-.22.01-.45.03-.67.04-.2,0-.4.01-.59.02-.35.01-.71.03-1.06.04-.32.01-.64.01-.97.02-.27,0-.54.02-.81.03-.01,0-.02,0-.03,0-.39,0-.78.02-1.18.02-.56,0-1.12,0-1.68.01-.66,0-1.32.01-1.98,0-.8,0-1.59,0-2.39-.02-.68-.01-1.36-.04-2.04-.06-.36-.01-.72-.02-1.08-.03-.36-.01-.72-.02-1.08-.05-.31-.03-.63-.03-.94-.05-.38-.02-.77-.06-1.15-.09-.09,0-.17,0-.26-.02-.3-.03-.6-.07-.9-.1-.19-.02-.38-.05-.58-.08-.46-.07-.9-.21-1.3-.43-.68-.37-1.19-.9-1.53-1.57-.18-.36-.28-.73-.36-1.12-.07-.35-.13-.7-.18-1.06-.08-.56-.14-1.13-.17-1.69-.01-.28-.04-.55-.06-.83-.02-.39-.04-.77-.05-1.16,0-.24,0-.48-.02-.72-.05-.54-.02-1.08-.02-1.62,0-.23.02-.46.03-.7,0-.17,0-.33.01-.5.01-.3.03-.6.04-.89,0-.1,0-.19.01-.29.02-.21.03-.42.05-.63.03-.32.05-.64.08-.96,0-.01,0-.02,0-.03.04-.33.09-.67.14-1,.04-.23.08-.47.13-.7.05-.24.11-.48.19-.72.07-.2.17-.4.28-.59.23-.4.54-.74.91-1.03.33-.26.7-.45,1.11-.6.25-.09.52-.13.78-.18.21-.04.42-.07.63-.1.28-.03.57-.05.86-.08.05,0,.11,0,.16-.01.15-.01.29-.03.44-.04.31-.02.62-.04.93-.06.15,0,.3-.01.45-.02.28-.01.55-.03.83-.04.22-.01.44-.02.66-.02.5-.02,1-.03,1.5-.04.44-.01.88-.03,1.32-.04.66-.01,1.32-.02,1.98-.02C14.26.01,14.99,0,15.72,0c.82,0,1.63.01,2.45.02.26,0,.52.01.78.02.51.01,1.02.03,1.54.04.34.01.67.03,1.01.04.28.01.55.02.83.03.1,0,.2.02.3.02.19.01.37.02.56.03.38.02.77.04,1.15.07.33.03.66.06.98.1.37.04.73.08,1.09.17.19.04.39.08.57.15.31.12.62.26.89.45.25.18.49.38.69.61.17.19.31.39.43.62.08.15.17.31.22.47.05.19.11.38.16.58.04.17.08.34.11.51.07.45.14.9.19,1.35.04.36.07.73.1,1.09.02.3.05.6.07.89.02.26.03.52.04.78,0,.09,0,.18,0,.28,0,0,.01,0,.02,0Zm-17.94,5.9s.09-.04.13-.06c.14-.07.27-.15.41-.23.48-.26.96-.52,1.45-.78.47-.25.94-.51,1.42-.76.37-.2.75-.4,1.12-.61.19-.1.38-.21.57-.32.33-.18.66-.35.99-.53.27-.15.54-.3.81-.44.25-.13.49-.26.74-.4.13-.07.13-.12,0-.2-.26-.14-.52-.29-.79-.43-.28-.15-.57-.31-.85-.46-.42-.23-.84-.45-1.26-.68-.31-.17-.62-.34-.93-.51-.5-.27-.99-.53-1.49-.8-.27-.15-.55-.3-.82-.44-.46-.25-.92-.5-1.38-.75-.04-.02-.09-.04-.13-.06-.05.08-.03.15-.03.23,0,2.47,0,4.93,0,7.4,0,.22,0,.44,0,.66,0,.05-.01.1.05.14Z"/>
                        </svg>
                    </a>
                    <a href="">
                        <svg class="footer-social-img" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="m10.07,20c-2.79,0-5.4-1.11-7.28-3.07-.37-.38-.7-.8-1.01-1.23-.2-.29-.39-.59-.56-.91-.24-.44-.44-.89-.61-1.35-.14-.39-.26-.78-.35-1.18-.06-.25-.1-.49-.14-.74-.02-.17-.05-.33-.06-.5-.04-.36-.06-.72-.05-1.08.02-1.66.41-3.22,1.2-4.68.29-.54.63-1.04,1.01-1.52.15-.19.31-.37.47-.55.13-.15.27-.29.42-.43.14-.13.28-.25.42-.37.17-.15.35-.29.53-.43.09-.07.19-.13.28-.2.16-.12.34-.22.51-.33.15-.09.29-.17.45-.25.1-.05.2-.11.31-.16.19-.09.38-.17.57-.25.26-.11.53-.21.8-.3.2-.06.39-.12.59-.17.09-.02.18-.04.27-.06.19-.04.38-.08.58-.12.29-.05.59-.08.88-.1.34-.03.69-.03,1.03-.02.48.01.96.06,1.44.15.83.15,1.63.4,2.4.75.58.26,1.13.58,1.65.95.11.08.21.16.32.24.2.15.39.31.57.48.09.08.18.17.28.25.05.04.09.09.13.14.17.18.34.36.5.54.17.19.32.4.48.61.12.17.24.34.35.51.08.13.16.26.23.39.05.09.11.18.16.28.07.13.12.26.19.38.06.11.11.23.16.34.08.2.17.39.23.6.05.13.09.27.14.4.07.21.13.43.18.65.02.08.06.15.05.24.1.37.15.76.19,1.14.05.48.06.97.03,1.46-.04.82-.18,1.62-.42,2.4-.59,1.91-1.64,3.51-3.17,4.79-1.2,1-2.57,1.68-4.09,2.05-.41.1-.82.17-1.23.21-.36.04-.72.06-1.01.06Zm4.57-13.32c0-.09,0-.18-.02-.27-.03-.15-.09-.27-.24-.33-.13-.06-.27-.07-.41-.05-.14.02-.28.05-.41.09-.15.05-.3.1-.45.15-.26.1-.52.2-.79.3-.18.07-.35.14-.53.21-.14.06-.28.11-.42.17-.18.08-.36.15-.55.23-.24.1-.49.19-.73.3-.23.1-.46.2-.69.3-1.54.66-3.08,1.33-4.61,2-.2.09-.41.16-.6.26-.14.07-.26.15-.36.27-.05.06-.07.13-.07.2,0,.09.05.17.12.23.09.08.2.13.31.17.21.08.43.15.65.22.15.05.3.09.44.13.16.05.32.09.48.13.13.03.26.05.39.07.27.05.54.02.8-.08.2-.08.38-.18.55-.3,1.16-.78,2.33-1.57,3.5-2.34.21-.14.42-.28.64-.41.06-.03.11-.05.18-.04.07,0,.12.04.13.12.01.06,0,.11-.03.16-.06.07-.11.13-.17.2-.3.32-.62.61-.93.92-.63.6-1.28,1.18-1.9,1.8-.12.11-.23.23-.33.36-.05.07-.1.15-.11.24-.01.1,0,.19.05.27.04.07.09.13.14.19.09.09.19.16.29.23.95.64,1.9,1.27,2.84,1.92.14.1.28.18.43.25.17.07.35.11.54.1.13,0,.24-.06.33-.15.08-.07.13-.16.18-.26.08-.16.13-.33.17-.5.09-.47.17-.93.26-1.4.08-.44.15-.87.23-1.31.07-.43.14-.86.21-1.29.06-.37.12-.74.17-1.12.05-.34.1-.68.15-1.02.04-.29.08-.57.11-.86.02-.15.04-.29.04-.44Z"/>
                        </svg>
                    </a>
                    <a href="">
                        <svg class="footer-social-img" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="m5.04.07C5.57.02,6.13,0,6.68,0c2.4,0,4.8,0,7.19.01.45,0,.9.04,1.35.08.5.05.99.11,1.47.24.77.2,1.48.52,2.02,1.11.36.39.6.84.77,1.35.21.61.32,1.24.39,1.88.05.52.08,1.04.09,1.56.05,1.76,0,3.52.02,5.28,0,.59,0,1.18,0,1.77,0,.49-.02.99-.06,1.48-.05.65-.12,1.31-.29,1.94-.16.59-.38,1.15-.76,1.64-.45.57-1.05.93-1.73,1.17-.55.19-1.11.3-1.68.36-.41.05-.82.09-1.23.1-2.56.06-5.12,0-7.67.03-.39,0-.79-.02-1.18-.04-.44-.02-.88-.07-1.32-.15-.41-.07-.82-.15-1.21-.29-1.02-.35-1.8-.98-2.24-1.99-.22-.51-.36-1.04-.45-1.59-.07-.42-.11-.85-.14-1.27C0,14.1,0,13.53,0,12.95c0-2.47,0-4.94.02-7.4,0-.6.09-1.2.21-1.79.12-.59.29-1.15.58-1.67.46-.81,1.16-1.32,2.03-1.61.6-.2,1.23-.32,1.86-.37.1,0,.2-.04.33-.03Zm6.11,8.26h0c0-.5.01-.99,0-1.49-.02-.44-.15-.52-.53-.52-.67,0-1.34,0-2.01,0-.2,0-.4-.01-.5.2-.1.21.03.36.15.51.28.33.38.72.39,1.13.01.69,0,1.37,0,2.06,0,.13,0,.26-.05.38-.06.17-.18.23-.34.15-.21-.11-.37-.28-.51-.46-.41-.5-.73-1.07-1.03-1.64-.32-.62-.57-1.26-.81-1.91-.07-.19-.18-.36-.41-.38-.58-.06-1.16-.04-1.74-.02-.32.01-.46.23-.39.53.08.36.18.71.31,1.05.51,1.36,1.24,2.6,2.08,3.77.75,1.05,1.71,1.84,2.92,2.3.62.24,1.27.3,1.93.22.37-.05.57-.11.56-.63,0-.43,0-.86,0-1.3,0-.09,0-.17.03-.26.04-.1.1-.14.21-.15.26-.02.5.05.71.2.35.24.66.51.95.81.33.35.66.7.99,1.05.16.16.34.3.57.31.54,0,1.08.01,1.62,0,.36,0,.5-.24.42-.58-.06-.25-.2-.45-.34-.65-.49-.68-1.05-1.29-1.64-1.87-.12-.11-.23-.23-.31-.37-.08-.13-.11-.25-.01-.39.08-.12.15-.24.22-.36.54-.8,1.08-1.6,1.52-2.46.12-.23.23-.46.29-.72.08-.34-.04-.5-.39-.51-.52,0-1.05,0-1.57,0-.18,0-.33.07-.44.2-.07.08-.12.18-.16.28-.29.66-.62,1.3-1.02,1.91-.3.47-.62.93-1.06,1.28-.12.1-.26.21-.42.14-.17-.08-.16-.26-.16-.41,0-.47,0-.94,0-1.41Z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="footer-right">
                <img class="footer-img" src="{{ asset('images/footer/logo.svg') }}" alt="логотип">
            </div>
        </div>
    </div>
</footer>
