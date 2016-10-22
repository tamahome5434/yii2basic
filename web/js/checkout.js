$(document).ready(function() {
	var qty=$('#qty').val();
	var subtotal=$('#subtotal').val();	
	$('#discount').val(0);
	$("#apply").click(function()  {  
		var code=$('#code').val().toUpperCase();
		var off5=(subtotal*0.05).toFixed(2);
		var off15=subtotal-15;
	
		if(code=='OFF5PC'){
			if (qty>=2)
				$('#discount').val(off5);
			else{
				$('#discount').val(0);
				alert('At least 2 quantities');
			}
		}
		else if(code=='GIVEME15'){
			if(subtotal>=100)
				$('#discount').val(off15);
			else{
				$('#discount').val(0);
				alert('Minumum puchase of RM100');
			}
		}
		else{
			$('#discount').val(0);
			alert('Invalid promotion code');
		}
	});

	
	if(qty>=2||subtotal>=150){
		$('#ship').val(0);
		$('#shipping').html('0');
	}
	else{
		$('#ship').val(10);
		$('#shipping').html('10');
	}
	$("#country").change(function() {
		var country=$('#country').val();
		
		if(country=='malaysia'){
			if(qty>=2||subtotal>=150){
				$('#ship').val(0);
				$('#shipping').html('0');
			}
			else{
				$('#ship').val(10);
				$('#shipping').html('10');
			}
		}
		else if(country=='singapore'){
			if(subtotal>=300){
				$('#ship').val(0);
				$('#shipping').html('0');
			}
			else{
				$('#ship').val(20);
				$('#shipping').html('20');
			}
		}
		else if(country=='brunei')	{
			if(subtotal>=300){
				$('#ship').val(0);
				$('#shipping').html('0');
			}
			else{
				$('#ship').val(25);
				$('#shipping').html('25');
			}
		}
	});
});