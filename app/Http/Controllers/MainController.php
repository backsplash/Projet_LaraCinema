<?php
/**
 * Created by PhpStorm.
 * User: wal13
 * Date: 07/12/15
 * Time: 14:40
 */

namespace App\Http\Controllers;
use App\Http\Models\Actors;
use App\Http\Models\Comments;

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

        //moyenne d'age des Actors
        $actor = new Actors();
        $moyenne_acteurs = $actor->getAvgActors();



        return view("Main/dashboard", [
            'nbacteurs' => $nbacteurs,
            'moyenne_acteurs' => $moyenne_acteurs,
            'nbcommentaires' => $nbcommentaires
        ]);
    }







}