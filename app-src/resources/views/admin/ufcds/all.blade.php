@extends('layouts.bo-admin')
@section('content')
<div class="container-fluid">
    <div class="page-header">
      <div class="col-md-12 project-list">
        <div class="row">
          <div class="col-6 p-0">
            <h3>UFCD</h3>
          </div>
          <div class="col-6 p-0">
            <div class="bookmark">
              <ul>
                <a href="{{ route('dashboardAdmin') }}"><button class="btn btn-action mx-1">
                  Voltar <i data-feather="chevron-left"></i>
                </button></a>
                <a href="{{ route('dashboardAdmin') }}"><button class="btn btn-action btn-action-mobile mx-1">
                    <i data-feather="chevron-left"></i>
                </button></a>

                <a href="{{ route('adminUfcdNew') }}"><button class="btn btn-new btn-new-tarefa-mobile mx-1">
                    <i data-feather="plus"></i>
                </button></a>
                <a href="{{ route('adminUfcdNew') }}"><button class="btn btn-new btn-new-tarefa mx-1">
                    Nova UFCD
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
      @if($msg=Session::get('sucesso'))
          <div class="alert alert-success" role="alert">
            {{ $msg }}
          </div>
        @endif
      <div class="card">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead class="table-header-border">
              <tr class="table-head bg-grey">
                <th colspan="6">UFCD</th>
              </tr>
            </thead>
            <thead class="table-header-border">
              <tr>
                <th class="col-8">Nome</th>
                <th class="col-2">Número</th>
                <th class="col-2 text-center">Editar</th>
              </tr>
            </thead>
            <tbody>
                @if (sizeof($ufcds) > 0)
                  @foreach ($ufcds as $ufcd)
                    <tr>
                      <td>{{ $ufcd->ufcd_name }}</td>
                      <td>{{ $ufcd->ufcd_number }}</td>
                      <td class="text-center">                                                  
                        <div class="dropdown">                              
                          <i class="icon-edit bi bi-pencil-square" id="dropdownMenuButton_{{ $ufcd->ufcd_number }}" data-bs-toggle="dropdown" aria-expanded="false"></i>
                          <ul class="dropdown-menu dropdown-edit" aria-labelledby="dropdownMenuButton_{{ $ufcd->ufcd_number }}">
                            <li><a class="dropdown-item" href="{{ route('adminUfcdEdit', $ufcd->ufcd_number) }}">Editar</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="{{ route('adminUfcdDelete', $ufcd->ufcd_number) }}">Apagar</a></li>
                          </ul>
                        </div>                                                
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="10">Não existem UFCDs para serem listadas</td>
                  </tr>
                @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection