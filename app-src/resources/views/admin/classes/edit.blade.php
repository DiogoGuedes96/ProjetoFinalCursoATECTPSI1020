@extends('layouts.bo-admin')
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Editar Turma</h3>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<!-- Container-fluid end-->
<!-- Container-fluid starts-->
<div class="container-fluid">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <br><br>
            <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
        </div>
    @endif
    <form action="{{ route('adminClassesUpdate', $class->class_id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <label class="form-label input" for="indexCurso">Nome do Curso
                    </label>
                    <select class="form-select form-control" id="indexCurso" name="course_id">
                        <option selected>Selecione um Curso</option>
                        @foreach ($courses as $course)
                            @if ($course->course_id == $class->course_id)
                                <option selected value="{{ $course->course_id }}">{{ $course->course_name }}</option>
                            @else
                                <option value="{{ $course->course_id }}">{{ $course->course_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6 py-2">
                <h6>Data de início</h6>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label  input" for="textboxMes">Mês</label>
                        <input class="form-control" id="textboxMes" type="text" name="course_startMonth" placeholder="Mês" value="{{ $class->class_startdate }}">
                    </div>
                    <div class="col-6">
                        <label class="form-label  input" for="textboxAno">Ano</label>
                        <input class="form-control" id="textboxAno" type="text" name="course_startYear" placeholder="Ano" value="{{ $class->class_startdate }}">
                    </div>
                </div>
            </div>
            <div class="col-6 py-2">
                <h6>Data de fim</h6>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label  input" for="textboxMes">Mês</label>
                        <input class="form-control" id="textboxMes" type="text" name="course_endMonth" placeholder="Mês" value="{{ $class->class_enddate }}">
                    </div>
                    <div class="col-6">
                        <label class="form-label  input" for="textboxAno">Ano</label>
                        <input class="form-control" id="textboxAno" type="text" name="course_endYear" placeholder="Ano" value="{{ $class->class_enddate }}">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 py-2">
                <div class="mb-3">
                    <label class="form-label  input" for="textboxCoordenador">Nome do Coordenador</label>
                    <select class='form-select form-control' id='selectCoordenador' name='class_coordinator'>
                        @foreach ($coordinators as $coordinator)
                            @if ($coordinator->user_id == $class->coordinator_id)
                                <option selected value="{{ $coordinator->user_id }}">{{ $coordinator->user_name }}</option>
                            @else
                                <option value="{{ $coordinator->user_id }}">{{ $coordinator->user_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <h4 class="nivel">Localidade da turma</h4>
            </div>
            <div class="col">
                <div class="form-group m-t-15 custom-radio-ml">
                    <div class="radio radio-primary py-2">
                        @if ($class->class_school == "Palmela")
                            <input id="radio1" type="radio" name="class_school" value="Palmela" checked>
                            <label for="radio1">Palmela<span class="digits"> </span></label>
                        @else
                            <input id="radio1" type="radio" name="class_school" value="Palmela">
                            <label for="radio1">Palmela<span class="digits"> </span></label>
                        @endif
                    </div>
                    <div class="radio radio-primary py-2">
                        @if ($class->class_school == "Cascais")
                            <input id="radio1" type="radio" name="class_school" value="Cascais" checked>
                            <label for="radio1">Cascais<span class="digits"> </span></label>
                        @else
                            <input id="radio1" type="radio" name="class_school" value="Cascais">
                            <label for="radio1">Cascais<span class="digits"> </span></label>
                        @endif
                    </div>
                    <div class="radio radio-primary py-2">
                        @if ($class->class_school == "Matosinhos")
                            <input id="radio1" type="radio" name="class_school" value="Matosinhos" checked>
                            <label for="radio1">Matosinhos<span class="digits"> </span></label>
                        @else
                            <input id="radio1" type="radio" name="class_school" value="Matosinhos">
                            <label for="radio1">Matosinhos<span class="digits"> </span></label>
                        @endif
                    </div>
                    <div class="radio radio-primary py-2">
                        @if ($class->class_school == "Carregado")
                            <input id="radio1" type="radio" name="class_school" value="Carregado" checked>
                            <label for="radio1">Carregado<span class="digits"> </span></label>
                        @else
                            <input id="radio1" type="radio" name="class_school" value="Carregado">
                            <label for="radio1">Carregado<span class="digits"> </span></label>
                        @endif
                    </div>
                    <div class="radio radio-primary py-2">
                        @if ($class->class_school == "São João da Madeira")
                            <input id="radio1" type="radio" name="class_school" value="São João da Madeira" checked>
                            <label for="radio1">São João da Madeira<span class="digits"> </span></label>
                        @else
                            <input id="radio1" type="radio" name="class_school" value="São João da Madeira">
                            <label for="radio1">São João da Madeira<span class="digits"> </span></label>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-12 py-5">
                <button type="submit" class="btn btn-edit">Editar Turma</button>
            </div>
        </div>
    </form>
</div>
<!-- Container-fluid end-->
@endsection
