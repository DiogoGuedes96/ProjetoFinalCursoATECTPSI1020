@extends('layouts.bo-admin')
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Novo curso</h3>
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
    <form action="{{ route('adminCoursesSave') }}" method="post"> <!-- Route de POST para editar perfil -->
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <label class="input" for="textBoxName">Nome do Curso</label>
                    <input class="form-control" id="textBoxName" name="course_name" type="name" value="" placeholder="Ex.: Técnico de Programação e Sistemas Informáticos">
                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-sm-12">
                <div class="mb-3">
                    <label class="input" for="textBoxSigla">Sigla do Curso</label>
                    <input class="form-control" id="textBoxSigla" name="course_slug" type="name" placeholder="Ex.: TPSI">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 py-3">
                <h6>Nível do Curso</h6>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="course_cet" id="nivel4" value="4">
                    <label class="form-check-label" for="nivel4">Nível 4</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="course_cet" id="nivel5" value="5">
                    <label class="form-check-label" for="nivel5">Nível 5</label>
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
                            <option value="{{$curriculum->curriculum_id}}">{{$curriculum->curriculum_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-12 pt-5">
            <button class="btn btn-new" type="submit">Criar Curso</button>  <!--data-bs-toggle="modal" data-bs-target="#modalConfirm"-->
        </div>
        <!--<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="modalConfirm" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <h6>Deseja avançar com a criação do seguinte curso?</h6>
                </div>
                <div class="modal-footer text-center">
                  <button class="btn btn-no" type="button" data-bs-dismiss="modal">Não</button>
                  <button class="btn btn-yes" type="submit">Sim</button>
                </div>
              </div>
            </div>
          </div>-->
    </form>
</div>


@endsection