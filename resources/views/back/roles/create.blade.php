@extends('back')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">{{ $title }}</h3>
                </div>
            </div>
            <div class="row">
                <div class="panel-body">
                    <div class="col-md-12 spacer">
                        {!! Form::open(array('route' => 'roles.store')) !!}
                        <div class="col-md-3">
                            <!--- Name Field --->
                            <div class="form-group @if ($errors->has('name')) has-error @endif">
                                {!! Form::label('name', trans('back.role.name')) !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!--- Display Name Field --->
                            <div class="form-group @if ($errors->has('display_name')) has-error @endif">
                                {!! Form::label('display_name', trans('back.role.display_name')) !!}
                                {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!--- Description Field --->
                            <div class="form-group @if ($errors->has('description')) has-error @endif">
                                {!! Form::label('description', trans('back.role.description')) !!}
                                {!! Form::text('description', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 spacer">
                        <h4>{{trans('back.headers.permissions')}}</h4>
                        <div class="tab-pane active spacer" id="permissions">
                            <div class="col-md-12">
                                @foreach( $permList as $context => $perms)
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>{{ $context }}</strong></div>
                                        <div class="panel-body">
                                            @foreach($perms as $perm => $p)
                                                <div class="col-md-3">
                                                    <div class="my_checkbox">
                                                        {!! Form::label($p->display_name,$p->display_name, ['class'=>'my_checkbox']) !!}
                                                        {!! Form::checkbox('permissions[]', $p->id, null, ['class' => 'my_checkbox']) !!}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right">
                            <!--- Action Buttons --->
                            <a href="{{route('roles.index')}}"
                               class="btn btn-default">{{trans('back.actions.cancel')}}</a>
                            {!! Form::submit(trans('back.actions.save'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                    @include('errors.list')
                </div>
            </div>
        </div>
    </div>

@stop
