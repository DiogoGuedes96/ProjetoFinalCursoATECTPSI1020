@extends('layouts.bo-admin')

@section('content')
<div class="container-fluid">
    <div class="page-header py-3">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Novo curriculo</h3>
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
    <form method="POST" action="{{ route('adminCurriculumSave') }}">
        @csrf
        <div class="col-sm-12 py-3">
            <div class="mb-3">
                <div class="row py-3">
                    <label class="form-label input" for="nomeCurriculum">Nome do curriculo
                    </label>
                    <div class="col-sm-12">
                        <input class="form-control" name="curriculum_name" id="nomeCurriculum" type="text" placeholder="Ex: TPSI 1020">
                    </div>
                </div>
                <div class="row py-3">
                    @foreach ($ufcds as $ufcd)
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox_{{ $ufcd->ufcd_number }}" value="{{ $ufcd->ufcd_number }}" type="checkbox" name="ufcds[]">
                            <label for="checkbox_{{ $ufcd->ufcd_number }}">{{ $ufcd->ufcd_number }} - {{ $ufcd->ufcd_name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="col-sm-12 py-5">
                    <button type="submit" class="btn btn-new">Criar curriculo</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
```