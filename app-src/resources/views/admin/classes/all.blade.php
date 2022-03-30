@extends('layouts.bo-admin')
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
                            <a href="{{ route('dashboardAdmin') }}"><button class="btn btn-action mx-1">
                              Voltar <i data-feather="chevron-left"></i>
                            </button></a>
                            <a href="{{ route('dashboardAdmin') }}"><button class="btn btn-action btn-action-mobile mx-1">
                                <i data-feather="chevron-left"></i>
                            </button></a>
            
                            <a href="{{ route('adminClassesCreate') }}"><button class="btn btn-new btn-new-tarefa-mobile mx-1">
                                <i data-feather="plus"></i>
                            </button></a>
                            <a href="{{ route('adminClassesCreate') }}"><button class="btn btn-new btn-new-tarefa mx-1">
                                Nova Turma
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
        <div class="col-sm-12">
            <div class="mb-3">
                <label class="form-label input" for="select-course">Nome do Curso
                </label>
                <select class="form-select form-control" id="select-course">
                    <option value="0" selected>Todas</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->course_id }}">{{ $course->course_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
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
                        <tbody id="table_body">
                            @foreach ($classes as $class)
                                <tr>
                                    <td>{{ $class->class_name }}</td>
                                    <td>{{ $class->coordinator->user_name }}</td>
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

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $("#select-course").change(function(e){
  
        e.preventDefault();

        var course = $(this,':selected').val();

        $.ajax({
            type:'POST',
            url:"{{ route('adminClassesByCourse') }}",
            data:{course:course},
            success:function(data){
                $("#table_body").html("");
                if (data.classes != "") {
                    $.each(data.classes, function(i, item) {
                        $("#table_body").append('<tr><td>' + data.classes[i].class_name + '</td><td>' + data.coordinators[i].user_name + '</td><td>' + data.classes[i].class_startdate + '</td><td>' + data.classes[i].class_enddate + '</td><td class="text-center"><div class="dropdown"><i class="icon-edit bi bi-pencil-square" id="dropdownMenuButton_{{ $class->class_id }}" data-bs-toggle="dropdown" aria-expanded="false"></i><ul class="dropdown-menu dropdown-edit" aria-labelledby="dropdownMenuButton_' + data.classes[i].class_id + '"><li><a class="dropdown-item" href="{{ route('adminClassesEdit', ' + data.classes[i].class_id + ') }}">Editar</a></li><div class="dropdown-divider"></div><li><a class="dropdown-item" href="{{ route('adminClassesDelete', ' + data.classes[i].class_id + ') }}">Apagar</a></li></ul></div></td></td></tr>');
                    });
                }else{
                    $("#table_body").append('<tr><td colspan="10">Não existem turmas para serem listadas.</td></tr>')
                }
            }
        });
    });
</script>
@endsection