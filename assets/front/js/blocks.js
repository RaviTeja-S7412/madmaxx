$(document).ready(function(){
	$.ajax({
		url:"sections",
		type: 'GET',
		dataType: 'JSON',
		success:function (data) {
		  $('#solutions').html(data.solution);
		  console.log(data);
		},
		error:function(data){
		  console.log(data); 
	   }
	}); 
	
	$.ajax({
		url:"sections/publications",
		type: 'GET',
		dataType: 'JSON',
		success:function (data) {
		  $('#blog').html(data.publications);
		  console.log(data);
		},
		error:function(data){
		  console.log(data); 
	   }
	}); 
});