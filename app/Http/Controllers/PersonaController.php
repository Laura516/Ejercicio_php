<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    function mostrar($nombreusuario = null){
        if($nombreusuario == null){
            return 'Debe ingresar un nombre de usuario';
        }
        return 'Nombre usuario = '.$nombreusuario;
    }
}
