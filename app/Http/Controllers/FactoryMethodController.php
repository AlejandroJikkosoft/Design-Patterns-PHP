<?php

namespace App\Http\Controllers;

use App\DesignPatterns\FactoryMethod\Conceptual\ConcreteCreator1;
use App\DesignPatterns\FactoryMethod\Conceptual\ConcreteCreator2;
use App\DesignPatterns\FactoryMethod\Conceptual\Creator;
use App\DesignPatterns\FactoryMethod\RealWorld\FacebookPoster;
use App\DesignPatterns\FactoryMethod\RealWorld\LinkedInPoster;
use App\DesignPatterns\FactoryMethod\RealWorld\SocialNetworkPoster;
use App\Http\Controllers\Controller;

class FactoryMethodController extends Controller
{
    public function index()
    {
        echo '<a href="' . route('FactoryMethod.Conceptual') . '">Conceptual Example</a>';
        echo "<br /><br />";
        echo '<a href="' . route('FactoryMethod.RealWorld') . '">Real World Example</a>';
    }

    public function conceptual()
    {
        /**
         * The Application picks a creator's type depending on the configuration or
         * environment.
         */
        echo "App: Launched with the ConcreteCreator1.\n";
        $this->conceptualClientCode(new ConcreteCreator1);

        echo "<br><br><br>";

        echo "App: Launched with the ConcreteCreator2.\n";
        $this->conceptualClientCode(new ConcreteCreator2);
    }

    /**
     * The client code works with an instance of a concrete creator, albeit through
     * its base interface. As long as the client keeps working with the creator via
     * the base interface, you can pass it any creator's subclass.
     */
    private function conceptualClientCode(Creator $creator)
    {
        echo "Client: I'm not aware of the creator's class, but it still works.\n"
        . $creator->someOperation();
    }

    public function realWorld()
    {
        /**
         * During the initialization phase, the app can decide which social network it
         * wants to work with, create an object of the proper subclass, and pass it to
         * the client code.
         */
        echo "Testing ConcreteCreator1:\n";
        $this->realWorldClientCode(new FacebookPoster("john_smith", "******"));

        echo "<br><br><br>";

        echo "Testing ConcreteCreator2:\n";
        $this->realWorldClientCode(new LinkedInPoster("john_smith@example.com", "******"));
    }

    /**
     * The client code can work with any subclass of SocialNetworkPoster since it
     * doesn't depend on concrete classes.
     */
    private function realWorldClientCode(SocialNetworkPoster $creator)
    {
        $creator->post("Hello world!");
        $creator->post("I had a large hamburger this morning!");
    }
}
