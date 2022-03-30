@extends('layouts.bo-teacher')

@section('content')
    <div class="container-fluid">
        <div class="page-header py-3">
            <div class="col-md-12 project-list">
                <div class="row">
                    <div class="col-6 p-0">
                        <h3>{{ $task->task_title }}</h3>
                    </div>
                    <div class="col-6 p-0">
                        <a href="{{route('teacherDashboard')}}">
                            <button class="btn btn-action">
                                Voltar <i data-feather="chevron-left"></i>
                        </a>
                        </button>
                        <a href="{{route('teachersTaskDelete',$task->task_id)}}">
                            <button class="btn btn-trash mx-2"><i data-feather="trash-2"></i></button>
                        </a>
                        <a href="{{route('teachersTaskEdit',$task->task_id)}}">
                            <button class="btn btn-edit mx-1"><i data-feather="edit"></i></button>
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
        <div class="row">
            <div class="col-sm-12 py-4">
                <div class="row">
                    <div class="col-6">
                        <h6>Materiais de Referência</h6>
                        
                    </div>
                    <div class="col-6 bookmark px-4 ">
                        <a href="#" class="d-inline-block" data-bs-toggle="tooltip" title="Ficheiros tipo: png,jpg,jpeg,csv,txt,xlx,xls,pdf,doc,docm,doxc,dot,dotm,dotx,htm,html,mhtml,odt,rtf,xml,xps,odp,pot,potm,potx,ppa,ppam,pps,ppt,pptx. Tamanho máximo: 2048 MB" data-bs-original-title="Default tooltip">
                            <i class="bi bi-info-circle"></i>
                        </a>
                    </div>
                </div>
                <form action="" method="POST">
                    <div> 
                        <button id="button_1" name="button_1"
                                class="form-control input-file download text-start">{{$task->task_file}}
                        </button>
                        <input id="input-file" class="form-control" type="file" aria-label="file example"
                               style="display:none" disabled>
                        <div class="invalid-feedback">Example invalid form file feedback</div>
                    </div>
                </form>
            </div>
        </div>
        @if ($task->task_status == "unassigned")
            <div class="py-2">
                <button onclick="window.location.replace('{{route('teacherNewTaskClass', $task->task_id)}}')"
                        class="btn btn-action">
                    Criar Grupos
                </button>
            </div>
        @else
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr class="table-head">
                                    <th colspan="6">Alunos</th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th class="col-3">Nome</th>
                                    <th class="col-5">Email</th>
                                    <!-- <th class="col-3 text-center">Estado</th> -->
                                    <th class="col-2 text-start">Grupo</th>
                                    <th class="col-1 text-center">Apagar</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($groups->groups as $group)
                                    @foreach($group->group_users as $user)
                                        <tr>
                                            <td>{{$user->user_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <!-- <td class="text-center"><i class="icon-eyes bi bi-eye"></i></td>-->
                                            <td>{{$group->group_name}}</td>
                                            <td class="text-center"><a
                                                    href="{{route('teacherGroupElementDelete',['group'=>$group->group_id,'user'=>$user->user_id])}}"><i
                                                        class="icon-delete bi bi-trash"></i></a></td>
                                            @endforeach

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
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
                url: "{{route('teachersTaskDownload',$task->task_id)}}",
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
