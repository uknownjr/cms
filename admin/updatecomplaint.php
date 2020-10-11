<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else {
  if(isset($_POST['update']))
  {
$complaintnumber=$_GET['cid'];
$status=$_POST['status'];
$remark=$_POST['remark'];
$id    =$_SESSION['udata']->NIP;
// print_r($id); exit;
$query=mysqli_query($con,"insert into complaintremark(complaintNumber,status,remark,remarkBy) values('$complaintnumber','$status','$remark','$id')");
$sql=mysqli_query($con,"update tblcomplaints set status='$status' where complaintNumber='$complaintnumber'");

//ambil parameter buat email
$data = mysqli_query($con,"select email from tblcomplaints where complaintNumber = $complaintnumber");
$data = mysqli_fetch_object($data);
//kirim ke email
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require ('../PHPMailer/src/Exception.php');
// require ('../PHPMailer/src/PHPMailer.php');
// require ('../PHPMailer/src/SMTP.php');

// $mail = new PHPMailer(true);
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
//     $mail->isSMTP();                                            // Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
//     $mail->Username   = 'sibijak2019@gmail.com';                     // SMTP username
//     $mail->Password   = 'admin12#';                               // SMTP password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
//     $mail->Port       = 465;                                    // TCP port to connect to

//     //Recipients
//     $mail->setFrom('no-reply@bpkp.go.id', 'Support SIBIJAK BPKP');
//     $mail->addAddress($data->email);     // Add a recipient
//     // $mail->addAddress('ellen@example.com');               // Name is optional
//     // $mail->addReplyTo('info@example.com', 'Information');
//     // $mail->addCC('cc@example.com');
//     // $mail->addBCC('bcc@example.com');

//     // Attachments
//     // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

//     // Content
//     $mail->isHTML(true);                                  // Set email format to HTML
//     $mail->Subject = 'Aplikasi User Support SIBIJAK';
//     $mail->Body    = $remark;
//     // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     $mail->send();
    // echo 'Message has been sent';

// $to      = $data->email;
// $subject = 'Update pengajuan komplain';
// $message = 'Tiket anda sudah diupdate, silahkan cek di aplikasi Help Desk SIBIJAK';
// $headers = 'From: sibijak@bpkp.go.id' . "\r\n" .
    // 'Reply-To: webmaster@example.com' . "\r\n" .
    // 'X-Mailer: PHP/' . phpversion();

// mail($to, $subject, $message, $headers);

echo "<script>alert('Complaint details updated successfully');</script>";

  }

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Profile</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updatecomplaint" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>Complaint Number</b></td>
      <td><?php echo htmlentities($_GET['cid']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Status</b></td>
      <td><select name="status" required="required">
      <option value="">Select Status</option>
      <option value="in process">In Process</option>
    <option value="closed">Closed</option>
        
      </select></td>
    </tr>

<?php 
  // print_r($_SESSION['udata']->NIP);
  // $complaintnumber=$_GET['cid'];
  // $data = mysqli_query($con,"select email from tblcomplaints where complaintNumber = $complaintnumber");
  // $data = mysqli_fetch_object($data);
  // print_r($data->email); exit;
?>
      <tr height="50">
      <td><b>Remark</b></td>
      <td><textarea name="remark" cols="50" rows="10" required="required"></textarea></td>
    </tr>
    


        <tr height="50">
      <td>&nbsp;</td>
      <td><input type="submit" name="update" value="Submit"></td>
    </tr>



       <tr><td colspan="2">&nbsp;</td></tr>
    
    <tr>
  <td></td>
      <td >   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
   

 
</table>
 </form>
</div>

</body>
</html>

     <?php } ?>