<?php 
$nip    = $_GET['nip'];
$token  = $_GET['token']; 
//   $this->requestapi->GetToken();
//   $nip= $this->input->get('nip');
//   $token= $this->input->get('token');
  if($nip!=''&&$token!=''){
    $url=$this->config->item('dca_api')."verifytoken";
    $data_login = array(
      'nip' => $nip,
      'token'=>$token
    );

    $checking=getDataCurl($data_login,$url);

    $jsonDataEncoded = json_decode($checking);
    // print_r($jsonDataEncoded);
    //   return false;
    if($jsonDataEncoded->message=='login_success'){
      $url=$this->config->item('dca_api')."dtpengguna";
      $data_login = array(
      'nip' => $nip,
      );
      $check=getDataCurl($data_login,$url);
      $jsonResult=json_decode($check);
      
      if($jsonResult->data[0]!=''){
        if( $jsonResult->data[0]->RoleGroup_ID!='4'){
          $role=$jsonResult->data[0]->RoleGroup_ID;
          $result = $this->lookup->_get_user_bridge_api($role);
          //print_r($result);exit;
          
          if(count($result) > 0){
          //echo $jsonResult->data[0][25];
            $this->session->set_userdata('logged_user', $jsonResult->data[0]);
            $this->session->set_userdata('nip', $nip);
            $this->session->set_userdata('logged_in', $jsonResult->data[0]->NamaLengkap);
            //$this->session->set_userdata('fk_lookup_menu',$result[0]->PK_LOOKUP);
            $this->session->set_userdata('kodeunitkerja',$jsonResult->data[0]->KodeUnitKerja);
            // if($result[0]->PK_LOOKUP!=''){
        
            $this->direct_page($result[0]->PK_LOOKUP,$nip);
          }else{
            echo '
              <link href="'.base_url('assets/css/bootstrap.min.css').'" rel="stylesheet" />
              <div class="alert alert-danger"  style="height:100% !important">
                <h4 class="block">SSO Login</h4>
                <p>
                  <div class="text-center">
                    <b>SSO Gagal !</b><br> Anda tidak memiliki peran, <a href="javascript:history.back()">Klik disini</a> untuk kembali ke portal.
                  </div>
                </p>
              </div>
              ';
          }
        // }
        }else if($jsonResult->data[0]->RoleGroup_ID=='4'){
          $role=$jsonResult->data[0]->RoleGroup_ID;
          $result = $this->lookup->_get_user_bridge_api($role);
        //   var_dump($result);
          
          $this->session->set_userdata('nip', $nip);
          $this->session->set_userdata('logged_in', $jsonResult->data[0]->NamaLengkap);
      
          $this->session->set_userdata('kodeunitkerja',$jsonResult->data[0]->KodeUnitKerja);
          $this->direct_page($result[0]->PK_LOOKUP,$nip);
        }else{
          echo '
              <link href="'.base_url('assets/css/bootstrap.min.css').'" rel="stylesheet" />
              <div class="alert alert-danger"  style="height:100% !important">
                <h4 class="block">SSO Login</h4>
                <p>
                  <div class="text-center">
                    <b>SSO Gagal !</b><br> Anda tidak memiliki peran, <a href="javascript:history.back()">Klik disini</a> untuk kembali ke portal.
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