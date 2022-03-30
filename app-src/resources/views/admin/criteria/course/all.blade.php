@extends('layouts.bo-admin')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Critérios de curso</h3>
                </div>
                <div class="col-6 p-0">
                    <div class="bookmark">
                        <ul>
                            <a href="{{ route('dashboardAdmin') }}"><button class="btn btn-action mx-1">
                                    Voltar <i data-feather="chevron-left"></i>
                                </button></a>
                            <a href="{{ route('dashboardAdmin') }}"><button
                                    class="btn btn-action btn-action-mobile mx-1">
                                    <i data-feather="chevron-left"></i>
                                </button></a>

                            <a href="{{ route('adminCourseCriteriaNew') }}"><button
                                    class="btn btn-new btn-new-tarefa-mobile mx-1">
                                    <i data-feather="plus"></i>
                                </button></a>
                            <a href="{{ route('adminCourseCriteriaNew') }}"><button
                                    class="btn btn-new btn-new-tarefa mx-1">
                                    Novo Critério de Curso
                                </button></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="col-sm-12">
        <label class="form-label input" for="indexCurso">Nome do Curso
        </label>
        <select class="form-select form-control" id="indexCurso" name="course_id">
            <option selected>Selecione um Curso</option>
            @foreach ($courses as $course)
                <option value="{{ $course->course_id }}">{{ $course->course_name }}</option>
            @endforeach
        </select>
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
                            <th colspan="6">Critérios gerais</th>
                        </tr>
                    </thead>
                    <thead class="table-header-border">
                        <tr>
                            <th class="col-7">Titulo do critério</th>
                            <th class="col-5">Tipo de critério</th>
                            <th class="col-2 text-center">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courseCriteria as $criteria)
                        <tr>
                            <td>{{ $criteria->admin_criteria_name }}</td>
                            <td>{{ $criteria->criteria_scale->scale_name }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <i class="icon-edit bi bi-pencil-square" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu dropdown-edit" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item"
                                                href="{{ route('adminCourseCriteriaEdit', $criteria->admin_criteria_id) }}">Editar</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a class="dropdown-item"
                                                href="{{ route('adminCourseCriteriaDelete', $criteria->admin_criteria_id) }}">Apagar</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection