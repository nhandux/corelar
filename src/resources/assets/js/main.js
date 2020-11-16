(function ($) {
	$(window).load(function () {

		/**** Select2 ****/
		if (typeof $.fn.select2 !== 'undefined') {
			$(".select-custom-placeholder-ko").select2({
				placeholder: "선택해주세요",
			});
			$(".select-custom-placeholder-en").select2({
				placeholder: "Please select",
			});
			$(".select-custom-placeholder-vi").select2({
				placeholder: "Xin hãy lựa chọn",
			});
			$(".select-custom-placeholder-id").select2({
				placeholder: "Silahkan pilih",
			});
			$(".select-custom-placeholder-admin-ko").select2({
				placeholder: "등급을 선택해주세요.",
			});
			$(".select-custom-placeholder-admin-en").select2({
				placeholder: "Please select a rating.",
			});
			$(".select-custom-placeholder-admin-vi").select2({
				placeholder: "Vui lòng chọn.",
			});
			$(".select-custom-placeholder-admin-id").select2({
				placeholder: "Silakan pilih peringkat.",
			});
			$(".select-custom-placeholder-null").select2({
				placeholder: "",
			});
			$(".select-custom").select2();

			// remove title select2
			$('.select2-selection__rendered').hover(function () {
				$(this).removeAttr('title');
			});
			// select2 add flag
			function formatState(state) {
				if (!state.id) {
					return state.text;
				}
				var baseUrl = "/admin_statics/img/flag";
				var $state = $(
					'<span class="d-flex align-items-center"><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag mr-2" /> ' + state.text + '</span>'
				);
				return $state;
			};
			$(".js-select-flag").select2({
				templateResult: formatState,
				templateSelection: formatState
			});
		}

		/**** Checkbox Setting Feeling ****/
		// var checkbox_no_check = $('input[type="checkbox"]#feeling_no'),
		// 	checkbox_feeling = $('.setting-feeling__check input[type="checkbox"]');

		// checkbox_no_check.on('click', function () {
		// 	if (checkbox_no_check.is(':checked')) {
		// 		checkbox_feeling.prop("checked", false)
		// 	}
		// });

		// checkbox_feeling.each(function () {
		// 	$(this).on('click', function () {
		// 		if ($(this).is(':checked')) {
		// 			checkbox_no_check.prop("checked", false)
		// 		}
		// 	});
		// });

		/**** Handle Change Select Filter Content ****/

		var $filterChange = $('.js-filter-change'),
			$keywordsInput = $(".keywords"),
			$genreSelect = $(".js-genre"),
			$difficultySelect = $(".js-difficulty"),
			$showctSelect = $(".js-show_ct"),
			$language = $(".js-language"),
			$selectShow = $(".d-show");
		$selectNone = $(".d-none");

		$genreSelect.next(".select2-container").hide();
		$difficultySelect.next(".select2-container").hide();
		$showctSelect.next(".select2-container").hide();
		$language.next(".select2-container").hide();
		$selectShow.next('.select2-container').show();
		$selectNone.val('');

		$filterChange.on("change", function (e) {

			var filterVal = $filterChange.val();
			switch (filterVal) {
				case 'genre':
					$keywordsInput.hide();
					$keywordsInput.val('');
					$genreSelect.next(".select2-container").show();
					$difficultySelect.next(".select2-container").hide();
					$showctSelect.next(".select2-container").hide();
					$language.next(".select2-container").hide();

					$genreSelect.val(1);
					$difficultySelect.val('');
					$showctSelect.val('');
					$language.val('');
					break;

				case 'difficulty':
					$keywordsInput.hide();
					$keywordsInput.val('');
					$genreSelect.next(".select2-container").hide();
					$difficultySelect.next(".select2-container").show();
					$showctSelect.next(".select2-container").hide();
					$language.next(".select2-container").hide();

					$difficultySelect.val('H');
					$genreSelect.val('');
					$showctSelect.val('');
					$language.val('');
					break;

				case 'show_content':
					$keywordsInput.hide();
					$keywordsInput.val('');
					$genreSelect.next(".select2-container").hide();
					$difficultySelect.next(".select2-container").hide();
					$showctSelect.next(".select2-container").show();
					$language.next(".select2-container").hide();

					$showctSelect.val('Y');
					$genreSelect.val('');
					$difficultySelect.val('');
					$language.val('');
					break;

				case 'language':
					$keywordsInput.hide();
					$keywordsInput.val('');
					$genreSelect.next(".select2-container").hide();
					$difficultySelect.next(".select2-container").hide();
					$showctSelect.next(".select2-container").hide();
					$language.next(".select2-container").show();

					$language.val('en')
					$genreSelect.val('');
					$difficultySelect.val('');
					$showctSelect.val('');
					break;

				default:
					$keywordsInput.show();
					$keywordsInput.val('');
					$genreSelect.next(".select2-container").hide();
					$difficultySelect.next(".select2-container").hide();
					$showctSelect.next(".select2-container").hide();
					$language.next(".select2-container").hide();

					$genreSelect.val('');
					$difficultySelect.val('');
					$showctSelect.val('');
					$language.val('');
			}
		});

		/**** Upload Edit: Check Upload File ****/
		$(".upload-info input[type='file']").each(function () {
			if ($(this).length) {
				$(this).change(function () {
					$_upload_img = document.getElementById("js-upload-img");
					$_upload_voice = document.getElementById("js-upload-voice");
					$_upload_doc = document.getElementById("js-upload-doc");

					$_upload_banner_en = document.getElementById("js-upload-banner-en");
					$_upload_banner_vn = document.getElementById("js-upload-banner-vn");
					$_upload_banner_id = document.getElementById("js-upload-banner-id");
					$_upload_detail_en = document.getElementById("js-upload-detail-en");
					$_upload_detail_vn = document.getElementById("js-upload-detail-vn");
					$_upload_detail_id = document.getElementById("js-upload-detail-id");

					if (($_upload_img != null) && $_upload_img.files[0]) {
						$(".value_file--img").css('z-index', 0);
					} else {
						$(".value_file--img").css('z-index', 10);
					}

					if (($_upload_voice != null) && $_upload_voice.files[0]) {
						$(".value_file--voice").css('z-index', 0);
					} else {
						$(".value_file--voice").css('z-index', 10);
					}

					if (($_upload_doc != null) && $_upload_doc.files[0]) {
						$(".value_file--doc").css('z-index', 0);
					} else {
						$(".value_file--doc").css('z-index', 10);
					}

					if (($_upload_banner_en != null) && $_upload_banner_en.files[0]) {
						$(".value_file--banner-en").css('z-index', 0);
					} else {
						$(".value_file--banner-en").css('z-index', 10);
					}

					if (($_upload_banner_vn != null) && $_upload_banner_vn.files[0]) {
						$(".value_file--banner-vn").css('z-index', 0);
					} else {
						$(".value_file--banner-vn").css('z-index', 10);
					}

					if (($_upload_banner_id != null) && $_upload_banner_id.files[0]) {
						$(".value_file--banner-id").css('z-index', 0);
					} else {
						$(".value_file--banner-id").css('z-index', 10);
					}

					if (($_upload_detail_en != null) && $_upload_detail_en.files[0]) {
						$(".value_file--detail-en").css('z-index', 0);
					} else {
						$(".value_file--detail-en").css('z-index', 10);
					}

					if (($_upload_detail_vn != null) && $_upload_detail_vn.files[0]) {
						$(".value_file--detail-vn").css('z-index', 0);
					} else {
						$(".value_file--detail-vn").css('z-index', 10);
					}

					if (($_upload_detail_id != null) && $_upload_detail_id.files[0]) {
						$(".value_file--detail-id").css('z-index', 0);
					} else {
						$(".value_file--detail-id").css('z-index', 10);
					}
				});
			}
		});
	});
})(jQuery);