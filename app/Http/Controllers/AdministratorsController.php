<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\Administrators;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AdministratorsRequest;

Class AdministratorsController extends Controller{

    /**
     * page de liste des administrateurs
     */

    public function index(){

        $administrators = Administrators::all();


        return view('Administrators/index', [
            'administrators' => $administrators
        ]);
    }

    public function delete($id){

        //find() trouve un objet Administrators depuis son id
        $administrators = Administrators::find($id);
        //si l'admin existe , supprimer l'admin
        if($administrators){

            //creer un messsage flash de type success
            Session::flash('success', "L'administrateur {$administrators->firstname} {$administrators->lastname} a bien été supprimé.");
            //delete() permet de supprimer un objet en base de données
            $administrators->delete();
        }

        //redirection vers la liste des acteurs
        return Redirect::route('administrators_index');
        

    }

    public function edit($id){

        $administrator = Administrators::find($id);
        return view("Administrators/edit", [
            'administrator' => $administrator
        ]);

    }

    public function create(){

        return view("Administrators/create");

    }

    /**
     * fonction store pour créer ou éditer
     * @param AdministratorsRequest $request
     * @param $id (facultatif), valeur null par defaut
     *
     */
    public function store(AdministratorsRequest $request, $id = null){

        if(!empty($id)){
            $administrator = Administrators::find($id);
        }
        else{
            $administrator = new Administrators();
        }


        $administrator->firstname = $request->firstname;
        $administrator->lastname = $request->lastname;
        $administrator->email = $request->email;
        $administrator->description = $request->description;
        if((!empty($administrator->password))
        ){
            $administrator->password = bcrypt($request->password); //if en mode edit
        }

        $administrator->super_admin = $request->super_admin;
        $administrator->expiration_date = new \DateTime('+1 year');
        $administrator->active = true;

        /**
         * traitement de l'upload de l'image
         */

        $filename = "";
        // si j'ai un fichier image
        if($request->hasFile('photo')){
            //recuperation de l'image
            $file = $request->file('photo');
            //recuperation du nom du fichier
            $filename = $file->getClientOriginalName();
            //stockage du chemin vers lequel l'image va etre envoyée
            $destinationPath = public_path() . '/uploads/administrators';
            //deplacement de l'image uploadée
            $file->move($destinationPath, $filename);

        //mise à jour de la propriété de l'objet administrators

        $administrator->photo = asset('/uploads/administrators/' . $filename);
        }


        //sauvegarde de l'objet administrators en base
        $administrator->save();

        //creer un messsage flash de type success
        if(!empty($id)){
            Session::flash('success', "L'administrateur {$administrator->firstname}  {$administrator->lastname} a bien été modifié.");

        }else{
            Session::flash('success', "L'administrateur {$administrator->firstname}  {$administrator->lastname} a bien été créé.");
        }
        //redirection vers la liste des admins
        return Redirect::route('administrators_index');
    }





}