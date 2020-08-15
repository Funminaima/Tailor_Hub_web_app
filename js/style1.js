$(document).ready(function(){
	$('#dissa').fadeIn(10000);

	//$('#dissa').slideDown(10000);


	$('#btnclick').click(function(){
		$('#show').show(100)
	})

	$('#sub').click(function(){
		var a=$('#fname').val();
		var b=$('#lname').val();
		var c=$('#email').val();
		var d=$('#phone').val();
		if (a=='' || b=='' || c=='' || d=='') {
			$('#form1').prepend('<span class="text-danger rmv">asterik field are required!</span>');
			return false;
		}
		else{
			$('.rmv').remove();
			return true;
		}
		
	})













})
