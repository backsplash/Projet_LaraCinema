<?php
/**
 * Created by PhpStorm.
 * User: wal13
 * Date: 21/12/15
 * Time: 12:22
 */
use \Illuminate\Foundation\Testing\WithoutMiddleware;


/**
 * Class AuthTest
 * test du mécanisme d'autentification
 */
class AuthTest extends TestCase{

    //trait à user pour désactiver le midleware csrf pour valider les formulaires
    //pour desactiver de façon générale
    //use WithoutMiddleware;

    /**
     * test login page
     */
    public function testAuthPage(){
        // visit() test si la page est ok
        // et si on se trouve dans l'uri auth/login
        $this->visit('/auth/login') //code 200, bon fonctionnement de la page
          ->see('Email')    //see() permet de voir un élément html
          ->see('Password');
    }

    /**
     * test si mecanisme de login échoue
     */
    public function testLoginFailure(){
        $this->visit('/auth/login')
            ->type('toto', 'email') //tapper 'toto' dans le champ Email
            ->type('tata', 'password') //tapper 'tata' dans le champ password
            ->press('Connexion')   //cliquer sur le bouton 'Entrer'
            ->followRedirects() //suivre la redirection
            ->seePageIs('/auth/login'); //voir si la page courante est '/auth/login'
    }


    /**
     * test si mecanisme de login reussi
     */
    public function testLoginSuccess(){
        $this->visit('/auth/login')
            ->WithoutMiddleware()   //permet de désactiver le Middleware pour ce test
                                    // pour que la sécurité ne prenne pas en compte le csrf
            ->type('dark@vador.com', 'email')
            ->type('starwars', 'password')
            ->check('remember')
            ->press('Connexion')
            ->followRedirects()
            ->seePageIs('/admin');

    }


    /**
     * test page dashboard
     */
    public function testDashboard(){
        $this->testLoginSuccess(); //appel d'un test dans un autre
           $this->see('Répartition des films par catégorie');
    }





} 