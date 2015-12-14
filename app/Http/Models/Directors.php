<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Class Directors
 * va stocker les requetes autour de la table directors
 */
Class Directors extends Model{

    /**
     * décrit le nom de la table que la classe va impacter
     */
    protected $table = 'directors';


    /**
     * retourne tous les realisateurs
     */
    public function getAllDirectors(){

        // retourne le resultat de la requete SELECT * FROM directors
        return DB::table('directors')->get();

    }


    public function movies(){
        //namespace + nom de la classe mise en relation
        return $this->hasMany('App\Http\Models\Movies');
    }


}