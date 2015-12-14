<?php
/**
 * Created by PhpStorm.
 * User: wal13
 * Date: 07/12/15
 * Time: 14:40
 */

namespace App\Http\Controllers;

/**
 * Class MainController
 * @package App\Http\Controllers
 * suffixé par le mot clef Controller, et doit hériter de la super classe Controller
 */
Class MainController extends Controller{

    public function index(){

        return view("Main/index");
    }







}