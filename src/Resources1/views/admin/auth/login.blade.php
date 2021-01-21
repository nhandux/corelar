@extends('admin.layouts.login')
@section('content')
<div class="container login-form">
	<div class="row justify-content-center">
		<div class="col-12 col-sm-7">
			<div class="card-group">
				<div class="card p-4">
					<div class="card-body">
						<h1 class="mb-4 text-center">NHANDUC</h1>
						<form id="frmLogin">
							@csrf
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Email</span>
								</div>
								<input class="form-control no-security" type="text" placeholder="" name="admin_id" value="" autofocus>
							</div>
							<div class="input-group mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text">Password</span>
								</div>
								<input class="form-control no-security" type="password" placeholder="" name="password">
							</div>
							<div class="row">
								<div class="col-12 text-center">
									<button class="btn btn-primary px-4" type="submit">SignIn</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal loginModal p-0" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Check Login</h4>
            </div>
            <div class="modal-body">
                <p id="showtext"></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script>
        // console.log(Intl.DateTimeFormat().resolvedOptions().timeZone);
        
        $(document).ready(function() {

            $('#frmLogin').on('submit', function () {
                let admin_id = $('input[name="admin_id"]').val().trim();
                let password = $('input[name="password"]').val().trim();

                if(admin_id === '' || password === '') {
                    $('#showtext').text('ID or password has not been entered');
                    $('#loginModal').modal('show');
                } else {
                    window.location.href="/admin";
                    $.ajax({
                        url: "",
                        method: "POST",
                        data: {
                            admin_id: admin_id,
                            password: password,
                            _token: $('input[name="_token"]').val()
                        }
                    }).done(function(res) {
                    }).fail(function(err) {
                        $('#showtext').text('ID and password do not match. Please check again');
                        // $('#loginModal').modal('show');
                    });
                }

                return false;
            })
		});
    </script>
@endsection
