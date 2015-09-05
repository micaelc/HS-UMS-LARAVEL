<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<li>
				<a href="{{route('admin:dashboard')}}"><i class="fa fa-dashboard fa-fw"></i>{{ trans('back.pages.dashboard') }}</a>
			</li>
			@if( Auth::user()->hasRole('admin') )
			<li>
				<a href="#"><i class="fa fa-gears fa-fw"></i>{{ trans('back.pages.administration') }}<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="{{ route('users.index') }}"><i class="fa fa-users fa-fw"></i>{{ trans('back.pages.users') }}</a>
					</li>
					<li>
						<a href="{{ route('roles.index') }}"><i class="fa fa-tags fa-fw"></i>{{ trans('back.pages.roles') }}</a>
					</li>
				</ul>
				<!-- /.nav-second-level -->
			</li>
			@endif
			<li>
				<a href="#"><i class="fa fa-trash-o fa-fw"></i> item</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-trash-o fa-fw"></i> item</a>
			</li>
		</ul>
	</div>
	<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->