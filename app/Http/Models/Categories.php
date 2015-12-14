<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Class Categories
 * va stocker les requetes autour de la table categorie
 */
Class Categories extends Model{

    /**
     * décrit le nom de la table que la classe va impacter
     */
    protected $table = 'categories';


    /**
     * retourne toutes les categories
     */
    public function getAllCategories(){

        // retourne le resultat de la requete SELECT * FROM categories
        return DB::table('categories')->get();

    }


    /**
     * relationavec la classe Movies
     * one to many
     * le nom de la méthode movies() doit porter le nom de
     * la table mise en relation
     */

    public function movies(){
        //namespace + nom de la classe mise en relation
        return $this->hasMany('App\Http\Models\Movies');
    }




}