<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Http\Requests\AutorRequest;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autor = Autor::all();
        return view('autores.index',compact('autor'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(AutorRequest $rq)
    {
        $autor = new Autor(array (
            "nome" =>$rq->get("nome"),
            "apelido" =>$rq->get("apelido"),
            "genero" =>$rq->get("genero"),
            "dataNascimento" =>$rq->get("dataNascimento"),
            "foto"=>$rq->file("foto")->getClientOriginalName()
        ));

        $rq->file("foto")->move( base_path() . '/public/img' , $rq->file("foto")->getClientOriginalName());

        $autor->save();
        session()->flash('flash_message', 'Adicionado Com Sucesso');
        return redirect('admin');
    }

    public function show($id)
    {
        $autor=Autor::find($id);
        return view('autores.show',compact('autor'));
    }

    public function edit($id)
    {
        $autor=Autor::find($id);
        return view('autores.edit',compact('autor'));
    }

    public function update(AutorRequest $rq, $id)
    {
        $autor2= array (
            "nome" =>$rq->get("nome"),
            "apelido" =>$rq->get("apelido"),
            "genero" =>$rq->get("genero"),
            "dataNascimento" =>$rq->get("dataNascimento"),
            "foto"=>$rq->get("foto")
        );
        $autor=Autor::find($id);
        $autor->update($autor2);
        session()->flash('flash_message', 'Actualizado Com Sucesso');
        return redirect('autores');
    }

    public function destroy($id)
    {
        Autor::find($id)->delete();
        session()->flash('flash_message', 'Removido Com Sucesso');
        return redirect('autores');
    }
}
