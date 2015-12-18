<?php
/**
 * Created by PhpStorm.
 * User: wal13
 * Date: 16/12/15
 * Time: 11:55
 */

namespace App\Http\Controllers;

use App\Http\Models\Actors;
use App\Http\Models\Categories;
use App\Http\Models\Comments;
use App\Http\Models\Movies;
use App\Http\Models\Sessions;
use App\Http\Models\User;

class ApiController extends Controller{

    /**
     * retourne les données de categorie
     */
    public function categories(){

        $tab =[];
        $categories = Categories::all();
        foreach($categories as $categorie){
            $tab[] = [
                $categorie->title, 
                count($categorie->movies)
            ];
        }
        return $tab;
    }




    /**
     * retourne les données de actors
     */
    public function actors(){
        $tab =[];
        $actor= new Actors();
        $actors = $actor->ageTranches();
        foreach($actors as $actor){
            $tab[] = [
                $actor->tranche,
                $actor->nb
            ];
        }
        return $tab;
    }


    /**
     * retourne les données des acteurs par ville
     */
    public function actorsCity(){
        $tab =[];

        $actor= new Actors();
        $actors = $actor->getActorsCity();
        foreach($actors as $actor){
                $tab[] = ['name' => $actor->city, 'data' => [(int)$actor->nb]]; //typage de la donnée en int


        }

        return $tab;
    }


} 