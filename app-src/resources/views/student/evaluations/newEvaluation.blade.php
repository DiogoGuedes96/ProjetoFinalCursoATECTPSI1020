@extends('layouts.bo-student')

@section('content')
@php
$count = 0;
@endphp
@foreach ($criterios as $criterio)
@php
$count += 1;
@endphp
@if ($count == count($criterios))
<div class="container-fluid animate__animated" style="display:none" id="criterio_{{ $count }}">
    <div class="page-header py-3">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0 mx-0">
                    <h3>{{ $criterio->task_criteria_name }}</h3>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <h6>{{ $criterio->task_criteria_text }}</h6>
                </div>
                <div class="col-6">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <label for="" class="form-label">{{ $criterio->criteria_scale->scale_minlevel }}</label>
                        </div>
                        <div class="col-4 text-end">
                            <label for="" class="form-label text-end">{{ $criterio->criteria_scale->scale_maxlevel
                                }}</label>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <input type="text" name="criteria_id" id="criterio_id" value="{{$criterio->task_criteria_id}}" hidden>
            @php
            $countUser = 0
            @endphp
            @foreach ($group->group_users as $user)
            @if ($user->user_id != auth()->user()->user_id)
            @php
            $countUser += 1;
            @endphp
            <input type="text" name="criteria_name[]" id="criterio_user_{{$countUser}}" value="{{ $user->user_id }}"
                hidden>
            <div class="row">
                <div class="col-sm-6 px-4 py-3">
                    {{ $user->user_name }}
                </div>
                <div class="col-sm-6">
                    <input type="range" min="0" max="{{ $criterio->task_criteria_scale_dimension-1 }}" step="1"
                        class="form-range" name="criteria_eval[]" id="criterio_eval_{{$countUser}}">
                </div>
            </div>
            @endif
            @endforeach
            <div class="my-5 d-flex">
                <button type="button" class="btn btn-new" id="conclude_btn" data-id="{{$count}}">
                    Concluir
                </button>
            </div>
        </div>
    </div>
</div>
@else
<div class="container-fluid animate__animated" style="display:none" id="criterio_{{ $count }}">
    <div class="page-header py-3">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0 mx-0">
                    <h3>{{ $criterio->task_criteria_name }}</h3>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <h6>{{ $criterio->task_criteria_text }}</h6>
                </div>
                <div class="col-6">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <label for="" class="form-label">{{ $criterio->criteria_scale->scale_minlevel }}</label>
                        </div>
                        <div class="col-4 text-end">
                            <label for="" class="form-label text-end">{{ $criterio->criteria_scale->scale_maxlevel
                                }}</label>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <input type="text" name="criteria_id" id="criterio_id" value="{{$criterio->task_criteria_id}}" hidden>
            @php
            $countUser = 0
            @endphp
            @foreach ($group->group_users as $user)
            @if ($user->user_id != auth()->user()->user_id)
            @php
            $countUser += 1;
            @endphp
            <input type="text" name="criteria_name[]" id="criterio_user_{{$countUser}}" value="{{ $user->user_id }}"
                hidden>
            <div class="row">
                <div class="col-sm-6 px-4 py-3">
                    {{ $user->user_name }}
                </div>
                <div class="col-sm-6">
                    <input type="range" min="0" max="{{ $criterio->task_criteria_scale_dimension-1 }}" step="1"
                        class="form-range" name="criteria_eval[]" id="criterio_eval_{{$countUser}}">
                </div>
            </div>
            @endif
            @endforeach
            <div class="my-5 d-flex">
                <button type="button" class="btn btn-new" id="continue_btn" data-id="{{$count}}">
                    Continuar
                </button>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
<input type="text" id="taskid" value="{{ $task->task_id }}" hidden>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var evals = [];
    $(document).ready(function() {
        $("#criterio_1").show();
    });

    $("#continue_btn").click(function (e) {
        e.preventDefault();

        var count = $(this).data("id");

        for (let index = 1; index <= {{$countUser}}; index++) {
            var eval = {
                user_eval: $("#criterio_eval_"+index).val(),
                user_id: $("#criterio_user_"+index).val(),
                criteria_id: count
            }
            evals.push(eval);
        }
        $("#criterio_"+count).addClass("animate__slideOutLeft");
        setTimeout(function (){
            $("#criterio_"+count).hide();
            $("#criterio_"+(count+1)).show();
            $("#criterio_"+(count+1)).addClass("animate__slideInRight");
        }, 1000);
    });

    $("#conclude_btn").click(function (e) {
        e.preventDefault();

        var count = $(this).data("id");
        var task = $("#taskid").val();

        for (let index = 1; index <= {{$countUser}}; index++) {
            var eval = {
                user_eval: $("#criterio_eval_"+index).val(),
                user_id: $("#criterio_user_"+index).val(),
                criteria_id: count
            }
            evals.push(eval);
        }

        evals = JSON.stringify({'evals':evals});

        $.ajax({
            type: "POST",
            url: "{{ route('studentsEvaluationsSave', $task->task_id) }}",
            data: evals,
            success: function(data){
                window.location.replace("{{ route('studentsEvaluationsComments', $group->group_id) }}");
            },
            dataType: "json",
            contentType : "application/json"
        });
        
    });
</script>
@endsection