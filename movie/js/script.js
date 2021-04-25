$('#search-button').on('click', function(){
	$('#movie-list').html('')
	$.ajax({
		url: 'https://www.omdbapi.com',
		type: 'get',
		dataType: 'json',
		data: {
			'apikey': '80d16876',
			's': $('#search-input').val()
		},
		success: function(result){
			if(result.Response == 'True'){
				let movies = result.Search
				$.each(movies, function(i, data){
					$('#movie-list').append(`
						<div class="col-md-4">
							<div class="card">
							  <img class="card-img-top" src="`+ data.Poster +`" alt="Card image cap">
							  <div class="card-body">
							    <h5 class="card-title">`+ data.Title +`</h5>
							    <h6 class="card-subtitle mb-2 text-muted">`+ data.Year +`</h6>
							    <a href="#" class="btn btn-primary">See Detail</a>
							  </div>
							</div>
						</div>
					`)
				})
				$('#search-input').val('')
			} else{
				$('#movie-list').html('<h1 class="text-center">'+ result.Error +'</h1>')
			}
		}
	});

	
});