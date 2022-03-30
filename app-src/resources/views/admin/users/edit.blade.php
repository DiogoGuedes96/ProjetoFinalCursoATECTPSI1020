@extends('layouts.bo-admin')
@section('content')
    <div class="container-fluid">
        <div class="page-header py-3">
            <div class="col-md-12 project-list">
                <div class="row">
                    <div class="col-6 p-0">
                        <h3>Editar Utilizador</h3>
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
        <form method="POST" action="{{ route('adminUsersUpdate', $user->user_id) }}">
            @csrf
            <div class="col-sm-12 py-3">
                <div class="mb-3">
                    <div class="mb-3"> 
                        <label class="form-label input" for="indexUserType">Tipo de utilizador
                        </label>
                        <div class="checkbox checkbox-primary">
                            <div class="row">
                                @php
                                    $array = array();
                                    foreach ($user->user_profiles as $profile) {
                                        array_push($array, $profile->profile_type);
                                    }
                                @endphp
                                <div class="col-sm-3">
                                    @if (in_array("Formando", $array))
                                        <input id="checkbox_1" value="1" checked type="checkbox" name="profiles[]">
                                        <label for="checkbox_1">Formando</label>
                                    @else
                                        <input id="checkbox_1" value="1" type="checkbox" name="profiles[]">
                                        <label for="checkbox_1">Formando</label>
                                    @endif
                                </div>
                                <div class="col-sm-3">
                                    @if (in_array("Formador", $array))
                                        <input id="checkbox_2" value="2" checked type="checkbox" name="profiles[]">
                                        <label for="checkbox_2">Formador</label>
                                    @else
                                        <input id="checkbox_2" value="2" type="checkbox" name="profiles[]">
                                        <label for="checkbox_2">Formador</label>
                                    @endif
                                </div>
                                <div class="col-sm-3">
                                    @if (in_array("Coordenador", $array))
                                        <input id="checkbox_3" value="3" checked type="checkbox" name="profiles[]">
                                        <label for="checkbox_3">Coordenador</label>
                                    @else
                                        <input id="checkbox_3" value="3" type="checkbox" name="profiles[]">
                                        <label for="checkbox_3">Coordenador</label>
                                    @endif
                                </div>
                                <div class="col-sm-3">
                                    @if (in_array("Administrador", $array))
                                        <input id="checkbox_4" value="4" checked type="checkbox" name="profiles[]">
                                        <label for="checkbox_4">Administrador</label>
                                    @else
                                        <input id="checkbox_4" value="4" type="checkbox" name="profiles[]">
                                        <label for="checkbox_4">Administrador</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <label class="form-label input" for="nomeUtilizador">Nome do Utilizador
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control" name="user_name" id="nomeUtilizador" type="text" placeholder="" value="{{ $user->user_name }}">
                        </div>
                    </div>
                    <div class="row py-3">
                        <label class="form-label input" for="emailUtilizador">Email do Utilizador
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control" name="email" id="emailUtilizador" type="email" placeholder="email@edu.atec.pt" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="row py-3">
                        <label class="form-label input" for="passwordUtilizador">Password
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control" name="password" id="passwordUtilizador" type="password" placeholder="" value="{{ $user->password }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-12 py-5">
                        <button type="submit" class="btn btn-edit">Editar Utilizador</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection