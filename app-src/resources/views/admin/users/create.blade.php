@extends('layouts.bo-admin')
@section('content')
    <div class="container-fluid">
        <div class="page-header py-3">
            <div class="col-md-12 project-list">
                <div class="row">
                    <div class="col-6 p-0">
                        <h3>Novo Utilizador</h3>
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
        <form method="POST" action="{{ route('adminUsersSave') }}">
            @csrf
            <div class="col-sm-12 py-3">
                <div class="mb-3">
                    <div class="mb-3"> 
                        <label class="form-label input" for="indexUserType">Tipo de utilizador
                        </label>
                        <div class="checkbox checkbox-primary">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input id="checkbox_1" value="1" type="checkbox" name="profiles[]">
                                    <label for="checkbox_1">Formando</label>
                                </div>
                                <div class="col-sm-3">
                                    <input id="checkbox_2" value="2" type="checkbox" name="profiles[]">
                                    <label for="checkbox_2">Formador</label>
                                </div>
                                <div class="col-sm-3">
                                    <input id="checkbox_3" value="3" type="checkbox" name="profiles[]">
                                    <label for="checkbox_3">Coordenador</label>
                                </div>
                                <div class="col-sm-3">
                                    <input id="checkbox_4" value="4" type="checkbox" name="profiles[]">
                                    <label for="checkbox_4">Administrador</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <label class="form-label input" for="nomeUtilizador">Nome do Utilizador
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control" name="user_name" id="nomeUtilizador" type="text" placeholder="">
                        </div>
                    </div>
                    <div class="row py-3">
                        <label class="form-label input" for="emailUtilizador">Email do Utilizador
                        </label>
                        <div class="col-sm-12">
                            <input onKeyUp="generatePassword(this.value)" class="form-control" name="email" id="emailUtilizador" type="email" placeholder="email@edu.atec.pt">
                        </div>
                    </div>
                    <div class="row py-3">
                        <label class="form-label input" for="passwordUtilizador">Password
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control" name="password" id="passwordUtilizador" type="text" placeholder="Ex: TpsiPL1020" readonly value="">
                        </div>
                    </div>
                    <div class="col-sm-12 py-5">
                        <button type="submit" class="btn btn-new">Criar Utilizador</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        function getFileData(myFile){
            var file = myFile.files[0];  
            var filename = file.name;

            document.getElementById("fileButton").innerHTML = filename;
        }

        function generatePassword(email) {
            var password = email.substr(0, email.indexOf("@"));
            password = password.split('.').join("");
            console.log(password);

            document.getElementById("passwordUtilizador").value = password;
        }
    </script>
@endsection