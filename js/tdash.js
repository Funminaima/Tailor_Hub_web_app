$().ready(function(){
	$('#personal').click(function(){
		$('#bg-img').slideUp(1000,function(){
			$('#greeting').slideUp(1000,function(){
				$('#form').fadeIn();
				$('#pwdform').hide();

			})

		})

	})
		

	$('#pwdchange').click(function(){
		$('#greeting').css('display','none');
		$('#form').css('display','none');
		$('#pwdform').fadeIn();

	})





})

function showpwd(){

	var show=document.getElementById('newpwd').type;
	if (show=='password') {
		document.getElementById('newpwd').type='text';
		document.getElementById('show').innerHTML='hide password';
	}
	if (show=='text') {
		document.getElementById('newpwd').type='password';
		document.getElementById('show').innerHTML='show password';
	}

}

