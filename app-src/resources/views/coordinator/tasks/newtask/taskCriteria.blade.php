@extends('layouts.bo-coordinator')
@section('content')
<div class="container-fluid">
    <div class="page-header py-3">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Biblioteca de critérios</h3>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="container-fluid">
    <form method="POST" action="{{ route('coordinatorNewTaskCriteriaSave',$task->task_id) }}">
        @csrf
        <div class="col-sm-12 py-3">
            <div class="default-according" id="accordion">
                <div class="row">
                    <div class="col-10 col-sm-11">
                        <h5>Critérios Gerais</h5>
                    </div>
                    <div class="col-2 col-sm-1">
                        <h5>Peso</h5>
                    </div>
                </div>
                <hr>
                @foreach ($criterios_gerais as $criteria)
                <div class="card">
                    <div class="card-header card-header-tarefa collapsed" id="{{$id}}headingOne"
                        data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $id}}" aria-expanded="false"
                        aria-controls="collapseOne">
                        <div class="row">
                            <div class="col-10">
                                <h6>{{ $criteria->admin_criteria_name }}</h6>
                            </div>
                            <div class="col-2 text-end">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="checkbox checkbox-primary" style="margin-top: -10px">
                                            <input id="checkbox_gerais_{{$id}}" value="{{ $criteria->admin_criteria_id }}"
                                                type="checkbox" name="criterios_gerais[]">
                                            <label for="checkbox_gerais_{{$id}}" onclick="criteriaActivate({{ $id }}, 'gerais')" style="padding-left: 0"></label>
                                        </div>
                                    </div>
                                    <div class="col-5" id="div_weight_gerais_{{$id}}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collapseOne{{ $id}}" aria-labelledby="{{ $id}}headingOne"
                        data-bs-parent="#accordion" style="">
                        <div class="card-body">
                            <p>{{ $criteria->admin_criteria_text }}</p>
                        </div>
                    </div>
                </div>
                @php
                $id++;
                @endphp
                @endforeach
                <br>
                <div class="row">
                    <div class="col-10 col-sm-11">
                        <h5>Critérios de Curso</h5>
                    </div>
                    <div class="col-2 col-sm-1">
                        <h5>Peso</h5>
                    </div>
                </div>
                <hr>

                @foreach ($criterios_curso as $criteria)
                <div class="card">
                    <div class="card-header card-header-tarefa collapsed" id="{{$id}}headingOne"
                        data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $id}}" aria-expanded="false"
                        aria-controls="collapseOne">
                        <div class="row">
                            <div class="col-10">
                                <h6>{{ $criteria->admin_criteria_name }}</h6>
                            </div>
                            <div class="col-2 text-end">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="checkbox checkbox-primary" style="margin-top: -10px">
                                            <input id="checkbox_curso_{{$id}}" value="{{ $criteria->admin_criteria_id }}"
                                                type="checkbox" name="criterios_curso[]">
                                            <label for="checkbox_curso_{{$id}}" onclick="criteriaActivate({{ $id }}, 'curso')" style="padding-left: 0"></label>
                                        </div>
                                    </div>
                                    <div class="col-5" id="div_weight_curso_{{$id}}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collapseOne{{ $id}}" aria-labelledby="{{ $id}}headingOne"
                        data-bs-parent="#accordion" style="">
                        <div class="card-body">
                            <p>{{ $criteria->admin_criteria_text }}</p>
                        </div>
                    </div>
                </div>
                @php
                $id++;
                @endphp
                @endforeach
                <br>
                <div class="row">
                    <div class="col-10 col-sm-11">
                        <h5>Critérios de Turma</h5>
                    </div>
                    <div class="col-2 col-sm-1">
                        <h5>Peso</h5>
                    </div>
                </div>
                <hr>
                @foreach ($criterios_turma as $criteria)
                <div class="card">
                    <div class="card-header card-header-tarefa collapsed" id="{{$id}}headingOne"
                        data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $id}}" aria-expanded="false"
                        aria-controls="collapseOne">
                        <div class="row">
                            <div class="col-10">
                                <h6>{{ $criteria->coordinator_criteria_name }}</h6>
                            </div>
                            <div class="col-2 text-end">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="checkbox checkbox-primary" style="margin-top: -10px">
                                            <input id="checkbox_turma_{{$id}}" value="{{ $criteria->admin_criteria_id }}"
                                                type="checkbox" name="criterios_turma[]">
                                            <label for="checkbox_turma_{{$id}}" onclick="criteriaActivate({{ $id }}, 'turma')" style="padding-left: 0"></label>
                                        </div>
                                    </div>
                                    <div class="col-5" id="div_weight_turma_{{$id}}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collapseOne{{ $id}}" aria-labelledby="{{ $id}}headingOne"
                        data-bs-parent="#accordion" style="">
                        <div class="card-body">
                            <p>{{ $criteria->coordinator_criteria_text }}</p>
                        </div>
                    </div>
                </div>
                @php
                $id++;
                @endphp
                @endforeach
                <br>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="my-3 d-flex">
            <div class="col-3 col-sm-2">
                <h5 class="mx-2 mt-2">Os seus critérios</h5>
            </div>
            <div class="col-7 col-sm-9">
                <a href="{{ route('teacherCriteriaNew') }}">
                    <button type="button" class="btn btn-new btn-new-tarefa">
                        <i data-feather="plus"></i>
                    </button>
                </a>
                <a href="{{ route('teacherCriteriaNew') }}">
                    <button type="button" class="btn btn-new btn-new-tarefa-mobile">
                        <i data-feather="plus"></i>
                    </button>
                </a>
            </div>
            <div class="col-2 col-sm-1">
                <h5 class="mx-2 mt-2">Peso</h5>
            </div>
        </div>
    </div>
    
    <div class="col-sm-12 py-5">
        <button type="submit" class="btn btn-new mx-1">Continuar</button>
    </div>
    </form>
</div>

<script>
    function criteriaActivate(id, type) {
        switch (type) {
            case 'gerais':
                if (document.getElementById("checkbox_gerais_"+id).checked) {
                    document.getElementById("div_weight_gerais_"+ id).innerHTML = '';
                }else{
                    document.getElementById("div_weight_gerais_"+ id).innerHTML =  '<input class="form-control" name="weight_gerais[]" type="text" style="margin-top: -5px">';
                }
                break;
            case 'curso':
                if (document.getElementById("checkbox_curso_"+id).checked) {
                    document.getElementById("div_weight_curso_"+ id).innerHTML = '';
                }else{
                    document.getElementById("div_weight_curso_"+ id).innerHTML =  '<input class="form-control" name="weight_curso[]" type="text" style="margin-top: -5px">';
                }
                break;
            case 'turma':
                if (document.getElementById("checkbox_turma_"+id).checked) {
                    document.getElementById("div_weight_turma_"+ id).innerHTML = '';
                }else{
                    document.getElementById("div_weight_turma_"+ id).innerHTML =  '<input class="form-control" name="weight_turma[]" type="text" style="margin-top: -5px">';
                }
                break;
            case 'coordinator':
                if (document.getElementById("checkbox_coordinator_"+id).checked) {
                    document.getElementById("div_weight_coordinator_"+ id).innerHTML = '';
                }else{
                    document.getElementById("div_weight_coordinator_"+ id).innerHTML =  '<input class="form-control" name="weight_coordinator[]" type="text" style="margin-top: -5px">';
                }
                break;
            default:
                break;
        }
    }
</script>
@endsection