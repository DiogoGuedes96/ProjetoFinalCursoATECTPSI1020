@extends('layouts.bo-coordinator')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Turmas</h3>
                </div>
                <div class="col-6 p-0">
                    <div class="bookmark">
                        <ul>
                            <a href="{{ route('coordinatorDashboard') }}"><button class="btn btn-action mx-1">
                              Voltar <i data-feather="chevron-left"></i>
                            </button></a>
                            <a href="{{ route('coordinatorDashboard') }}"><button class="btn btn-action btn-action-mobile mx-1">
                                <i data-feather="chevron-left"></i>
                            </button></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 py-5">
            @if($msg=Session::get('sucesso'))
                <div class="alert alert-success" role="alert">
                    {{ $msg }}
                </div>
            @endif
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-responsive table-striped">
                        <thead class="table-header-border">
                            <tr class="table-head bg-grey">
                                <th colspan="6">Turmas</th>
                            </tr>
                        </thead>
                        <thead class="table-header-border">
                            <tr>
                                <th class="col-3">Nome da Turma</th>
                                <th class="col-3">Coordenador</th>
                                <th class="col-2">Data Início</th>
                                <th class="col-2">Data Fim</th>
                                <th class="col-2 text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coordinator->coordinator_classes as $class)
                                <tr>
                                    <td>{{ $class->class_name }}</td>
                                    <td>{{ $class->class_coordinator }}</td>
                                    <td>{{ $class->class_startdate }}</td>
                                    <td>{{ $class->class_enddate }}</td>
                                    <td class="text-center">                                                  
                                    <div class="dropdown">                              
                                        <i class="icon-edit bi bi-pencil-square" id="dropdownMenuButton_{{ $class->class_id }}" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                        <ul class="dropdown-menu dropdown-edit" aria-labelledby="dropdownMenuButton_{{ $class->class_id }}">
                                        <li><a class="dropdown-item" href="{{ route('adminClassesEdit', $class->class_id) }}">Editar</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a class="dropdown-item" href="{{ route('adminClassesDelete', $class->class_id) }}">Apagar</a></li>
                                        </ul>
                                    </div>                                                
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection