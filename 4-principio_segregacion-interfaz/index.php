<?php
# Principio de segregación de interfaz

interface IAve {  
    function volar();
    function comer();
    function nadar();
}

class Loro implements IAve{

    public function volar() {
        //...
    }

    public function comer() {
        //...
    }

    public function nadar() {
        //...
    }
}

class Pinguino implements IAve{

    public function volar() {
        //...
    }

    public function comer() {
        //...
    }

    public function nadar() {
        //...
    }
}














?>