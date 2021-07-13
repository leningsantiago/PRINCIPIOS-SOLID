<?php
#Principio Open-Closed

# Las clases que usas deberían estar abiertas para poder extenderse.
# cerradas para modificarse.


#Forma incorrecta

class OrderRepository
{
    public function find($orderID)
    {
        $pdo = new PDO(
            $this->config->getDsn(),
            $this->config->getDBUser(),
            $this->config->getDBPassword()
        );
        $statement = $pdo->prepare("SELECT * FROM `orders` WHERE id=:id");
        $statement->execute(array(":id" => $orderID));
        return $query->fetchObject("Order");
    }
    
    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}

#Forma correcta

class OrderRepository
{
    private $source;

    public function setSource(IOrderSource $source)
    {
        $this->source = $source;
    }

    public function find($orderID)
    {
        return $this->source->find($orderID);
    }
    
    public function save($order){/*...*/}
    public function update($order){/*...*/}
}

interface IOrderSource
{
    public function find($orderID);
    public function save($order);
    public function update($order);
    public function delete($order);
}

class MySQLOrderSource implements IOrderSource
{
    public function find($orderID);
    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}

class ApiOrderSource implements IOrderSource
{
    public function find($orderID);
    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}


