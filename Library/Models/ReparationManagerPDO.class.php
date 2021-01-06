<?php

namespace Library\Models;

class ReparationManagerPDO extends ReparationManager
{
    public function outStock($piece, $quantite, $date, $vente)
    {
        $requete = $this->dao->prepare("INSERT INTO tblstockpieces (RefPieces,Quantite,Date,RefTypeOperation,RefVente) VALUES(:piece,:quantite,:date,2,:vente)");
        $requete->bindValue(':piece', $piece, \PDO::PARAM_STR);
        $requete->bindValue(':quantite', $quantite, \PDO::PARAM_STR);
        $requete->bindValue(':date', $date, \PDO::PARAM_STR);
        $requete->bindValue(':vente', $vente, \PDO::PARAM_STR);
        $requete->execute();
    }
    public function add($reparation)
    {
        if (!empty($reparation->postData('quantite'))) {
            $requeteVente = $this->dao->prepare("INSERT INTO tblvente(Date,Nom,Prenom,Telephone,RefStatut) VALUES(:date,:nom,:prenom,:telephone,1)");
            $requeteVente->bindValue(':date', date('Y-m-d'), \PDO::PARAM_STR);
            $requeteVente->bindValue(':nom', $reparation->postData('nom'), \PDO::PARAM_STR);
            $requeteVente->bindValue(':prenom', $reparation->postData('prenom'), \PDO::PARAM_STR);
            $requeteVente->bindValue(':telephone', $reparation->postData('telephone'), \PDO::PARAM_STR);
            $requeteVente->execute();
            $id_vente = $this->dao->lastInsertId();
            foreach ($reparation->postData('vente_pieces') as $piece) {
                $this->outStock($piece, $reparation->postData('quantite')[$piece], date('Y-m-d'), $id_vente);
            }
        }
        $requete = $this->dao->prepare("INSERT INTO tblreparation(Plaque,NomClient,PrenomClient,TelephoneClient,DescriptionProbleme,Montant,RefStatut,RefVente) VALUES(:plaque,:nom,:prenom,:telephone,:description,:montant,:statut,:RefVente)");
        $requete->bindValue(':plaque', $reparation->postData('plaque'), \PDO::PARAM_STR);
        $requete->bindValue(':nom', $reparation->postData('nom'), \PDO::PARAM_STR);
        $requete->bindValue(':prenom', $reparation->postData('prenom'), \PDO::PARAM_STR);
        $requete->bindValue(':telephone', $reparation->postData('telephone'), \PDO::PARAM_STR);
        $requete->bindValue(':description', $reparation->postData('description'), \PDO::PARAM_STR);
        $requete->bindValue(':montant', $reparation->postData('montant'), \PDO::PARAM_STR);
        $requete->bindValue(':statut', 1, \PDO::PARAM_STR);
        $requete->bindValue(':RefVente', $id_vente, \PDO::PARAM_STR);
        $requete->execute();
    }
    public function update($reparation)
    {
        $requete = $this->dao->prepare("UPDATE tblreparation SET Plaque=:plaque,NomClient=:nom,PrenomClient=:prenom,TelephoneClient=:telephone,DescriptionProbleme=:description,Montant=:montant WHERE RefReparation=:id");
        $requete->bindValue(':id', $reparation->getData('id'), \PDO::PARAM_STR);
        $requete->bindValue(':plaque', $reparation->postData('plaque'), \PDO::PARAM_STR);
        $requete->bindValue(':nom', $reparation->postData('nom'), \PDO::PARAM_STR);
        $requete->bindValue(':prenom', $reparation->postData('prenom'), \PDO::PARAM_STR);
        $requete->bindValue(':telephone', $reparation->postData('telephone'), \PDO::PARAM_STR);
        $requete->bindValue(':description', $reparation->postData('description'), \PDO::PARAM_STR);
        $requete->bindValue(':montant', $reparation->postData('montant'), \PDO::PARAM_STR);
        $requete->execute();
    }

    public function get($id)
    {
        $requete = $this->dao->prepare("SELECT * FROM tblreparation WHERE RefReparation=:id");
        $requete->bindValue(':id', $id, \PDO::PARAM_INT);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat;
    }

    public function delete($id)
    {
        $requete = $this->dao->prepare("DELETE FROM tblreparation WHERE RefReparation=:id");
        $requete->bindValue(':id', $id, \PDO::PARAM_INT);
        $requete->execute();
    }

    public function liste()
    {
        $requete = $this->dao->prepare("SELECT * FROM tblreparation INNER JOIN tblstatutreparation ON (tblreparation.RefStatut = tblstatutreparation.RefStatut)");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function listeReglee()
    {
        $requete = $this->dao->prepare("SELECT * FROM tblreparation INNER JOIN tblstatutreparation ON (tblreparation.RefStatut = tblstatutreparation.RefStatut) WHERE tblreparation.RefStatut=2");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function listeNonReglee()
    {
        $requete = $this->dao->prepare("SELECT * FROM tblreparation INNER JOIN tblstatutreparation ON (tblreparation.RefStatut = tblstatutreparation.RefStatut) WHERE tblreparation.RefStatut=1");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function setStatut($statut)
    {
        $requete = $this->dao->prepare("UPDATE tblreparation SET RefStatut=:statut,Rapport=:rapport WHERE RefReparation=:id");
        $requete->bindValue(':id', $statut->postData('id'), \PDO::PARAM_INT);
        $requete->bindValue(':statut', $statut->postData('statut'), \PDO::PARAM_INT);
        $requete->bindValue(':rapport', $statut->postData('rapport'), \PDO::PARAM_INT);
        $requete->execute();
    }
    public function countClient()
    {
        $requete = $this->dao->prepare("SELECT COUNT(DISTINCT Plaque) AS Nbre FROM tblreparation");
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat['Nbre'];
    }
    public function countFctreImp()
    {
        $requete = $this->dao->prepare("SELECT COUNT(*) AS Nbre FROM tblreparation WHERE RefStatut=1");
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat['Nbre'];
    }
}
