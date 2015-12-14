<?php
/**
 * Created by PhpStorm.
 * User: wal13
 * Date: 07/12/15
 * Time: 14:40
 */

namespace App\Http\Controllers;
use App\Http\Models\Cinemas;
use Illuminate\Http\Request;
use App\Http\Requests\CinemasRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class MainController
 * @package App\Http\Controllers
 * suffixé par le mot clef Controller, et doit hériter de la super classe Controller
 */
Class CinemasController extends Controller{

    public function index(){

        //creation d'un objet du model Cinemas
        $model = new Cinemas();
        $cinemas = $model->getAllCinemas();

        //transporteur
        //transport des données du Controller à la vue
        return view("Cinemas/index", [
            'cinemas' => $cinemas
        ]);
    }

    public function read($id){

        return view("Cinemas/read");
    }

    public function create(){

        return view("Cinemas/create");
    }

    public function edit($id){

        return view("Cinemas/edit");
    }

    /**
     * suppression
     */
    public function delete($id){

        //find() trouve un objet Cinemas depuis son id
        $cinema = Cinemas::find($id);
        //si le cinema existe , supprimer le cinema
        if($cinema){

            //creer un messsage flash de type success
            Session::flash('success', "Le cinéma {$cinema->title} a bien été supprimé.");
            //delete() permet de supprimer un objet en base de données
            $cinema->delete();
        }

        //redirection vers la liste des Cinemas
        return Redirect::route('cinemas_index');

    }

    /**
     * action pour enregistrer en bdd les données du formulaire
     * la classe Request permet de receptionner les données en POST de manière sécurisée
     *
     * Avec contraintes et utilisation d'une classe liée à FormRequest en amont:
     * ActorssRequest représente le formulaire
     * et la requête en POST du formulaire
     */
    public function store(CinemasRequest $request){


        $cinema = new Cinemas();
        foreach($request->except('_token') as $key => $value){
            $cinema->$key = $value;
        }



        //sauvegarde de l'objet Cinemas en base
        $cinema->save();

        //creer un messsage flash de type success
        Session::flash('success', "Le cinéma {$cinema->title} a bien été créé.");

        //redirection vers la liste des cinemas
        return Redirect::route('cinemas_index');
    }



}