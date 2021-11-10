<?php
namespace Tools;

abstract class Mytwig{
    
    private static function getLoader() {
        
        $loader = new \Twig_Loader_Filesystem(PATH_VIEW); //Dossier contenant les templates
        //pas de cache en mode debug
        return new \Twig_Environment($loader, array(
            'cache' => false
        ));
    }
    
}
