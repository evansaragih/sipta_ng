document.getElementById("id_kategori-add").onchange = function () {
	// $test = "Tidak Berbintang";
	var kosong = "Tidak Berbintang";
	if (this.value == "1") {
		// document.getElementById("kelas_bintang").removeAttribute("hidden");
		$("#kelas_bintang").fadeIn();
	} else if (this.value == "2") {
		// document.getElementById("kelas_bintang").setAttribute("hidden", "hidden");
		$("#kelas_bintang").fadeOut();
		$("#id_kelas_bintang-add").val(kosong);
		$("#id_kelas_bintang-add").remove();
	} else if (this.value == "3") {
		// document.getElementById("kelas_bintang").setAttribute("hidden", "hidden");
		$("#id_kelas_bintang-add").val(kosong);
		$("#kelas_bintang").fadeOut();
		$("#id_kelas_bintang-add").remove();
	}
};
