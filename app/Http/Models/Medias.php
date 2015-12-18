<?php


namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Class Medias
 * va stocker les requetes autour de la table medias
 */
Class Medias extends Model{

    /**
     * décrit le nom de la table que la classe va impacter
     */
    protected $table = 'medias';


    /**
     * retourne tous les medias
     */
    public function getAllMedias(){

        // retourne le resultat de la requete SELECT * FROM medias
        return DB::table('medias')->get();

    }





}