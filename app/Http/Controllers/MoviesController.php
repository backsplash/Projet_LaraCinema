<?php
/**
 * Created by PhpStorm.
 * User: wal13
 * Date: 07/12/15
 * Time: 14:40
 */

namespace App\Http\Controllers;

use App\Http\Models\Categories;
use App\Http\Models\Movies;
use App\Http\Requests\MoviesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


/**
 * Class MainController
 * @package App\Http\Controllers
 * suffixé par le mot clef Controller, et doit hériter de la super classe Controller
 */
Class MoviesController extends Controller{

    public function index(){

        //creation d'un objet du model Movies
        $model = new Movies();
        //$movies = $model->getAllMovies(); recupere les elements sans
//        tenir compte des relations entre tables et objets

        // all() permet de récupérer tous les éléments y compris
        // ceux mis en relation
        $movies = Movies::all();



        //transporteur
        //transport des données du Controller à la vue
        return view("Movies/index", [
            'movies' => $movies

        ]);
    }

    public function read($id){

        return view("Movies/read");
    }

    public function create(){

        //creation d'un objet du model Categories
        $model = new Categories();
        $categories = $model->getAllCategories();

        return view("Movies/create", [
            'categories' => $categories
        ]);
    }

    public function edit($id){

        return view("Movies/edit");
    }

    /**
     * suppression
     */
    public function delete($id){

        //find() trouve un objet Movies depuis son id
        $movie = Movies::find($id);
        //si le film n'existe plus, supprimer le film
        if($movie){

            //creer un messsage flash de type success
            Session::flash('success', "Le film {$movie->title} a bien été supprimé.");
            //delete() permet de supprimer un objet en base de données
           $movie->delete();
        }

        //redirection vers la liste des films
        return Redirect::route('movies_index');

    }

    /**
     * action pour enregistrer en bdd les données du formulaire
     * la classe Request permet de receptionner les données en POST de manière sécurisée
     * sans gestion des contraintes de validation en amont
     *
     * Avec contraintes et utilisation d'une classe liée à FormRequest en amont:
     * MoviesRequest représente le formulaire
     * et la requête en POST du formulaire
     *
     *
     * on rentre dans la méthode seulement si il n'y a plus d'erreur dans le
     * formulaire
     */
    public function store(MoviesRequest $request){

        //récupérer le titre du film en POST
        //input(nom du champ) permet de récupérer la donnée en POST de façon sécurisée
        //$title = $request->input("title");
        //$description = $request->input("description");
        //exit() permet de sortir de l'exécution php
        //dump() permet le débuguage
        //exit(dump($title, $description));

        $movie = new Movies();
        foreach($request->except('_token') as $key => $value){
            $movie->$key = $value;
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
            $destinationPath = public_path() . '/uploads/movies';
            //deplacement de l'image uploadée
            $file->move($destinationPath, $filename);
        }
        //mise à jour de la propriété de l'objet Movies
        $movie->image = asset('/uploads/movies/' . $filename);


        /**
         * les dates created_at et updated_at sont mises à jour automatiquement
         * par Laravel
         */
//        //on renseigne la date de création si elle est vide
//        if(!$request->has('created_at')){
//            $now = new \DateTime('NOW');
//            $now = date_format($now, 'Y-m-d H:i:s');
//            $movie->created_at = $now ;
//        }
//
//        //mise à jour de la date d'édition, à chaque fois
//        $now = new \DateTime('NOW');
//        $now = date_format($now, 'Y-m-d H:i:s');
//        $movie->updated_at = $now ;

        //sauvegarde de l'objet Movies en base
        $movie->save();

        //creer un messsage flash de type success
        Session::flash('success', "Le film {$movie->title} a bien été créé.");

        //redirection vers la liste des films
        return Redirect::route('movies_index');
    }


    /**
     * action pour activer un film
     * passe la propriété visible à 1
     */
    public function activate($id){

        //find() trouve un objet Movies depuis son id
        $movie = Movies::find($id);
        if($movie->visible == 0){
            $movie->visible = 1;
            //creer un messsage flash de type success
            Session::flash('success', "Le film {$movie->title} est désormais activé");
        }
        else{
            $movie->visible = 0;
            //creer un messsage flash de type success
            Session::flash('warning', "Le film {$movie->title} est désormais désactivé");
        }

        //save() permet de sauvegarder l'objet modifier en base de données
        $movie->save();



        //redirection vers la liste des films
        return Redirect::route('movies_index');
    }


    /**
     * action pour mettre en avant un film
     * passe la propriété cover à 1
     */
    public function cover($id){

        //find() trouve un objet Movies depuis son id
        $movie = Movies::find($id);
        if($movie->cover == 0){
            $movie->cover = 1;
            //creer un messsage flash de type success
            Session::flash('success', "Le film {$movie->title} est désormais mis en avant");
        }
        else{
            $movie->cover = 0;
            //creer un messsage flash de type success
            Session::flash('warning', "Le film {$movie->title} est n'est désormais plus mis en avant");
        }

        //save() permet de sauvegarder l'objet modifier en base de données
        $movie->save();



        //redirection vers la liste des films
        return Redirect::route('movies_index');
    }





}