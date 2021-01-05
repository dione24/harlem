<?php

namespace Library\Models;

class MaintenanceManagerPDO extends MaintenanceManager {
    public function add($maintenance) {
        $requete = $this->dao->prepare("INSERT INTO tblmaintenance(Plaque,Nom,Prenom,Telephone,Date,Prix,Description,RefStatut) VALUES(:plaque,:nom,:prenom,:telephone,:date,:prix,:description,1)");
        $requete->bindValue(':plaque',$maintenance->postData('plaque'),\PDO::PARAM_STR);
        $requete->bindValue(':nom',$maintenance->postData('nom'),\PDO::PARAM_STR);
        $requete->bindValue(':prenom',$maintenance->postData('prenom'),\PDO::PARAM_STR);
        $requete->bindValue(':telephone',$maintenance->postData('telephone'),\PDO::PARAM_STR);
        $requete->bindValue(':date',$maintenance->postData('date'),\PDO::PARAM_STR);
        $requete->bindValue(':prix',$maintenance->postData('prix'),\PDO::PARAM_STR);
        $requete->bindValue(':description',$maintenance->postData('description'),\PDO::PARAM_STR);
        $requete->execute();
    }
    public function update($maintenance) {
        $requete = $this->dao->prepare("UPDATE tblmaintenance SET Plaque=:plaque,Nom=:nom,Prenom=:prenom,Telephone=:telephone,Date=:date,Prix=:prix WHERE RefMaintenance=:id");
        $requete->bindValue(':id',$maintenance->getData('id'),\PDO::PARAM_STR);
        $requete->bindValue(':plaque',$maintenance->postData('plaque'),\PDO::PARAM_STR);
        $requete->bindValue(':nom',$maintenance->postData('nom'),\PDO::PARAM_STR);
        $requete->bindValue(':prenom',$maintenance->postData('prenom'),\PDO::PARAM_STR);
        $requete->bindValue(':telephone',$maintenance->postData('telephone'),\PDO::PARAM_STR);
        $requete->bindValue(':date',$maintenance->postData('date'),\PDO::PARAM_STR);
        $requete->bindValue(':prix',$maintenance->postData('prix'),\PDO::PARAM_STR);
        $requete->execute();
    }
    public function get($id){
        $requete = $this->dao->prepare("SELECT * FROM tblmaintenance WHERE RefMaintenance=:id");
        $requete->bindValue(':id',$id,\PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat;
    }
    public function delete($id){
        $requete = $this->dao->prepare("DELETE FROM tblmaintenance WHERE RefMaintenance=:id");
        $requete->bindValue(':id',$id,\PDO::PARAM_STR);
        $requete->execute();
    }
    public function liste(){
        $requete = $this->dao->prepare("SELECT * FROM tblmaintenance INNER JOIN tblstatutreparation ON (tblmaintenance.RefStatut = tblstatutreparation.RefStatut)");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function listeReglee() {
        $requete = $this->dao->prepare("SELECT * FROM tblmaintenance INNER JOIN tblstatutreparation ON (tblmaintenance.RefStatut = tblstatutreparation.RefStatut) WHERE tblmaintenance.RefStatut=2");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function listeNonReglee() {
        $requete = $this->dao->prepare("SELECT * FROM tblmaintenance INNER JOIN tblstatutreparation ON (tblmaintenance.RefStatut = tblstatutreparation.RefStatut) WHERE tblmaintenance.RefStatut=1");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function setStatut($statut) {
        $requete = $this->dao->prepare("UPDATE tblmaintenance SET RefStatut=:statut,Rapport=:rapport WHERE RefMaintenance=:id");
        $requete->bindValue(':id',$statut->postData('id'),\PDO::PARAM_STR);
        $requete->bindValue(':statut',$statut->postData('statut'),\PDO::PARAM_STR);
        $requete->bindValue(':rapport',$statut->postData('rapport'),\PDO::PARAM_STR);
        $requete->execute();
    }
    public function countClient() {
        $requete = $this->dao->prepare("SELECT COUNT(DISTINCT Plaque) AS Nbre FROM tblmaintenance");
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat['Nbre'];
    }
    public function nbreMtnPrevuMonth($mois,$annee) {
        $requete = $this->dao->prepare("SELECT COUNT(*) AS Nbre FROM tblmaintenance WHERE MONTH(Date)=:mois AND YEAR(Date)=:annee AND Date>=:date");
        $requete->bindValue(':mois',$mois,\PDO::PARAM_INT);
        $requete->bindValue(':annee',$annee,\PDO::PARAM_INT);
        $requete->bindValue(':date',date('Y-m-d'),\PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat['Nbre'];
    }
    public function countFctreImp() {
        $requete = $this->dao->prepare("SELECT COUNT(*) AS Nbre FROM tblmaintenance WHERE RefStatut=1");
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat['Nbre'];
    }
    public function prevues() {
        $requete = $this->dao->prepare("SELECT * FROM tblmaintenance INNER JOIN tblstatutreparation ON (tblmaintenance.RefStatut = tblstatutreparation.RefStatut) WHERE MONTH(tblmaintenance.Date)=:mois AND YEAR(tblmaintenance.Date)=:annee AND tblmaintenance.Date>=:date");
        $requete->bindValue(':mois',date('m'),\PDO::PARAM_INT);
        $requete->bindValue(':annee',date('Y'),\PDO::PARAM_INT);
        $requete->bindValue(':date',date('Y-m-d'),\PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
}