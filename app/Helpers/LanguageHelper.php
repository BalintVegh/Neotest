<?php

namespace App\Helpers;


use Illuminate\Support\Facades\App;

class LanguageHelper
{
    CONST DATATABLES_EN = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json";
    CONST DATATABLES_HU = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Hungarian.json";

    public static function getDatatablesLang(){
        $datatablesLang = self::DATATABLES_EN;
        switch (App::getLocale()){
            case "hu": $datatablesLang = self::DATATABLES_HU;  break;
        }
        return $datatablesLang;
    }
}