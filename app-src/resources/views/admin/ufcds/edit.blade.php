@extends('layouts.bo-admin')

@section('content')
    <div class="container-fluid">
        <div class="page-header py-3">
                <div class="col-md-12 project-list">
                    <div class="row">
                        <div class="col-6 p-0">
                            <h3>Editar UFCD</h3>
                        </div>
                    </div>
                </div>
            <hr>
        </div>
    </div>
    <div class="container-fluid">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route('adminUfcdUpdate', $ufcd->ufcd_number) }}" method="POST">
            @csrf
            <div class="col-sm-12 py-3">
                <div class="mb-3">
                    <div class="row py-3">
                        <label class="form-label input" for="nomeUFCD">Nome da UFCD
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control" name="nome" id="nomeUFCD" type="text" placeholder="Ex: Engenharia de Software" value="{{ $ufcd->ufcd_name }}">
                        </div>
                    </div>
                    <div class="row py-3">
                        <label class="form-label input" for="numeroUFCD">Numero da UFCD
                        </label>
                        <div class="col-sm-12">
                            <input class="form-control" name="numero" id="numeroUFCD" type="text" placeholder="Ex: 5114" disabled value="{{ $ufcd->ufcd_number }}">
                        </div>
                    </div>
                    <div class="col-sm-12 py-5">
                        <button type="submit" class="btn btn-edit">Editar UFCD</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection