<?php

namespace App\Http\Controllers;

use App\DesignPatterns\AbstractFactory\Conceptual\AbstractFactory;
use App\DesignPatterns\AbstractFactory\Conceptual\ConcreteFactory1;
use App\DesignPatterns\AbstractFactory\Conceptual\ConcreteFactory2;

class AbstractFactoryController extends Controller
{
    public function index()
    {
        echo '<a href="' . route('AbstractFactory.Conceptual') . '">Conceptual Example</a>';
        echo "<br /><br />";
        echo '<a href="' . route('AbstractFactory.RealWorld') . '">Real World Example</a>';
    }

    /**
     * The client code works with factories and products only through abstract
     * types: AbstractFactory and AbstractProduct. This lets you pass any factory or
     * product subclass to the client code without breaking it.
     */
    private function conceptualClientCode(AbstractFactory $factory)
    {
        $productA = $factory->createProductA();
        $productB = $factory->createProductB();

        echo $productB->usefulFunctionB() . "\n";
        echo $productB->anotherUsefulFunctionB($productA) . "\n";
    }

    public function conceptual()
    {
        /**
         * The client code can work with any concrete factory class.
         */
        echo "Client: Testing client code with the first factory type:\n";
        $this->conceptualClientCode(new ConcreteFactory1);

        echo "<br><br><br>";

        echo "Client: Testing the same client code with the second factory type:\n";
        $this->conceptualClientCode(new ConcreteFactory2);
    }

    private function realWorldClientCode()
    {

    }

    public function realWorld()
    {

    }
}
