@extends('layouts.bo-coordinator')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-10 p-0 text-center">
                    <h3>Tarefas</h3>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-md-6 col-12 p-0">
                    <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                        <li class="nav-item m-2" onclick="changeTaskType('Active')">
                            <a class="nav-link active" id="profile-top-tab" href="" data-bs-toggle="tab" role="tab"
                                aria-controls="top-profile" aria-selected="true">
                                <i data-feather="info"></i>Iniciadas</a>
                        </li>
                        <li class="nav-item" onclick="changeTaskType('Done')">
                            <a class="nav-link" id="contact-top-tab" href="" data-bs-toggle="tab" role="tab"
                                aria-controls="top-contact" aria-selected="false">
                                <i data-feather="check-circle"></i>Concluídas</a>
                        </li>
                        <li class="nav-item" onclick="changeTaskType('NO')">
                            <a class="nav-link" id="contact-top-tab" href="" data-bs-toggle="tab" role="tab"
                                aria-controls="top-contact" aria-selected="false">
                                <i data-feather="check-circle"></i>Por Avaliar</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-12 p-0">
                    <div class="bookmark">
                        <ul>
                            <a href="{{ route('coordinatorNewTask') }}">
                                <button class="btn btn-new btn-new-tarefa-mobile">
                                    <i data-feather="plus"></i>
                                </button>
                            </a>
                            <a href="{{ route('coordinatorNewTask') }}">
                                <button class="btn btn-new btn-new-tarefa">
                                    Nova Tarefa
                                </button>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        @if($msg=Session::get('sucesso'))
            <div class="alert alert-success" role="alert">
                {{ $msg }}
            </div>
        @endif
        <div class="col-sm-12" id="active">
            <div class="default-according" id="accordion">
                @foreach($coordinator->teacher_tasks as $task)
                @if ($task->task_status == "Started")
                <div class="card task-red">
                    <div class="card-header card-header-tarefa collapsed" id="heading{{$task->task_id}}"
                        data-bs-toggle="collapse" data-bs-target="#collapse{{$task->task_id}}" aria-expanded="true"
                        aria-controls="collapse{{$task->task_id}}">
                        <div class="row">
                            <div class="col-8 col-xl-6">
                                <h5 class="mb-0">
                                    {{$task->task_title}}
                                </h5>
                                <hr class="validade-mobile">
                                <h5 class="validade-mobile task-red">
                                    Validade {{$task->date['task_date_due']}}</h5>
                            </div>
                            <div class="col-4 col-xl-6">
                                <div class="row justify-content-end">
                                    <h6 class="validade mt-2 text-end col-xl-6 task-validade-red">
                                        Validade {{$task->date['task_date_due']}}</h6>
                                    <button
                                        onclick="window.location.replace('{{route('coordinatorTask',$task->task_id)}}')"
                                        class="btn btn-action-task p-2 p-md-2 col-12 col-md-6 col-lg-6 col-xl-3">Ver
                                        Tarefa</button>
                                    <button
                                        onclick="window.location.replace('{{route('coordinatorTaskEdit',$task->task_id)}}')"
                                        class="btn btn-edit p-0 mx-xl-3 my-2 my-sm-0 col-12 col-md-3 col-xl-1">
                                        <i data-feather="edit"></i></button>
                                    <button
                                        onclick="window.location.replace('{{route('coordinatorTaskDelete',$task->task_id)}}')"
                                        class="btn btn-trash p-0 col-12 col-md-3 col-xl-1"><i
                                            data-feather="trash-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collapse{{$task->task_id}}" aria-labelledby="heading{{$task->task_id}}"
                        data-bs-parent="#accordion">
                        <div class="card-body">
                            <p><strong>UFCD: </strong> {{$task->task_ufcd}}</p>
                            <p><strong>Turma: </strong> {{$task->class->class_name}}</p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="col-sm-12" id="done" style="display:none">
            <div class="default-according" id="accordion1">
                @foreach($coordinator->teacher_tasks as $task)
                @if ($task->task_status == "Closed" && $task->task_teacher_status == "YES")
                <div class="card task-red">
                    <div class="card-header card-header-tarefa collapsed" id="heading{{$task->task_id}}"
                        data-bs-toggle="collapse" data-bs-target="#collapse{{$task->task_id}}" aria-expanded="true"
                        aria-controls="collapse{{$task->task_id}}">
                        <div class="row">
                            <div class="col-8 col-xl-6">
                                <h5 class="mb-0">
                                    {{$task->task_title}}
                                </h5>
                                <hr class="validade-mobile">
                                <h5 class="validade-mobile task-red">
                                    Validade {{$task->date['task_date_due']}}</h5>
                            </div>
                            <div class="col-4 col-xl-6">
                                <div class="row justify-content-end">
                                    <h6 class="validade mt-2 text-end col-xl-6 task-validade-red">
                                        Validade {{$task->date['task_date_due']}}</h6>
                                    <button
                                        onclick="window.location.replace('{{route('coordinatorTask',$task->task_id)}}')"
                                        class="btn btn-action-task p-2 p-md-2 col-12 col-md-6 col-lg-6 col-xl-3">Ver
                                        Tarefa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collapse{{$task->task_id}}" aria-labelledby="heading{{$task->task_id}}"
                        data-bs-parent="#accordion1">
                        <div class="card-body">
                            <p><strong>UFCD: </strong> {{$task->task_ufcd}}</p>
                            <p><strong>Turma: </strong> {{$task->class->class_name}}</p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="col-sm-12" id="teacher_status" style="display:none">
            <div class="default-according" id="accordion1">
                @foreach($coordinator->teacher_tasks as $task)
                @if ($task->task_teacher_status == "NO" && $task->task_status == "Closed")
                <div class="card task-red">
                    <div class="card-header card-header-tarefa collapsed" id="heading{{$task->task_id}}"
                        data-bs-toggle="collapse" data-bs-target="#collapse{{$task->task_id}}" aria-expanded="true"
                        aria-controls="collapse{{$task->task_id}}">
                        <div class="row">
                            <div class="col-8 col-xl-6">
                                <h5 class="mb-0">
                                    {{$task->task_title}}
                                </h5>
                            </div>
                            <div class="col-4 col-xl-6">
                                <div class="row justify-content-end">
                                    <button
                                        onclick="window.location.replace('{{route('coordinatorTaskEvaluation',$task->task_id)}}')"
                                        class="btn btn-action-task p-2 col-12 col-md-6 col-lg-6 col-xl-3">Avaliar Tarefa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collapse{{$task->task_id}}" aria-labelledby="heading{{$task->task_id}}"
                        data-bs-parent="#accordion1">
                        <div class="card-body">
                            <p><strong>UFCD: </strong> {{$task->task_ufcd}}</p>
                            <p><strong>Turma: </strong> {{$task->class->class_name}}</p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    function changeTaskType(type) {
        if (type == "Active") {
            document.getElementById("active").style.display = "block";
            document.getElementById("done").style.display = "none";
            document.getElementById("teacher_status").style.display = "none";
        }else if (type == "Done") {
            document.getElementById("active").style.display = "none";
            document.getElementById("done").style.display = "block";
            document.getElementById("teacher_status").style.display = "none";
        }else if(type == "NO"){
            document.getElementById("active").style.display = "none";
            document.getElementById("done").style.display = "none";
            document.getElementById("teacher_status").style.display = "block";
        }
    }
</script>
@endsection