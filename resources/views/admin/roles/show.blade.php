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
							<div class="col-md-3">
								<!--- Name Field --->
								<div class="form-group">
									<label for="name">{{ trans('back.lists.name') }}</label>
									<input type="text" class="form-control" id="name" placeholder="{{ $role->name }}"
									       disabled>
								</div>
							</div>
							<div class="col-md-9">
								<!--- Display Name Field --->
								<div class="form-group">
									<label for="display_name">{{ trans('back.lists.display_name') }}</label>
									<input type="text" class="form-control" id="display_name"
									       placeholder="{{ $role->display_name }}" disabled>
								</div>
							</div>
							<div class="col-md-12">
								<!--- Description Field --->
								<div class="form-group">
									<label for="description">{{ trans('back.lists.description') }}</label>
									<input type="text" class="form-control" id="description"
									       placeholder="{{ $role->description }}" disabled>
								</div>
							</div>
						</div>
						<div class="col-md-12 spacer">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#permissions"
								                                          aria-controls="permissions" role="tab"
								                                          data-toggle="tab">{{ trans('back.headers.permissions') }}</a>
								</li>
								<li role="presentation"><a href="#users" aria-controls="users" role="tab"
								                           data-toggle="tab">{{ trans('back.headers.users') }}</a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
								<!-- Tab Permissions -->
								<div role="tabpanel" class="tab-pane active spacer" id="permissions">
									<div class="col-md-12">
										@foreach( $permList as $context => $perms)
											<div class="panel panel-default">
												<div class="panel-heading"><strong>{{ $context }}</strong></div>
												<div class="panel-body">
													@foreach($perms as $perm => $p)
														<div class="col-md-3">
															<div class="checkbox disabled">
																<label>
																	<input type="checkbox" value="" disabled
																	       @if( $p->checked ) checked @endif>
																	{{ $p->display_name }}
																</label>
															</div>
														</div>
													@endforeach
												</div>
											</div>
										@endforeach
									</div>
								</div>
								<!-- Tab Users -->
								<div role="tabpanel" class="tab-pane" id="users">
									<div class="col-md-12">
										<div class="table-responsive">
											<table class="table table-users">
												<thead>
												<tr>
													<th>{{ trans('back.lists.name') }}</th>
													<th>{{ trans('back.lists.email') }}</th>
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
														<td>{{$user->status ? trans('back.lists.active') : trans('back.lists.inactive') }}</td>
														<td>{{$user->created_at}}</td>
														<td>{{$user->updated_at}}</td>
														<td></td>
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
				</div>
			</div>
		</div>
	</div>
@stop
