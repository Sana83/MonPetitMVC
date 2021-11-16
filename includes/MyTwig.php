<?php
namespace Tools;

abstract class MyTwig {
    
    private static function getLoader() {
        
        $loader = new \Twig_Loader_Filesystem(PATH_VIEW); // Dossier contenant les templates
        // pas de cache en mode debug
        return new \Twig_Environment($loader, array(
            'cache' => false
        ));
    }
    
    public static function afficheVue($vue, $params) {
        $twig = self::getLoader();
        
        $template = $twig->loadTemplate($vue);
        echo $template->render($params);
    }
}