<?php

class Erreur extends Controller{

    public function showMessage($smsError){
        die($smsError);
    }

}