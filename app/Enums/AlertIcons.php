<?php

namespace App\Enums;

enum AlertIcons: string
{
    case SUCCESS = '<svg xmlns="http://www.w3.org/2000/svg" id="_Слой_1" data-name="Слой 1"         viewBox="0 0 39.62 27.94" style=" width: 35px; height: 24px"><polyline points="1.5 14.24 14.4 26.44 38.12 1.5" style="fill: none; stroke: #77afaf; stroke-linecap: round; stroke-linejoin: round; stroke-width: 3px;"/></svg>';
    case ERROR = '<svg id="_Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.92 31.92" style=" width: 35px; height: 35px">
  <path d="M2.21,31.92c-.37,0-.74-.14-1.03-.41-.6-.57-.62-1.52-.05-2.12L28.62.47c.57-.6,1.52-.62,2.12-.05.6.57.62,1.52.05,2.12L3.29,31.45c-.29.31-.69.47-1.09.47Z" style="fill: #77afaf; stroke-width: 0px;"/>
  <path d="M30.42,31.21c-.37,0-.74-.14-1.03-.41L.47,3.29c-.6-.57-.62-1.52-.05-2.12.57-.6,1.52-.62,2.12-.05l28.92,27.5c.6.57.62,1.52.05,2.12-.29.31-.69.47-1.09.47Z" style="fill: #77afaf; stroke-width: 0px;"/>
</svg>';


    public static function getAlertIcons(): array
    {
        return [
            self::SUCCESS->value,
            self::ERROR->value,
        ];
    }
}
