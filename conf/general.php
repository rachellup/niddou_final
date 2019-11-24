<?php


//Je définis mes variables et je récupère la base de données
define ('DATABASE','mysql:host=localhost;dbname=niddou;charset=utf8');
define ('LOGIN','root');
define ('PASSWD','');   


//Je definis la securité des id
define ('SALT', uniqid(). uniqid());
/*Fonction d'autoload permet le chargement automatique des classes appelées*/

spl_autoload_register(function($class){
    if(file_exists('models/'.$class.'.class.php')){
        require_once 'models/'.$class.'.class.php';
    } elseif(file_exists('views/'.$class.'.class.php')){
        require_once 'views/'.$class.'.class.php';
    }
});


/* Fonctions filtres*/

function strip_xss(&$value) {
    
  // Teste si $value est un tableau
  if (is_array($value)) {
    // Si $val est un tableau, on réapplique la fonction strip_xss()
    array_walk($value, 'strip_xss');
  } else if (is_string($value)) {
    // Si $val est une string, on filtre avec strip_tags(), on peut également permettre de conserver certaines balises
    $value = strip_tags($value, '<strong><em>');
  }
}

function chg_entities(&$value) {
    
  if (is_array($value)) {
    array_walk($value, 'strip_xss');
  } else if (is_string($value)) {
    // Si $val est une string, on change les caractères critiques en entités HTML (non-interprétables par le navigateur) 
    $value = htmlentities($value);
  }
}

function makeToken($value){
            return sha1($value.SALT);   
        }
// Fonction de vérification d'intégrité (token)
//le token est crée dans le formulaire qui a un champ hidden
//retourne un boléan donc faire un $verif dans fonction de contrôle (ici insert_annonce)
function checkToken($value){
    return(isset($_SESSION['token'])&&$_SESSION['token']==$value);
}

// 5. Fonctionnalités liées à l'upload d'images

function upload($file) {
    // Découpe $file['name'] en tableau avec comme séparateur le point
    $tab = explode('.', $file['name']);

    // Transforme les caractères accentués en entités HTML
    $fichier = htmlentities($tab[0], ENT_NOQUOTES);

    // Remplace les entités HTML pour avoir juste le premier caractère non accentués
    $fichier = preg_replace('#&([A-za-z])(?:acute|grave|circ|uml|tilde|ring|cedil|lig|orn|slash|th|eg);#', '$1', $fichier);

    // Elimination des caractères non alphanumériques
    $fichier = preg_replace('#\W#', '', $fichier);

    // Troncation du nom de fichier à 25 caractères
    $fichier = substr($fichier, 0, 25);

    // Choix du format d'image
    switch(exif_imagetype($file['tmp_name'])) {
        case IMAGETYPE_GIF  : $format = '.gif'; break;
        case IMAGETYPE_JPEG : $format = '.jpg'; break;
        case IMAGETYPE_PNG  : $format = '.png'; break;
    }

    // Ajout du time devant le fichier pour obtenir un fichier unique
    $fichier = time() . '_' . $fichier . $format;
    
    return $fichier;
 
} //------ upload($file)

function set_image() {
    
    /* $_FILES = tabarray :
     * $_FILES['img']['name'] -> nom du fichier initial
     * $_FILES['img']['type'] -> type mime
     * $_FILES['img']['tmp_name'] -> chemin du fichier temporaire
     * $_FILES['img']['error'] -> s'il y a une erreur, à gérer!
     * $_FILES['img']['size'] -> taille du fichier */
    
    /* Récupère les nouveaux noms de fichiers après traitement par la fonction upload() : */
    $filename_new = upload($_FILES['image']);
    /* Redimensionne les images par la fonction img_resize() : */
    $img_new = img_resize($_FILES['image']['tmp_name'], 450, 450);
    
    /* Génère l'image fullsize $fullsizeimage_new vers le fichier $filename_new en fonction de son mime : */
    switch ($_FILES['image']['type']) {
        case 'image/png'  : imagepng($img_new, realpath('img').'/'. $filename_new, 0);  break;// 0 == compression minimum
        case 'image/jpeg' : echo "okop"; imagejpeg($img_new, realpath('img').'/'. $filename_new, 100); break;// 100 == compression maximum
        case 'image/gif'  : imagegif($img_new, realpath('img').'/'. $filename_new);  break;
    }/*-- finswitch */
    
    /* Ajoute au tableau $_POST la clef ['IMG'] avec le nom du fichier pour insertion dans la base */
    $_POST['image'] = $filename_new;
 
    
}/*-- set_image() */

function img_resize(&$file, $width_new, $height_new) {
    
    // Retourne les dimensions et le mime à partir du fichier image
    $tab = getimagesize($file);
    $width_old = $tab[0];
    $height_old = $tab[1];
    $mime_old = $tab['mime'];
    
    // Ratio pour la mise à l'échelle
    $ratio = $width_old / $height_old;

    // Redimensionnement suivant le ratio (adaption horizontale ou verticale du ratio)
    if ($width_new / $height_new > $ratio) {
        $width_new = $height_new * $ratio;
    } else {
        $height_new = $width_new / $ratio;
    }
    
    // Nouvelle image redimensionnée
    $image_new = imagecreatetruecolor($width_new, $height_new);
    

    // Création d'une image à partir du fichier image et suivant le mime
    switch ($mime_old) {
        case 'image/png' :  $image_old = imagecreatefrompng($file); break;
        case 'image/jpeg' : $image_old = imagecreatefromjpeg($file); break;
        case 'image/gif' :  $image_old = imagecreatefromgif($file); break;
    }
  
    // Copie et redimensionne l'ancienne image dans la nouvelle
    imagecopyresampled($image_new, $image_old, 0, 0, 0, 0, $width_new, $height_new, $width_old, $height_old);

    // Retourne la nouvelle image redimensionnée (Attention ce n'est pas un fichier mais une image)
    return $image_new;

} //----- img_resize($file, $width_new, $height_new)