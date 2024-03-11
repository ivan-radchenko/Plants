<?php

namespace App\Enums;

enum AlertIcons: string
{
    case SUCCESS = '<svg xmlns="http://www.w3.org/2000/svg" id="_Слой_1" data-name="Слой 1"         viewBox="0 0 39.62 27.94" style=" width: 35px; height: 24px"><polyline points="1.5 14.24 14.4 26.44 38.12 1.5" style="fill: none; stroke: #77afaf; stroke-linecap: round; stroke-linejoin: round; stroke-width: 3px;"/></svg>';
    case ERROR = '<svg width="35px" height="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"/>
<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
<g id="SVGRepo_iconCarrier"> <path d="M12 9V14" stroke="#db0909" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path d="M12.0001 21.41H5.94005C2.47005 21.41 1.02005 18.93 2.70005 15.9L5.82006 10.28L8.76006 5.00003C10.5401 1.79003 13.4601 1.79003 15.2401 5.00003L18.1801 10.29L21.3001 15.91C22.9801 18.94 21.5201 21.42 18.0601 21.42H12.0001V21.41Z" stroke="#db0909" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path d="M11.9945 17H12.0035" stroke="#db0909" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>
</svg>';


    public static function getAlertIcons(): array
    {
        return [
            self::SUCCESS->value,
            self::ERROR->value,
        ];
    }
}
