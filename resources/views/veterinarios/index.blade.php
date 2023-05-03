@extends('templates.main', ['titulo' => "Veterinários", 'rota' => "veterinarios.create"])
@section('titulo') Veterinários @endsection

@section('conteudo')
    <div class="row">
        <div class="col">
            <x-datatable 
                title="Veterinários" 
                crud="veterinarios" 
                :header="['id', 'crmv', 'nome', 'especialidade', 'ações']" 
                :data="$data"
                :hide="[true, false, true, false, true]" 
            /> 
        </div>
    </div>
@endsection