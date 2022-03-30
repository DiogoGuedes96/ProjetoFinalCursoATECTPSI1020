    @extends('layouts.bo-coordinator')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Biblioteca de critérios</h3>
                </div>
                <div class="col-6 p-0">
                    <div class="bookmark">
                        <ul>
                            <a href="{{ route('coordinatorDashboard') }}"><button class="btn btn-action mx-1">
                                    Voltar <i data-feather="chevron-left"></i>
                                </button></a>
                            <a href="{{ route('coordinatorDashboard') }}"><button
                                    class="btn btn-action btn-action-mobile mx-1">
                                    <i data-feather="chevron-left"></i>
                                </button></a>

                            <a href="{{ route('coordinatorCriteriaAdd', $class->class_id) }}"><button
                                    class="btn btn-new btn-new-tarefa-mobile mx-1">
                                    <i data-feather="plus"></i>
                                </button></a>
                            <a href="{{ route('coordinatorCriteriaAdd', $class->class_id) }}"><button
                                    class="btn btn-new btn-new-tarefa mx-1">
                                    Novo Critério
                                </button></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        @if($msg=Session::get('sucesso'))
            <div class="alert alert-success" role="alert">
                {{ $msg }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="col-sm-12">
                <div class="mb-3">
                    <label class="form-label input" for="indexTurma">Turma
                    </label>
                    <select readonly class="form-select form-control" id="indexTurma" name="class_id">
                        <option selected value="{{$class->class_id}}">{{$class->class_name}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="default-according" id="accordion">
                @foreach($criterios as $criterio)
                    <div class="card mb-3">
                        <div class="card-header card-header-tarefa collapsed"
                            id="heading{{ $criterio->coordinator_criteria_id }}" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $criterio->coordinator_criteria_id }}" aria-expanded="false"
                            aria-controls="collapse{{ $criterio->coordinator_criteria_id }}">
                            <div class="row">
                                <div class="col-8 col-xl-6">
                                    <h5 class="mb-0">
                                        {{ $criterio->coordinator_criteria_name }}
                                    </h5>
                                    <hr class="validade-mobile">
                                    <h5 class="validade-mobile">{{ $criterio->criteria_scale->scale_name }}</h5>
                                </div>
                                <div class="col-4 col-xl-6">
                                    <div class="row justify-content-end">
                                        <h6 class="validade mt-2 text-end col-xl-6">
                                            {{ $criterio->criteria_scale->scale_name }}</h6>
                                        <a class="p-0 col-sm-2" href="{{ route('coordinatorCriteriaEdit', ['turma'=>$class->class_id, 'criteria'=>$criterio->coordinator_criteria_id] ) }}"><button class="btn btn-edit"><i data-feather="edit"></i></button></a>
                                        
                                        <a class="p-0 col-sm-2"><button type="button" class="btn btn-trash"  aria-hidden="true" data-bs-toggle="modal" data-bs-target="#modal_{{$criterio->coordinator_criteria_id}}"><i data-feather="trash-2"></i></button></a>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse" id="collapse{{ $criterio->coordinator_criteria_id }}"
                            aria-labelledby="heading{{ $criterio->coordinator_criteria_id }}" data-bs-parent="#accordion"
                            style="">
                            <div class="card-body">
                                <p>{{ $criterio->coordinator_criteria_text }}</p>
                            </div>
                        </div>
                    </div>  
                    <div class="modal fade" id="modal_{{$criterio->coordinator_criteria_id}}" tabindex="-1" role="dialog" aria-labelledby="modal_{{$criterio->coordinator_criteria_id}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-body">
                                <h6>Tem a certeza que deseja apagar este critério</h6>
                            </div>
                            <div class="modal-footer text-center">
                                <button class="btn btn-no" type="button" data-bs-dismiss="modal">Não</button>
                                <a href="{{ route('coordinatorCriteriaDelete', ['turma'=>$class->class_id, 'criteria'=>$criterio->coordinator_criteria_id]) }}"><button class="btn btn-yes" type="button">Sim</button></a>
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