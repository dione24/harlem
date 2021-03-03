<?php

namespace Library\Models;

class PiecesManagerPDO extends PiecesManager
{
    public function add($piece)
    {
        $requete = $this->dao->prepare("INSERT INTO tblpieces(NomPiece,Prix) VALUES(:nom,:prix)");
        $requete->bindValue(':nom', $piece->postData('nom_piece'), \PDO::PARAM_STR);
        $requete->bindValue(':prix', $piece->postData('prix'), \PDO::PARAM_STR);
        $requete->execute();

        $id_piece = $this->dao->lastInsertId();

        $requete = $this->dao->prepare("INSERT INTO tblstockpieces (RefPieces,Quantite,Date,RefTypeOperation) VALUES(:piece,:quantite,:date,1)");
        $requete->bindValue(':piece', $id_piece, \PDO::PARAM_STR);
        $requete->bindValue(':quantite', $piece->postData('quantite'), \PDO::PARAM_STR);
        $requete->bindValue(':date', date('Y-m-d'), \PDO::PARAM_STR);
        $requete->execute();
    }
    public function update($piece)
    {
        $requete = $this->dao->prepare("UPDATE tblpieces SET NomPiece=:nom,Prix=:prix WHERE RefPieces=:id");
        $requete->bindValue(':id', $piece->postData('id'), \PDO::PARAM_STR);
        $requete->bindValue(':nom', $piece->postData('nom_piece'), \PDO::PARAM_STR);
        $requete->bindValue(':prix', $piece->postData('prix'), \PDO::PARAM_STR);
        $requete->execute();
    }

