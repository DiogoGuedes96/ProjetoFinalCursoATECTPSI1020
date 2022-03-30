@extends('layouts.bo-coordinator')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Formadores</h3>
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
                                <th colspan="6">Formador</th>
                            </tr>
                        </thead>
                        <thead class="table-header-border">
                            <tr>
                                <th class="col-3">Numero</th>
                                <th class="col-3">UFCD</th>
                                <th class="col-3">Nome</th>
                                <th class="col-3">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($teachers->count() > 0)
                                @foreach ($teachers as $index => $teacher)
                                    @foreach($allufcds[$index] as $ufcd)
                                            <tr>
                                                <td>{{ $ufcd->ufcd_number }}</td>
                                                <td class="">{{ $ufcd->ufcd_name }}</td> 
                                                <td>{{ $teacher->user_name }}</td>
                                                <td class="">{{ $teacher->email }}</td>
                                            </tr>
                                    @endforeach
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10">Não existem formadores nesta turma para serem listados.</td>
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