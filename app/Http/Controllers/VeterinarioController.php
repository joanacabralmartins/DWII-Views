<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VeterinarioController extends Controller
{
    public $veterinarios = [[
        "id" => 1,
        "crmv" => 93283,
        "nome" => "Marcos Santiago",
        "especialidade" => "patologia"
    ]];

    public function __construct() {
        
        $aux = session('veterinarios');

        if(!isset($aux)) {
            session(['veterinarios' => $this->veterinarios]);
        }
    }

    public function index()
    {
        $data = session('veterinarios');

        return view('veterinarios.index', compact(['data']));
    }

    public function create()
    {
        return view('veterinarios.create');
    }

    public function store(Request $request)
    {
        $aux = session('veterinarios');
        $ids = array_column($aux, 'id');

        if(count($ids) > 0) {
            $new_id = max($ids) + 1;
        }
        else {
            $new_id = 1;   
        }

        $novo = [
            "id" => $new_id,
            "crmv" => $request->crmv,
            "nome" => $request->nome,
            "especialidade" => $request->especialidade
        ];

        array_push($aux, $novo);
        session(['veterinarios' => $aux]);

        return redirect()->route('veterinarios.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $aux = session('veterinarios');
            
        $index = array_search($id, array_column($aux, 'id'));

        $dados = $aux[$index];    

        return view('veterinarios.edit', compact('dados'));   
    }

    public function update(Request $request, string $id)
    {
        $aux = session('veterinarios');
        
        $index = array_search($id, array_column($aux, 'id'));

        $novo = [
            "id" => $id,
            "crmv" => $request->crmv,
            "nome" => $request->nome,
            "especialidade" => $request->especialidade
        ];

        $aux[$index] = $novo;
        session(['veterinarios' => $aux]);

        return redirect()->route('veterinarios.index');
    }

    public function destroy(string $id)
    {
        $aux = session('veterinarios');
        
        $index = array_search($id, array_column($aux, 'id')); 

        unset($aux[$index]);

        session(['veterinarios' => $aux]);

        return redirect()->route('veterinarios.index');
    }
}