    public function get($id)
    {
        $requete = $this->dao->prepare("SELECT * FROM tblpieces WHERE RefPieces=:id");
        $requete->bindValue(':id', $id, \PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat;
    }

    public function getVente($id)
    {
        $requete = $this->dao->prepare("SELECT * FROM tblvente WHERE RefVente=:id");
        $requete->bindValue(':id', $id, \PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat;
    }

    public function delete($id)
    {
        $requete = $this->dao->prepare("DELETE FROM tblpieces WHERE RefPieces=:id");
        $requete->bindValue(':id', $id, \PDO::PARAM_STR);
        $requete->execute();
    }

    public function liste()
    {
        $requete = $this->dao->prepare("SELECT tblpieces.*, SUM(tblstockpieces.Quantite) AS Qte FROM tblpieces LEFT JOIN tblstockpieces ON (tblpieces.RefPieces = tblstockpieces.RefPieces) WHERE tblstockpieces.RefTypeOperation=1 GROUP BY tblpieces.RefPieces");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function addStock($stock)
    {
        $requete = $this->dao->prepare("INSERT INTO tblstockpieces (RefPieces,Quantite,Date,RefTypeOperation) VALUES(:piece,:quantite,:date,1)");
        $requete->bindValue(':piece', $stock->postData('id_piece'), \PDO::PARAM_STR);
        $requete->bindValue(':quantite', $stock->postData('quantite'), \PDO::PARAM_STR);
        $requete->bindValue(':date', $stock->postData('date'), \PDO::PARAM_STR);
        $requete->execute();
    }
    public function outStock($piece, $quantite, $date, $vente)
    {
        $requete = $this->dao->prepare("INSERT INTO tblstockpieces (RefPieces,Quantite,Date,RefTypeOperation,RefVente) VALUES(:piece,:quantite,:date,2,:vente)");
        $requete->bindValue(':piece', $piece, \PDO::PARAM_STR);
        $requete->bindValue(':quantite', $quantite, \PDO::PARAM_STR);
        $requete->bindValue(':date', $date, \PDO::PARAM_STR);
        $requete->bindValue(':vente', $vente, \PDO::PARAM_STR);
        $requete->execute();
    }
    public function pieceStock($piece)
    {
        $requete = $this->dao->prepare("SELECT * FROM tblstockpieces WHERE RefPieces=:piece AND RefTypeOperation=1");
        $requete->bindValue(':piece', $piece, \PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function deleteStock($stock)
    {
        $requete = $this->dao->prepare("DELETE FROM tblstockpieces WHERE RefStock=:id");
        $requete->bindValue(':id', $stock, \PDO::PARAM_STR);
        $requete->execute();
    }
    public function quantiteRestante($piece)
    {
        $requete_in = $this->dao->prepare("SELECT RefTypeOperation,SUM(Quantite) AS QteEntree FROM tblstockpieces WHERE RefPieces=:id AND RefTypeOperation=1");
        $requete_in->bindValue(':id', $piece, \PDO::PARAM_STR);
        $requete_in->execute();
        $resultat_in = $requete_in->fetch();

        $requete_out = $this->dao->prepare("SELECT RefTypeOperation,SUM(Quantite) AS QteSortie FROM tblstockpieces WHERE RefPieces=:id AND RefTypeOperation=2");
        $requete_out->bindValue(':id', $piece, \PDO::PARAM_STR);
        $requete_out->execute();
        $resultat_out = $requete_out->fetch();
        return $resultat_in['QteEntree'] - $resultat_out['QteSortie'];
    }
    public function ventes()
    {
        $requete = $this->dao->prepare("SELECT tblvente.*,COUNT(tblstockpieces.RefVente) AS NbrePiece, SUM(tblstockpieces.Quantite*tblpieces.Prix) AS MontantTotal, tblstatutreparation.* FROM tblvente INNER JOIN tblstockpieces ON (tblvente.RefVente = tblstockpieces.RefVente) INNER JOIN tblpieces ON (tblstockpieces.RefPieces = tblpieces.RefPieces) INNER JOIN tblstatutreparation ON (tblvente.RefStatut = tblstatutreparation.RefStatut) WHERE tblstockpieces.RefTypeOperation=2 GROUP BY tblvente.RefVente");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function listeReglee()
    {
        $requete = $this->dao->prepare("SELECT tblvente.*,COUNT(tblstockpieces.RefVente) AS NbrePiece, SUM(tblstockpieces.Quantite*tblpieces.Prix) AS MontantTotal FROM tblvente INNER JOIN tblstockpieces ON (tblvente.RefVente = tblstockpieces.RefVente) INNER JOIN tblpieces ON (tblstockpieces.RefPieces = tblpieces.RefPieces) WHERE tblstockpieces.RefTypeOperation=2 AND tblvente.RefStatut=2 GROUP BY tblvente.RefVente");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function listeNonReglee()
    {
        $requete = $this->dao->prepare("SELECT tblvente.*,COUNT(tblstockpieces.RefVente) AS NbrePiece, SUM(tblstockpieces.Quantite*tblpieces.Prix) AS MontantTotal, tblstatutreparation.* FROM tblvente INNER JOIN tblstockpieces ON (tblvente.RefVente = tblstockpieces.RefVente) INNER JOIN tblpieces ON (tblstockpieces.RefPieces = tblpieces.RefPieces) INNER JOIN tblstatutreparation ON (tblvente.RefStatut = tblstatutreparation.RefStatut) WHERE tblvente.RefStatut=1 GROUP BY tblvente.RefVente");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function ventePieces($vente)
    {
        $requete = $this->dao->prepare("SELECT tblpieces.*, tblstockpieces.Quantite FROM tblpieces INNER JOIN tblstockpieces ON (tblpieces.RefPieces = tblstockpieces.RefPieces) INNER JOIN tblvente ON (tblstockpieces.RefVente = tblvente.RefVente) WHERE tblvente.RefVente=:id AND tblstockpieces.RefTypeOperation=2");
        $requete->bindValue(':id', $vente, \PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function RepVentePieces($reparation)
    {
        $requete = $this->dao->prepare("SELECT tblpieces.*, tblstockpieces.Quantite FROM tblpieces INNER JOIN tblstockpieces ON (tblpieces.RefPieces = tblstockpieces.RefPieces) INNER JOIN tblvente ON (tblstockpieces.RefVente = tblvente.RefVente) INNER JOIN tblreparation ON (tblvente.RefVente = tblreparation.RefVente) WHERE tblreparation.RefReparation=:id AND tblstockpieces.RefTypeOperation=2");
        $requete->bindValue(':id', $reparation, \PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function addVente($vente)
    {
        $requete = $this->dao->prepare("INSERT INTO tblvente(Date,Nom,Prenom,Telephone,RefStatut) VALUES(:date,:nom,:prenom,:telephone,1)");
        $requete->bindValue(':date', $vente->postData('date'), \PDO::PARAM_STR);
        $requete->bindValue(':nom', $vente->postData('nom'), \PDO::PARAM_STR);
        $requete->bindValue(':prenom', $vente->postData('prenom'), \PDO::PARAM_STR);
        $requete->bindValue(':telephone', $vente->postData('telephone'), \PDO::PARAM_STR);
        $requete->execute();
        $id_vente = $this->dao->lastInsertId();
        foreach ($vente->postData('vente_pieces') as $piece) {
            $this->outStock($piece, $vente->postData('quantite')[$piece], $vente->postData('date'), $id_vente);
        }
        return $id_vente;
    }
    public function updateVente($vente)
    {
        $requete = $this->dao->prepare("UPDATE tblvente SET Date=:date,Nom=:nom,Prenom=:prenom,Telephone=:telephone WHERE RefVente=:id");
        $requete->bindValue(':id', $vente->getData('id'), \PDO::PARAM_STR);
        $requete->bindValue(':date', $vente->postData('date'), \PDO::PARAM_STR);
        $requete->bindValue(':nom', $vente->postData('nom'), \PDO::PARAM_STR);
        $requete->bindValue(':prenom', $vente->postData('prenom'), \PDO::PARAM_STR);
        $requete->bindValue(':telephone', $vente->postData('telephone'), \PDO::PARAM_STR);
        $requete->execute();
        $id_vente = $vente->getData('id');

        $m_requete = $this->dao->prepare("DELETE FROM tblstockpieces WHERE RefVente=:id");
        $m_requete->bindValue(':id', $vente->getData('id'), \PDO::PARAM_STR);
        $m_requete->execute();

        foreach ($vente->postData('vente_pieces') as $piece) {
            $this->outStock($piece, $vente->postData('quantite')[$piece], $vente->postData('date'), $id_vente);
        }
    }
    public function deleteVente($id)
    {
        $requete = $this->dao->prepare("DELETE FROM tblvente WHERE RefVente=:id");
        $requete->bindValue(':id', $id, \PDO::PARAM_STR);
        $requete->execute();
    }
    public function countClient()
    {
        $requete = $this->dao->prepare("SELECT COUNT(DISTINCT Telephone) AS Nbre FROM tblvente");
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat['Nbre'];
    }
    public function qtePiecesMonth($mois, $annee)
    {
        $requete = $this->dao->prepare("SELECT SUM(tblstockpieces.Quantite) AS Nbre FROM tblvente INNER JOIN tblstockpieces ON (tblvente.RefVente = tblstockpieces.RefVente) WHERE tblstockpieces.RefTypeOperation=2 AND MONTH(tblvente.Date)=:mois AND YEAR(tblvente.Date)=:annee");
        $requete->bindValue(':mois', $mois, \PDO::PARAM_STR);
        $requete->bindValue(':annee', $annee, \PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat['Nbre'];
    }
    public function setStatut($statut)
    {
        $requete = $this->dao->prepare("UPDATE tblvente SET RefStatut=:statut WHERE RefVente=:id");
        $requete->bindValue(':id', $statut->postData('id'), \PDO::PARAM_STR);
        $requete->bindValue(':statut', $statut->postData('statut'), \PDO::PARAM_STR);
        $requete->execute();
    }
    public function countFctreImp()
    {
        $requete = $this->dao->prepare("SELECT COUNT(*) AS Nbre FROM tblvente WHERE RefStatut=1");
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat['Nbre'];
    }

    public function GetListeVente($id)
    {
        $requete = $this->dao->prepare("SELECT * FROM tblvente INNER JOIN tblstockpieces ON tblstockpieces.RefVente=tblvente.RefVente INNER JOIN tblpieces ON tblpieces.RefPieces=tblstockpieces.RefPieces WHERE tblvente.RefVente=:id");
        $requete->bindValue(':id', $id, \PDO::PARAM_INT);
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
}