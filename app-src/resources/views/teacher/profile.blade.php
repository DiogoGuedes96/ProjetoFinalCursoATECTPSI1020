<!--Pagina de perfil de um utilizador da aplicacao-->
@extends('layouts.bo-teacher')

@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Perfil de Utilizador</h3>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<!-- Container-fluid ends-->
<!-- Container-fluid starts-->
<div class="container-fluid">
    @if($msg=Session::get('sucesso'))
        <div class="alert alert-success" role="alert">
            {{ $msg }}
        </div>
    @endif
    @if($msg=Session::get('error'))
        <div class="alert alert-danger" role="alert">
            {{ $msg }}
        </div>
    @endif
    @if ($errors->any()) <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <br><br>
        <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
    </div>@endif
    <form action="{{ route('teacherProfileEdit') }}" method="post" enctype="multipart/form-data"> <!-- Route de POST para editar perfil -->
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="form-label input" for="textBoxNome">Name</label>
                    <input class="form-control" id="textBoxNome" name="user_name" type="text" value="{{ auth()->user()->user_name }}">
 
                    
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="form-label  input" for="textBoxEmail">Email</label>
                    <input class="form-control" id="textBoxEmail" name="email" type="email" value="{{ auth()->user()->email }}" readonly>
                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="form-label  input" for="textBoxPassword">Password</label>
                    <input class="form-control" id="textBoxPassword" name="user_password" type="password" placeholder="A sua password">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="form-label  input" for="textBoxConfirmPassword">Confirmar password</label>
                    <input class="form-control" id="textBoxConfirmPassword" name="confirmPassword" type="password" placeholder="Confirmar a sua password">
                </div>
            </div>
        </div>
        <div class="col-sm-12 pt-5">
            <button type="button" class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#modalConfirm" for="modalConfirm" >Editar Perfil</button>
        </div>

        <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="modalConfirm" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <h6>Deseja avançar com a edição dos seus dados?</h6>
                </div>

                <div class="modal-footer text-center">
                    <button class="btn btn-trash" type="button" data-bs-dismiss="modal">Não</button>
                    <button class="btn btn-new" type="submit">Sim</button>
                </div>
              </div>
            </div>
        </div>
    </form>
</div>
<!-- Container-fluid ends-->
@endsection


