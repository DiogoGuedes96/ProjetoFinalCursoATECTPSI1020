@extends('layouts.bo-teacher')

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
                            <a href="{{ route('teacherDashboard') }}"><button
                                    class="btn btn-action mx-1">
                                    Voltar <i data-feather="chevron-left"></i>
                                </button></a>
                            <a href="{{ route('teacherDashboard') }}"><button
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
    <div class="row">
        <form action="{{ route('teacherCriteriaSave') }}" method="post">
            @csrf
            <div class="row py-3">
                <div class="col-sm-10">
                    <label class="form-label input" for="criteria_title">Titulo do critério</label>
                    <input class="form-control" type="text" id="criteria_title" value="{{old('teacher_criteria_name')}}" name="teacher_criteria_name" placeholder="Dê um título ao critério...">
                </div>
                <div class="col-sm-2 pt-sm-0 pt-3">
                    <label class="form-label input" for="criteria_type">Tipo de critério</label>
                    <select class='form-select form-control' id='criteria_type' name='teacher_criteria_scale_type'>
                        <option selected>Selecione uma opção</option>
                        @foreach ($criteriaScaleNames as $criteriaScaleName)
                            <option value='{{ $criteriaScaleName->scale_id }}'>{{ $criteriaScaleName->scale_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12 pb-3">
                <label class="form-label input" for="criteria_text">Texto do critério</label>
                <input class="form-control" type="text" id="criteria_text" value="{{old('teacher_criteria_text')}}" name="teacher_criteria_text" placeholder="Escreva o criterio completo...">
            </div>
            <div class="col-sm-12 py-5">
                <button type="submit" class="btn btn-new">Novo critério</button>
            </div>
        </form>
    </div>
</div>
@endsection
