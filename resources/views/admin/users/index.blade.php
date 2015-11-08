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
					<div class="col-md-12">
						<a class="btn btn-primary pull-right" href="{{ route('users.create') }}">
							<i class="fa fa-plus fa-fw"></i> {{ trans('back.headers.newUser') }}
						</a>
					</div>
					<div class="col-md-12 spacer">
						<div class="table-responsive">
							<table class="table table-users">
								<thead>
								<tr>
									<th>{{ trans('back.lists.userName') }}</th>
									<th>{{ trans('back.lists.email') }}</th>
									<th>{{ trans('back.lists.roles') }}</th>
									<th>{{ trans('back.lists.status') }}</th>
									<th>{{ trans('back.lists.created_at') }}</th>
									<th>{{ trans('back.lists.updated_at') }}</th>
									<th>{{ trans('back.lists.options') }}</th>
								</tr>
								</thead>
								<tbody>
								@foreach($users as $user)
									<tr>
										<td>{{$user->firstName}} {{$user->lastName}}</td>
										<td>{{$user->email}}</td>
										<td>
											@foreach($user->roles as $role)
												<span class="label label-primary">{{$role->name}}</span>
											@endforeach
										</td>
										<td>{{$user->status ? trans('back.lists.active') : trans('back.lists.inactive') }}</td>
										<td>{{$user->created_at}}</td>
										<td>{{$user->updated_at}}</td>
										<td>
											<a href="{{route('users.edit',$user->id)}}" data-toggle="tooltip"
											   title="{{ trans('back.tooltip.edit') }}"> <i
														class="fa fa-pencil fa-fw"> </i></a>
											<button id="change-status" class="button-nostyle" value="{{$user->id}}"
											        data-toggle="tooltip" title="{{ trans('back.tooltip.activate') }}">
												@if ($user->status)
													<i class="fa fa-ban fa-fw"> </i>
												@else
													<i class="fa fa-check-circle-o fa-fw"> </i>
												@endif</button>
											<a href="{{route('users.show',$user->id)}}" data-toggle="tooltip"
											   title="{{ trans('back.tooltip.show') }}"> <i
														class="fa fa-eye fa-fw"> </i></a>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop
