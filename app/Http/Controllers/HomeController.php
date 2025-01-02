<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Funcionario;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function funcionarios()
    {
        $funcionarios = Funcionario::orderBy ('nome','ASC')->get();
        return view('controleAcesso.controleDeAcesso', compact('funcionarios'));
        
        

    }

   /* public function min()
    {
        $produtos = Produto::all();
        //$produtos = Produto::where('quantidade', '<=', 'quantidade_min')->get();
      
        return view('home', compact('produtos'));


    } */
}
