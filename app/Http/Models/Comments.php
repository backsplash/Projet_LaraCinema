<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Class Comments
 * va stocker les requetes autour de la table comments
 */
Class Comments extends Model{

    /**
     * décrit le nom de la table que la classe va impacter
     */
    protected $table = 'comments';


    /**
     * retourne tous les commentaires
     */
    public function getAllComments(){

        // retourne le resultat de la requete SELECT * FROM comments
        return DB::table('comments')
            ->join('movies', 'comments.movies_id', '=', 'movies.id')
            ->select('comments.*', 'movies.title' )
            ->get();


    }

    public function getAvgComments(){
        // peut s'utiliser directement dans le Controller
        return Comments::avg('note');

    }

    public function user(){
        //namespace + nom de la classe mise en relation
        return $this->belongsTo('App\Http\Models\User');
    }
    public function movies(){
        //namespace + nom de la classe mise en relation
        return $this->belongsTo('App\Http\Models\Movies');
    }


}