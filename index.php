<?php

//je crée une session ou reprend celle en cours
session_start();

//----outils de debug-------------------------
var_dump($_GET);
var_dump($_POST);
var_dump($_FILES);
var_dump($_SESSION);



// toutes les requêtes passent par l'index
//j'appelle mon dossier general.php
require_once"conf/general.php";

//je definis ma fonction home() avant de construire mon router
//puis je m'assure que ma page demandée ait toujours une valeur valide(sinon //redirection accueil)
$page=(isset($_GET['page']))? $_GET['page']:'home';

//je mets mon router en place:
switch ($page) {
  case 'home':home();//affichage
        break;
         case 'house':house();//affichage
        break;
     
  default: home();//redirection
}

/*-----------fonctions de contrôle-------------------------*/

function home(){

    global $content;
    
    //$obj_Accueil = new Accueil();
   // $datas = $obj_Accueil->selectAll();
    
    $content['class']='Home';
    $content['method']='render';
   // $content['arg']= $datas;
    //menu();
}

function house(){
           global $content;
    //je définis un objet annonce ainsi qu'un objet catégorie
    $obj_House = new House();
    $objet_Categorie= new Categorie();
    /µici je dois donner des noms à mes catégories pour en insérer une
     $datas =$objet_Categorie->selectAll();*/
         $content['method']='render';
    }
    $content['class']='ViewMum';
    $content['arg']= $datas;
}
require_once('views/template_base.php');

