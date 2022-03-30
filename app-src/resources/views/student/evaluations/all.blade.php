@extends('layouts.bo-student')

@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-12 p-0">
                    <h3>Avaliação</h3>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-md-6 col-10 p-0">
                    <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                        <li class="nav-item m-2" onclick="changeTaskType('Active')">
                            <a class="nav-link active" id="profile-top-tab" href="" data-bs-toggle="tab" role="tab"
                                aria-controls="top-profile" aria-selected="true">
                                <i data-feather="info"></i>Não avaliadas</a>
                        </li>
                        <li class="nav-item" onclick="changeTaskType('Done')">
                            <a class="nav-link" id="contact-top-tab" href="" data-bs-toggle="tab" role="tab"
                                aria-controls="top-contact" aria-selected="false">
                                <i data-feather="check-circle"></i>Avalidadas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" id="active">
            <div class="default-according" id="accordion">
                @foreach ($gruposNaoAvaliados as $group)
                <div class="card">
                    <div class="card-header card-header-tarefa" id="heading_{{$group->task->task_id}}"
                        data-bs-toggle="collapse" data-bs-target="#collapse_{{$group->task->task_id}}" aria-expanded="true"
                        aria-controls="collapse_{{$group->task->task_id}}">
                        <div class="row">
                            <div class="col-7 col-md-7 col-xl-8">
                                <h5 class="mb-0">
                                    {{ $group->task->task_title}}
                                </h5>
                            </div>
                            <div class="float-md-end col-5 col-md-5 col-xl-4">
                                <div class="row justify-content-end">
                                    <button
                                        onclick="window.location.href = '{{ route('studentEvaluatesStudent', $group->group_id) }}'"
                                        class="btn btn-action p-2 p-md-2 col-12 col-md-5">Avaliar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collapse_{{$group->task->task_id}}" aria-labelledby="heading_{{$group->task->task_id}}"
                        data-bs-parent="#accordion">
                        <div class="card-body">
                            <p><strong>UFCD: </strong> {{$group->task->task_ufcd}}</p>
                            <p><strong>Nome da UFCD: </strong> {{$group->task->ufcd->ufcd_name}}</p>
                            <p><strong>Turma: </strong> {{$group->task->class->class_name}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-sm-12" id="done" style="display:none">
            <div class="default-according" id="accordion1">
                @foreach ($gruposAvaliados as $group)
                <div class="card">
                    <div class="card-header card-header-tarefa" id="heading_{{$group->task->task_id}}"
                        data-bs-toggle="collapse" data-bs-target="#collapse_{{$group->task->task_id}}" aria-expanded="true"
                        aria-controls="collapse_{{$group->task->task_id}}">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="mb-0">
                                    {{ $group->task->task_title}}
                                </h5>
                            </div>
                            <div class="float-md-end col-5">
                                @foreach ($group->final_evaluations as $evaluation)
                                    @if ($evaluation->student_id == auth()->user()->user_id && $evaluation->final_grade != null)
                                        <h5>Nota final: {{ $evaluation->final_grade }}</h5>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collapse_{{$group->task->task_id}}" aria-labelledby="heading_{{$group->task->task_id}}"
                        data-bs-parent="#accordion">
                        <div class="card-body">
                            <p><strong>UFCD: </strong> {{$group->task->task_ufcd}}</p>
                            <p><strong>Nome da UFCD: </strong> {{$group->task->ufcd->ufcd_name}}</p>
                            <p><strong>Turma: </strong> {{$group->task->class->class_name}}</p>
                        </div>
                    </div>
                </div>
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
        }else if (type == "Done") {
            document.getElementById("active").style.display = "none";
            document.getElementById("done").style.display = "block";
        }
    }
</script>
@endsection