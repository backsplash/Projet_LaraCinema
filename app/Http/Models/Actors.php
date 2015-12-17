<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Class Actors
 * va stocker les requetes autour de la table categorie
 */
Class Actors extends Model{

    /**
     * décrit le nom de la table que la classe va impacter
     */
    protected $table = 'actors';


    /**
     * retourne tous les acteurs
     */
    public function getAllActors(){

        // retourne le resultat de la requete SELECT * FROM actors
        return DB::table('actors')->get();

    }

    /**
     * relation avec la classe Movies
     * many to many
     * le nom de la méthode movies() doit porter le nom de
     * la table mise en relation
     */

    public function movies(){
        //namespace + nom de la classe mise en relation
        return $this->belongsToMany('App\Http\Models\Movies');
    }


    /**
     * calcul des moyennes d'age
     */

    public function getAvgActors(){
//        mode de syntaxe en SQL pur
//        marche mais peu souple
//        return DB::select('SELECT ROUND( AVG( TIMESTAMPDIFF( YEAR, dob, NOW( ) ) ) )
//        AS age FROM actors ');

//        2ème méthode php : query builder, méthode hybride
//        DB::table('actors') correspond à FROM actors en mysql
//        DB::raw() permet d'utiliser les fonction mysql
//      return DB::table('actors')
//          ->select(DB::raw('ROUND( AVG( TIMESTAMPDIFF( YEAR, dob, NOW() ) ) ) AS age'))
//        permet de prendre le premier résultat, LIMIT 1 en mysql
///    first est équivalent à fetch(), et get() équivalent à fetchAll()
//          ->first();

//        3ème méthode, fonctions d'agrégat Eloquent ORM, php pur
//          select avg(dob) from actors
        //  retourne une moyenne de date !!!!
        // a traiter avec Carbon dans le Controller
           return Actors::avg('dob');

    }



}