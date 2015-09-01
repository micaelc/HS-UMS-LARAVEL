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
					<div class="table-responsive">
						<table class="table">
							<thead>
							<tr>
								<th>{{ trans('back.lists.name') }}</th>
								<th>{{ trans('back.lists.display_name') }}</th>
								<th>{{ trans('back.lists.description') }}</th>
								<th>{{ trans('back.lists.created_at') }}</th>
								<th>{{ trans('back.lists.updated_at') }}</th>
								<th>{{ trans('back.lists.options') }}</th>
							</tr>
							</thead>
							<tbody>
							@foreach($roles as $role)
								<tr>
									<td>{{$role->name}}</td>
									<td>{{$role->display_name}}</td>
									<td>{{$role->description}}</td>
									<td>{{$role->created_at}}</td>
									<td>{{$role->updated_at}}</td>
									<td>
										<a href="#" data-toggle="tooltip" title="{{ trans('back.tooltip.edit') }}"><i class="fa fa-pencil fa-fw"></i></a>
										<a href="{{route('roles.show',$role->id)}}" data-toggle="tooltip" title="{{ trans('back.tooltip.show') }}"> <i
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

@stop
