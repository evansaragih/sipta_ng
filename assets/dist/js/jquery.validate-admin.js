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
					minlength: 3,
					maxlength: 50,
				},
				"username-add": {
					required: !0,
					minlength: 6,
					maxlength: 16,
				},
				"gender-add": {
					required: !0,
				},
				//edit profil masing-masing admin
				"nip-edit": {
					required: !0,
					number: ["0-9", !0],
					minlength: 7,
					maxlength: 50,
				},
				"nama-edit": {
					required: !0,
					minlength: 5,
					maxlength: 50,
				},
				"username-edit": {
					required: !0,
					minlength: 6,
					maxlength: 16,
				},
				"gender-edit": {
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
					minlength: "Panjang nama minimal 3 karakter",
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
				"nip-edit": {
					required: "Anda harus mengisi kolom ini",
					number: "Anda harus menginputkan angka",
					minlength: "Panjang NIP minimal 8 karakter",
					maxlength: "Panjang NIP maksimal 50 karakter",
				},
				"nama-edit": {
					required: "Anda harus mengisi kolom ini",
					minlength: "Panjang nama minimal 5 karakter",
					maxlength: "Panjang nama maksimal 50 karakter",
				},
				"username-edit": {
					required: "Anda belum mengisi kolom ini",
					minlength: "Panjang username minimal 6 karakter",
					maxlength: "Panjang username maksimal 16 karakter",
				},
				"gender-edit": {
					required: "Anda belum memilih kolom ini",
				},
			},
		});
		jQuery(".form-valide_password_profil").validate({
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
				"password-add": {
					required: !0,
					minlength: 6,
					maxlength: 15,
				},
				"password_new-add": {
					required: !0,
					minlength: 6,
					maxlength: 15,
				},
				"password_new_2-add": {
					required: !0,
					equalTo: "#password_new-add",
					minlength: 6,
					maxlength: 15,
				},
			},
			messages: {
				"password-add": {
					required: "Anda harus mengisi kolom ini",
					number: "Anda harus menginputkan angka",
					minlength: "Panjang password minimal 6 karakter",
					maxlength: "Panjang password maksimal 15 karakter",
				},
				"password_new-add": {
					required: "Anda harus mengisi kolom ini",
					minlength: "Panjang password minimal 6 karakter",
					maxlength: "Panjang password maksimal 15 karakter",
				},
				"password_new_2-add": {
					required: "Anda belum mengisi kolom ini",
					equalTo: "Password yang Anda masukkan tidak sama",
					minlength: "Panjang password minimal 6 karakter",
					maxlength: "Panjang password maksimal 15 karakter",
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
