@extends('layouts.bo-admin')
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Editar curso</h3>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<!-- Container-fluid ends-->
<!-- Container-fluid starts-->
<div class="container-fluid">
    @if ($errors->any()) 
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <br><br>
            <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
        </div>
    @endif
    <form action="{{ route('adminCoursesUpdate', $course->course_id) }}" method="post"> <!-- Route de POST para editar perfil -->
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <label class="input" for="textBoxName">Nome do Curso</label>
                    <input class="form-control" id="textBoxName" name="course_name" type="name" value="{{ $course->course_name }}" placeholder="Ex.: Técnico de Programação e Sistemas Informáticos">
                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-sm-12">
                <div class="mb-3">
                    <label class="input" for="textBoxSigla">Sigla do Curso</label>
                    <input class="form-control" id="textBoxSigla" name="course_slug" type="name" value="{{ $course->course_slug }}" placeholder="Ex.: TPSI">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 py-3">
                <h6>Nível do Curso</h6>
                <div class="form-check">
                    @if ($course->course_cet == 4)
                        <input class="form-check-input" type="radio" name="course_cet" checked id="nivel4" value="4">
                        <label class="form-check-label" for="nivel4">Nível 4</label>
                    @else
                        <input class="form-check-input" type="radio" name="course_cet" id="nivel4" value="4">
                        <label class="form-check-label" for="nivel4">Nível 4</label>
                    @endif
                </div>
                <div class="form-check">
                    @if ($course->course_cet == 5)
                        <input class="form-check-input" type="radio" name="course_cet" checked id="nivel5" value="5">
                        <label class="form-check-label" for="nivel5">Nível 5</label>
                    @else
                        <input class="form-check-input" type="radio" name="course_cet" id="nivel5" value="5">
                        <label class="form-check-label" for="nivel5">Nível 5</label>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <label class="form-label input" for="indexCurriculo">Curriculo
                    </label>
                    <select class="form-select form-control" id="indexCurriculo" name="curriculum_id">
                        <option selected>Selecione um curriculo</option>
                        @foreach ($curriculums as $curriculum)
                            @if ($curriculum->curriculum_id == $course->curriculum_id)
                                <option selected value="{{$curriculum->curriculum_id}}">{{$curriculum->curriculum_name}}</option>
                            @else
                                <option value="{{$curriculum->curriculum_id}}">{{$curriculum->curriculum_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-12 pt-5">
            <button class="btn btn-edit" type="submit">Editar Curso</button>
        </div>
        
    </form>
</div>


@endsection
