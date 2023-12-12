@extends('admin.layouts.app')

@section('title', 'User manager')

@section('subheader')
<div class="c-subheader justify-content-between px-3">
	<h4 class="title-page border-0 m-0 px-0 px-md-3">User manager</h4>
</div>
@endsection

@section('content')
	<div class="container-fluid">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					@include('admin.auth.user.partials.search')
					<div class="card">
						<div class="card-body">
							@include('admin.auth.user.partials.sort')
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th class="text-center">No</th>
											<th class="text-center">Email</th>
											<th class="text-center">Nickname</th>
											<th class="text-center">Type</th>
											<th class="text-center">Status</th>
											<th class="text-center">CreatedAt</th>
											<th class="text-center">Language</th>
										</tr>
									</thead>
									<tbody>
									<tr>
										<td colspan="7" align="center">No results were found for your search.</td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
