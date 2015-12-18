<?php
/**
 * Created by PhpStorm.
 * User: wal13
 * Date: 16/12/15
 * Time: 11:49
 */

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model{
    /**
     * décrit le nom de la table que la classe va impacter
     */
    protected $table = 'user';


    /**
     * retourne tous les utilisateurs
     */
    public function getAllUser(){

        // retourne le resultat de la requete SELECT * FROM user
        return DB::table('user')->get();

    }


    public function getLastUsers($nb = null){


      return User::orderBy('created_at', 'desc')->take($nb)->get();

//        return DB::table('user')
//            ->orderBy('created_at', 'desc')
//            ->take($nb)
//            ->get();
    }



    public function comments(){
        //namespace + nom de la classe mise en relation
        return $this->hasMany('App\Http\Models\Comments');
    }

} 