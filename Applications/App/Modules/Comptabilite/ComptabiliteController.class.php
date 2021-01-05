<?php
    namespace Applications\App\Modules\Comptabilite;

    class ComptabiliteController extends \Library\BackController {

        public function executeReglee(\Library\HTTPRequest $request) {
            $this->page->addVar('titles','Comptabilité | Liste des factures reglées');

            $maintenances = $this->managers->getManagerOf('Maintenance')->listeReglee();
            $this->page->addVar('maintenances',$maintenances);

            $reparations = $this->managers->getManagerOf('Reparation')->listeReglee();
            $this->page->addVar('reparations',$reparations);

            $ventes = $this->managers->getManagerOf('Pieces')->listeReglee();
            $this->page->addVar('ventes',$ventes);
        }
        public function executeNonReglee(\Library\HTTPRequest $request) {
            $this->page->addVar('titles','Comptabilité | Liste des factures non reglées');

            $maintenances = $this->managers->getManagerOf('Maintenance')->listeNonReglee();
            $this->page->addVar('maintenances',$maintenances);

            $reparations = $this->managers->getManagerOf('Reparation')->listeNonReglee();
            $this->page->addVar('reparations',$reparations);
        }
    }