$(document).ready(function() {
	
	var qty=$('#qty').val();
	var subtotal=$('#subtotal').val();	
	$('#discount').html('0');
	$("#apply").click(function()  {  
		var code=$('#code').val().toUpperCase();
	
		if(code=='OFF5PC'){
			if (qty>=2)
				$('#discount').html((subtotal*0.05).toFixed(2));
			else{
				alert('At least 2 quantities');
				$('#discount').html('0');
				$('#code').val('');
			}
		}
		else if(code=='GIVEME15'){
			if(subtotal>=100)
				$('#discount').html('15');
			else{
				alert('Minumum puchase of RM100');
				$('#discount').html('0');
				$('#code').val('');
			}
		}
		else{	
			$('#discount').html('0');
			alert('Invalid promotion code');
			$('#discount').html('0');
			$('#code').val('');
		}
		
	});

	
	if(qty>=2||subtotal>=150)
		$('#shipping').html('0');
	else
		$('#shipping').html('10');
	
	$("#country").change(function() {
		var country=$('#country').val();
		
		if(country=='malaysia'){
			if(qty>=2||subtotal>=150)
				$('#shipping').html('0');
			else
				$('#shipping').html('10');
		}
		else if(country=='singapore'){
			if(subtotal>=300)
				$('#shipping').html('0');
			else
				$('#shipping').html('20');
		}
		else if(country=='brunei')	{
			if(subtotal>=300)
				$('#shipping').html('0');
			else
				$('#shipping').html('25');
		}
	}); 
});
