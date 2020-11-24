var form_validation = (function () {
	var e = function () {
		jQuery(".form-valide").validate({
			ignore: [],
			errorClass: "invalid-feedback animated fadeInDown",
			errorElement: "div",
			errorPlacement: function (e, a) {
				jQuery(a).parents(".form-group").append(e);
			},
			highlight: function (e) {
				jQuery(e)
					.closest(".form-group")
					.removeClass("is-invalid")
					.addClass("is-invalid");
			},
			success: function (e) {
				jQuery(e).closest(".form-group").removeClass("is-invalid"),
					jQuery(e).remove();
			},
			rules: {
				"pintu_masuk-add": {
					required: !0,
				},
				"jenis_penumpang-add": {
					required: !0,
				},
				"jumlah_penumpang-add": {
					required: !0,
					number: ["0-9", !0],
				},
				"bulan-add": {
					required: !0,
				},
				"tahun-add": {
					required: !0,
				},
				"jumlah_penumpang-edit": {
					required: !0,
					number: ["0-9", !0],
				},
				"kebangsaan-add": {
					required: !0,
				},
				"jumlah-add": {
					required: !0,
					number: ["0-9", !0],
				},
				"jumlah-edit": {
					required: !0,
					number: ["0-9", !0],
				},
				"id_kelas_bintang-add": {
					required: !0,
				},
				"jlh_kamar-add": {
					required: !0,
					number: ["0-9", !0],
				},
				"nama_ako-add": {
					required: !0,
				},
				"id_kategori-add": {
					required: !0,
				},
				"id_kabupaten-add": {
					required: !0,
				},
				"jlh_kamar-edit": {
					required: !0,
					number: ["0-9", !0],
				},
				"nama_ako-edit": {
					required: !0,
				},
				"jlh_room-add": {
					required: !0,
					number: ["0-9", !0],
				},
				"akomodasi-add": {
					//nama_restoran
					required: !0,
				},
				"jlh_kursi-edit": {
					required: !0,
					number: ["0-9", !0],
				},
				"akomodasi-edit": {
					//grup_kebangsaan
					required: !0,
				},
				"id_kabupaten-edit": {
					//grup_kebangsaan
					required: !0,
				},
			},
			messages: {
				"pintu_masuk-add": {
					required: "Anda harus mengisi kolom ini",
				},
				"jenis_penumpang-add": {
					required: "Anda harus mengisi kolom ini",
				},
				"jlh_int-add": {
					required: "Anda harus mengisi kolom ini",
					number: "Anda harus menginputkan angka",
				},
				"jumlah_penumpang-add": {
					required: "Anda belum mengisi kolom ini",
					number: "Anda harus menginputkan angka",
				},
				"bulan-add": {
					required: "Anda belum memilih kolom ini",
				},
				"tahun-add": {
					required: "Anda harus mengisi kolom ini",
				},
				"jumlah_penumpang-edit": {
					required: "Anda belum mengisi kolom ini",
					number: "Anda harus menginputkan angka",
				},
				"kebangsaan-add": {
					required: "Anda belum mengisi kolom ini",
				},
				"jumlah-add": {
					required: "Anda belum mengisi kolom ini",
					number: "Anda harus menginputkan angka",
				},
				"jumlah-edit": {
					required: "Anda belum mengisi kolom ini",
					number: "Anda harus menginputkan angka",
				},
				"id_kelas_bintang-add": {
					required: "Anda belum mengisi kolom ini",
				},
				"jlh_kamar-add": {
					required: "Anda belum mengisi kolom ini",
					number: "Anda harus menginputkan angka",
				},
				"nama_ako-add": {
					required: "Anda belum mengisi kolom ini",
				},
				"id_kategori-add": {
					required: "Anda belum mengisi kolom ini",
				},
				"id_kabupaten-add": {
					required: "Anda belum mengisi kolom ini",
				},
				"jlh_kamar-edit": {
					required: "Anda belum mengisi kolom ini",
					number: "Anda harus menginputkan angka",
				},
				"nama_ako-edit": {
					required: "Anda belum mengisi kolom ini",
				},
				"jlh_room-add": {
					required: "Anda belum mengisi kolom ini",
					number: "Anda harus menginputkan angka",
				},
				"akomodasi-add": {
					required: "Anda belum mengisi kolom ini",
				},
				"jlh_kursi-edit": {
					required: "Anda belum mengisi kolom ini",
					number: "Anda harus menginputkan angka",
				},
				"akomodasi-edit": {
					required: "Anda belum mengisi kolom ini",
				},
				"id_kabupaten-edit": {
					required: "Anda belum mengisi kolom ini",
				},
			},
		});
		jQuery(".form-valide_paste_akomodasi").validate({
			ignore: [],
			errorClass: "invalid-feedback animated fadeInDown",
			errorElement: "div",
			errorPlacement: function (e, a) {
				jQuery(a).parents(".form-group").append(e);
			},
			highlight: function (e) {
				jQuery(e)
					.closest(".form-group")
					.removeClass("is-invalid")
					.addClass("is-invalid");
			},
			success: function (e) {
				jQuery(e).closest(".form-group").removeClass("is-invalid"),
					jQuery(e).remove();
			},
			rules: {
				"id_kelas_bintang-paste": {
					required: !0,
				},
				"jlh_kamar-paste": {
					required: !0,
					number: ["0-9", !0],
				},
				"nama_ako-paste": {
					required: !0,
				},
				"id_kategori-paste": {
					required: !0,
				},
				"id_kabupaten-paste": {
					required: !0,
				},
				"tahun-paste": {
					required: !0,
				},
			},
			messages: {
				"jlh_kamar-paste": {
					required: "Anda belum mengisi kolom ini",
					number: "Anda harus menginputkan angka",
				},
				"nama_ako-paste": {
					required: "Anda belum mengisi kolom ini",
				},
				"id_kategori-paste": {
					required: "Anda belum mengisi kolom ini",
				},
				"id_kabupaten-paste": {
					required: "Anda belum mengisi kolom ini",
				},
				"tahun-paste": {
					required: "Anda belum mengisi kolom ini",
				},
			},
		});
		jQuery(".form-valide_grup_kebangsaan").validate({
			ignore: [],
			errorClass: "invalid-feedback animated fadeInDown",
			errorElement: "div",
			errorPlacement: function (e, a) {
				jQuery(a).parents(".form-group").append(e);
			},
			highlight: function (e) {
				jQuery(e)
					.closest(".form-group")
					.removeClass("is-invalid")
					.addClass("is-invalid");
			},
			success: function (e) {
				jQuery(e).closest(".form-group").removeClass("is-invalid"),
					jQuery(e).remove();
			},
			rules: {
				"nama_ako-search": {
					//grup_kebangsaan
					required: !0,
				},
			},
			messages: {
				"nama_ako-search": {
					required: "Anda belum mengisi kolom ini",
				},
			},
		});
		jQuery(".form-valide_kebangsaan").validate({
			ignore: [],
			errorClass: "invalid-feedback animated fadeInDown",
			errorElement: "div",
			errorPlacement: function (e, a) {
				jQuery(a).parents(".form-group").append(e);
			},
			highlight: function (e) {
				jQuery(e)
					.closest(".form-group")
					.removeClass("is-invalid")
					.addClass("is-invalid");
			},
			success: function (e) {
				jQuery(e).closest(".form-group").removeClass("is-invalid"),
					jQuery(e).remove();
			},
			rules: {
				"nama_ako-search": {
					//kebangsaan
					required: !0,
				},
				"id_kabupaten-search": {
					required: !0,
				},
			},
			messages: {
				"nama_ako-search": {
					required: "Anda belum mengisi kolom ini",
				},
				"id_kabupaten-search": {
					required: "Anda belum mengisi kolom ini",
				},
			},
		});
	};
	return {
		init: function () {
			e(),
				a(),
				jQuery(".js-select2").on("change", function () {
					jQuery(this).valid();
				});
		},
	};
})();
jQuery(function () {
	form_validation.init();
});
