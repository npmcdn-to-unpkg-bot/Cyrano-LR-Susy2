<?php
/*
 * Inclus la vue , ajoute une differenciation de variable
 * Si vide affiche le texte vide de la vue 
 * $viewname_dc1 = 'NOM_De_LA_VUE';
 * $viewdisplay_dc1 = $view->set_display('DISPLAY_CHOISI');
 * Si besoin d'argument, utiliser la ligne dédiée $args et l'ajouter comme ceci $view->preview($viewdisplay_dc1, $args)
 */

?>
<?php

$viewname_dc1 = 'Docs_contenu';
$view = views_get_view ($viewname_dc1);
$viewdisplay_dc1 = $view->set_display('block_1');
$args_dc1 = $view->set_arguments(array($node->nid));

$emptyTextVue = $view->set_display('block_1')->display_options['empty'];
$emptyText = $view->display_handler->set_option('empty','<div class="ma-classe">Pas de fichier à afficher.</div>');

//Exécution de le vue
$view->pre_execute();
$view->execute();

if (!empty($view->result)) {
  // S'il y a un resultat on récupère le titre (ajoute tag h3, et le contenu)
  $output = '<div id="liste-docs-admin"><h3 class="CLASSE">'.$view->get_title().'</h3>' .$view->preview($viewdisplay_dc1, $args_dc1).'</div>';

  //Affiche la vue si contenu
print $output;
}
//sinon affiche texte vide
elseif (empty($view->result)) {
    //Formatage du texte vide,ajout du titre de la vue
     $outputEmpty = '<div id="liste-docs-admin"><h3 class="CLASSE">'.$view->get_title().'</h3>' .$emptyText.'<br>'.$emptyTextVue.'</div>';
     //drupal_set_message('$EmptyTextVue : '.$emptyTextVue,'status');
     //Affichage du texte vide
  print $outputEmpty;
}


?>
