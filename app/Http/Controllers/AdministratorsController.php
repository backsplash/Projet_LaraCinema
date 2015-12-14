<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\Administrators;

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


    }

    public function edit($id){


    }





}