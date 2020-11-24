var table = $("#waktu").DataTable({
	buttons: [
		{
			extend: "csvHtml5",
			title:
				"Tabel Akomodasi Akomodasi Denpasar Tahun <?php echo $year_search ?> - SIPTA"
		},
		{
			extend: "excelHtml5",
			title:
				"Tabel Akomodasi Akomodasi Denpasar Tahun <?php echo $year_search ?> - SIPTA"
		},
		{
			extend: "pdfHtml5",
			title:
				"Tabel Akomodasi Akomodasi Denpasar Tahun <?php echo $year_search ?> - SIPTA"
		},
		{
			extend: "print",
			title:
				"Tabel Akomodasi Akomodasi Denpasar Tahun <?php echo $year_search ?> - SIPTA"
		}
		// {
		//   extend: 'colvis',
		//   title: 'Tabel Akomodasi Hotel Bintang Kota/Kabupaten Denpasar - SIPTA'
		// }
	],
	paging: true,
	lengthChange: true,
	searching: true,
	ordering: true,
	info: true,
	autoWidth: false
});

table
	.buttons()
	.container()
	.appendTo(".box-body .col-sm-6:eq(0)");
