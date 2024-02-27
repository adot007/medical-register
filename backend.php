
<?php

$documentName=$_POST['document_name'];
$documentDescription=$_POST['document_description'];
$imageBlob=$_POST['image_blob'];
$pdfBlob=$_POST['pdf_blob'];
	
$conn= new mysqli('localhost','root','','sickbay');
if($conn->connect_error){
    die('connection failed  :  ' .$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into clinicals (document_name, document_description, image_blob, pdf_blob)
    values(?,?,?,?)");
    $stmt->bind_param("ssss", $documentName, $documentDescription, $imageBlob, $pdfBlob);
    $stmt->execute();
    echo "success"; 
    $stmt->close();
    $conn->close();
}
	// Establish Connection with MYSQL
	//$con = mysqli_connect ("localhost","root","","sickbay");

	// Specify the query to Insert Record
	//$sql = "insert into clinicals (document_name, document_description, image_blob, pdf_blob) values('".$documentName"', '".$documentDescription"', '".$imageBlob"', '".$pdfBlob"')";
	// execute query
	//mysqli_query ($con,$sql);
	// Close The Connection
	//mysqli_close ($con);
	//echo '<script type="text/javascript">alert("details uploaded");window.location=\'ManageWalkin.php\';</script>';



