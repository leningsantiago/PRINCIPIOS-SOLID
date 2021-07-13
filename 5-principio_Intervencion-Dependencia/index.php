<?php

# Principio de inversión de dependencias

#La mejor manera de conseguir esto es utilizando interfaces en lugar de utilizar clases.
#Está muy ligado con los conceptos de inyección de dependencias o inyección de servicios.

class Customer
{
    private $currentOrder = null;

    public function addItem($item){
        if(is_null($this->currentOrder)){
            $this->currentOrder = new Order();
        }
        return $this->currentOrder->addItem($item);
    }
    
    public function deleteItem($item){
        if(is_null($this->currentOrder)){
            return false;
        }
        return $this->currentOrder ->deleteItem($item);
    }

    public function buyItems()
    {    
        if(is_null($this->currentOrder)){
            return false;
        }
        $processor = new OrderProcessor();
        return $processor->checkout($this->currentOrder);    
    }
}

class OrderProcessor
{
    public function checkout($order){/*...*/}
}



?>