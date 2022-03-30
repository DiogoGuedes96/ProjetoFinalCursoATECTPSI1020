@extends('layouts.bo-teacher')

@section('content')

<div class="container-fluid">
    <div class="page-header py-3">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Criar Tarefa</h3>
                </div>
                <div class="col-md-6 col-2 p-0">
                    <div class="bookmark">
                        <ul>
                            <a href="{{ route('teacherLibrary') }}"><button
                                    class="btn btn-action mx-1">
                                    Biblioteca <i data-feather="chevron-left"></i>
                                </button></a>
                            <a href="{{ route('teacherLibrary') }}"><button
                                    class="btn btn-action btn-action-mobile mx-1">
                                    <i data-feather="chevron-left"></i>
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <br><br>
            <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
        </div>
    @endif
    <div class="date-picker time-picker">
        <form method="POST" id="task_form"  action="#" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12 py-3">
                <div class="mb-3">
                    <div class="mb-3">
                        <h6>Título</h6>
                        <div class="col-sm-12">
                            <input class="form-control" name="task_title" id="id_titulo" type="text" placeholder="Escreva um título...">
                        </div>
                    </div>
                    <div class="row py-3">
                        <h6>Descrição</h6>
                        <div class="col-sm-12">
                            <textarea style="height:350px" id="task_description" name="task_description" placeholder="Escreva uma descrição..."></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 py-3">
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
                        <div>
                            <button id="change" type="button"
                                class="form-control input-file download text-start">Upload file</button>
                            <input name="task_file" id="input-file" class="form-control" type="file" aria-label="file example"
                                style="display:none">
                            <div class="invalid-feedback">Example invalid form file feedback</div>
                        </div>
                    </div>
                    <div class="col-sm-12 py-5">
                        <button type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#createTaskModal" class="btn btn-new mx-1">Criar Tarefa</button>
                        <div class="modal fade" id="createTaskModal" tabindex="-1" role="dialog" aria-labelledby="createTaskModal" aria-hidden="true">
                            <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                  <div class="modal-body">
                                    <h6>Deseja continuar com a criação da tarefa ou guardar?</h6>
                                  </div>
                                    <div class="modal-footer  project-list text-center">
                                        <button type="button" class="btn btn-new mx-2" onClick="btn_save()">Guardar <i data-feather="save"></i></button>
                                        <button type="button" class="btn btn-edit" onClick="btn_continue()">Continuar <i data-feather="arrow-right"></i></button>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </form>
    </div>
</div>


@endsection