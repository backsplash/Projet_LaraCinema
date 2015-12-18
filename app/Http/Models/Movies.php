<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Class Movies
 * va stocker les requetes autour de al table movies
 */
Class Movies extends Model{

    /**
     * décrit le nom de la table que la classe va impacter
     */
    protected $table = 'movies';


    /**
     * retourne tous les films
     */
    public function getAllMovies(){

        // retourne le resultat de la requete SELECT * FROM movies
        return DB::table('movies')->get();

    }

    /**
     * relation avec la classe Categories
     * many to one
     * le nom de la méthode categories() doit porter le nom de
     * la table mise en relation
     */

    public function categories(){
        //namespace + nom de la classe mise en relation
        return $this->belongsTo('App\Http\Models\Categories');
    }

    /**
     * relation avec la classe Actors
     * one to many
     * le nom de la méthode actors() doit porter le nom de
     * la table mise en relation
     */

    public function actors(){
        //namespace + nom de la classe mise en relation
        return $this->belongsToMany('App\Http\Models\Actors');
    }

    public function directors(){
        //namespace + nom de la classe mise en relation
        return $this->BelongsToMany('App\Http\Models\Directors');
    }

    public function comments(){
        //namespace + nom de la classe mise en relation
        return $this->hasMany('App\Http\Models\Comments');
    }


    public function getAvgMovies(){

        return Movies::avg('note_presse');

    }


    public function getMoviesPerCat(){

        return DB::table('movies')
          ->select(DB::raw('COUNT(*) AS nbfilms, categories.title'))
          ->join('categories')
          ->groupBy('categories.title');

    }


    public function getMoviesDistributeur(){

        return DB::table('movies')
            ->select(DB::raw('COUNT(id) AS nbfilms, distributeur'))
            ->whereNotNull('distributeur')
            ->where('distributeur', '!=', '')
            ->groupBy('distributeur')
            ->orderBy('nbfilms', 'desc')
            ->get();

    }

}













