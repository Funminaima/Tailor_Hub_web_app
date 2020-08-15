<?php
if (!isset($_SESSION['user'])) {
	header('location:index.php')
}
include('Userc.php');
$object=new Userc;
//recall from class

	$transid=$_SESSION['trans_id'];
	if (isset($_SESSION['trans_id'])) {
		$return=$object->gettransdetails($transid);
	}
if (isset($_SESSION['user'])) {
	$cust_data=$object->getCustomer($_SESSION['user']);
}


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	.height{
		height:80vh;
	}
</style>
<body>
	<?php include('header2.php'); ?>
	<div class="container">
		<div class="row justify-content-center align-items-center height">
			<div class="col-md-6 text-center">
				<div class="card p-4">
					<div class="card-body">
						<h2 class="py-2">You are paying : <b><?php echo number_format($return['grand_total'] ,2);?></b></h2>
						<h2 class="py-2">Your transaction number is: <b><?php echo $return['trans_no']; ?></b></h2>
						<form id="paymentForm">
							<script src="https://js.paystack.co/v1/inline.js"></script>
							<button class="btn btn-warning py-2 my-2" type="submit" onclick="payWithPaystack(event)">Make Payment</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<?php
		include('footer.php');
		?>


<script>
// 	const paymentForm = document.getElementById('paymentForm');

// paymentForm.addEventListener("submit", payWithPaystack(), false);
const api="pk_test_303bebb4a1c34e2f6245f1204a2cab2498142fd3";

function payWithPaystack(e) {

  e.preventDefault();

  var handler = PaystackPop.setup({

    key: api,  

    email: '<?php echo $cust_data['cust_email']; ?>' ,
    amount: '<?php echo $return['grand_total'] ; ?>' * 100,
    firstname: '<?php echo $cust_data['cust_fname'];?>',
    lastname: '<?php echo $cust_data['cust_lname'];?>',
    ref: '<?php echo $return['trans_no']; ?>', // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
      console.log(response);
    }
  });
  handler.openIframe();

//using json
// $data=json_encode(['email'=>$cust_data['email'], 'amount'=>$return['grand_total']]);

//   $.ajax({
//   	url:'thankyou.php',
//   	data:$data,
//   	success:function(resp){
//   		$('row').html(resp);
//   	}
//   })
}
</script>
</body>
</html>