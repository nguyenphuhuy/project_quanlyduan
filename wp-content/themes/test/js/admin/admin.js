var danhmuc = [];
        var i=1;
        function add(){
            var name =$('#name').val();
            var sapo =$('#sapo').val();
            var order =$('#order').val();
            var number=/^[0-9]+$/;
            if (!name=="") {
               if (!sapo=="") {
                    if (!order=="") {
                        if (number.test(order)==true) {
                            
                            $( "#content_dialog" ).html( "<h4>Tên danh mục: "+name+"<br>"+"Tên tiếng anh: "+sapo+"<br>"+"Thứ tự: "+order+"</h4>" ); 
                            $( function() {
                            $( "#dialog" ).dialog();
                             } );
                            
                            
                                $('#noidung').append('<tr td id="xoa_hihi_'+i+'"><td>'+i+'</td><td>'+name+'</td><td>'+sapo+'</td><td>'+order+'</td><td><span id="hihi" onclick="test_'+i+'()"><a   href="#"><i  class="fa fa-trash" style="font-size: 2rem;color: red;" aria-hidden="true"></i></a></span></td><tr>');
                                i++;
                               
                            
                            $('#name').val('');
                            $('#sapo').val('');
                            $('#order').val('');
                            $( "#danhsach" ).slideUp( 300 ).delay( 700 ).fadeIn( 1000 );
                            $('#hienthem').show();
                            
                        }else{
                            alert('Thứ tự phải là số');
                        }
                    }else{
                        alert('Bạn chưa nhập thứ tự');
                    }
                }else{
                    alert('Bạn chưa nhập tên danh mục tiếng anh');
                }
            }else{
               
                alert('Bạn chưa nhập tên danh mục');
                
            }
            
            
        }
        
   
       
        $( ".ui-button" ).click(function() {
          alert( "Handler for .click() called." );
        });
         
       
        /*function change(){
            $('#themmoi').hide();
            $('#danhsach').show();
         }*/


        /* baiviet_script */
         function add_baiviet(){
            var cate =$('#cate').val();
            var select=$( "#cate option:selected" ).text();
            var name =$('#name').val();
            var name_eng =$('#name_eng').val();
            var content =$('#content').val();
            var content_eng =$('#content_eng').val();
            var check_img=$('input[type=file]').val();
            if (!cate=="") {
                if (!name=="") {
                   if (!name_eng=="") {
                        if (!content=="") {
                            if (!content_eng=="") {
                                if (!check_img=="") {
                                     if (!check_img=="") {
                                    var img=$('input[type=file]')[0].files[0].name;
                                    alert('Bạn đã thêm thành công bài viết');
                                    
                                    $('#danhmuc_noidung').html(select);
                                    $('#name_noidung').html(name);
                                    $('#name_noidung_eng').html(name_eng);
                                    $('#content_noidung').html(content);
                                    $('#content_noidung_eng').html(content_eng);
                                    $('#img_noidung').append('<img width="354px" height="236px" id="img_xoa" src="image/'+img+'">');
                                    $('#themmoi').fadeOut( 1000 );
                                    $( "#noidung" ).slideUp( 1100 ).delay( 1300 ).fadeIn( 1000 );

                                }else{
                                    alert('Bạn chưa chọn ảnh');
                                
                                }
                                }else{
                                    alert('Bạn chưa chọn ảnh');
                                }
                            }else{
                                alert('Bạn chưa nhập nội dung tiếng anh');
                            }
                        }else{
                            alert('Bạn chưa nhập nội dung');
                        }
                    }else{
                        alert('Bạn chưa nhập tên bài viết tiếng anh');
                    }
                }else{
                   
                    alert('Bạn chưa nhập tên bài viết');
                    
                }
            }else{
                   
                    alert('Bạn chưa chọn Danh mục');
                    
                }
        }

        function sua(){
            $('#noidung').fadeOut( 1000 );
            $( "#themmoi" ).slideUp( 1100 ).delay( 1300 ).fadeIn( 1000 );
            $('#img_xoa').remove();
        }
        /*function menu*/
         function add_menu(){
            var name =$('#name').val();
            var name_eng =$('#name_eng').val();
            var order =$('#order').val();
            var number=/^[0-9]+$/;
            if (!name=="") {
               if (!name_eng=="") {
                    if (!order=="") {
                        if (number.test(order)==true) {
                            
                            $( "#content_dialog" ).html( "<h4>Tên Menu: "+name+"<br>"+"Tên Menu tiếng anh: "+name_eng+"<br>"+"Thứ tự: "+order+"</h4>" ); 
                            $( function() {
                            $( "#dialog" ).dialog();
                             } );
                            
                            
                                $('#noidung').append('<tr td id="xoa_hihi_'+i+'"><td>'+i+'</td><td>'+name+'</td><td>'+name_eng+'</td><td>'+order+'</td><td><span id="hihi" onclick="test_'+i+'()"><a   href="#"><i  class="fa fa-trash" style="font-size: 2rem;color: red;" aria-hidden="true"></i></a></span></td><tr>');
                                i++;
                               
                            
                            $('#name').val('');
                            $('#name_eng').val('');
                            $('#order').val('');
                            $( "#danhsach" ).slideUp( 300 ).delay( 700 ).fadeIn( 1000 );
                            $('#hienthem').show();
                            
                        }else{
                            alert('Thứ tự phải là số');
                        }
                    }else{
                        alert('Bạn chưa nhập thứ tự');
                    }
                }else{
                    alert('Bạn chưa nhập tên Menu tiếng anh');
                }
            }else{
               
                alert('Bạn chưa nhập tên Menu');
                
            }
            
            
        }


        /*function slide*/
         function add_slide(){
            
            var order =$('#order').val();
            var check_img=$('input[type=file]').val();
          
                        if (!order=="") {
                            if (!check_img=="") {
                                 if (!check_img=="") {
                                var img=$('input[type=file]')[0].files[0].name;
                                alert('Bạn đã thêm thành công Slide');
                               
                                $('#img_noidung').append('');
                                $('#noidung').append('<tr id="xoa_hihi_'+i+'"><td>'+i+'</td><td><img width="354px" height="236px" id="img_xoa" src="image/'+img+'"></td><td id="sort_order_'+i+'">'+order+'</td><td><span id="hihi" onclick="test_'+i+'()"><a   href="#"><i  class="fa fa-trash" style="font-size: 2rem;color: red;" aria-hidden="true"></i></a></span></td><tr>');
                                i++;
                                $( "#danhsach" ).slideUp( 300 ).delay( 700 ).fadeIn( 1000 );
                                $('#hienthem').show();
                                 $('#order').val('');
                                $('input[type=file]').val('');
                            }else{
                                alert('Bạn chưa chọn ảnh');
                            
                            }
                            }else{
                                alert('Bạn chưa chọn ảnh');
                            }
                        }else{
                            alert('Bạn chưa nhập thứ tự');
                        }
        }

        /*function ql_chung*/
        function add_qlchung(){
            var phone =$('#phone').val();
            var email =$('#email').val();
            var address =$('#address').val();
            var check_img=$('input[type=file]').val();
             var number=/^[0-9]+$/;
                   if (!phone=="") {
                    if (number.test(phone)==true) {
                        if (!email=="") {
                            if (!address=="") {
                                
                                     if (!check_img=="") {
                                     var img=$('input[type=file]')[0].files[0].name;
                                    alert('Bạn đã thêm thành công bài viết');
                                  
                                    $('#phone_noidung').html(phone);
                                    $('#email_noidung').html(email);
                                    $('#address_noidung').html(address);
                                    $('#img_noidung').append('<img width="354px" height="236px" id="img_xoa" src="image/'+img+'">');
                                    $('#themmoi').fadeOut( 1000 );
                                    $( "#noidung" ).slideUp( 1100 ).delay( 1300 ).fadeIn( 1000 );
                                    }else{
                                        alert('Bạn chưa chọn ảnh');
                                    
                                    }
                                
                                
                                }else{
                                    alert('Bạn chưa nhập địa chỉ');
                                }
                            }else{
                                alert('Bạn chưa nhập emai');
                            }
                        }else{
                                 alert('Số điện thoại định dạng phải là số');
                                }
                    }else{
                        alert('Bạn chưa nhập số điện thoại');
                    }
                
        }