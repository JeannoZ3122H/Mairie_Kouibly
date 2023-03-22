<?php

namespace App\Services;


class Alert_message 
{
    public static function isNbreCopie(){
        return toast('Le champ nombre de copie est obligatoire', 'error');
    }

    public static function success(){
        return toast('Opération éffectuée', 'success');
    }

    public static function isProcessing(){
        return toast('Document mit en traîtement', 'success');
    }

    public static function isProcessingterm(){
        return toast('Le document a éte traité', 'success');
    }

    public static function toast_warning(){
        return toast('Opération échouée', 'warning');
    }


    public static function isExtraitRequired(){
        return toast('Les champs sont obligatoires', 'error');
    }

    public static function isEmailRequired(){
        return toast('Les champs sont obligatoires', 'error');
    }

    public static function isNumberRequired(){
        return toast('Les champs sont obligatoiress', 'error');
    }

    public static function isError(){
        return toast('Les champs sont obligatoires', 'error','bottom-right');
    }
}