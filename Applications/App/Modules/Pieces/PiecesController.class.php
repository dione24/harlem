<?php

namespace Applications\App\Modules\Pieces;

class PiecesController extends \Library\BackController
{
    public function executeListe(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Liste des Pièces");
        if ($request->method() == 'POST' && isset($_POST['id'])) {
            $this->managers->getManagerOf('Pieces')->update($request);
            $this->app()->httpResponse()->redirect('/Pieces/liste');
        } elseif ($request->method() == 'POST' && isset($_POST['id_piece'])) {
            $this->managers->getManagerOf('Pieces')->addStock($request);
            $this->app()->httpResponse()->redirect('/Pieces/liste');
        } elseif ($request->method() == 'POST') {
            $this->managers->getManagerOf('Pieces')->add($request);
            $this->app()->httpResponse()->redirect('/Pieces/liste');
        } else {
            $pieces = $this->managers->getManagerOf('Pieces')->liste();
            foreach ($pieces as $key => $piece) {
                $pieces[$key]['stock'] = $this->managers->getManagerOf('Pieces')->pieceStock($piece['RefPieces']);
                $pieces[$key]['QteRestante'] = $this->managers->getManagerOf('Pieces')->quantiteRestante($piece['RefPieces']);
            }
            $this->page->addVar("pieces", $pieces);
        }
    }
    public function executeDelete(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Suppression d'une pièce");
        $this->managers->getManagerOf('Pieces')->delete($request->getData('id'));
        $this->app()->httpResponse()->redirect('/Pieces/liste');
    }
    public function executeVente(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Vente de Pieces");

        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Pieces')->setStatut($request);
        }

        $ventes = $this->managers->getManagerOf('Pieces')->ventes();
        foreach ($ventes as $key => $vente) {
            $ventes[$key]['pieces'] = $this->managers->getManagerOf('Pieces')->ventePieces($vente['RefVente']);
        }
        $this->page->addVar("ventes", $ventes);
    }
    public function executeDeleteStock(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Suppression du stock d'une pièce");

        $this->managers->getManagerOf('Pieces')->deleteStock($request->getData('id'));
        $this->app()->httpResponse()->redirect('/Pieces/liste');
    }
    public function executeAddVente(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajout d'une vente de pièce");

        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Pieces')->addVente($request);
            $this->app()->httpResponse()->redirect('/Pieces/vente/liste');
        }
        $pieces = $this->managers->getManagerOf('Pieces')->liste();
        $this->page->addVar("pieces", $pieces);
    }
    public function executeUpdateVente(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Modification d'une vente de pièce");

        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Pieces')->updateVente($request);
            //$this->app()->httpResponse()->redirect('/Pieces/vente/liste');  
        }

        $vente = $this->managers->getManagerOf('Pieces')->getVente($request->getData('id'));
        $this->page->addVar("vente", $vente);

        $vente_pieces = $this->managers->getManagerOf('Pieces')->ventePieces($request->getData('id'));
        $v_pieces = [];
        foreach ($vente_pieces as $piece) {
            $v_pieces[] = $piece['RefPieces'];
        }
        $this->page->addVar("v_pieces", $v_pieces);
        $this->page->addVar("vente_pieces", $vente_pieces);

        $pieces = $this->managers->getManagerOf('Pieces')->liste();
        $this->page->addVar("pieces", $pieces);
    }
    public function executeGetPieces(\Library\HTTPRequest $request)
    {
        $this->page->setTemplate('json');
        $piece = $this->managers->getManagerOf('Pieces')->get($request->getData('id'));
        $piece['QteRestante'] = $this->managers->getManagerOf('Pieces')->quantiteRestante($piece['RefPieces']);
        $this->page->addVar("piece", $piece);
    }
    public function executeDeleteVente(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Suppression d'une vente de pièce");

        $this->managers->getManagerOf('Pieces')->deleteVente($request->getData('id'));
        $this->app()->httpResponse()->redirect('/Pieces/vente/liste');
    }
    public function executeFacture(\Library\HTTPRequest $request)
    {
        $this->page->setTemplate('invoice');
        $this->page->addVar('titles', "Facture de la Vente");
        $InfoVente = $this->managers->getManagerOf('Pieces')->GetVente($request->getData('id'));
        $this->page->addVar('InfoVente', $InfoVente);
        $vente = $this->managers->getManagerOf('Pieces')->GetListeVente($request->getData('id'));
        $this->page->addVar('vente', $vente);
    }
}