<?php
/**
 * Created by PhpStorm.
 * User: wal13
 * Date: 07/12/15
 * Time: 14:40
 */

namespace App\Http\Controllers;
use App\Http\Models\Actors;
use App\Http\Models\Categories;
use App\Http\Models\Comments;
use App\Http\Models\Directors;
use App\Http\Models\Medias;
use App\Http\Models\Movies;
use App\Http\Models\Sessions;
use App\Http\Models\User;

/**
 * Class MainController
 * @package App\Http\Controllers
 * suffixé par le mot clef Controller, et doit hériter de la super classe Controller
 */
Class MainController extends Controller{

    public function index(){

        return view("Main/index");
    }


    public function dashboard(){



        //compter les objets Actors
        $nbacteurs = Actors::count();

        //compter les objets Comments
        $nbcommentaires = Comments::count();

        //compter les objets Movies
        $nbfilms = Movies::count();

        //compter les objets Session
        $nbseances = Sessions::count();

        //compter les objets User
        $nbusers = User::count();

        //compter les objets Categories
        $nbcategories = Categories::count();

        //compter les objets Directors
        $nbdirectors = Directors::count();

        //compter les objets Medias
        $nbmedias = Medias::count();

        //moyenne d'age des Actors
        $actor = new Actors();
        $moyenne_acteurs = $actor->getAvgActors();

        //moyenne des Comments
        $comment = new Comments();
        $moyenne_commentaires = $comment->getAvgComments();

        //moyenne des Movies
        $movie = new Movies();
        $moyenne_presse = $movie->getAvgMovies();

        //moyenne des Sessions
        $session = new Sessions();
        $moyenne_seance = $session->getAvgSessions();

        //liste des 24 derniers Users
        $user = new User();
        $liste_users = $user->getLastUsers(24);

        //Pourcentage des films par distributeurs

        $movies_distributeur = $movie->getMoviesDistributeur();



        //liste des 15 prochaines Sessions
        $session = new Sessions();
        $liste_sessions = $session->getNextSessions(15);


        //pour utilisation de la 3ème méthode
        //qui retourne un timestamp
        $moyenne_acteurs = \Carbon\Carbon::createFromTimestamp($moyenne_acteurs);







        return view("Main/dashboard", [
            'nbacteurs' => $nbacteurs,
             // 1ere méthode : $moyenne_acteurs[0]->age
            // 2ème méthode : moyenne_acteurs' => $moyenne_acteurs->age,
            'moyenne_acteurs' => $moyenne_acteurs->diffInYears(), // 3eme méthode, avec formatage en années
            'nbcommentaires' => $nbcommentaires,
            'nbfilms' => $nbfilms,
            'moyenne_commentaires' => round($moyenne_commentaires),
            'moyenne_presse' => round($moyenne_presse),
            'nbseances' => $nbseances,
            'moyenne_seance' => round($moyenne_seance->moyenne),
            'nbusers' => $nbusers,
            'liste_users' => $liste_users,
            'liste_sessions' => $liste_sessions,
            'nbcategories' => $nbcategories,
            'nbdirectors' => $nbdirectors,
            'nbmedias' => $nbmedias,
            'movies_distributeur' => $movies_distributeur

        ]);
    }







}