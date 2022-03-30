@extends('layouts.bo-admin')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="col-md-12 project-list">
                <div class="row">
                    <div class="col-6 p-0">
                        <h3>Utilizadores</h3>
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
              
                              <a href="{{ route('adminUsersCreate') }}"><button class="btn btn-new btn-new-tarefa-mobile mx-1">
                                  <i data-feather="plus"></i>
                              </button></a>
                              <a href="{{ route('adminUsersCreate') }}"><button class="btn btn-new btn-new-tarefa mx-1">
                                  Novo utilizador
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
      @if($msg=Session::get('sucesso'))
          <div class="alert alert-success" role="alert">
              {{ $msg }}
          </div>
      @endif
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
                      <th class="col-4">Nome</th>
                      <th class="col-4">Email</th>
                      <th class="col-3">Função</th>
                      <th class="col-1 text-center">Editar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{ $user->user_name }}</td>
                        <td class="email">{{ $user->email }}</td>
                        <td>
                          |
                          @foreach ($user->user_profiles as $index => $profile)
                            {{ $profile->profile_type }} |
                          @endforeach
                        </td>
                        <td class="text-center">                                                  
                            <div class="dropdown">                              
                                <i class="icon-edit bi bi-pencil-square" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"></i>
                              <ul class="dropdown-menu dropdown-edit" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('adminUsersEdit', $user->user_id) }}">Editar</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="{{ route('adminUsersDelete', $user->user_id) }}">Apagar</a></li>
                              </ul>
                            </div>                                                
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>


@endsection