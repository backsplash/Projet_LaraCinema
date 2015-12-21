<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost:8000';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }


    public function authentification(){

        $this->visit('/auth/login')
            ->WithoutMiddleware()   //permet de désactiver le Middleware pour ce test
            // pour que la sécurité ne prenne pas en compte le csrf
            ->type('dark@vador.com', 'email')
            ->type('starwars', 'password')
            ->check('remember')
            ->press('Connexion')
            ->followRedirects()
            ->seePageIs('/admin');

        return $this;
    }
}
