<?php

class Controller{
    protected $validator;
    protected $view;
    protected $folder_view;
    protected $layout;
    //Variable qui permet stocker les données à afficher dans les vues
    protected $data_view=[];
    //Ecriture et l'execution des requetes
    protected $manager;

    //  Afficher une vue
    public function render(){
        ob_start();
        //Inclusion des données du Controller vers la vue
        extract($this->data_view);
        require_once('views/'.$this->folder_view.'/'.$this->view.'.php');
        $content_for_layout=ob_get_clean();
        require_once('views/layout/'.$this->layout.'.php');
       }
}