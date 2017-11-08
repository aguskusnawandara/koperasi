$(document).ready(function(){
	$('#anggota1').keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$('#anggota2').keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});

	$('#cetak').click(function(){
		var kode1 = $('#anggota1').val();
		var kode2 = $('#anggota2').val();
		var pilih = $('.pilih:checked').val();
		var jml_pilih = $('.pilih:checked');

		if (jml_pilih.length == 0){
			var error = true;
			alert('Maaf, anda belum memilih');
			return false;
		}

		window.open('modul/laporan/lapAnggota.php?kode1='+kode1+'&kode2='+kode2+'&pilih='+pilih);
	});
});