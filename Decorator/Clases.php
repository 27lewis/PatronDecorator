<?php

interface Vendible {
    public function getDescripcion();
    public function getPrecio();
}

abstract class Helado implements Vendible {
    public $sabor;
}

class ConoSencillo extends Helado {
    public function getDescripcion() {
        return "Cono Sencillo";
    }

    public function getPrecio() {
        return 2000;
    }
}

class ConoDoble extends Helado {
    public function getDescripcion() {
        return "Cono Doble";
    }

    public function getPrecio() {
        return 4000;
    }
}

abstract class HeladoDecorator implements Vendible {
    public $vendible;

    public function __construct($vendible) {
        $this->vendible = $vendible;
    }
}

class SalsaChocholate extends HeladoDecorator {
    public function __construct($vendible) {
        parent::__construct($vendible);
    }

    public function getDescripcion() {
        return $this->vendible->getDescripcion() . " con Salsa Chocholate";
    }

    public function getPrecio() {
        return $this->vendible->getPrecio() + 1000;
    }
}

class Fresas extends HeladoDecorator {
    public function __construct($vendible) {
        parent::__construct($vendible);
    }

    public function getDescripcion() { // Cambié getModelo() por getDescripcion()
        return $this->vendible->getDescripcion() . " con Fresas";
    }

    public function getPrecio() {
        return $this->vendible->getPrecio() + 500;
    }
}

class GalletaOreo extends HeladoDecorator {
    public function __construct($vendible) {
        parent::__construct($vendible);
    }

    public function getDescripcion() { // Cambié getModelo() por getDescripcion()
        return $this->vendible->getDescripcion() . " con galleta de oreo";
    }

    public function getPrecio() {
        return $this->vendible->getPrecio() + 1500;
    }
}

?>
