// let mahasiswa = {
// 	nama: "Marro Sandy",
// 	nim: "105217005",
// 	email: "hahah@gmail.com"
// }

// // console.log(mahasiswa)
// // convert to JSON
// console.log(JSON.stringify(mahasiswa))

// // from json file to objek with ajax
// let xhr = new XMLHttpRequest()
// xhr.onreadystatechange = function(){
// 	if(xhr.readyState == 4 && xhr.status == 200){
// 		let mahasiswa = JSON.parse(this.responseText);
// 		console.log(mahasiswa)
// 	}
// }

// xhr.open('GET', 'coba.json', true)
// xhr.send()

// from json file to objek with jquery
$.getJSON('coba.json', function($data){
	console.log($data)
})