@extends('layouts.bo-coordinator')
@section('content')


<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Alunos | {{ $class->class_name }}</h3>
                </div>
                <div class="col-6 p-0">
                    <div class="bookmark">
                        <ul>
                            <a href="{{ route('coordinatorDashboard') }}"><button class="btn btn-action mx-1">
                                    Voltar <i data-feather="chevron-left"></i>
                                </button></a>
                            <a href="{{ route('coordinatorDashboard') }}"><button
                                    class="btn btn-action btn-action-mobile mx-1">
                                    <i data-feather="chevron-left"></i>
                                </button></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 py-3">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-header-border">
                            <tr class="table-head bg-grey">
                                <th colspan="6">Formando</th>
                            </tr>
                        </thead>
                        <thead class="table-header-border">
                            <tr>
                                <th class="col-6">Nome</th>
                                <th class="col-6">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($students->count() > 0)
                                @foreach ($students as $user)
                                <tr>
                                    <td>{{ $user->user_name }}</td>
                                    <td class="email">{{ $user->email }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10">Não existem formandos nesta turma para serem listados.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection