@extends('layouts.bo-coordinator')

@section('content')
<div class="container-fluid">
    <div class="page-header py-3">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>{{ $task->task_title }}</h3>
                </div>
                <div class="col-6 p-0">
                    <a href="{{route('coordinatorDashboard')}}"><button class="btn btn-action">
                        Voltar <i data-feather="chevron-left"></i></a>
                    </button>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! htmlspecialchars_decode($task->task_description) !!}
        </div>
    </div>
    <hr>
    <form action="{{ route('coordinatorTaskEvaluationSave', $task->task_id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <br><br>
                        <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="table-head">
                                    <th colspan="6">Groups</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th class="col-2">Número do grupo</th>
                                    <th class="col-8">Membros do grupo</th>
                                    <th class="col-2 text-center">Nota</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $group)
                                <tr>
                                    <td>{{$group->group_name}}</td>
                                    <input type="text" name="group[]" hidden value="{{$group->group_id}}">
                                    <td>|
                                        @foreach ($group->group_users as $user)
                                            {{ $user->user_name }} |
                                        @endforeach
                                    </td>
                                    <td>
                                        <input required class="form-control" name="grades[]" id="grade_value_{{$group->group_id}}" type="text">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#saveGradesModal" class="btn btn-new mx-1">Gravar Notas</button>
                <div class="modal fade" id="saveGradesModal" tabindex="-1" role="dialog" aria-labelledby="saveGradesModal" aria-hidden="true">
                    <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-body">
                            <h6>Tem a certeza que deseja guardar as notas?</h6>
                          </div>
                            <div class="modal-footer  project-list text-center">
                                <button type="submit" class="btn btn-new mx-2">Confirmar <i data-feather="save"></i></button>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection