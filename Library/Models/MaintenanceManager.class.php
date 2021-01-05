<?php

namespace Library\Models;

abstract class MaintenanceManager extends \Library\Manager {
    abstract public function add($reparation);

    abstract public function update($reparation);

    abstract public function delete($id);

    abstract public function get($id);

    abstract public function liste();
}
