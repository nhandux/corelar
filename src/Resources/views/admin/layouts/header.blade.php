<div class="c-wrapper">
	<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
		<button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button>
		<button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true"><span class="c-header-toggler-icon"></span></button>
		<div class="c-header-nav ml-auto mr-4">
			<div class="lang-herder d-lg-block d-none">
				<select class="form-control js-select-flag changeLanguage" aria-invalid="false" name="type">
					<option value="ko" @if(app()->getLocale() == 'ko') selected @endif>Korean</option>
					<option value="en" @if(app()->getLocale() == 'en') selected @endif>English</option>
					<option value="vi" @if(app()->getLocale() == 'vi') selected @endif>Vietnamese</option>
					<option value="id" @if(app()->getLocale() == 'id') selected @endif>Indonesian</option>
				</select>
			</div>

			<div class="c-avatar ml-3"><img class="c-avatar-img" src="/admin_statics/img/avatars/7.jpg" alt="user@email.com">Nhan</div>
			<form action="/admin/login" method="get"><button type="submit" class="btn btn-outline-primary">Logout</button></form>
		</div>

		@yield('subheader')
	</header>
