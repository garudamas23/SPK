$(document).ready(function () {
	var best = $('#bestKepribadian').text();
	var high = $('#highestCF').text();
	getdata.konten(best,high);
});

getdata = {
	konten:function(best,high){
		$.post("/dpp/diagnosa/konten", { param: best }, function (data, status) {
            var dataParse = JSON.parse(data);
			var konten = dataParse.konten;
			var karir = dataParse.karir;
           	$('#Kepribadian,#nameKepribadian,#namaKonten').text(konten.daftar_kepribadian);
			$('#konten').html(konten.konten);
			$('#persentase').text(high);
			$("#imageKonten").html("<img src='/dpp/assets/uploads/konten/"+konten.image+"'>");
			$('#karir').html(karir.karir).text();
        });
	}
}