<?php
/**
 * Created by PhpStorm.
 * User: wal13
 * Date: 07/12/15
 * Time: 14:40
 */

namespace App\Http\Controllers;
use App\Http\Models\Directors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class MainController
 * @package App\Http\Controllers
 * suffixé par le mot clef Controller, et doit hériter de la super classe Controller
 */
Class DirectorsController extends Controller{

    public function index(){

        //creation d'un objet du model Directors
        //$model = new Directors();
        //$directors = $model->getAllDirectors();

        $directors = Directors::all();

        //transporteur
        //transport des données du Controller à la vue
        return view("Directors/index", [
            'directors' => $directors
        ]);
    }

    public function read($id){

        return view("Directors/read");
    }

    public function create(){

        return view("Directors/create");
    }

    public function edit($id){

        return view("Directors/edit");
    }

    /**
     * suppression
     */
    public function delete($id){

        //find() trouve un objet Directors depuis son id
        $director = Directors::find($id);
        //si le réalisateur existe , supprimer le realisateur
        if($director){

            //creer un messsage flash de type success
            Session::flash('success', "Le réalisateur {$director->firstname} {$director->lastname} a bien été supprimé.");
            //delete() permet de supprimer un objet en base de données
            $director->delete();
        }

        //redirection vers la liste des réalisateurs
        return Redirect::route('directors_index');

    }

    /**
     * action pour enregistrer en bdd les données du formulaire
     * la classe Request permet de receptionner les données en POST de manière sécurisée
     */
    public function store(Request $request){

        $director = new Directors();
        foreach($request->except('_token') as $key => $value){
            $director->$key = $value;
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
            $destinationPath = public_path() . '/uploads/directors';
            //deplacement de l'image uploadée
            $file->move($destinationPath, $filename);
        }
        //mise à jour de la propriété de l'objet Directors
        $director->image = asset('/uploads/directors/' . $filename);

        //mise au format de la date de naissance


        $date = \DateTime::createFromFormat('d/m/Y', $request->dob);
        $date ->format('Y-m-d H:i:s');
        $director->dob = $date;

        //sauvegarde de l'objet Actors en base
        $director->save();

        //creer un messsage flash de type success
        Session::flash('success', "Le réalisateur {$director->firstname}  {$director->lastname} a bien été créé.");

        //redirection vers la liste des réalisateurs
        return Redirect::route('directors_index');
    }







    }