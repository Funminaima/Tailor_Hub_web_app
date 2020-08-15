$(document).ready(function(){
	$('#all').click(function(){
		$('#set').show();
		$('#ankara').show();
		$('#sk').show();
		$('#bespoke').addClass('d-none');
		$('#owear').show();
		$('#men').hide();
		

	});

	$('#office').click(function(){
		$('#set').hide();
		$('#ankara').hide();
		$('#sk').hide();
		$('#bespoke').addClass('d-none');
		$('#men').hide();
		$('#owear').show();
	})

	$('#nativef').click(function(){
		$('#owear').hide();
		$('#set').hide();
		$('#sk').hide();
		$('#men').hide();
		
		$('#bespoke').addClass('d-none');
		$('#ankara').show();
		
	})

	$('#setf').click(function(){
		$('#owear').hide();
		$('#ankara').hide();
		$('#sk').hide();
		$('#bespoke').removeClass('d-none');
		$('#men').hide();
		
		$('#set').show();
		
	})

	$('#skirt').click(function(){
		$('#owear').hide();
		$('#ankara').hide();
		$('#set').hide();
		$('#bespoke').removeClass('d-none');
		$('#men').hide();
		
		$('#sk').show();
		

	})

	$('#nativem').click(function(){
		$('#owear').hide();
		$('#ankara').hide();
		$('#set').hide();
		$('#sk').hide();
		$('#bespoke').addClass('d-none');
		$('#men').show();
	})







})