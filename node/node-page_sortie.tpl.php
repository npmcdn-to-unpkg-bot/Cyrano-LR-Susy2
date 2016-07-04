<?php
/* Ce template permet la création d'un layout multicolonne pour les pages de base, en permettant la disposition facile
 * des champs CCK custom, si nécessaires pour une page de base.
*/?>
<!--______________NODE TPL POUR CONTENU SORTIE.TPL CUSTOM________________ -->
<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
    <div class="node-inner">
        <!--______________COLONNE 1________________ -->
      
        <div id="colonne-1" class="col1_layout_3_9 contenu-vdl">
            <?php if ($title): /*copier le titre dans la colonne desirée*/?>
            <h1 class="titre-vdl"><?php print $title; ?></h1>
            <?php endif; ?>
        
              <?php
           global $theme_path;
              include ($theme_path.'/includes/regions_inc/inc_region_col_1.php');
              ?>
        </div>
        <!--______________COLONNE 2________________ -->
         <!-- <pre> <?php //print_r($node); ?> </pre>-->   <!-- listage des variables du $content -->
        <div id="colonne-2" class="col2_layout_3_9 contenu-vdl">

            <?php print $picture; ?>

            <?php if ($submitted): ?>
            <span class="submitted"><?php print $submitted; ?></span>
            <?php endif; ?>

            <div class="content">
                <?php   print $node->content['body']['#value'];/*déplacer le contenu dans la colonne désirée*/ ?>
                
                        <?php if ($node->field_service_tiers[0]['view']): ?>
            <div class="services-tiers">
                    <?php  print $node->field_service_tiers[0]['view']  ?>
            </div>
            <?php endif;?>
                    <?php if ($node->field_choix_galerie_vdl[0]['view']): ?>
            <div class="galerie-vdl">
                    <?php  print $node->field_choix_galerie_vdl[0]['view']  ?>
            </div>
            <?php endif;?>
                
            </div>
    <?php
           global $theme_path;
              include ($theme_path.'/includes/regions_inc/inc_region_col_2.php');
              ?>
            
        <?php if ($terms): ?>
        <div class="taxonomy"><?php //print $terms; ?></div>
        <?php endif;?>

        <?php if ($links): ?>
        <div class="links"> <?php //print $links; ?></div>
        <?php endif; ?>
        </div>

   

    </div> <!-- /node-inner -->
</div> <!-- /node-->