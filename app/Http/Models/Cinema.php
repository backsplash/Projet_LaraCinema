<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Class Cinemas
 * va stocker les requetes autour de la table cinema
 */
Class Cinema extends Model{

    /**
     * décrit le nom de la table que la classe va impacter
     */
    protected $table = 'cinema';


    /**
     * retourne tous les cinemas
     */
    public function getAllCinemas(){

        // retourne le resultat de la requete SELECT * FROM cinema
        return DB::table('cinema')->get();

    }





}