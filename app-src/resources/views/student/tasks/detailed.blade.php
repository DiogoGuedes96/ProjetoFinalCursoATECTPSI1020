@extends('layouts.bo-student')

@section('content')
  <div class="container-fluid">
    <div class="page-header py-3">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>{{ $task->task_title }}</h3>
                </div>
                <div class="col-6 p-0">
                    <a href="{{route('studentsDashboard')}}"><button class="btn btn-action">
                        Voltar <i data-feather="chevron-left"></i>
                    </button>
                </a>
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
    <form action="{{route('StudentSubmit',[$group,$task->task_id])}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-sm-12 py-5">
            <h6>Materias de Referência</h6>
                <div>
                    <button id="button_1" name="button_1"
                                class="form-control input-file download text-start">{{$task->task_file}}
                        </button>
                        <input class="form-control" type="file" aria-label="file example"
                               style="display:none" >
                        <div class="invalid-feedback">Example invalid form file feedback</div>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h6>O meu trabalho</h6>
                <div>
                    <button id="change" type="button"
                                class="form-control input-file upload text-start">Upload file</button>
                    <input name="task_file" id="input-file" class="form-control" type="file" aria-label="file example"
                        style="display:none" required>
                </div>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="table-head bg-grey">
                                    <th colspan="6">Alunos</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th class="col-7">Nome</th>
                                    <th class="col-5">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="">
                                    <td>{{$user->user_name}}</td>
                                    <td class="email">{{$user->email}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            <button type="submit" class="btn btn-new">
                Concluir Tarefa
            </button>
        </form>
    </div>
  </div>
  <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   $("#button_1").on("click", function(e) {
        e.preventDefault();
        $.ajax({type: "get",
            url: "{{route('studentsTaskDownload',$task->task_id)}}",
            success:function(result) {
                var blob = new Blob([result]);
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = "{{$task->task_file}}";
                link.click();
            },
            error:function(result) {
            }
        });
    });
       
    </script>
@endsection