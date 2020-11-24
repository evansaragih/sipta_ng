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
				"nip-add": {
					required: !0,
					number: ["0-9", !0],
					minlength: 7,
					maxlength: 50,
				},
				"nama-add": {
					required: !0,
					minlength: 5,
					maxlength: 50,
				},
				"username-add": {
					required: !0,
					minlength: 6,
					maxlength: 16,
				},
				"gender-add": {
					required: !0,
					number: ["0-9-+"],
				},
				"jl-bulan": {
					required: !0,
				},
				"jl-tahun": {
					required: !0,
				},
				"val-email": {
					required: !0,
					email: !0,
				},
				"val-password": {
					required: !0,
					minlength: 6,
					maxlength: 50,
				},
				"val-nik": {
					required: !0,
					number: ["0-9", !0],
					minlength: 16,
					maxlength: 16,
				},
				"val-confirm-password": {
					required: !0,
					equalTo: "#val-password",
				},
				"val-select2": {
					required: !0,
				},
				"val-select2-multiple": {
					required: !0,
					minlength: 2,
				},
				"val-suggestions": {
					required: !0,
					minlength: 5,
				},
				"val-jenis-kelamin": {
					required: !0,
				},
				"val-pendidikan": {
					required: !0,
				},
				"val-pekerjaan[]": {
					required: !0,
				},
				"val-kategori[]": {
					required: !0,
				},
				"val-hasil[]": {
					required: !0,
				},
				"val-layanan[]": {
					required: !0,
				},
				"val-fasilitas[]": {
					required: !0,
				},
				"val-rujukan": {
					required: !0,
				},
				"val-kota": {
					required: !0,
				},
				"val-currency": {
					required: !0,
					currency: ["$", !0],
				},
				"val-website": {
					required: !0,
					url: !0,
				},
				"val-umur": {
					required: !0,
					number: ["0-9-+", !0],
					minlength: 2,
					maxlength: 2,
				},
				"val-digits": {
					required: !0,
					digits: !0,
				},
				"val-number": {
					required: !0,
					number: !0,
				},
				"val-range": {
					required: !0,
					range: [1, 5],
				},
				"val-terms": {
					required: !0,
				},
			},
			messages: {
				"nip-add": {
					required: "Anda harus mengisi kolom ini",
					number: "Anda harus menginputkan angka",
					minlength: "Panjang NIP minimal 8 karakter",
					maxlength: "Panjang NIP maksimal 50 karakter",
				},
				"nama-add": {
					required: "Anda harus mengisi kolom ini",
					minlength: "Panjang nama minimal 5 karakter",
					maxlength: "Panjang nama maksimal 50 karakter",
				},
				"username-add": {
					required: "Anda belum mengisi kolom ini",
					minlength: "Panjang username minimal 6 karakter",
					maxlength: "Panjang username maksimal 16 karakter",
				},
				"gender-add": {
					required: "Anda belum memilih kolom ini",
				},
				"val-password": {
					required: "Anda harus mengisi kolom ini",
					minlength: "Panjang kata sandi Anda minimal 6 karakter",
					maxlength: "Panjang kata sandi Anda maksimal 50 karakter",
				},
				"jlh-bulan": {
					required: "Anda harus mengisi kolom ini",
				},
				"jl-tahun": {
					required: "Anda harus mengisi kolom ini",
				},
				"val-nik": {
					required: "Anda harus mengisi kolom ini",
					minlength: "Panjang NIK 16 karakter",
					maxlength: "Panjang NIK 16 karakter",
				},
				"val-confirm-password": {
					required: "Anda harus mengisi kolom ini",
					equalTo: "Kata sandi yang Anda masukkan tidak sama",
				},
				"val-select2": "Please select a value!",
				"val-select2-multiple": "Please select at least 2 values!",
				"val-suggestions": "What can we do to become better?",
				"val-jenis-kelamin": "Anda belum memilih kolom ini",
				"val-pendidikan": "Anda belum memilih kolom ini",
				"val-pekerjaan[]": "Anda belum memilih kolom ini",
				"val-kategori[]": "Anda belum memilih kolom ini",
				"val-hasil[]": "Anda belum memilih kolom ini",
				"val-layanan[]": "Anda belum memilih kolom ini",
				"val-fasilitas[]": "Anda belum memilih kolom ini",
				"val-rujukan": "Anda belum memilih kolom ini",
				"val-kota": "Anda harus memilih kota",
				"val-currency": "Please enter a price!",
				"val-website": "Please enter your website!",
				"val-umur": {
					required: "Anda harus mengisi kolom ini",
					number: "Umur Anda Tidak Valid",
					minlength: "Tidak Memenuhi Ketentuan Umur",
					maxlength: "Melebihi Ketentuan Umur",
				},
				"val-digits": "Please enter only digits!",
				"val-number": "Please enter a number!",
				"val-range": "Please enter a number between 1 and 5!",
				"val-terms": "Anda harus menyetujui ketentuan layanan",
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
