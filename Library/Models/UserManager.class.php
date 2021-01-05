<?php

namespace Library\Models;

use \Library\Entities\User;

abstract class UserManager extends \Library\Manager
{
    abstract protected function add($user);

    abstract protected function update($user);

    abstract public function login($Login, $Password);

    abstract public function delete($id);

    abstract public function get($id);

    abstract public function getListe();

    public function save($user)
    {
        if ($User->isValid()) {
            $User->isNew() ? $this->add($User) : $this->modify($User);
        } else {
            throw new \RuntimeException('Le Articleaire doit être valide pour être enregistrer');
        }
    }
}
