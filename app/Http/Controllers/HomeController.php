<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Noticia $noticia)
    {
        $noticias = $noticia->all();
        //$noticias = $noticia->where('user_id',auth()->user()->id)->get();

        return view('home', compact('noticias'));
    }

    public function update($idNoticia)
    {
        $noticia = Noticia::find($idNoticia);

        //$this->authorize('update-noticia', $noticia);
        if (Gate::denies('update-noticia', $noticia)) {
            abort(403, 'Voce não tem autorização para executar este procedimento');
            // The current user can't update the post...
        }

        return view('update-noticia', compact('noticia'));
    }
}
