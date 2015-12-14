<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


/**
 * Class DirectorsRequest
 * classe qui modélise le formulaire d'ajout d'acteur
 */

class DirectorsRequest extends FormRequest{

    /**
     * retourne un tableau de validation par champ
     */

    public function rules(){

        return [
            'firstname' => 'required|min:2|max:100',
            'lastname' => 'required|min:2|max:100',
            'biography' => 'required|min:10|max:700',
            'dob' => 'required|date_format:d/m/Y|before:today',
            'image' => 'required|image'




        ];
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
            'image' => 'Le format de l\'image est invalide'



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