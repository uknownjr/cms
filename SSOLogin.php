<?php 
@session_start();
include ('admin/include/config.php');
function GetToken(){
    $CI =& get_instance();
    $curl = curl_init();

    $url = 'https://sibijak.bpkp.go.id/dca/api/api/viewtoken';

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"nama\"\r\n\r\nsibijak_sertifikasi\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"kata_sandi\"\r\n\r\np@55w0rd\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
        CURLOPT_HTTPHEADER => array(
            "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
        $CI->session->set_userdata('token_dca', null);
    } else {
        $obj_token 			= json_decode($response);
        $token_dca 			= $obj_token->id_token;
        $CI->session->set_userdata('token_dca', $token_dca);
        return $response;
    }
}

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



$urldca = 'https://sibijak.bpkp.go.id/dca/api/api/';
        $nip= $_GET['nip'];
        $token= $_GET['token'];
        if($nip!=''&&$token!=''){
          $url= $urldca.'verifytoken';
          $data_login = array(
            'nip' => $nip,
            'token'=>$token
          );

          $checking=getDataCurl($data_login,$url);

          $jsonDataEncoded = json_decode($checking);
          // print_r($jsonDataEncoded);
          //   return false;
          if($jsonDataEncoded->message=='login_success'){
            $url= $urldca."dtpengguna";
            $data_login = array(
            'nip' => $nip,
            );
            $check=getDataCurl($data_login,$url);
            $jsonResult=json_decode($check);
            // print_r($jsonResult->data[0]);exit;
            if($jsonResult->data[0]!=''){
              if( $jsonResult->data[0]->RoleGroup_ID=='1' || $jsonResult->data[0]->RoleGroup_ID=='0'){
                $extra="admin/notprocess-complaint.php";//
                $_SESSION['alogin']= $jsonResult->data[0]->NamaLengkap;
                $_SESSION['id']= $jsonResult->data[0]->NIP;
                $_SESSION['udata'] = $jsonResult->data[0];
                $host=$_SERVER['HTTP_HOST'];
                $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
                header("location:http://$host$uri/$extra");
              }else{
                $extra="users/dashboard.php";//
                $_SESSION['login']= $jsonResult->data[0]->NamaLengkap;
                $_SESSION['id']= $jsonResult->data[0]->NIP;
                $_SESSION['udata'] = $jsonResult->data[0];
                $host=$_SERVER['HTTP_HOST'];
                $uip=$_SERVER['REMOTE_ADDR'];
                $status=1;
                $log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
                // var_dump($log);
                $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
                header("location:http://$host$uri/$extra");
              }
            }else{
              echo '
                    <link href="'.base_url('assets/css/bootstrap.min.css').'" rel="stylesheet" />
                    <div class="alert alert-danger"  style="height:100% !important">
                      <h4 class="block">SSO Login</h4>
                      <p>
                        <div class="text-center">
                          <b>SSO Gagal !</b><br>  Data anda tidak ditemukan untuk mengakses sertifikasi, <a href="javascript:history.back()">Klik disini</a> untuk kembali ke portal.
                        </div>
                      </p>
                    </div>
                    ';
            }
          }else{
            echo '
                    <link href="'.base_url('assets/css/bootstrap.min.css').'" rel="stylesheet" />
                    <div class="alert alert-danger"  style="height:100% !important">
                      <h4 class="block">SSO Login</h4>
                      <p>
                        <div class="text-center">
                          <b>SSO Gagal !</b><br>  Data anda tidak ditemukan untuk mengakses sertifikasi, <a href="javascript:history.back()">Klik disini</a> untuk kembali ke portal.
                        </div>
                      </p>
                    </div>
                    ';
          }

        }else{
          echo '
          <link href="'.base_url('assets/css/bootstrap.min.css').'" rel="stylesheet" />
          <div class="alert alert-danger"  style="height:100% !important">
            <h4 class="block">SSO Login</h4>
            <p>
              <div class="text-center">
                <b>SSO Gagal !</b><br>  Sesi NIP & Token anda kosong !, <a href="javascript:history.back()">Klik disini</a> untuk kembali ke portal.
              </div>
            </p>
          </div>
          ';
        }

?>
