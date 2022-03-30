@extends('layouts.bo-admin')
@section('content')
<div class="container-fluid">
    <div class="page-header">
      <div class="col-md-12 project-list">
        <div class="row">
          <div class="col-6 p-0">
            <h3>Curriculum</h3>
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

                <a href="{{ route('adminCurriculumNew') }}"><button class="btn btn-new btn-new-tarefa-mobile mx-1">
                    <i data-feather="plus"></i>
                </button></a>
                <a href="{{ route('adminCurriculumNew') }}"><button class="btn btn-new btn-new-tarefa mx-1">
                    Novo Curriculo
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
        <div class="default-according" id="accordion">
            @if($msg=Session::get('sucesso'))
                <div class="alert alert-success" role="alert">
                    {{ $msg }}
                </div>
            @endif
            @foreach ($curriculums as $curriculum)
                <div class="card">
                    <div class="card-header card-header-tarefa" id="heading_{{ $curriculum->curriculum_id }}" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $curriculum->curriculum_id }}" aria-expanded="true" aria-controls="collapse_{{ $curriculum->curriculum_id }}">
                        <div class="row">
                            <div class="col-8 col-xl-6">
                            <h5 class="mb-0">
                                {{ $curriculum->curriculum_name }}
                            </h5>
                            </div>
                            <div class="col-4 col-xl-6">
                                <div class="row justify-content-end">
                                    <a class="p-0 col-sm-2" href="{{ route('adminCurriculumEdit', $curriculum->curriculum_id ); }}"><button class="btn btn-edit"><i data-feather="edit"></i></button></a>
                                    <a class="p-0 col-sm-2" href="{{ route('adminCurriculumDelete', $curriculum->curriculum_id ); }}"><button class="btn btn-trash"><i data-feather="trash-2"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="collapse" id="collapse_{{ $curriculum->curriculum_id }}" aria-labelledby="heading_{{ $curriculum->curriculum_id }}" data-bs-parent="#accordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="table-header-border">
                                        <tr class="table-head bg-grey">
                                        <th colspan="6">UFCDS</th>
                                        </tr>
                                    </thead>
                                    <thead class="table-header-border">
                                        <tr>
                                            <th class="col-8">Nome</th>
                                            <th class="col-4">Número</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($curriculum->ufcds as $ufcd)
                                            <tr>
                                                <td>{{ $ufcd->ufcd_name }}</td>
                                                <td>{{ $ufcd->ufcd_number }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
  </div>
</div>
@endsection