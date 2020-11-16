; (function (global, factory) {
	typeof exports === 'object' && typeof module !== 'undefined'
		&& typeof require === 'function' ? factory(require('../moment')) :
		typeof define === 'function' && define.amd ? define(['../moment'], factory) :
			factory(global.moment)
}(this, (function (moment) {
	'use strict';

	//! moment.js locale configuration

	moment.defineLocale('en-gb', {
		months: 'January_February_March_April_May_June_July_August_September_October_November_December'.split(
			'_'
		),
		monthsShort: 'Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec'.split('_'),
		weekdays: 'Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday'.split(
			'_'
		),
		weekdaysShort: 'Sun_Mon_Tue_Wed_Thu_Fri_Sat'.split('_'),
		weekdaysMin: 'Su_Mo_Tu_We_Th_Fr_Sa'.split('_'),
		longDateFormat: {
			LT: 'HH:mm',
			LTS: 'HH:mm:ss',
			L: 'DD/MM/YYYY',
			LL: 'D MMMM YYYY',
			LLL: 'D MMMM YYYY HH:mm',
			LLLL: 'dddd, D MMMM YYYY HH:mm',
		},
		calendar: {
			sameDay: '[Today at] LT',
			nextDay: '[Tomorrow at] LT',
			nextWeek: 'dddd [at] LT',
			lastDay: '[Yesterday at] LT',
			lastWeek: '[Last] dddd [at] LT',
			sameElse: 'L',
		},
		relativeTime: {
			future: 'in %s',
			past: '%s ago',
			s: 'a few seconds',
			ss: '%d seconds',
			m: 'a minute',
			mm: '%d minutes',
			h: 'an hour',
			hh: '%d hours',
			d: 'a day',
			dd: '%d days',
			M: 'a month',
			MM: '%d months',
			y: 'a year',
			yy: '%d years',
		},
		dayOfMonthOrdinalParse: /\d{1,2}(st|nd|rd|th)/,
		ordinal: function (number) {
			var b = number % 10,
				output =
					~~((number % 100) / 10) === 1
						? 'th'
						: b === 1
							? 'st'
							: b === 2
								? 'nd'
								: b === 3
									? 'rd'
									: 'th';
			return number + output;
		},
		week: {
			dow: 1, // Monday is the first day of the week.
			doy: 4, // The week that contains Jan 4th is the first week of the year.
		},
	});

	//! moment.js locale configuration

	moment.defineLocale('id', {
		months: 'Januari_Februari_Maret_April_Mei_Juni_Juli_Agustus_September_Oktober_November_Desember'.split(
			'_'
		),
		monthsShort: 'Jan_Feb_Mar_Apr_Mei_Jun_Jul_Agt_Sep_Okt_Nov_Des'.split('_'),
		weekdays: 'Minggu_Senin_Selasa_Rabu_Kamis_Jumat_Sabtu'.split('_'),
		weekdaysShort: 'Min_Sen_Sel_Rab_Kam_Jum_Sab'.split('_'),
		weekdaysMin: 'Mg_Sn_Sl_Rb_Km_Jm_Sb'.split('_'),
		longDateFormat: {
			LT: 'HH.mm',
			LTS: 'HH.mm.ss',
			L: 'DD/MM/YYYY',
			LL: 'D MMMM YYYY',
			LLL: 'D MMMM YYYY [pukul] HH.mm',
			LLLL: 'dddd, D MMMM YYYY [pukul] HH.mm',
		},
		meridiemParse: /pagi|siang|sore|malam/,
		meridiemHour: function (hour, meridiem) {
			if (hour === 12) {
				hour = 0;
			}
			if (meridiem === 'pagi') {
				return hour;
			} else if (meridiem === 'siang') {
				return hour >= 11 ? hour : hour + 12;
			} else if (meridiem === 'sore' || meridiem === 'malam') {
				return hour + 12;
			}
		},
		meridiem: function (hours, minutes, isLower) {
			if (hours < 11) {
				return 'pagi';
			} else if (hours < 15) {
				return 'siang';
			} else if (hours < 19) {
				return 'sore';
			} else {
				return 'malam';
			}
		},
		calendar: {
			sameDay: '[Hari ini pukul] LT',
			nextDay: '[Besok pukul] LT',
			nextWeek: 'dddd [pukul] LT',
			lastDay: '[Kemarin pukul] LT',
			lastWeek: 'dddd [lalu pukul] LT',
			sameElse: 'L',
		},
		relativeTime: {
			future: 'dalam %s',
			past: '%s yang lalu',
			s: 'beberapa detik',
			ss: '%d detik',
			m: 'semenit',
			mm: '%d menit',
			h: 'sejam',
			hh: '%d jam',
			d: 'sehari',
			dd: '%d hari',
			M: 'sebulan',
			MM: '%d bulan',
			y: 'setahun',
			yy: '%d tahun',
		},
		week: {
			dow: 0, // Sunday is the first day of the week.
			doy: 6, // The week that contains Jan 6th is the first week of the year.
		},
	});

	//! moment.js locale configuration

	moment.defineLocale('ko', {
		months: '1월_2월_3월_4월_5월_6월_7월_8월_9월_10월_11월_12월'.split('_'),
		monthsShort: '1월_2월_3월_4월_5월_6월_7월_8월_9월_10월_11월_12월'.split(
			'_'
		),
		weekdays: '일요일_월요일_화요일_수요일_목요일_금요일_토요일'.split('_'),
		weekdaysShort: '일_월_화_수_목_금_토'.split('_'),
		weekdaysMin: '일_월_화_수_목_금_토'.split('_'),
		longDateFormat: {
			LT: 'A h:mm',
			LTS: 'A h:mm:ss',
			L: 'YYYY.MM.DD.',
			LL: 'YYYY년 MMMM D일',
			LLL: 'YYYY년 MMMM D일 A h:mm',
			LLLL: 'YYYY년 MMMM D일 dddd A h:mm',
			l: 'YYYY.MM.DD.',
			ll: 'YYYY년 MMMM D일',
			lll: 'YYYY년 MMMM D일 A h:mm',
			llll: 'YYYY년 MMMM D일 dddd A h:mm',
		},
		calendar: {
			sameDay: '오늘 LT',
			nextDay: '내일 LT',
			nextWeek: 'dddd LT',
			lastDay: '어제 LT',
			lastWeek: '지난주 dddd LT',
			sameElse: 'L',
		},
		relativeTime: {
			future: '%s 후',
			past: '%s 전',
			s: '몇 초',
			ss: '%d초',
			m: '1분',
			mm: '%d분',
			h: '한 시간',
			hh: '%d시간',
			d: '하루',
			dd: '%d일',
			M: '한 달',
			MM: '%d달',
			y: '일 년',
			yy: '%d년',
		},
		dayOfMonthOrdinalParse: /\d{1,2}(일|월|주)/,
		ordinal: function (number, period) {
			switch (period) {
				case 'd':
				case 'D':
				case 'DDD':
					return number + '일';
				case 'M':
					return number + '월';
				case 'w':
				case 'W':
					return number + '주';
				default:
					return number;
			}
		},
		meridiemParse: /오전|오후/,
		isPM: function (token) {
			return token === '오후';
		},
		meridiem: function (hour, minute, isUpper) {
			return hour < 12 ? '오전' : '오후';
		},
	});

	//! moment.js locale configuration

	moment.defineLocale('vi', {
		months: 'tháng 1_tháng 2_tháng 3_tháng 4_tháng 5_tháng 6_tháng 7_tháng 8_tháng 9_tháng 10_tháng 11_tháng 12'.split(
			'_'
		),
		monthsShort: 'Thg 01_Thg 02_Thg 03_Thg 04_Thg 05_Thg 06_Thg 07_Thg 08_Thg 09_Thg 10_Thg 11_Thg 12'.split(
			'_'
		),
		monthsParseExact: true,
		weekdays: 'chủ nhật_thứ hai_thứ ba_thứ tư_thứ năm_thứ sáu_thứ bảy'.split(
			'_'
		),
		weekdaysShort: 'CN_T2_T3_T4_T5_T6_T7'.split('_'),
		weekdaysMin: 'CN_T2_T3_T4_T5_T6_T7'.split('_'),
		weekdaysParseExact: true,
		meridiemParse: /sa|ch/i,
		isPM: function (input) {
			return /^ch$/i.test(input);
		},
		meridiem: function (hours, minutes, isLower) {
			if (hours < 12) {
				return isLower ? 'sa' : 'SA';
			} else {
				return isLower ? 'ch' : 'CH';
			}
		},
		longDateFormat: {
			LT: 'HH:mm',
			LTS: 'HH:mm:ss',
			L: 'DD/MM/YYYY',
			LL: 'D MMMM [năm] YYYY',
			LLL: 'D MMMM [năm] YYYY HH:mm',
			LLLL: 'dddd, D MMMM [năm] YYYY HH:mm',
			l: 'DD/M/YYYY',
			ll: 'D MMM YYYY',
			lll: 'D MMM YYYY HH:mm',
			llll: 'ddd, D MMM YYYY HH:mm',
		},
		calendar: {
			sameDay: '[Hôm nay lúc] LT',
			nextDay: '[Ngày mai lúc] LT',
			nextWeek: 'dddd [tuần tới lúc] LT',
			lastDay: '[Hôm qua lúc] LT',
			lastWeek: 'dddd [tuần trước lúc] LT',
			sameElse: 'L',
		},
		relativeTime: {
			future: '%s tới',
			past: '%s trước',
			s: 'vài giây',
			ss: '%d giây',
			m: 'một phút',
			mm: '%d phút',
			h: 'một giờ',
			hh: '%d giờ',
			d: 'một ngày',
			dd: '%d ngày',
			w: 'một tuần',
			ww: '%d tuần',
			M: 'một tháng',
			MM: '%d tháng',
			y: 'một năm',
			yy: '%d năm',
		},
		dayOfMonthOrdinalParse: /\d{1,2}/,
		ordinal: function (number) {
			return number;
		},
		week: {
			dow: 1, // Monday is the first day of the week.
			doy: 4, // The week that contains Jan 4th is the first week of the year.
		},
	});

	moment.locale('en');

	return moment;

})));