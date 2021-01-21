<div class="card">
	<div class="card-header">
		<p class="font-weight-bold">Search User</p>
	</div>
	<div class="card-body">
		<form id="formSearch">
			<div class="filter-wrapper form-inline d-flex justify-content-start align-items-start align-items-sm-center flex-sm-row flex-column">
				<div class="filter-wrapper__col d-flex flex-sm-row flex-column pr-0 pr-xl-2 mb-2 mb-xl-0">
					<div class="filter-wrapper__col d-flex flex-sm-row flex-column p-0 mb-0">
						<label class="filter__label mr-0 mr-sm-2">Fillter</label>

						<select class="form-control mr-0 mr-sm-2 mb-2 mb-sm-0 type select-custom" aria-invalid="false" name="type">
							<option value="">Please select</option>
							<option value="id">Email</option>
							<option value="name">Nickname</option>
						</select>

						<input type="text" class="form-control keywords ml-0 ml-sm-2 mt-2 mt-sm-0" placeholder="Please enter keywords" value="" name="keywords">
					</div>
				</div>

				<div class="filter-wrapper__col d-flex flex-sm-row flex-column pr-0 pr-xl-2 pl-0 pl-xl-2 mb-2 mb-xl-0">
					<div class="filter-wrapper__col d-flex flex-sm-row flex-column p-0 mb-0">
						<label class="filter__label mr-0 mr-sm-2">Type User</label>

						<select class="form-control mr-0 mr-sm-2 mb-2 mb-sm-0 select-custom" name="part" aria-invalid="false">
							<option value="">All</option>
							<option value="user_default">UnSocial</option>
							<option value="user_sns">HasSocial</option>
							<option value="user_paid">Subscribe</option>
							<option value="user_free">Unsubscribe</option>
							<option value="user_withdrawal">Withdrawal</option>
						</select>
					</div>
				</div>

				<div class="filter-wrapper__col d-flex flex-sm-row flex-column pl-0 pl-xl-2 pl-0 pl-xl-2 mb-2 mb-sm-0">
					<div class="filter-wrapper__col d-flex flex-sm-row flex-column p-0 mb-0">
						<label class="filter__label mr-0 mr-sm-2">Language</label>
						<select class="form-control mr-0 mr-sm-2 mb-2 mb-sm-0 select-custom" name="language" aria-invalid="false">
							<option value="">All</option>
							<option value="en">English</option>
							<option value="vi">Vietnamese</option>
							<option value="id">Indonesian</option>
						</select>

						<div class="mt-3 mt-sm-0 ml-0 ml-sm-auto">
							<button class="btn btn-primary w-100 ml-0 ml-sm-2" type="submit">Search</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
