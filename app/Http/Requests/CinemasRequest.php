<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


/**
 * Class ActorsRequest
 * classe qui modélise le formulaire d'ajout d'acteur
 */

class CinemasRequest extends FormRequest{

    /**
     * retourne un tableau de validation par champ
     */

    public function rules(){

        return [
            'title' => 'required|min:2|max:100',
            'ville' => 'required|min:2|max:100|regex:/^[0-9a-z -éèêëàâäîïôüûù\,]{2,}$/i',
            'position' => 'required|integer|min:1'





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