<?php

namespace App\Http\Controllers;

use App\Area;
use App\Http\Requests\AreaRequest;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $area = Area::all();
        return view('areas.index',compact('area'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(AreaRequest $rq)
    {
        $area = new Area(array (
            "designacao" =>$rq->get("designacao"),
            "descricao"=>$rq->get("descricao")
        ));

        $area->save();
        session()->flash('flash_message', 'Adicionado Com Sucesso');
        return redirect('admin');
    }

    public function show($id)
    {
        $area=Area::find($id);
        return view('areas.show',compact('area'));
    }

    public function edit($id)
    {
        $area=Area::find($id);
        return view('areas.edit',compact('area'));
    }

    public function update(AreaRequest $rq, $id)
    {
        $area2= array (
            "designacao" =>$rq->get("designacao"),
            "descricao"=>$rq->get("descricao")
        );
        $area=Area::find($id);
        $area->update($area2);
        session()->flash('flash_message', 'Actualizado Com Sucesso');
        return redirect('areas');
    }

    public function destroy($id)
    {
        Area::find($id)->delete();
        session()->flash('flash_message', 'Removido Com Sucesso');
        return redirect('areas');
    }
}
