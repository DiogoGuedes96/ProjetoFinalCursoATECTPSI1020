@extends('layouts.bo-coordinator')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Criar critério</h3>
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
        <form action="{{ route('coordinatorCriteriaSave') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label class="form-label input" for="indexTurma">Turma
                        </label>
                        <select readonly class="form-select form-control" id="indexTurma" name="class_id">
                            <option selected value="{{$class->class_id}}">{{$class->class_name}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-sm-10">
                    <label class="form-label input" for="criteria_title">Titulo do critério</label>
                    <input class="form-control" type="text" id="criteria_title" name="coordinator_criteria_name" placeholder="Dê um título ao critério...">
                </div>
                <div class="col-sm-2 pt-sm-0 pt-3">
                    <label class="form-label input" for="criteria_type">Tipo de critério</label>
                    <select class='form-select form-control' id='criteria_type' name='coordinator_criteria_scale_type'>
                        <option selected>Selecione uma opção</option>
                        @foreach ($criteriaScaleNames as $criteriaScaleName)
                            <option value='{{ $criteriaScaleName->scale_id }}'>{{ $criteriaScaleName->scale_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12 pb-3">
                <label class="form-label input" for="criteria_text">Texto do critério</label>
                <input class="form-control" type="text" id="criteria_text" name="coordinator_criteria_text" placeholder="Escreva o criterio completo...">
            </div>
            <div class="col-sm-12 py-5">
                <button type="submit" class="btn btn-new">Novo critério</button>
            </div>
        </form>
    </div>
</div>
@endsection
