 $(document).ready(function(){  
      function fetch_users_data()  
      {  
           $.ajax({  
                url:"users/users-select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data_users').html(data);  
                }  
           });  
      }  

	   fetch_users_data();  
      $(document).on('click', '#btn_add', function(){  
           var username = $('#iusername').text();  
           var password = $('#ipassword').text();  
		   var role = $('#irole').text();  
           if(username == '')  
           {  
                alert("input username please!");  
                return false;  
           }  
           if(password == '')  
           {  
                alert("input password please!");  
                return false;  
           }  
		   if(role == '')  
           {  
                alert("choose role please!");  
                return false;  
           }  	  
           $.ajax({  
                url:"users/users-insert.php",  
                method:"POST",  
                data:{username:username, password:password, role:role},  
                success: function(data)
                {  
                     //alert(data);  
                     fetch_users_data();  
                }  
           })  
		   
      });

      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"users/users-edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     //alert(data);  
                }  
           });  
      }  
          $(document).on('blur', '.username', function(){  
           var id = $(this).data("id1");  
           var username = $(this).text();  
           edit_data(id, username, "username");  
      });  
      $(document).on('blur', '.password', function(){  
           var id = $(this).data("id2");  
           var password = $(this).text();  
           edit_data(id,password, "password");  
      });  
	  $(document).on('blur', '.role', function(){  
           var id = $(this).data("id3");  
           var role = $(this).text();  
           edit_data(id,role, "role");  
      }); 
 
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id4");  
           {  
                $.ajax({  
                     url:"users/users-delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          //alert(data);  
                          fetch_users_data();  
                     }  
                });  
           }  
      });

    $(document).on('click', '.column_sort', function(){  
           var column_name = $(this).attr("id");  
           var order = $(this).data("order");  
           var arrow = '';  
           if(order == 'desc')  
           {  
                arrow = '<i class="fa fa-caret-down" aria-hidden="true"></i>';  
           }  
           else  
           {  
                arrow = '<i class="fa fa-caret-up" aria-hidden="true"></i>';  
           } 
           $.ajax({  
                url:"users/users-select.php",  
                method:"POST",  
                data:{column_name:column_name, order:order},  
                success:function(data)  
                {  
                     $('#users_table').html(data);  
                     $('#'+column_name+'').append(arrow);  
                }  
           }) 
      });  
    $('#search_users').keyup(function(){  
           var txt = $(this).val();  
           if(txt != '')  
           {  
             $.ajax({  
                     url:"users/users-select.php",  
                     method:"post",  
                     data:{search:txt},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          $('#users_table').html(data);  
                     }  
                });  
           }  
           else  
           {  
             fetch_users_data();                  
           }  
      });
	  
	  load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"users/users-select.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#live_data_users').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });   
      $(document).on('click', '.createlink', function(){ 
            $.get('create.php', function(data) {
                alert("پیغام بازگشتی: " + data);
            });
            return false;
      }); 
 }); 	