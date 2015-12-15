<?php
/**
 * Created by PhpStorm.
 * User: wal13
 * Date: 07/12/15
 * Time: 14:40
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Models\Categories;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class MainController
 * @package App\Http\Controllers
 * suffixé par le mot clef Controller, et doit hériter de la super classe Controller
 */
Class CategoriesController extends Controller{

    public function index(){

        //creation d'un objet du model Categories
       // $model = new Categories();
       // $categories = $model->getAllCategories();

        $categories = Categories::all();

        //transporteur
        //transport des données du Controller à la vue
        return view("Categories/index", [
            'categories' => $categories
        ]);
    }

    //l'argument récupéré doit être le même que celui défini dans le routing
    public function read($id){

        return view("Categories/read");
    }




    public function create(){

        return view("Categories/create");
    }






    public function edit($id){

        $categorie = Categories::find($id);
        return view("Categories/edit", [
            'categorie' => $categorie
        ]);
    }






    public function delete($id){

        //find() trouve un objet Categories depuis son id
        $categorie = Categories::find($id);
        //si la categorie existe, supprimer
        if($categorie){

            //creer un messsage flash de type success
            Session::flash('success', "La catégorie {$categorie->title} a bien été supprimée.");
            //delete() permet de supprimer un objet en base de données
           $categorie->delete();
        }

        //redirection vers la liste des categories
        return Redirect::route('categories_index');
    }






    /**
     * action pour enregistrer en bdd les données du formulaire
     * la classe Request permet de receptionner les données en POST de manière sécurisée
     * @param $id (facultatif), valeur null par defaut
     */
    public function store(Request $request, $id = null){

        if(!empty($id)){
            $categorie = Categories::find($id);
        }
        else{

            $categorie = new Categories();
        }

        if(!empty($request->title)){
            $categorie->title = $request->title;
        }
        $categorie->description = $request->description;




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
            $destinationPath = public_path() . '/uploads/categories';
            //deplacement de l'image uploadée
            $file->move($destinationPath, $filename);

            //mise à jour de la propriété de l'objet Categories
            $categorie->image = asset('/uploads/categories/' . $filename);

        }

        if(!empty($categorie->title)){
            // mise à jour de la propriété slug, reprise du title en minuscule, sans espace
            $categorie->slug = str_replace(" ", "-", strtolower($request->title));
        }

        //sauvegarde de l'objet Categories en base
        $categorie->save();

        //creer un messsage flash de type success
        if(!empty($id)){
            Session::flash('success', "La catégorie {$categorie->title} a bien été modifiée.");

        }else{

            Session::flash('success', "La catégorie {$categorie->title} a bien été créée.");
        }
        //redirection vers la liste des catégories
        return Redirect::route('categories_index');
    }





}