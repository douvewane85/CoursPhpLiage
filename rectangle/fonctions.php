<?php

      //Rectangle
       //UC
        //demi perimetre
        //perimetre
        //surface
        //diagonale

        //Alternance
           //R1-longueur doit etre superieur à la largeur
           //R2-longueur et  la largeur doivent etre des numériques
           //R3-longueur et  la largeur ne doivent pas etre vide
           //R4-longueur et  la largeur doivent etre  positives

//Fonctions de validation
//R3
function isVide($nbre){
    if(empty($nbre)){
       return true;
    }
       return false;
 }
//R2
function isNumerique($nbre){
 if(is_numeric($nbre)){
    return true;
 }
    return false;
}
//R4
function isPositif($nbre){
    if($nbre>0){
        return true;
    }
    return false;
}
//R1
function compare($longueur,$largeur){
    if($longueur>$largeur){
        return true;
    }
    return false;
}

//UC=>fonctionnalités demandées

//demi perimetre
function demi_perimetre($longueur,$largeur){
    return $longueur+$largeur;
}
        //perimetre
  function perimetre($longueur,$largeur){
    return demi_perimetre($longueur,$largeur)*2;
 }

//surface
function surface($longueur,$largeur){
    return $longueur*$largeur;
 }
//diagonale
function diagonale($longueur,$largeur){
    return sqrt(pow($longueur,2)+ pow($largeur,2));
 }



?>