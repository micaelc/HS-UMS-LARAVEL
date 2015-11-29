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
						{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
						<div class="col-md-9">
							<div class="col-md-12">
								<!--- E-Mail Field --->
								<div class="form-group @if ($errors->has('email')) has-error @endif">
									{!! Form::label('email', trans('back.user.email')) !!}
									{!! Form::email('email', null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-md-9">
								<!--- FirstName Field --->
								<div class="form-group @if ($errors->has('firstName')) has-error @endif">
									{!! Form::label('firstName', trans('back.user.firstName')) !!}
									{!! Form::text('firstName', null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-md-9">
								<!--- LastName Field --->
								<div class="form-group @if ($errors->has('lastName')) has-error @endif">
									{!! Form::label('lastName', trans('back.user.lastName')) !!}
									{!! Form::text('lastName', null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-md-6">
								<!--- Role DropDown List Field --->
								<div class="form-group">
									{!! Form::label('role_id', trans('back.role.role')) !!}
									{!! Form::select('role_id', $roles, $role->id, ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="pull-right">
							<!--- Action Buttons --->
							<a href="{{route('users.index')}}"
							   class="btn btn-default">{{trans('back.actions.cancel')}}</a>
							{!! Form::submit(trans('back.actions.update'), ['class' => 'btn btn-primary']) !!}
						</div>
					</div>
					{!! Form::close() !!}
					@include('errors.list')
				</div>
			</div>
		</div>
	</div>
	</div>
@stop
