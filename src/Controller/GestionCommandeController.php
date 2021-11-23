<?php
namespace APP\Controller;

use APP\Model\GestionCommandeModel;
use APP\Model\GestionClientModel;
use ReflectionClass;
use \Exception;
use Tools\MyTwig;

class GestionCommandeController {
    
    public function chercheUne($params) {
        //appel de la méthode find($id) de la classe Model adéquate
        $modele = new GestionCommandeModel();
        $id = filter_var(intval($params["id"]), FILTER_VALIDATE_INT);
        $uneCommande = $modele->find($id);
        if ($uneCommande) {
            $r = new ReflectionClass($this);
            include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/uneCommande.php";
        } else {
            throw new Exception("Commande " . $id . "inconnue");
        }
    }
    public function chercheToutes() {
        //appel de la méthode findAll() de la classe Model adequate
        $modele = new GestionCommandeModel();
        $commandes = $modele->findAll();
        if ($commandes) {
            $r = new ReflectionClass($this);
            include_once PATH_VIEW . str_replace('Controller', 'View', $r->getShortName()) . "/plusieursCommande.php";
        } else {
            throw new Exception("Aucune Commande à afficher");
        }
    }
    
    public function commandesUnClient($idClient) {
        //$idClient = filter_var(intval($idClient['Id']), FILTER_VALIDATE_INT);
        $modele = new GestionCommandeModel();
        $modeleClient = new GestionClientModel();
        $commandes = $modele->findAllByIdClient($idClient['id']);
        $client = $modeleClient->find($idClient['id']);
        $r = new ReflectionClass($this);
        $vue = str_replace('Controller', 'View', $r->getShortName()) . "/commandeClient.html.twig";
        $params = array(
            'commandes' => $commandes,
            'client' => $client
        );
        MyTwig::afficheVue($vue, $params);
    }

}