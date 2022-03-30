@extends('layouts.bo-coordinator')
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Adicionar alunos a uma turma</h3>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<!-- Container-fluid ends-->
<!-- Container-fluid starts-->
<div class="container-fluid">
    @if ($errors->any()) <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <br><br>
        <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
    </div>@endif
    <form action="{{ route('coordinatorStudentsSave') }}" method="post"> <!-- Route de POST para editar perfil -->
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <label class="form-label input" for="indexTurmas">Turmas
                    </label>
                    <select readonly class="form-select form-control" id="indexTurmas" name="turma">
                        <option selected value="{{$class->class_id}}">{{$class->class_name}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <label class="form-label input" for="indexAluno">Alunos
                    </label>
                        @foreach ($studentsInClass as $studentInClass)
                            <div class="checkbox checkbox-primary">
                                <input checked id="checkbox_{{ $studentInClass->user_id }}" value="{{ $studentInClass->user_id }}" type="checkbox" name="students[]">
                                <label for="checkbox_{{ $studentInClass->user_id }}">{{ $studentInClass->user_name }}</label>
                            </div>
                        @endforeach
                    @foreach ($students as $student)
                        @php
                            $print = 1
                        @endphp
                        @foreach ($studentsInClass as $studentInClass)
                            @if ($student->user_id == $studentInClass->user_id)
                                @php
                                    $print = 0
                                @endphp
                            @endif
                        @endforeach
                        @if ($print == 1)
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox_{{ $student->user_id }}" value="{{ $student->user_id }}" type="checkbox" name="students[]">
                            <label for="checkbox_{{ $student->user_id }}">{{ $student->user_name }}</label>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-12 pt-5">
            <button class="btn btn-new" type="submit">Adicionar aluno</button>
        </div>
    </form>
</div>
@endsection