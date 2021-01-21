@extends('admin.layouts.app')
@section('title', __('Admin'))
@section('subheader')
<div class="c-subheader justify-content-between px-3">
	<h4 class="title-page border-0 m-0 px-0 px-md-3">{{__('Administrator Manager')}}</h4>
</div>
@endsection
@section('content')

<div class="container-fluid">
	<div class="animated fadeIn">
		<div class="row">
			<form id="frm_admin_register" class="col-12 mb-4" action="" method="POST" novalidate autocomplete="off" enctype="multipart/form-data">
				@include('admin.layouts.message')
				<div id="showMessage" style="display: none"></div>
				<div class="card text-white bg-light-dark">
					<div class="card-header">
						<p class="font-weight-bold">{{__('Administrator Manager')}}</p>
					</div>

					<div class="card-body">
						<div class="form-inline d-flex align-items-start flex-sm-row flex-column">
							@csrf
							<div class="col-12 col-sm-6 pl-0 pr-0 pr-sm-1 pr-md-3 pr-xl-5">
								<div class="d-flex align-items-center flex-wrap mb-sm-3 mb-0 w-100">
									<div class="col-12 col-sm-5 col-xl-3 p-0 mb-2 mb-sm-0">
										<label class="justify-content-start mb-0" for="admin_id">{{__('AdminId')}}</label>
									</div>

									<div class="col-12 col-sm-7 col-xl-9 p-0">
										<div class="form-group d-flex mb-0 p-0 pl-sm-2">
											<input type="text" name="admin_id" value="{{ old('admin_id') }}" class="form-control ml-0 mb-2 mb-sm-0 w-100" id="admin_id" />
										</div>
									</div>
								</div>

								<div class="d-flex align-items-center flex-wrap mb-sm-3 mb-0 w-100">
									<div class="col-12 col-sm-5 col-xl-3 p-0 mb-2 mb-sm-0">
										<label class="justify-content-start mb-0" for="admin_name">{{__('Name')}}</label>
									</div>

									<div class="col-12 col-sm-7 col-xl-9 p-0">
										<div class="form-group d-flex mb-0 p-0 pl-sm-2">
											<input type="text" name="name" value="{{ old('name') }}" class="form-control ml-0 mb-2 mb-sm-0 w-100" id="name" />
										</div>
									</div>
								</div>

								<div class="d-flex align-items-center flex-wrap mb-sm-3 mb-0 w-100">
									<div class="col-12 col-sm-5 col-xl-3 p-0 mb-2 mb-sm-0">
										<label class="justify-content-start mb-0" for="phone">{{__('Phone')}}</label>
									</div>

									<div class="col-12 col-sm-7 col-xl-9 p-0">
										<div class="form-group d-flex mb-0 p-0 pl-sm-2">
											<input type="text" name="phone" value="{{ old('phone') }}" class="form-control ml-0 mb-2 mb-sm-0 w-100" id="phone" />
										</div>
									</div>
								</div>

								<div class="d-flex align-items-center flex-wrap mb-0 w-100">
									<div class="col-12 col-sm-5 col-xl-3 p-0 mb-2 mb-sm-0">
										<label class="justify-content-start mb-0" for="nation">{{__('Nation')}}</label>
									</div>

									<div class="col-12 col-sm-7 col-xl-9 p-0">
										<div class="form-group d-flex mb-0 p-0 pl-sm-2">
											<input type="text" name="nation" value="{{ old('nation') }}" class="form-control ml-0 mb-2 mb-sm-0 w-100" id="nation" />
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-sm-6 pr-0 pl-0 pl-sm-1 pl-md-3 pl-xl-5">
								<div class="d-flex align-items-center flex-wrap mb-sm-3 mb-0 w-100">
									<div class="col-12 col-sm-5 col-xl-3 p-0 mb-2 mb-sm-0">
										<label class="justify-content-start mb-0" for="password">{{__('Password')}}</label>
									</div>

									<div class="col-12 col-sm-7 col-xl-9 p-0">
										<div class="form-group d-flex mb-0 p-0 pl-sm-2">
											<input type="password" name="password" autocomplete="new-password" value="" class="form-control ml-0 mb-2 mb-sm-0 w-100" id="password" />
										</div>
									</div>
								</div>

								<div class="d-flex align-items-center flex-wrap mb-sm-3 mb-0 w-100">
									<div class="col-12 col-sm-5 col-xl-3 p-0 mb-2 mb-sm-0">
										<label class="justify-content-start mb-0" for="password_confirmation">{{__('Confirm Password')}}</label>
									</div>

									<div class="col-12 col-sm-7 col-xl-9 p-0">
										<div class="form-group d-flex mb-0 p-0 pl-sm-2">
											<input type="password" name="password_confirmation" autocomplete="new-password" value="" class="form-control ml-0 mb-2 mb-sm-0 w-100" id="password_confirmation" />
										</div>
									</div>
								</div>

								<div class="d-flex align-items-center flex-wrap mb-sm-3 mb-0 w-100">
									<div class="col-12 col-sm-5 col-xl-3 p-0 mb-2 mb-sm-0">
										<label class="justify-content-start mb-0" for="email">{{__('Email')}}</label>
									</div>

									<div class="col-12 col-sm-7 col-xl-9 p-0">
										<div class="form-group d-flex mb-0 p-0 pl-sm-2">
											<input type="email" name="email" value="{{ old('email') }}" class="form-control ml-0 mb-2 mb-sm-0 w-100" id="email" />
										</div>
									</div>
								</div>

								<div class="d-flex align-items-center flex-wrap mb-0 w-100">
									<div class="col-12 col-sm-5 col-xl-3 p-0 mb-2 mb-sm-0">
										<label class="justify-content-start mb-0" for="level_admin">{{__('Level')}}</label>
									</div>

									<div class="col-12 col-sm-7 col-xl-9 p-0">
										<div class="form-group d-flex mb-0 p-0 pl-sm-2">
											<select class="form-control w-100 select-custom-placeholder-admin-{{app()->getLocale()}}" aria-invalid="false" name="role" id="role">
												<option></option>
												<option value="supper_admin" @if(old('role')=='supper_admin' ) selected @endif>{{__('Supper Admin')}}</option>
												<option value="integrated" @if(old('role')=='integrated' ) selected @endif>{{__('Integrated')}}</option>
												<option value="operations" @if(old('role')=='operations' ) selected @endif>{{__('Operations')}}</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-action d-flex justify-content-end align-items-center flex-wrap w-100">
					<a href="" class="btn btn-primary mb-2 mb-sm-0" type="button">Backlist</a>
					<button class="btn btn-primary ml-0 ml-sm-2" type="submit">Create</button>
				</div>
			</form>

			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="text-center">Role</th>
										<th class="text-center">Authorization</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center">Supper_admin</td>
										<td>Supper_admin</td>
									</tr>
									<tr>
										<td class="text-center">Integrated</td>
										<td>Integrated</td>
									</tr>
									<tr>
										<td class="text-center">Operations</td>
										<td>Operations</td>
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
@section('javascript')
<script>
	$("#frm_admin_register").on('submit', function() {
		$("body").addClass('overlay-hidden');
        let formData = new FormData($(this)[0]);
        $.ajax({
            url: window.location.pathname,
            type: "POST",
            contentType: false,
            processData: false,
            data: formData
        }).done(function(res) {
			window.location.href = "";
        }).fail(function(err) {
			if(err.responseJSON && err.responseJSON.errors) {
				let html = '<div class="alert alert-danger" role="alert">'+
								'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
									'<span aria-hidden="true">&times;</span>' +
								'</button>';

				$.each(err.responseJSON.errors, function( index, value ) {
					html += value[0] + '<br />';
				});

				html += '</div>';
				$('#showMessage').html(html).slideDown();
				$("html, body").animate({ scrollTop: 0 }, "slow");
			}
			$("body").removeClass('overlay-hidden');
        });
        return false;
    });
</script>
@endsection
