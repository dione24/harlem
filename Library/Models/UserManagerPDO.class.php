<?php

namespace Library\Models;

use \Library\Entities\User;

class UserManagerPDO extends UserManager {

    public function login($login,$Password)
    {
        $requete = $this->dao->prepare("SELECT *  FROM tbleusers INNER JOIN tblestatut ON tblestatut.RefStatut=tbleusers.RefStatut WHERE login=:login");
        $requete->bindValue(':login',$login,\PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetch();
        if (password_verify($_POST['password'],$resultat['password'])) {
            return $resultat;
        }
    }
    public function add($user) {
        $requete = $this->dao->prepare("INSERT INTO tbleusers(login,password,NomUsers,PrenomUsers,EmailUsers,RefStatut) VALUES(:login,:password,:nom,:prenom,:email,:statut)");
        $requete->bindValue(':login',$user->postData('username'),\PDO::PARAM_STR);
        $requete->bindValue(':password',password_hash($user->postData('password'), PASSWORD_BCRYPT),\PDO::PARAM_STR);
        $requete->bindValue(':nom',$user->postData('nom'),\PDO::PARAM_STR);
        $requete->bindValue(':prenom',$user->postData('prenom'),\PDO::PARAM_STR);
        $requete->bindValue(':email',$user->postData('email'),\PDO::PARAM_STR);
        $requete->bindValue(':statut',$user->postData('statut'),\PDO::PARAM_STR);
        $requete->execute();
    }
    public function update($user)
    {
        $requete = $this->dao->prepare("UPDATE tbleusers SET login=:login,password=:password,NomUsers=:nom,PrenomUsers=:prenom,EmailUsers=:email,RefStatut=:statut WHERE RefUsers=:id");
        $requete->bindValue(':id',$user->getData('id'),\PDO::PARAM_INT);
        $requete->bindValue(':login',$user->postData('username'),\PDO::PARAM_STR);
        $requete->bindValue(':password',password_hash($user->postData('password'), PASSWORD_BCRYPT),\PDO::PARAM_STR);
        $requete->bindValue(':nom',$user->postData('nom'),\PDO::PARAM_STR);
        $requete->bindValue(':prenom',$user->postData('prenom'),\PDO::PARAM_STR);
        $requete->bindValue(':email',$user->postData('email'),\PDO::PARAM_STR);
        $requete->bindValue(':statut',$user->postData('statut'),\PDO::PARAM_STR);
        $requete->execute();
    }
    public function getListe()
    {
        $requete = $this->dao->prepare("SELECT * FROM tbleusers INNER JOIN tblestatut ON (tbleusers.RefStatut = tblestatut.RefStatut)");
        $requete->execute();
        $users = $requete->fetchAll();
        return $users;
    }
    public function get($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM tbleusers INNER JOIN tblestatut ON (tbleusers.RefStatut = tblestatut.RefStatut) WHERE tbleusers.RefUsers=:id');
        $requete->bindValue(':id', (int)$id,\PDO::PARAM_INT);
        $requete->execute();
        return $requete->fetch();
    }
    public function delete($id) {
        $requete = $this->dao->prepare("DELETE FROM tbleusers WHERE RefUsers=:id");
        $requete->bindValue(':id', (int)$id,\PDO::PARAM_INT);
        $requete->execute();
    }
    public function getStatuts() {
        $requete = $this->dao->prepare('SELECT * FROM tblestatut');
        $requete->execute();
        return $requete->fetchAll();
    }
    public function setUsername($id,$username)
    {
        $requete = $this->dao->prepare("UPDATE tbleusers SET login=:login WHERE RefUsers=:id");
        $requete->bindValue(':id',$id,\PDO::PARAM_INT);
        $requete->bindValue(':login',$username,\PDO::PARAM_STR);
        $requete->execute();
    }
    public function setPassword($id,$password) {
        $requete = $this->dao->prepare("UPDATE tbleusers SET password=:password WHERE RefUsers=:id");
        $requete->bindValue(':id',$id,\PDO::PARAM_INT);
        $requete->bindValue(':password',$password,\PDO::PARAM_STR);
        $requete->execute();
    }
}