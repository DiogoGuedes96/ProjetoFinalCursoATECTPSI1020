@extends('layouts.bo-coordinator')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Editar critério</h3>
                </div>
                <div class="col-6 p-0">
                    <div class="bookmark">
                        <ul>
                            <a href="{{ route('coordinatorDashboard') }}"><button
                                    class="btn btn-action mx-1">
                                    Voltar <i data-feather="chevron-left"></i>
                                </button></a>
                            <a href="{{ route('coordinatorDashboard') }}"><button
                                    class="btn btn-action btn-action-mobile mx-1">
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
    @if ($errors->any()) <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <br><br>
        <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
    </div>@endif
    <div class="row">
        <form action="{{ route('coordinatorCriteriaUpdate', ['turma'=>$class->class_id, 'criteria'=>$criteria->coordinator_criteria_id]) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label class="form-label input" for="indexTurma">Turma
                        </label>
                        <select class="form-select form-control" id="indexTurma" name="coordinator_criteria_class">
                            @foreach ($coordinator->coordinator_classes as $c_class)
                                @if ($c_class->class_id == $class->class_id)
                                    <option selected value="{{$c_class->class_id}}">{{$c_class->class_name}}</option>
                                @else
                                    <option value="{{$c_class->class_id}}">{{$c_class->class_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-sm-10">
                    <label class="form-label input" for="coordinator_criteria_name">Titulo do critério</label>
                    <input class="form-control" type="text" id="coordinator_criteria_name" name="coordinator_criteria_name" placeholder="Dê um título ao critério..." value="{{ $criteria->coordinator_criteria_name }}">
                </div>
                <div class="col-sm-2 pt-sm-0 pt-3">
                    <label class="form-label input" for="coordinator_criteria_scale_type">Tipo de critério</label>
                    <select class='form-select form-control' id='coordinator_criteria_scale_type' name='coordinator_criteria_scale_type'>
                        <option selected>Selecione uma opção</option>
                        @foreach ($criteriaScaleNames as $criteriaScaleName)
                            @if ($criteriaScaleName->scale_id == $criteria->coordinator_criteria_scale_type)
                                <option selected value='{{ $criteriaScaleName->scale_id }}'>{{ $criteriaScaleName->scale_name }}</option>
                            @else
                                <option value='{{ $criteriaScaleName->scale_id }}'>{{ $criteriaScaleName->scale_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12 pb-3">
                <label class="form-label input" for="coordinator_criteria_text">Texto do critério</label>
                <input class="form-control" type="text" id="coordinator_criteria_text" name="coordinator_criteria_text" placeholder="Escreva o criterio completo..." value="{{ $criteria->coordinator_criteria_text }}">
            </div>
            <div class="col-sm-12 py-5">
                <button type="submit" class="btn btn-edit">Editar critério</button>
            </div>
        </form>
    </div>
</div>
@endsection