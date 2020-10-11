<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
  // function GetToken(){
  //   $CI =& get_instance();
  //   $curl = curl_init();

  //   $url = 'https://sibijak.bpkp.go.id/dca/api/api/viewtoken';

  //   curl_setopt_array($curl, array(
  //       CURLOPT_URL => $url,
  //       CURLOPT_RETURNTRANSFER => true,
  //       CURLOPT_ENCODING => "",
  //       CURLOPT_MAXREDIRS => 10,
  //       CURLOPT_TIMEOUT => 30,
  //       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  //       CURLOPT_CUSTOMREQUEST => "POST",
  //       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"nama\"\r\n\r\nsibijak_sertifikasi\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"kata_sandi\"\r\n\r\np@55w0rd\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
  //       CURLOPT_HTTPHEADER => array(
  //           "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
  //       ),
  //   ));

  //   $response = curl_exec($curl);
  //   $err = curl_error($curl);
  //   curl_close($curl);
  // }

  // function token($nama, $kata_sandi, $url){

  // }

  // function getDataCurl($url){
  //   // $postdata = http_build_query($jsonData);

  //   $opts = array('http' =>
  //       array(
  //           'method'  => 'GET',
  //           'header'  => 'Authorization : eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhZG1pbl9pZCI6IjEiLCJhZG1pbl9uYW1hIjoiZHVtbXkiLCJpYXQiOjE1NzM2MTkwOTEsImV4cCI6MTU3MzcwNTQ5MX0.nnx12jxrXGnrOrAAMOxPc9WZ1yj5UmRuPoylZyLbYYc',
  //       )
  //   );

  //   $context  = stream_context_create($opts);

  // return	$result = file_get_contents($url, false, $context);
  // }

  // $data = getDataCurl($url . $_GET['uid']);
  // $data = json_decode($data, true);
  
  
  // print_r($data); exit;
  function getDataCurl($jsonData,$url){
    $postdata = http_build_query($jsonData);
    
    $opts = array('http' =>
    array(
      'method'  => 'POST',
      'header'  => 'Content-type: application/x-www-form-urlencoded',
      'content' => $postdata
      )
    );
    
    $context  = stream_context_create($opts);
    
    return	$result = file_get_contents($url, false, $context);
  }
  
  
  $url = "https://sibijak.bpkp.go.id/dca/api/api/";
  $url= $url."dtpengguna";
  $data_login = array(
    'nip' => $_GET['uid'],
  );
  $check=getDataCurl($data_login,$url);
  $jsonResult=json_decode($check);
  // $data = $jsonResult->data[0];
  // print_r($jsonResult); exit;
  
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
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">  
		
    <tr>
      <td colspan="2"><b><?php echo $jsonResult->data[0]->NamaLengkap ?>'s profile</b></td>
      
    </tr>
    
    
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>NIP:</b></td>
      <td><?php echo htmlentities($jsonResult->data[0]->NIP); ?></td>
    </tr>
    <tr height="50">
      <td><b>Email:</b></td>
      <td><?php echo htmlentities($jsonResult->data[0]->Surel); ?></td>
    </tr>


      <tr height="50">
      <td><b>No. HP</b></td>
      <td><?php echo htmlentities($jsonResult->data[0]->NoHP); ?></td>
    </tr>
    


        <tr height="50">
      <td><b>Alamat:</b></td>
      <td><?php echo htmlentities($jsonResult->data[0]->Alamat); ?></td>
    </tr>



        <tr height="50">
      <td><b>Unit Kerja:</b></td>
      <td><?php echo htmlentities($jsonResult->data[0]->NamaUnitKerja); ?></td>
    </tr>


        <tr height="50">
      <td><b>Instansi:</b></td>
      <td><?php echo htmlentities($jsonResult->data[0]->NamaInstansi); ?></td>
    </tr>


        <!-- <tr height="50">
      <td><b>Pincode:</b></td>
      <td><?php echo htmlentities($row['pincode']); ?></td>
    </tr>   -->

<!-- 
        <tr height="50">
      <td><b>Last Updation:</b></td>
      <td><?php echo htmlentities($row['updationDate']); ?></td>
    </tr> -->
     <!-- <tr height="50">
      <td><b>Status:</b></td>
      <td><?php if($row['status']==1)
      { echo "Active";
} else{
  echo "Block";
}
        ?></td>
    </tr> -->
    
    <tr>
  
      <td colspan="2">   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
   
 
</table>
 </form>
</div>

</body>
</html>

     <?php } ?>