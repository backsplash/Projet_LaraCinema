<?php
/**
 * Created by PhpStorm.
 * User: wal13
 * Date: 21/12/15
 * Time: 14:59
 */
use \Illuminate\Foundation\Testing\WithoutMiddleware;

/**
 * Class MoviesTest
 * teste le CRUD de Movies
 */
class MoviesTest extends TestCase{

// la transaction permet de revenir en arriere à la fin des requetes, pour annuler
// leur résultat. Le rollback est fait automatiquement, pas besoin d'appeler une méthode

    use \Illuminate\Foundation\Testing\DatabaseTransactions;


    public function testActivateAndCover(){

        //authentification
//        $auth = new AuthTest();
//        $auth->testLoginSuccess();
        $this->visit('/auth/login')
            ->WithoutMiddleware()   //permet de désactiver le Middleware pour ce test
            // pour que la sécurité ne prenne pas en compte le csrf
            ->type('dark@vador.com', 'email')
            ->type('starwars', 'password')
            ->check('remember')
            ->press('Connexion')
            ->followRedirects()
            ->seePageIs('/admin');

        //accès à la page de gestion des films
        $this->click('Gestion des films')
            ->seePageIs('/admin/movies/index')
            ->see('Liste des films')
            ->get('http://localhost:8000/admin/movies/cover/1')
            ->followRedirects()
            ->seeInDatabase('movies', ['id'=>1, 'cover'=>0])
            ->see('Le film Le seigneur des anneaux n\'est désormais plus mis en avant')
            ->seePageIs('/admin/movies/index')
            ->get('http://localhost:8000/admin/movies/activate/1')
            ->followRedirects()
            ->seeInDatabase('movies', ['id'=>1, 'visible'=>0])
            ->see('Le film Le seigneur des anneaux est désormais désactivé')
            ->seePageIs('/admin/movies/index');
    }



    public function testDelete(){
        $this->authentification(); //factorisation de l'authentification
        // via la classe parente TestCase

        //accès à la page de gestion des films
        $this->click('Gestion des films')
            ->seePageIs('/admin/movies/index')
            ->see('Liste des films')
            ->get('/admin/movies/delete/59')
            ->followRedirects()
            ->notSeeInDatabase('movies', ['id'=>59])
            ->see('Le film sdf dfghh wh a bien été supprimé.')
            ->seePageIs('/admin/movies/index');
    }


    public function testLike(){


        //methode d'authentification via l'utilisation d'un utilisateur
//        $user = \App\Http\Models\Administrators::find(76);
//        $this->be($user); // maintenant authentifié via l'administrateur 76

        //accès à la page de gestion des films
        $this->authentification()
            ->visit('/admin')
            ->click('Gestion des films')
            ->seePageIs('/admin/movies/index')
            ->see('Liste des films')
            ->get('http://localhost:8000/admin/movies/like/11/like')
            ->followRedirects()
            ->withSession(['likes' => [11]])
            ->get('http://localhost:8000/admin/movies/like/11/dislike')
            ->followRedirects()
            ->withSession(['likes' => []])
            ->see('Le film Man of Steel est désormais disliké')
            ->seePageIs('/admin/movies/index');

    }





}














