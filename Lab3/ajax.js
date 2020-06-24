
function get1(){
	$.ajax({
	  type: "GET",
	  url: "result-forms/nurse.php",
	  data: {nurse: $('#select1').val()},
	  dataType: 'json',
	  success: function(result){
	  	var resultData = "";
	  	for (var i = 0; i < result.length; i++) {
			resultData += '<li>'+result[i]+'</li>';
	  	}
	  	$('#result1').html(resultData);
	  	localStorage.setItem('form1Result', JSON.stringify(result));
	  	localStorage.setItem('form1Data', $('#Form1').serialize());
	  }
	});
}


function getLocal1(e) {
	$('#result1').html('');
	var currentForm = $(e).parents('form');
	var result = JSON.parse(localStorage.getItem('form1Result'));
	var data = localStorage.getItem('form1Data');
	if (currentForm.serialize() === data) {
	  	var resultData = "";
	  	for (var i = 0; i < result.length; i++) {
			resultData += '<li>'+result[i]+'</li>';
	  	}
	  	$('#result1').html(resultData);
	} else {
		alert("Данные с такими параметрами отсутствуют!");
	}
}



function get2(){
	$.ajax({
	  type: "GET",
	  url: "result-forms/choose.php",
	  data: {ward: $('#select2').val()},
	  dataType: 'json',
	  success: function(result){
	  	var resultData = "";
	  	for (var i = 0; i < result.length; i++) {
			resultData += '<li>'+result[i]+'</li>';
	  	}
	  	$('#result2').html(resultData);
	  	localStorage.setItem('form2Result', JSON.stringify(result));
	  	localStorage.setItem('form2Data', $('#Form2').serialize());
	  }
	});
}


function getLocal2(e) {
	$('#result2').html('');
	var currentForm = $(e).parents('form');
	var result = JSON.parse(localStorage.getItem('form2Result'));
	var data = localStorage.getItem('form2Data');
	if (currentForm.serialize() === data) {
	  	var resultData = "";
	  	for (var i = 0; i < result.length; i++) {
			resultData += '<li>'+result[i]+'</li>';
	  	}
	  	$('#result2').html(resultData);
	} else {
		alert("Данные с такими параметрами отсутствуют!");
	}
}



function get3(){
	$.ajax({
	  type: "GET",
	  url: "result-forms/shifts.php",
	  data: {department: $('#select3').val(),shift: $('#select4').val()},
	  dataType: 'json',
	  success: function(result){
	  	var resultData = "";
	  	if (result.length == undefined) {
		  	resultData += '<tr>';
			resultData += '<td>'+ result.shift +'</td>'+'<td>'+ result.date +'</td>'; 
			resultData += '<td><ul>';
			for (var i = 0; i < result.nurses.length; i++) {
				resultData += '<li>'+ result.nurses[i] +'</li>';
			}
			resultData += '</ul></td>';
			resultData += '<td>'+ result.department +'</td>';
			resultData += '<td><ul>';
			for (var i = 0; i < result.wards.length; i++) {
				resultData += '<li>'+ result.wards[i] +'</li>';
			}
			resultData += '</ul></td>';
			resultData += '</tr>';
		}
	  	$('#result3').html(resultData);
	  	localStorage.setItem('form3Result', JSON.stringify(resultData));
	  	localStorage.setItem('form3Data', $('#Form3').serialize());
	  }
	});
}


function getLocal3(e) {
	$('#result3').html('');
	var currentForm = $(e).parents('form');
	var result = JSON.parse(localStorage.getItem('form3Result'));
	var data = localStorage.getItem('form3Data');
	if (currentForm.serialize() === data) {
	  	$('#result3').html(result);
	} else {
		alert("Данные с такими параметрами отсутствуют!");
	}
}
