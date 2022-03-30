@extends('layouts.bo-admin')
@section('content')
    <!-- Container-fluid ends-->
    <div class="container-fluid">
        <div class="page-header">
          <div class="col-md-12 project-list">
            <div class="row">
              <div class="col-6 p-0">
                <h3>Cursos</h3>
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
                    
                    <a href="{{ route('adminCoursesCreate') }}"><button class="btn btn-new btn-new-tarefa-mobile mx-1">
                        <i data-feather="plus"></i>
                    </button></a>
                    <a href="{{ route('adminCoursesCreate') }}"><button class="btn btn-new btn-new-tarefa mx-1">
                        Novo Curso
                    </button></a>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <hr>
        </div>

        <div class="col-sm-12 py-5">
          @if($msg=Session::get('sucesso'))
              <div class="alert alert-success" role="alert">
                  {{ $msg }}
              </div>
          @endif
          <div class="card">
              <div class="table-responsive">
                  <table class="table table-responsive table-striped">
                      <thead class="table-header-border">
                          <tr class="table-head bg-grey">
                              <th colspan="6">Cursos</th>
                          </tr>
                      </thead>
                      <thead class="table-header-border">
                          <tr>
                              <th class="col-6">Nome do curso</th>
                              <th class="col-2">Sigla</th>
                              <th class="col-2">Nível</th>
                              <th class="col-2 text-center">Editar</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($courses as $course)
                        <tr>
                          <td>{{ $course->course_name }}</td>
                          <td class="sigla">{{ $course->course_slug }}</td>
                          <td class="nivel">{{ $course->course_cet }}</td>
                          <td class="text-center">                                                  
                            <div class="dropdown">                              
                                <i class="icon-edit bi bi-pencil-square" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"></i>
                              <ul class="dropdown-menu dropdown-edit" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('adminCoursesEdit', $course->course_id) }}">Editar</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="{{ route('adminCoursesDelete', $course->course_id) }}">Apagar</a></li>
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
    

@endsection