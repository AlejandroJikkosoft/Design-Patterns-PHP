<?php

namespace App\DesignPatterns\FactoryMethod\Conceptual;

/**
 * Concrete Products provide various implementations of the Product interface.
 */
class ConcreteProduct2 implements Product
{
    public function operation(): string
    {
        return "{Result of the ConcreteProduct1}";
    }
}
