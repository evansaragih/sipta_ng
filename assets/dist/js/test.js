document.getElementById("id_kategori-paste").onchange = function() {
	// $test = "Tidak Berbintang";
	var kosong = "Tidak Berbintang";
	if (this.value == "1") {
		// document.getElementById("kelas_bintang").removeAttribute("hidden");
		$("#kelas_bintang-paste").fadeIn();
	} else if (this.value == "2") {
		// document.getElementById("kelas_bintang").setAttribute("hidden", "hidden");
		$("#kelas_bintang-paste").fadeOut();
		$("#id_kelas_bintang-paste").val(kosong);
	} else if (this.value == "3") {
		// document.getElementById("kelas_bintang").setAttribute("hidden", "hidden");
		$("#id_kelas_bintang-paste").val(kosong);
		$("#kelas_bintang-paste").fadeOut();
	}
};
