<?php
$connexion = \Library\DBFactory::MySQLPDO();
function nbreMaintenanceDans4J($connexion)
{
  $requeteMaintenance = $connexion->prepare("SELECT * FROM tblmaintenance INNER JOIN tblstatutreparation ON (tblmaintenance.RefStatut = tblstatutreparation.RefStatut) WHERE tblmaintenance.Date>=:today AND tblmaintenance.Date<=:plus4 AND tblmaintenance.RefStatut=1");
  $requeteMaintenance->bindValue(':today', date('Y-m-d'), \PDO::PARAM_INT);
  $requeteMaintenance->bindValue(':plus4', date('Y-m-d', strtotime(date('Y-m-d') . ' + 4 days')), \PDO::PARAM_INT);
  $requeteMaintenance->execute();
  $resultatMaintenance = $requeteMaintenance->fetchAll();
  return $resultatMaintenance;
}
function countFctreImpReparation($connexion)
{
  $requete = $connexion->prepare("SELECT COUNT(*) AS Nbre FROM tblreparation WHERE RefStatut=1");
  $requete->execute();
  $resultat = $requete->fetch();
  return $resultat['Nbre'];
}
function countFctreImpMaintenance($connexion)
{
  $requete = $connexion->prepare("SELECT COUNT(*) AS Nbre FROM tblmaintenance WHERE RefStatut=1");
  $requete->execute();
  $resultat = $requete->fetch();
  return $resultat['Nbre'];
}
function countFctreImpVente($connexion)
{
  $requete = $connexion->prepare("SELECT COUNT(*) AS Nbre FROM tblvente WHERE RefStatut=1");
  $requete->execute();
  $resultat = $requete->fetch();
  return $resultat['Nbre'];
}
$countFctreImp = countFctreImpReparation($connexion) + countFctreImpMaintenance($connexion) + countFctreImpVente($connexion);
$resultatMaintenance = nbreMaintenanceDans4J($connexion);