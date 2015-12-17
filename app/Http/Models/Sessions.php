<?php
/**
 * Created by PhpStorm.
 * User: wal13
 * Date: 16/12/15
 * Time: 10:48
 */

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sessions extends Model{

    /**
     * décrit le nom de la table que la classe va impacter
     */
    protected $table = 'sessions';


    /**
     * retourne toutes les sessions
     */
    public function getAllSessions(){

        // retourne le resultat de la requete SELECT * FROM sessions
        return DB::table('sessions')->get();

    }


    public function getAvgSessions(){

        return  DB::table('sessions')
                ->select(DB::raw('AVG(HOUR(date_session)) AS moyenne'))
                ->first();;

    }

    public function getNextSessions($nb = null){


      return Sessions::where('date_session', '>', DB::raw('NOW()'))
          ->orderBy('date_session', 'asc')
          ->take($nb)
          ->get();


    }



    public function cinema(){
        //namespace + nom de la classe mise en relation
        return $this->belongsTo('App\Http\Models\Cinema');
    }

    public function movies(){
        //namespace + nom de la classe mise en relation
        return $this->belongsTo('App\Http\Models\Movies');
    }



} 