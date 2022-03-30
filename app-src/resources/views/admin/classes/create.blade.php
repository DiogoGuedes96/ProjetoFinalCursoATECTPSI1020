@extends('layouts.bo-admin')
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Criar Turma</h3>
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
    <form action="{{ route('adminClassesSave') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <label class="form-label input" for="indexCurso">Nome do Curso
                    </label>
                    <select class="form-select form-control" id="indexCurso" name="course_id">
                        <option selected>Selecione um Curso</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->course_id }}">{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6 py-2">
                <h6>Data de início</h6>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label  input" for="textboxMes">Mês</label>
                        <input class="form-control" id="textboxMes" type="text" name="course_startMonth" placeholder="Mês">
                    </div>
                    <div class="col-6">
                        <label class="form-label  input" for="textboxAno">Ano</label>
                        <input class="form-control" id="textboxAno" type="text" name="course_startYear" placeholder="Ano">
                    </div>
                </div>
            </div>
            <div class="col-6 py-2">
                <h6>Data de fim</h6>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label  input" for="textboxMes">Mês</label>
                        <input class="form-control" id="textboxMes" type="text" name="course_endMonth" placeholder="Mês">
                    </div>
                    <div class="col-6">
                        <label class="form-label  input" for="textboxAno">Ano</label>
                        <input class="form-control" id="textboxAno" type="text" name="course_endYear" placeholder="Ano">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 py-2">
                <div class="mb-3">
                    <label class="form-label  input" for="selectCoordenador">Nome do Coordenador</label>
                    <select class='form-select form-control' id='selectCoordenador' name='class_coordinator'>
                        <option selected>Selecione uma opção</option>
                        @foreach ($coordinators as $coordinator)
                            <option value="{{ $coordinator->user_id }}">{{ $coordinator->user_name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-sm-12">
                <h4 class="nivel">Local</h4>
            </div>
            <div class="col">
                <div class="form-group m-t-15 custom-radio-ml">
                    <div class="radio radio-primary py-2">
                        <input id="radio1" type="radio" name="class_school" value="Palmela" checked>
                        <label for="radio1">Palmela<span class="digits"> </span></label>
                    </div>
                    <div class="radio radio-primary py-2">
                        <input id="radio2" type="radio" name="class_school" value="Cascais">
                        <label for="radio2">Cascais</label>
                    </div>
                    <div class="radio radio-primary py-2">
                        <input id="radio3" type="radio" name="class_school" value="Matosinhos">
                        <label for="radio3">Matosinhos</label>
                    </div>
                    <div class="radio radio-primary py-2">
                        <input id="radio4" type="radio" name="class_school" value="Carregado">
                        <label for="radio4">Carregado</label>
                    </div>
                    <div class="radio radio-primary py-2">
                        <input id="radio5" type="radio" name="class_school" value="Madeira">
                        <label for="radio5">São João da Madeira</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 py-5">
                <button type="submit" class="btn btn-new ">Criar Turma</button>
            </div>
        </div>
    </form>
</div>
<!-- Container-fluid end-->
@endsection