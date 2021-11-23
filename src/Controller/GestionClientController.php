<?php
namespace APP\Controller;

use APP\Model\GestionClientModel;
use Tools\MyTwig;
use ReflectionClass;
use \Exception;
use APP\Entity\Client;
use Tools\Repository;

class GestionClientController {
    
    public function chercheUn($params) {
        //appel de la méthode find($id) de la classe Model adequate
        $repository= Repository::getRepository("APP\Entity\Client");
        $ids=$repository->findIds();
        $params['lesId']=$ids;
        if(array_key_exists('id', $params)) {
            $id= filter_var(intval($params["id"]), FILTER_VALIDATE_INT);
            $unClient = $repository->find($id);
            $params['unClient']=$unClient;
        }
        $r = new ReflectionClass($this);
        $vue = str_replace('Controller', 'View', $r->getShortName()) . "/unClient.html.twig";
        MyTwig::afficheVue($vue, $params);
    }
     public function chercheTous() {
        //appel de la méthode findAll() de la classe Model adequate
//        $repository= Repository::getRepository("APP\Entity\Client");
//        //$modele = new GestionClientModel();
//        $clients = $repository->findAll();
        $modele=new GestionClientModel();
        $clients = $modele->findAll();
        if ($clients) {
            $r = new ReflectionClass($this);
            $vue = str_replace('Controller', 'View', $r->getShortName()) . "/tousClients.html.twig";
            MyTwig::afficheVue($vue, array('tousClients' => $clients));
        } else {
            throw new Exception("Aucun Client à afficher");
        }
    }
    
    public function creerClient($params) {
        if(empty($params)){
            $vue = "GestionClientView\\creerClient.html.twig";
            MyTwig::afficheVue($vue, array());
        } else {
            $this->enregistreClient($params);
            $this->chercheTous();
        }
    }
    
    public function enregistreClient($params) {
        $client = new Client($params);
        $modele = new GestionClientModel();
        $modele->enregistreClient($client);
    }
}