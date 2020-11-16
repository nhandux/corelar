<div class="c-sidebar-brand" style="font-size: 25px; font-weight: 500"><a href="/admin" style="color: #fff; text-decoration: none">NHANDUC</a></div>

<div class="lang-menu d-lg-none d-block">
	<select class="form-control js-example-templating " aria-invalid="false" name="type">
		<option value="ko">한국어</option>
		<option value="en">English</option>
		<option value="vi">Tiếng Việt</option>
		<option value="id">bahasa Indo</option>
	</select>
</div>

<ul class="c-sidebar-nav ps ps--active-y">
	<li class="c-sidebar-nav-dropdown {{ (request()->is('admin/auth*')) ? 'c-active c-show' : '' }}">
		<a class="c-sidebar-nav-dropdown-toggle" href="javascript:void(0)">
			<i class="cil-user c-sidebar-nav-icon"></i> Auth Manager
		</a>
		<ul class="c-sidebar-nav-dropdown-items">
			<li class="c-sidebar-nav-item">
				<a class="c-sidebar-nav-link {{ (request()->is('admin/auth/user*')) ? 'c-active' : '' }}" href="/admin/auth/user">
					<span class="c-sidebar-nav-icon"></span>User
				</a>
			</li>
			<li class="c-sidebar-nav-item">
				<a class="c-sidebar-nav-link {{ (request()->is('admin/auth/admin*')) ? 'c-active' : '' }}" href="/admin/auth/admin">
					<span class="c-sidebar-nav-icon"></span>Administrator
				</a>
			</li>
		</ul>
	</li>
	<li class="c-sidebar-nav-item">
		<a class="c-sidebar-nav-link {{ (request()->is('admin/notice/*')) ? 'c-active' : '' }}" href="/admin/notice">
			<i class="cil-bell c-sidebar-nav-icon"></i> Notice Manager
		</a>
	</li>
</ul>

</div>
