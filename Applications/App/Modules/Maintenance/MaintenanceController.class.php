<?php

namespace Applications\App\Modules\Maintenance;

class MaintenanceController extends \Library\BackController
{
    public function executeListe(\Library\HTTPRequest $request)
    {
        $this->page->addVar('titles', "Liste des maintenances");

        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Maintenance')->setStatut($request);
            $this->app()->httpResponse()->redirect('/Maintenance/liste');
        }

        $maintenances = $this->managers->getManagerOf('Maintenance')->liste();
        $this->page->addVar('maintenances', $maintenances);
    }
    public function executeAdd(\Library\HTTPRequest $request)
    {
        $this->page->addVar('titles', "Ajout d'une maintenance");

        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Maintenance')->add($request);
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Ajout réussie !';
            $_SESSION['message']['number'] = 2;
            $this->app()->httpResponse()->redirect('/Maintenance/liste');
        }
    }
    public function executeUpdate(\Library\HTTPRequest $request)
    {
        $this->page->addVar('titles', "Modification d'une maintenance");

        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Maintenance')->update($request);
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Modification réussie !';
            $_SESSION['message']['number'] = 2;
            $this->app()->httpResponse()->redirect('/Maintenance/liste');
        }

        $maintenance = $this->managers->getManagerOf('Maintenance')->get($request->getData('id'));
        $this->page->addVar('maintenance', $maintenance);
    }
    public function executeDelete(\Library\HTTPRequest $request)
    {
        $this->page->addVar('titles', "Suppression d'une maintenance");

        $this->managers->getManagerOf('Maintenance')->delete($request->getData('id'));
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Suppression réussie !';
        $_SESSION['message']['number'] = 2;
        $this->app()->httpResponse()->redirect('/Maintenance/liste');
    }
    public function executeFacture(\Library\HTTPRequest $request)
    {
        $this->page->setTemplate('invoice');
        $this->page->addVar('titles', "Facture de la maintenance");
        $maintenance = $this->managers->getManagerOf('Maintenance')->get($request->getData('id'));
        $this->page->addVar('maintenance', $maintenance);
    }
    public function executePrevues(\Library\HTTPRequest $request)
    {
        $this->page->addVar('titles', "Maintenances prévues");

        $maintenances = $this->managers->getManagerOf('Maintenance')->prevues();
        $this->page->addVar('maintenances', $maintenances);
    }
}