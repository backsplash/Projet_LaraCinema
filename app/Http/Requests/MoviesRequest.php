<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


/**
 * Class MoviesRequest
 * classe qui modélise le formulaire d'ajout de film
 */

class MoviesRequest extends FormRequest{

    /**
     * retourne un tableau de validation par champ
     */

    public function rules(){

        return [
            'type' => 'required|in:long-metrage, court-metrage',
            'title' => 'required|min:2|unique:movies',
            'synopsis' => 'required|min:10|max:200',
            'description' => 'required|min:20',
            'date_release' => 'required|date_format:d/m/Y|after:now',
            //'date_release' => 'required|regex://[0-9]{2}\/[0-9]{2}\/[0-9]{4}/'
            'image' => 'required|image',
            'languages' => 'regex:/en|fr|es|ge|it/i',
            'bo' => 'required',
            'budget' => 'regex:/^[1-9]([0-9]{1,2})?(([. ]?[0-9]{3})*)([0-9]{3})?(,[0-9]{0,3})?$/',
            'duree' => 'regex:/^[1-9][0-9]{1,2}$/',
            'trailer' => 'regex:/<iframe/',
            'categories_id' => 'required'


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
            'date_format' => 'Mauvais format de date',
            'after' => 'La date doit être plus récente que la date du jour',
            'image' => 'Le format de l\'image est invalide',
            'budget.regex' => 'Le montant doit être valide',
            'trailer.regex' => 'Le code de la vidéo doit être une iframe valide'

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