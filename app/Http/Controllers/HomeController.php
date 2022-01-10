<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function categorias()
    {
        return view('pages.categoria.category');
    }

    public function comandos()
    {
        return view('pages.comandos.comandos');
    }

    public function usuarios()
    {
        return view('pages.usuarios.usuarios');
    }

    public function api()
    {
        return view('pages.api.api');
    }

}
