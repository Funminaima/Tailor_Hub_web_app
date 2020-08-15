$(document).ready(function(){
	$("#personal").click(function(){
				$("#bg-img").hide();
				$("#greeting").hide();
				$("#pwdform").fadeOut(2000)
				$('#female').hide();
				
				$("#form").show();
				$('#male').hide();

			})

			$('#cpwd').change(function(){
				var a=$('#pwd').val();
				var b=$('#cpwd').val();
				if (a!=b) {
					alert('password has to match')
					$('#sign').attr('disabled','disabled' )
				}
				else{
					$('#sign').removeAttr('disabled')
				}

			})
			$('#sign').click(function(){
				var measure=$('#msure').val();
				var city=$('#inputCity').val();
				var state=$('#inputState').val()
				if (measure.lowerCase().trim()==''|| state.lowerCase().trim()=='' || city.lowerCase().trim()=='') {
					alert('All asterik field are required');
					return false;
				}
				
			})

			
				$('#pwdchange').click(function(){
					$("#bg-img").slideUp(2000);
					$("#greeting").slideUp(2000);
					$("#form").fadeOut(2000);
					$("#pwdform").show(2000,function(){
						$('#male').hide();
						$("#pwdform").slideDown(20000);
						$('#female').hide();
						
					})
			})
				$('#confirmpwd').mouseleave(function(){
				var newpwd=$('#newpwd').val();
				var confirm=$('#confirmpwd').val();
				if (newpwd!=confirm) {
					alert('the password has to match');
					$('#btnpwd').attr('disabled','disabled');
				}
				else{
					$('#btnpwd').removeAttr('disabled');
				}
				
			})
				$('#show').click(function(){
					
				})

			$('#custom_f').click(function(){
				
				$("#bg-img").slideUp(2000);
					$("#greeting").slideUp(2000);
					$("#form").fadeOut(2000);
					$("#pwdform").fadeOut(2000)
					$('#male').hide();
					$('#female').fadeIn();
					
					

			})

			$('#custom_m').click(function(){
				$("#bg-img").slideUp(2000);
					$("#greeting").slideUp(2000);
					$("#form").fadeOut(2000);
					$("#pwdform").fadeOut(2000)
					$('#female').hide();
					$('#male').slideDown();
					

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
