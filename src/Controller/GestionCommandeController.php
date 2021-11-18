<?php
namespace APP\Controller;

use APP\Model\GestionCommandeModel;
use ReflectionClass;
use \Exception;

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
    
    /*public function CommandeClient(){
        $modele=new GestionCommandeModel();
        $commandes = $modele->findAll();
        $client = $modele->findAll()
        if ($commandes) {
            $r = new ReflectionClass($this);
            $vue = str_replace('Controller', 'View', $r->getShortName()) . "/commandeClient.html.twig";
            MyTwig::afficheVue($vue, array('tousCommandes' => $commandes));
        } else {
            throw new Exception("Aucun Client à afficher");
        }
        $params = array {
            'commandes' => $commandes,
            'Clients' => $client,
        }
        }
    }
     *
     */
}