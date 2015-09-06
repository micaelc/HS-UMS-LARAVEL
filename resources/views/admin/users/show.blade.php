@extends('back')

@section('content')

	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">{{ $title }}</h3>
				</div>
				<div class="row">
					<div class="panel-body">
						<div class="col-md-12">
							<div class="col-md-6">
								<!--- First Name Field --->
								<div class="form-group">
									<label for="firsName">{{ trans('back.user.firstName') }}</label>
									<input type="text" class="form-control" id="firsName" placeholder="{{$user->firstName}}"
									       disabled>
								</div>
							</div>
							<div class="col-md-6">
								<!--- Last Name Field --->
								<div class="form-group">
									<label for="lastName">{{ trans('back.user.lastName') }}</label>
									<input type="text" class="form-control" id="lastName" placeholder="{{$user->lastName}}"
									       disabled>
								</div>
							</div>
							<div class="col-md-9">
								<!--- E-Mail Field --->
								<div class="form-group">
									<label for="email">{{ trans('back.lists.email') }}</label>
									<input type="text" class="form-control" id="email" placeholder="{{$user->email}}"
									       disabled>
								</div>
							</div>
							<div class="col-md-3">
								<!--- Status Field --->
								<div class="form-group">
									<label for="status">{{ trans('back.lists.status') }}</label>
									<input type="text" class="form-control" id="status" placeholder="{{$user->status ? trans('back.lists.active') : trans('back.lists.inactive') }}"
									       disabled>
								</div>
							</div>
							<div class="col-md-12">
								<!--- Roles List --->
								<div class="form-group">
									<label for="roles">{{ trans('back.lists.roles') }}</label>
									<p class="form-control" disabled>@foreach($user->roles as $role)
										<span class="label label-primary">{{$role->name}}</span>
									@endforeach</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
