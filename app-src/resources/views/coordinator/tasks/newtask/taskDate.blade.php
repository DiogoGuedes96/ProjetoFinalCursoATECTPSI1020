
@extends('layouts.bo-coordinator')

@section('content')
@if ($errors->any()) <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.
    <br><br>
    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
</div>@endif
<form action="{{ route('coordinatorNewTaskDateSave',[$task->task_id])}}" method="post">
    @csrf
    <div class="container-fluid">
        <div class="row py-3">
            <div class="checkbox checkbox-primary">
                <input id="checkbox1" type="checkbox" name="checkbox1">
                <label for="checkbox1">Aceitar após o prazo de validade</label>
            </div>
        </div>

        <div class="row py-3">
            <div class="col-sm-6">
                <p>Data limite de avaliação:</p>
                <div class="input-group">
                    <input class="datepicker-here form-control digits" type="text" name="task_date_due_avaliation" id="task_date_due_avaliation" data-language="en" value="01/01/2000">
                </div>
            </div>
            <div class="col-sm-6">
                <p>Hora limite de avaliação:</p>
                <div class="input-group clockpicker">
                    <div class="input-group-prepend">
                </div>
                    <input class="form-control" type="text" name="task_date_due_avaliation_time" id="task_date_due_avaliation_time" placeholder="23:00">
                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-sm-6">
                <p>Data de inicio:</p>
                <div class="input-group">
                    <input class="datepicker-here form-control digits" type="text" data-language="en"
                        data-bs-original-title="" title="" name="task_date_start" id="task_date_start" value="01/01/2000">
                </div>
            </div>
            <div class="col-sm-6">
                <p>Hora de inicio:</p>
                <div class="input-group clockpicker">
                    <input class="form-control" type="text" name="task_date_start_time" id="task_date_start_time" value="12:00"><span
                        class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-sm-6">
                <p>Data de entrega:</p>
                <div class="input-group">
                    <input class="datepicker-here form-control digits" type="text" data-language="en"
                        data-bs-original-title="" title="" name="task_date_due" id="task_date_due" value="01/01/2000">
                </div>
            </div>
            <div class="col-sm-6">
                <p>Hora de entrega:</p>
                <div class="input-group clockpicker">
                    <input class="form-control" type="text"name="task_date_due_time" id="task_date_due_time" value="12:00"><span
                        class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 py-5 ">
            <button type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#createTaskModal" class="btn btn-new mx-1 ">Confirmar</button>
                <div class="modal fade" id="createTaskModal" tabindex="-1" role="dialog" aria-labelledby="createTaskModal" aria-hidden="true">
                    <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h6>Deseja confirmar as datas estabelecidas?</h6>
                            </div>
                        <div class="modal-footer  project-list text-center">
                            <button type="submit" class="btn btn-new mx-2">Guardar <i data-feather="save"></i></button>
                            <button type="button" class="btn btn-action" data-bs-dismiss="modal">Cancelar <i data-feather="chevron-left"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
