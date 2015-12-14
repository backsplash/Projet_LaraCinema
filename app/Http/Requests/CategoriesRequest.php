<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


/**
 * Class CategoriesRequest
 * classe qui modélise le formulaire d'ajout de categorie
 */

class CategoriesRequest extends FormRequest{

    /**
     * retourne un tableau de validation par champ
     */

    public function rules(){

        return [
            'title' => 'required|min:2|max:100',
            'desciption' => 'required|min:10|max:700',
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