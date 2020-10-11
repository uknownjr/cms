  $.ajax({
        url: 'http://sibijak.bpkp.go.id/dca/api/api/viewtoken',
        type: 'POST',
        headers: {
          'Content-Type':'application/json'
        },
        data: {
              nama: 'dummy',
              kata_sandi : 'dummy123'
          },
          dataType: 'json',
          success: function(data) {
             console.log('halo');
            //  headers: {"Authorization": data.id_token}  
            },
              error: function(){
                console.log('gagal');                
              }
    });
   
//  var nip = '199607122018011001'   
//     $.ajax({
//       url: 'https://sibijak.bpkp.go.id/dca/api/api/auditor/'+nip,
//       type: 'GET',
//       dataType: 'json',
//         success: function() {
//            console.log('halo');
//             },
//             error: function(){
//               console.log('gagal');
//             }

//   });