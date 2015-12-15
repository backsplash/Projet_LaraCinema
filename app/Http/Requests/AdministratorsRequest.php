<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


/**
 * Class AdministratorsRequest
 * classe qui modélise le formulaire d'ajout d'admin
 */

class AdministratorsRequest extends FormRequest{

    /**
     * retourne un tableau de validation par champ
     */

    public function rules(){

        //recuperer l'id par la route en URL si mode édition

        $id = $this->route('id');

        //si l'argument est nul, validateurs de la création
        if($id == null){

            return [
                'firstname' => 'required|min:2|max:100',
                'lastname' => 'required|min:2|max:100',
                'email' => 'required|email|min:6|max:255|unique:administrators',
                'photo' => 'required|image',
                'description' => 'required|min:10|max:700',
                'password' => 'required|confirmed|min:6'



            ];
        }else{
            // validateurs de l'édition
            return [
                'firstname' => 'required|min:2|max:100',
                'lastname' => 'required|min:2|max:100',
                //unique:administrators, email, id = unique dans la table, champ, mais exception sur id
                'email' => 'required|email|min:6|max:255|unique:administrators,email,'. $id,
                'photo' => 'image',
                'description' => 'required|min:10|max:700',
                'password' => 'confirmed|min:6'
                ];
        }
    }


    /**
     * Customisation des messages par contrainte de validation
     */

    public function messages(){

        return [
            'required' => 'Ce champ est obligatoire',
            'min' => 'Ce champ doit faire plus de :min caractères',
            'max' => 'Ce champ doit faire moins de :max caractères',
            'integer' => 'Ce champ doit être un chiffre',
            'regex' => 'Mauvais format, merci d\'enregistrer un :attributes valide',
            'date_format' => 'L\'année doit être au format jj/mm/aaaa',
            'before' => 'La date doit précéder celle du jour',
            'image' => 'Le format de l\'image est invalide',
            'email' => 'Le format de l\'email doit être valide'



        ];





    }


    /**
     * Autoriser l'acces du formulaire
     * pour tout utilisateur
     * @return bool
     */

    public function authorize(){
        return true;
    }




}