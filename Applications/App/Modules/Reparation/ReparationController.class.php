<?php

namespace Applications\App\Modules\Reparation;

class ReparationController extends \Library\BackController
{
    public function executeIndex(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Accueil");

        $nbre_client['reparation'] = $this->managers->getManagerOf('Reparation')->countClient();
        $nbre_client['maintenance'] = $this->managers->getManagerOf('Maintenance')->countClient();
        $nbre_client['vente'] = $this->managers->getManagerOf('Pieces')->countClient();
        $nbre_client['somme'] = $nbre_client['reparation'] + $nbre_client['maintenance'] + $nbre_client['vente'];

        $qte_pieces = $this->managers->getManagerOf('Pieces')->qtePiecesMonth(date('m'), date('Y'));

        $nbre_mtn = $this->managers->getManagerOf('Maintenance')->nbreMtnPrevuMonth(date('m'), date('Y'));

        $nbre_fctr_imp['reparation'] = $this->managers->getManagerOf('Reparation')->countFctreImp();
        $nbre_fctr_imp['maintenance'] = $this->managers->getManagerOf('Maintenance')->countFctreImp();
        $nbre_fctr_imp['vente'] = $this->managers->getManagerOf('Pieces')->countFctreImp();
        $nbre_fctr_imp['somme'] = $nbre_fctr_imp['reparation'] + $nbre_fctr_imp['maintenance'] + $nbre_fctr_imp['vente'];

        $this->page->addVar("nbre_client", $nbre_client['somme']);
        $this->page->addVar("qte_pieces", $qte_pieces);
        $this->page->addVar("nbre_mtn", $nbre_mtn);
        $this->page->addVar('nbre_fctr_imp', $nbre_fctr_imp['somme']);
    }
    public function executeAdd(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Nouvelle Reparation"); // Titre de la page

        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Reparation')->add($request);
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Ajout réussie !';
            $_SESSION['message']['number'] = 2;
            $this->app()->httpResponse()->redirect('/Reparation/liste');
        }
        $pieces = $this->managers->getManagerOf('Pieces')->liste();
        $this->page->addVar('pieces', $pieces);
    }
    public function executeUpdate(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Modification Reparation"); // Titre de la page

        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Reparation')->update($request);
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Modification réussie !';
            $_SESSION['message']['number'] = 2;
            $this->app()->httpResponse()->redirect('/Reparation/liste');
        } else {
            $vente_pieces = $this->managers->getManagerOf('Pieces')->RepVentePieces($request->getData('id'));

            $v_pieces = [];
            foreach ($vente_pieces as $piece) {
                $v_pieces[] = $piece['RefPieces'];
            }
            $this->page->addVar("vente_pieces", $vente_pieces);
            $this->page->addVar("v_pieces", $v_pieces);

            $reparation = $this->managers->getManagerOf('Reparation')->get($request->getData('id'));
            $this->page->addVar("reparation", $reparation);

            $pieces = $this->managers->getManagerOf('Pieces')->liste();
            $this->page->addVar('pieces', $pieces);
        }
    }
    public function executeListe(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Liste des Voitures en Reparations");

        if ($request->method() == 'POST') {
            $reparations = $this->managers->getManagerOf('Reparation')->setStatut($request);
            $this->app()->httpResponse()->redirect('/Reparation/liste');
        }
        $reparations = $this->managers->getManagerOf('Reparation')->liste();
        $this->page->addVar("reparations", $reparations);
    }
    public function executeDelete(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Suppression réparation");

        $this->managers->getManagerOf('Reparation')->delete($request->getData('id'));
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Suppression réussie !';
        $_SESSION['message']['number'] = 2;
        $this->app()->httpResponse()->redirect('/Reparation/liste');
    }
    public function executeFacture(\Library\HTTPRequest $request)
    {
        $this->page->setTemplate('invoice');
        $this->page->addVar("titles", "Facture de la réparation");

        $reparation = $this->managers->getManagerOf('Reparation')->get($request->getData('id'));
        $this->page->addVar('reparation', $reparation);

        $pieces = $this->managers->getManagerOf('Pieces')->ventePieces($reparation['RefVente']);
        $this->page->addVar('pieces', $pieces);
    }
}