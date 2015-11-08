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
									{!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>
						<div class=" col-md-12 collapse" id="panelPassword">
							<div class="col-md-4">
								<!--- Old Password Field --->
								<div class="form-group">
									{!! Form::label('oldPassword', trans('back.user.oldPassword')) !!}
									{!! Form::password('oldPassword', ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-md-4">
								<!--- Password Field --->
								<div class="form-group @if ($errors->has('password')) has-error @endif">
									{!! Form::label('password', trans('back.user.newPassword')) !!}
									{!! Form::password('password', ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-md-4">
								<!--- Confirm Password Field --->
								<div class="form-group @if ($errors->has('confirmPassword')) has-error @endif">
									{!! Form::label('confirmPassword', trans('back.user.confirmPassword')) !!}
									{!! Form::password('confirmPassword', ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="pull-right">
							<!--- Action Buttons --->
							<a href="{{route('users.index')}}"
							   class="btn btn-default">{{trans('back.actions.cancel')}}</a>
							<button type="button" id="change-password" class="btn btn-warning" data-toggle="collapse"
							        data-target="#panelPassword" aria-expanded="false">{{ trans('back.actions.changePassword') }}
							</button>
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
