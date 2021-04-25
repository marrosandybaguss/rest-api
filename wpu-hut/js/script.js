$.getJSON('data/pizza.json', function(data){
	let menu = data.menu;
	$.each(menu, function(i, data){
		$('#daftar-menu').append('<div class="col-md-4"><div class="card" style="width: 18rem;"><img src="img/menu/'+ data.gambar +'" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+ data.nama +'</h5><p class="card-text">'+ data.deskripsi +'</p><h5 class="card-title">Rp '+ data.harga +'</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>')
	});
});

$('.nav-link').on('click', function(){
	$('.nav-link').removeClass('active');
	$(this).addClass('active');

	let kategori = $(this).html();
	$('h1').html(kategori);

	$.getJSON('data/pizza.json', function(data){
		let menu = data.menu;
		let content = '';
		$.each(menu, function(i, data){
			if(kategori.toLowerCase() == data.kategori){
				content += '<div class="col-md-4"><div class="card" style="width: 18rem;"><img src="img/menu/'+ data.gambar +'" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+ data.nama +'</h5><p class="card-text">'+ data.deskripsi +'</p><h5 class="card-title">Rp '+ data.harga +'</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>';
			} else if(kategori == "All Menu") {
				content += '<div class="col-md-4"><div class="card" style="width: 18rem;"><img src="img/menu/'+ data.gambar +'" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+ data.nama +'</h5><p class="card-text">'+ data.deskripsi +'</p><h5 class="card-title">Rp '+ data.harga +'</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>';
			}
		});

		$('#daftar-menu').html(content);

	});
});