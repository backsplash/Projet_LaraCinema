<?php
/**
 * Created by PhpStorm.
 * User: wal13
 * Date: 07/12/15
 * Time: 14:40
 */

namespace App\Http\Controllers;
use App\Http\Models\Actors;
use Illuminate\Http\Request;
use App\Http\Requests\ActorsRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class MainController
 * @package App\Http\Controllers
 * suffixé par le mot clef Controller, et doit hériter de la super classe Controller
 */
Class ActorsController extends Controller{

    public function index(){

        //creation d'un objet du model Actors
        //$model = new Actors();
        //$actors = $model->getAllActors();

        $actors = Actors::all();

        //transporteur
        //transport des données du Controller à la vue
        return view("Actors/index", [
            'actors' => $actors
        ]);
    }

    public function read($id){

        return view("Actors/read");
    }

    public function create(){

        return view("Actors/create");
    }

    public function edit($id){

        return view("Actors/edit");
    }

    /**
     * suppression
     */
    public function delete($id){

        //find() trouve un objet Actors depuis son id
        $actor = Actors::find($id);
        //si l'acteur existe , supprimer l'acteur
        if($actor){

            //creer un messsage flash de type success
            Session::flash('success', "L'acteur {$actor->firstname} {$actor->lastname} a bien été supprimé.");
            //delete() permet de supprimer un objet en base de données
            $actor->delete();
        }

        //redirection vers la liste des acteurs
        return Redirect::route('actors_index');

    }

    /**
     * action pour enregistrer en bdd les données du formulaire
     * la classe Request permet de receptionner les données en POST de manière sécurisée
     *
     * Avec contraintes et utilisation d'une classe liée à FormRequest en amont:
     * ActorssRequest représente le formulaire
     * et la requête en POST du formulaire
     */
    public function store(ActorsRequest $request){

        //$firstname = $request->input("firstname");
        //$lastname = $request->input("lastname");
        //$biography = $request->input("biography");
        //exit() permet de sortir de l'exécution php
        //dump() permet le débuguage
        //exit(dump($firstname, $lastname, $biography));

        $actor = new Actors();
        foreach($request->except('_token') as $key => $value){
            $actor->$key = $value;
        }

        /**
         * traitement de l'upload de l'image
         */
        $filename = "";
        // si j'ai un fichier image
        if($request->hasFile('image')){
            //recuperation de l'image
            $file = $request->file('image');
            //recuperation du nom du fichier
            $filename = $file->getClientOriginalName();
            //stockage du chemin vers lequel l'image va etre envoyée
            $destinationPath = public_path() . '/uploads/actors';
            //deplacement de l'image uploadée
            $file->move($destinationPath, $filename);
        }
        //mise à jour de la propriété de l'objet Actors
        $actor->image = asset('/uploads/actors/' . $filename);

        //mise au format de la date de naissance


        $date = \DateTime::createFromFormat('d/m/Y', $request->dob);
        $date ->format('Y-m-d H:i:s');
        $actor->dob = $date;

        //sauvegarde de l'objet Actors en base
        $actor->save();

        //creer un messsage flash de type success
        Session::flash('success', "L'acteur {$actor->firstname}  {$actor->lastname} a bien été créé.");

        //redirection vers la liste des acteurs
        return Redirect::route('actors_index');
    }



}