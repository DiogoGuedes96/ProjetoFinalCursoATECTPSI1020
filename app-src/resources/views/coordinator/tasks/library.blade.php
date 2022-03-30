@extends('layouts.bo-coordinator')

@section('content')

<div class="container-fluid">
  <div class="page-header py-3">
    <div class="col-md-12 project-list">
      <div class="row">
        <div class="col-6 p-0">
          <h3>Biblioteca de trabalhos</h3>
        </div>
        <div class="col-6 p-0">
          <div class="bookmark">
            <ul>
              <a href="{{ route('coordinatorNewTask') }}"><button class="btn btn-new btn-new-tarefa-mobile">
                  <i data-feather="plus"></i>
                </button></a>
              <a href="{{ route('coordinatorNewTask') }}"><button class="btn btn-new btn-new-tarefa">
                  Nova Tarefa
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
  <div class="col-sm-12 py-3">
    <div class="default-according" id="accordion">
      @foreach ($coordinator->coordinator_tasks as $task)
      <div class="card">
        <div class="card-header card-header-tarefa collapsed" id="heading_{{$task->task_id}}" data-bs-toggle="collapse"
          data-bs-target="#collapse_{{$task->task_id}}" aria-expanded="false"
          aria-controls="collapse_{{$task->task_id}}">
          <div class="row">
            <div class="col-8 col-xl-6">
              <h5 class="mb-0">
                {{ $task->task_title }}
              </h5>
            </div>
            <div class="col-4 col-xl-6">
              <div class="row justify-content-end">
                <button onclick="window.location.href = '{{ route('coordinatorTask', $task->task_id) }}'" class="btn btn-action p-2 p-md-2 col-12 col-md-6 col-lg-6 col-xl-3">Ver
                  Tarefa</button>
                <button onclick="window.location.href = '{{ route('coordinatorTaskEdit', $task->task_id) }}'" class="btn btn-edit p-0 mx-xl-3 my-2 my-sm-0 col-12 col-md-3 col-xl-1"><i
                    data-feather="edit"></i></button>
                <button onclick="window.location.href = '{{ route('coordinatorTaskDelete', $task->task_id) }}'" class="btn btn-trash p-0 col-12 col-md-3 col-xl-1"><i
                    data-feather="trash-2"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="collapse" id="collapse_{{$task->task_id}}" aria-labelledby="heading_{{$task->task_id}}"
          data-bs-parent="#accordion">
          <div class="card-body">
            {!! htmlspecialchars_decode($task->task_description) !!}
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection