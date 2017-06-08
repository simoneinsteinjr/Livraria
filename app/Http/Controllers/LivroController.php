<?php

namespace App\Http\Controllers;

use App\Area;
use App\Autor;
use App\Http\Requests\LivroRequest;
use App\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livro = Livro::all();
        return view('livros.index',compact('livro'));
    }

    public function create()
    {
        $autores = Autor::pluck('nome','id');
        $areas = Area::pluck('designacao','id');
        return view('livros.create', compact('autores', 'areas'));
    }

    public function store(LivroRequest $rq)
    {
        $livro = new Livro(array (
            "titulo" => $rq->get("titulo"),
            "autor_id" => $rq->get("autor_id"),
            "area_id" => $rq->get("area_id"),
            "edicao"=> $rq->get("edicao"),
            "editora"=> $rq->get("editora"),
            "quantidade"=> $rq->get("quantidade"),
            "preco"=> $rq->get("preco"),
            "documento"=>$rq->file("documento")->getClientOriginalName(),
            "foto"=>$rq->file("foto")->getClientOriginalName()
        ));

        $rq->file("documento")->move( base_path() . '/public/docs' , $rq->file("documento")->getClientOriginalName());
        $rq->file("foto")->move( base_path() . '/public/img' , $rq->file("foto")->getClientOriginalName());

        $livro->save();
        session()->flash('flash_message', 'Adicionado Com Sucesso');
        return redirect('admin');
    }

    public function show($id)
    {
        $livro = Livro::find($id);
        return view('livros.show',compact('livro'));
    }

    public function edit($id)
    {
        $livro = Livro::find($id);
        return view('livros.edit',compact('livro'));
    }

    public function update(LivroRequest $rq, $id)
    {
        $livro2= array (
            "titulo" => $rq->get("titulo"),
            "autor_id" => $rq->get("autor_id"),
            "area_id" => $rq->get("area_id"),
            "edicao"=> $rq->get("edicao"),
            "editora"=> $rq->get("editora"),
            "quantidade"=> $rq->get("quantidade"),
            "preco"=> $rq->get("preco"),
            "documento"=> $rq->get("documento")->getClientOriginalName(),
            "foto"=> $rq->get("foto")->getClientOriginalName()
        );
        $livro = Livro::find($id);
        $livro->update($livro2);
        session()->flash('flash_message', 'Actualizado Com Sucesso');
        return redirect('livros');
    }

    public function destroy($id)
    {
        Livro::find($id)->delete();
        session()->flash('flash_message', 'Removido Com Sucesso');
        return redirect('livros');
    }

}
