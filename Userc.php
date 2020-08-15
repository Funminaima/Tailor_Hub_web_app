<?php
class Userc{
	public $conn;
function __construct(){
	$this->conn=new Mysqli('localhost','root','','tailorhub');
	session_start();
}
function signUpTailor($fname,$lname,$email,$uname,$pwd,$cpwd){
	// converting te password to md5 for security
	$encrpt_pass=md5($pwd);
	$encrpt_cpass=md5($cpwd);

	$query_stat="INSERT INTO tailor SET 
				tail_fname='$fname',
				tail_lname='$lname',
				tail_email='$email',
				tail_username='$uname',
				tail_password='$encrpt_pass',
				confirmpass='$encrpt_cpass'";
				
	$this->conn->query($query_stat);
	$id=$this->conn->insert_id;
	if ($id!=0) {
		// setcookie('user',$fname, time()+4800);
		$_SESSION['tailor']=$id;	
		header('location:tailor.php?feedback=Thank you for signing up,kindly click on home page to login');
	}
	else{
		header('location:tailor.php?msg=kinkly try again');
	}
}
function signUpCustomer($fname,$lname,$uname,$email,$pwd,$cpwd){
	// converting te password to md5 for security
	$encrpt_pass=md5($pwd);
	$encrpt_cpass=md5($cpwd);

	$query_stat="INSERT INTO customer SET 
				cust_fname='$fname',
				cust_lname='$lname',
				username='$uname',
				cust_email='$email',
				password='$encrpt_pass',
				confirmpass='$encrpt_cpass'";
				// echo $query_stat;
				// die();
	$this->conn->query($query_stat);
	
	$id=$this->conn->insert_id;
	if ($id!=0) {
		$_SESSION['user']=$id;
		
		header('location:customer.php?name=$fname&feedback=Thank you for signing up,kindly login to get started');
	}
	else{
		header('location:customer.php?msg=kinkly try again');
	}
}
function tailorLogin($uname,$pwd){
	//converting the password coming from the user to login
	$encrpt_pwd=md5($pwd);

	$query_stat="SELECT * FROM tailor WHERE tail_username='$uname' and tail_password='$encrpt_pwd'";
	//setcookie('login',$uname,time()+5000);
	$_SESSION['loginTailor']=$uname;

	$res=$this->conn->query($query_stat);
	$no_of_records=$res->num_rows;

	if ($no_of_records!=0) {
		$fetch=$res->fetch_assoc();
		//getting the session details of those that login directly
		$_SESSION['tailor']=$fetch['id'];

		header("location:tailordash.php");
	}
	else{
		header("location:login.php");
	}


}
function getATailor($id){
	$query_stat="SELECT * FROM tailor WHERE id='$id'";
	$res=$this->conn->query($query_stat);
	return $res->fetch_assoc();
	
}
function customerLogin($uname,$pwd){
	$enc=md5($pwd);
	$query_stat="SELECT * FROM customer WHERE username='$uname' and password='$enc'";
	$res=$this->conn->query($query_stat);
	$no_of_records=$res->num_rows;
	if ($no_of_records!=0) {
		$fetch=$res->fetch_assoc();
	
		$_SESSION['loginCust']=$uname; //this session is to say their name in dashboard.
		$_SESSION['user']=$fetch['id'];//id is defined in customer table.
		header("location:cdashboard.php");
	}
	else{
		header("location:login.php");
	}
}

function getCustomer($id){
	$query_stat="SELECT * FROM customer WHERE id='$id'";
	$res=$this->conn->query($query_stat);
	$result=$res->fetch_assoc();
	return $result;
}

function getAllState(){
	$query_stat="SELECT * FROM state";
	$res=$this->conn->query($query_stat);

		echo "<select name='state' class='form-control'>";
		echo "<option value=''>select</option>";
		while ($records=$res->fetch_assoc()) {
			echo "<option value='{$records['state_id']}'>
				{$records['state_name']}
			</option>";
		}
		echo "</select>";
}

function getAllstate2(){
	$query_stat="SELECT * FROM state";
	$res=$this->conn->query($query_stat);

	$rows=[];
	while ($result=$res->fetch_assoc()) {
		$rows[]=$result;
	}
	return $rows;

}

function uploadPicture($file_array){
	$filename=$file_array['name'];
	$filetype=$file_array['type'];
	$filesize=$file_array['size'];
	$tmp=$file_array['tmp_name'];

	$extension=pathinfo($filename,PATHINFO_EXTENSION);
	$allowed=['image/jpeg','image/png','image/jpg'];

	$error=[];
	if ($filename=='') {
		$error[]= "kindly choose a file";
	}
	if ($filesize > 2097152) {
		$error[]="your file is too large";
	}
	if (!in_array($filetype, $allowed)) {
		$error[]="file type not accepted";
	}

	if (empty($error)) {
		$finalfile=rand().'.'.$extension;
		$destination="pix/$finalfile";
		move_uploaded_file($tmp, $destination);
	}

	//running your query
	$id=$_SESSION['user']; //remember your customer id is stored in a session
	$query_stat="UPDATE customer set cust_pix='$finalfile' where id='$id'";
	$this->conn->query($query_stat);

	$_SESSION['error']=$error;
}

function UploadTailorPix($file_array){
	$filename=$file_array['name'];
	$filetype=$file_array['type'];
	$filesize=$file_array['size'];
	$tmp=$file_array['tmp_name'];

	$extension=pathinfo($filename,PATHINFO_EXTENSION);
	$allowed=['image/jpeg','image/png','image/jpg'];

	$error=[];
	if ($filename=='') {
		$error[]= "kindly choose a file";
	}
	if ($filesize > 2097152) {
		$error[]="your file is too large";
	}
	if (!in_array($filetype, $allowed)) {
		$error[]="file type not accepted";
	}

	if (empty($error)) {
		$finalfile=rand().'.'.$extension;
		$destination="pix_tailor/$finalfile";
		move_uploaded_file($tmp, $destination);
	}

	//running your query
	$id=$_SESSION['tailor']; //remember your tailor id is stored in a session
	$query_stat="UPDATE tailor set tail_pix='$finalfile' where id='$id'";
	$this->conn->query($query_stat);

	$_SESSION['error']=$error;
}

function updateCustomerRecord($reg_data){
	//recall that 
	$id=$_SESSION['user'];

	$fullname=trim(strip_tags($reg_data['fname']));
	$lastname=trim(strip_tags($reg_data['lname']));
	$username=trim(strip_tags($reg_data['uname']));
	$address=trim(strip_tags($reg_data['inputAddress']));
	$email=trim(strip_tags($reg_data['email']));
	$phone=trim(strip_tags($reg_data['phone']));
	$gender=$reg_data['gender'];
	
	$state=$reg_data['state'];
	$city=trim(strip_tags($reg_data['city']));
	$size=$reg_data['measure'];
	$zip=trim(strip_tags($reg_data['zip']));

	$query_stat="UPDATE customer SET 
				cust_fname='$fullname',
				cust_lname='$lastname',
				username='$username',
				address='$address',
				cust_email='$email',
				cust_phone='$phone',
				cust_gender='$gender',
				state='$state',
				city='$city',
				size='$size' where id='$id'";

		$this->conn->query($query_stat);
		// if ($this->conn->error) {
		// 	echo "error";
		// }
		// else{
		// 	echo "succesfully added";
		// }				
	header("location:cdashboard.php?success=succesfully updated");
	
}
function updateTailorProfile($reg_data){
	//recall that
	$id=$_SESSION['tailor'];

	$fullname=trim(strip_tags($reg_data['fname']));
	$lastname=trim(strip_tags($reg_data['lname']));
	$email=trim(strip_tags($reg_data['email']));
	$phone=trim(strip_tags($reg_data['phone']));
	$gender=$reg_data['gender'];
	
	$address=trim(strip_tags($reg_data['address']));
	$username=trim(strip_tags($reg_data['uname']));
	$brandname=trim(strip_tags($reg_data['brand']));
	$brand_add=trim(strip_tags($reg_data['brandadd']));
	
	$state=$reg_data['state'];
	$city=trim(strip_tags($reg_data['city']));

	if (isset($reg_data['cat'])) {
		$category=$reg_data['cat'];
	}
	else{
		$category=[];
	}
	

	$query_stat="UPDATE tailor SET 
				tail_fname='$fullname',
				tail_lname='$lastname',
				tail_email='$email',
				tail_phone='$phone',
				tail_gender='$gender',
				tail_address='$address',
				tail_username='$username',
				brand_name='$brandname',
				brand_address='$brand_add',
				tail_state='$state',
				city='$city' where id='$id'";

	$this->conn->query($query_stat);
	// if ($this->conn->error) {
	// 	echo "error";
	// }
	// else{
	// 	echo "succesfully added";
	// }
	// echo $query_stat;
	// die();
	if (!empty($category)) {
		foreach ($category as $value) {
			$id=$this->conn->query("INSERT INTO category set category_name='$value', tail_id='$id'");

			$_SESSION['cat']=$id;
		}

	}
	header("location:tailordash.php?success=You have succesfully updated your profile");
}
function getTailorDetails(){
	$query_stat="SELECT * FROM tailor JOIN state on tail_state=state_id";
	$res=$this->conn->query($query_stat);

	$rows=[];
	while ($record=$res->fetch_assoc()) {
		$rows[]=$record;
	}
	return $rows;
}
//to display by search
function displaySearch($search){
	$query_stat="SELECT * FROM tailor JOIN state on tail_state=state_id where brand_name like '%$search%' or state_name like '%$search%'";
	
	$res=$this->conn->query($query_stat);

	$row=[];
	if ($res->num_rows!=0) {
		while ($record=$res->fetch_assoc()) {
			$row[]=$record;
		}
		return $row;
	}
	else{
		echo "<div class='alert alert-danger'>no record match</div>";
	}

	
	

}
function insertPictures($file_array,$name,$amt,$text){
	$filename=$file_array['name'];
	$filetype=$file_array['type'];
	$filesize=$file_array['size'];
	$filetmpname=$file_array['tmp_name'];
	$extension=pathinfo($filename,PATHINFO_EXTENSION);

	$allowed=['image/png','image/jpg','image/jpeg'];

	$error=[];
	if ($filename='') {
		$error[]="kindly choose a file type";
	}
	if ($filesize > 2097152) {
		$error[]="filesize is too large";
	}
	if (!in_array($filetype, $allowed)) {
		$error[]="file type not accepted";
	}

	if (empty($error)) {
		$finalfile=rand().'.'.$extension;
		$destination="pix_tailor/".$finalfile;
		move_uploaded_file($filetmpname, $destination);

		//recal that
		$id=$_SESSION['tailor'];
		

		$query_stat="INSERT INTO upload SET 
				upload_pix='$finalfile',
				upload_name='$name',
				upload_amt='$amt',
				description='$text',
				tailor_id='$id'";
		$id=$this->conn->query($query_stat);
		$_SESSION['upload_id']=$id;
		if ($this->conn->error) {
			echo "<div class='alert alert-danger'>error</div>";
		}
		else{
			echo "<div class='alert alert-success'>succesfully added</div>";
			
		}
	
	}

	
}

function deleteAPicture($uploadid){
	//recall that
	
	$query_stat="DELETE FROM upload where upload_id='$uploadid'";

	$this->conn->query($query_stat);
}
//not updating..ask question as to why
function updateTailorUpload($name,$amt,$description,$uploadid){
	$query_stat="UPDATE upload set 
				upload_name='$name',
				upload_amt='$amt',
				description='$description' where upload_id='$uploadid'";

	$this->conn->query($query_stat);
}



function displayViewWork(){ //to display all the tailors pictures
		$query_stat="SELECT * FROM upload JOIN tailor on tailor_id=id";
	$res=$this->conn->query($query_stat);

	$rows=[];
	while ($record=$res->fetch_assoc()) {
		$rows[]=$record;
	}
	return $rows;
}
function displayAstyle($tailorid){//display each tailors work
		$query_stat="SELECT * FROM upload JOIN tailor on tailor_id=id where tailor_id='$tailorid'";
	$res=$this->conn->query($query_stat);
	$rows=[];
	while ($record=$res->fetch_assoc()) {
		$rows[]=$record;
	}
	return $rows;
}

//to display the a particular picture a tailor upload
function displayAsTailorInsert($tailid){
	$query_stat="SELECT * FROM upload where tailor_id='$tailid'";
	$res=$this->conn->query($query_stat);

	$row=[];
	while ($result=$res->fetch_assoc()) {
		$row[]=$result;
	}
	return $row;
}
function getAllCategoryName($id){
	//recall
	//$_SESSION['tailor']=$id;
	$query_stat="SELECT * FROM category where tail_id='$id'";
	$res=$this->conn->query($query_stat);

	$rows=[];
	while ($result=$res->fetch_assoc()) {
		$rows[]=$result;
	}
	return $rows;

}

function measurement($reg_data){

	$gender=trim(htmlentities(strip_tags($reg_data['measure'])));
	$length=trim(htmlentities(strip_tags($reg_data['length'])));
	$burst=trim(htmlentities(strip_tags($reg_data['Burst'])));
	$waist=trim(htmlentities(strip_tags($reg_data['waist'])));
	$top=trim(htmlentities(strip_tags($reg_data['t_length'])));
	$trouser=trim(htmlentities(strip_tags($reg_data['trouser_length'])));
	$shoulder=trim(htmlentities(strip_tags($reg_data['shoulder'])));
	$hip=trim(htmlentities(strip_tags($reg_data['Hip'])));
	$arm=trim(htmlentities(strip_tags($reg_data['arm'])));
	$stomach=trim(htmlentities(strip_tags($reg_data['stomach'])));

	//recall that customer id is stored in session
	$id=$_SESSION['user'];
	
	$query_stat="INSERT INTO measurement SET 
				m_gender='$gender',
				m_length='$length',
				m_burst='$burst',
				m_waist='$waist',
				m_toplength='$top',
				m_trouserlength='$trouser',
				m_shoulder='$shoulder',
				m_hip='$hip',
				m_arm='$arm',
				m_stomach='$stomach',
				cust_id='$id'";
	$this->conn->query($query_stat);
	return $id_insert=$this->conn->insert_id;

}
function updateMeasurent($reg_data){
	$gender=trim(htmlentities(strip_tags($reg_data['measure'])));
	$length=trim(htmlentities(strip_tags($reg_data['length'])));
	$burst=trim(htmlentities(strip_tags($reg_data['Burst'])));
	$waist=trim(htmlentities(strip_tags($reg_data['waist'])));
	$top=trim(htmlentities(strip_tags($reg_data['t_length'])));
	$trouser=trim(htmlentities(strip_tags($reg_data['trouser_length'])));
	$shoulder=trim(htmlentities(strip_tags($reg_data['shoulder'])));
	$hip=trim(htmlentities(strip_tags($reg_data['Hip'])));
	$arm=trim(htmlentities(strip_tags($reg_data['arm'])));
	$stomach=trim(htmlentities(strip_tags($reg_data['stomach'])));

	//recall that customer id is stored in session
	$id=$_SESSION['user'];
	
	$query_stat="UPDATE measurement SET 
				m_gender='$gender',
				m_length='$length',
				m_burst='$burst',
				m_waist='$waist',
				m_toplength='$top',
				m_trouserlength='$trouser',
				m_shoulder='$shoulder',
				m_hip='$hip',
				m_arm='$arm',
				m_stomach='$stomach' where cust_id='$id'";
	$this->conn->query($query_stat);
}
function getAMeasurement($id){
	$query_stat="SELECT * FROM measurement where cust_id='$id'";
	$res=$this->conn->query($query_stat);
	return $record=$res->fetch_assoc();
}

function insertOrder($p_name,$amt,$id,$upload_id,$quant,$price,$tailid){
	//recall that
	
	$query_stat="INSERT INTO orders SET 
				
				product_name='$p_name',
				order_amt='$amt',
				customers_id='$id',
				product_id='$upload_id',
				order_quantity='$quant',
				total_price='$price',
				tailor_id='$tailid'";
				

	$this->conn->query($query_stat);
	$id=$this->conn->insert_id;
	if ($id > 0) {
		$_SESSION['order_id']=$id;
		return "<div class='alert alert-success'>succesfully added to cart</div>";
	}
	// if ($this->conn->error) {
	// 	echo "there was an error";
	// }
	// else{
	// 	echo "succesfully inserted";
	// }
}

function getCartNo($id){
	$query_stat="SELECT * FROM orders WHERE customers_id='$id'";
	$res=$this->conn->query($query_stat);
	$numrows=$res->num_rows;
	echo $numrows;
	$_SESSION['cart']=$numrows;
	
}

function viewCart($id){
	$query_stat="SELECT * FROM orders join upload on upload_name=product_name where customers_id='$id'";
	$res=$this->conn->query($query_stat);

	$row=[];
	while ($result=$res->fetch_assoc()) {
		$row[]=$result;
	}
	return $row;
}


function addTotal($id){
	$query_stat="SELECT SUM(total_price) from orders WHERE customers_id='$id'";
	$res=$this->conn->query($query_stat);
	$result=$res->fetch_assoc();
	return $result;
}
function deleteAllFromCart($id){
	$query_stat="DELETE FROM orders where customers_id='$id'";

	$this->conn->query($query_stat);

	$text="There are no items in your cart";
	$_SESSION['text']=$text;
}

function deletePerItem($id,$cust_id){
	//recall that upload_id is stored in a session
	
	$query_stat="DELETE FROM orders WHERE product_id='$id' and customers_id='$cust_id'";
	$this->conn->query($query_stat);
}

// trial function
function concat($id){
	$query_stat="SELECT CONCAT(product_name, '(',order_quantity,')') AS itemquantity,total_price FROM orders where customers_id='$id'";
	$res=$this->conn->query($query_stat);

	$allitems="";
	$items=[];
	while ($row=$res->fetch_assoc()) {
		$items[]=$row['itemquantity'];
	}
	$allitems=implode(', ', $items);
	return $allitems;


}
function inserttransactions($custid,$allproducts,$total,$ship){
	$transno=rand();

	$query_stat="INSERT INTO transaction set 
				cust_id='$custid',
				all_products='$allproducts',
				grand_total='$total',
				shipping_details='$ship',
				trans_no='$transno'";

		$this->conn->query($query_stat);
		$_SESSION['trans_id']=$this->conn->insert_id;
	
			// header('location:pay.php');
		header('location:curl.php');
		
}

function gettransdetails($id){
	$query_stat="SELECT * FROM transaction where trans_id='$id'";
	$res=$this->conn->query($query_stat);
	return $result=$res->fetch_assoc();
}

function notifytailor($tail_id){
	$query_stat="SELECT * FROM transaction JOIN orders ON cust_id=customers_id JOIN customer ON id=customers_id WHERE trans_status=1 and tailor_id='$tail_id'";
	$res=$this->conn->query($query_stat);

	$row=[];
	while ($result=$res->fetch_assoc()) {
		$row[]=$result;
	}
	return $row;

}

function getOrderNo($tail_id){
	$query_stat="SELECT * FROM transaction JOIN orders ON cust_id=customers_id JOIN customer ON id=customers_id WHERE trans_status=1 and tailor_id='$tail_id'";
	$res=$this->conn->query($query_stat);
	return $numrows=$res->num_rows;
}


// function updatePayStatus($custid,$allproducts,$total,$ship,$status){
// 	$query_stat="UPDATE transaction SET 
// 				cust_id='$custid',
// 				all_products='$allproducts',
// 				grand_total='$total',
// 				shipping_details='$ship',
// 				trans_status='$status',
// 				trans_no='$transno' trans_id='$id'";

// 		$this->conn->query($query_stat);

// 	}

function updateRefrence($refrence,$id){
	$query_stat="UPDATE transaction SET 
				
	refrence='$refrence' where trans_id='$id'";

	$this->conn->query($query_stat);
	echo $query_stat;
}

function updateStatus($status,$no){
	$query_stat="UPDATE transaction SET trans_status='$status' where refrence='$no'";

	$this->conn->query($query_stat);
	echo $query_stat;
}









}

?>