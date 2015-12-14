<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * Class Administrators
 * @package App\Http\Models
 *
 * on doit implémenter les 3 interfaces
 * pour que la classe model Administrators
 * puisse être support d'authentification,
 * d'autorisation et de mise à zéro du mot de passe
 */

class Administrators extends Model
    implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract{
// implemente les contrats pour le comportement de la classe

    // appel des methodes dans les Traits
    use Authenticatable, Authorizable, CanResetPassword;


    /**
     * table utilisée par le model
     */

    protected $table = 'administrators';








}