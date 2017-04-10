 <html>  
      <head>  
           <title>Simple Online Library</title>  
           <link rel="stylesheet" href="apperance/bootstrap.min.css" />  
           <script src="apperance/bootstrap.min.js"></script>  
           <script src="apperance/jquery.min.js"></script>  
		   <link rel="stylesheet" type="text/css" href="apperance/style.css" />
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <div class="table-responsive">  
                     <h3 align="center">Simple Online Library</h3><br />  
			    <div class="form-group">  
                     <div class="input-group">  
                          <span class="input-group-addon">Search ...</span>  
                          <input type="text" name="search_text" id="search_text" placeholder="Search By Name" class="form-control" />  
                     </div>  
                </div>  
                <br/>
                <div id="result"></div>  
                   <div id="live_data"></div>			   
           </div>  
		   </div>   
      </body>  
 </html>  
 <script>   
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var bookname = $('#ibookname').text();  
           var bookdate = $('#ibookdate').text();  
		   var author = $('#iauthor').text();  
		   var image_name = $('#images').val();  
           if(name == '')  
           {  
                alert("input book name first please");  
                return false;  
           }  
           if(lastname == '')  
           {  
                alert("input book date first please");  
                return false;  
           }  
		   if(age == '')  
           {  
                alert("input author name first please");  
                return false;  
           }  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#images').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#images').val('');  
                     return false;  
                }  
           }  

           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{bookname:bookname, bookdate:bookdate, author:author},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
		   
      }); 	  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.bookname', function(){  
           var id = $(this).data("id1");  
           var bookname = $(this).text();  
           edit_data(id, bookname, "bookname");  
      });  
      $(document).on('blur', '.bookdate', function(){  
           var id = $(this).data("id2");  
           var bookdate = $(this).text();  
           edit_data(id,bookdate, "bookdate");  
      });  
	  $(document).on('blur', '.author', function(){  
           var id = $(this).data("id2");  
           var author = $(this).text();  
           edit_data(id,author, "author");  
      }); 
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id3");  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });

    $(document).on('click', '.column_sort', function(){  
           var column_name = $(this).attr("id");  
           var order = $(this).data("order");  
           var arrow = '';  
           //glyphicon glyphicon-arrow-up  
           //glyphicon glyphicon-arrow-down  
           if(order == 'desc')  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';  
           }  
           else  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';  
           } 
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                data:{column_name:column_name, order:order},  
                success:function(data)  
                {  
                     $('#users_table').html(data);  
                     $('#'+column_name+'').append(arrow);  
                }  
           }) 
      });  
    $('#search_text').keyup(function(){  
           var txt = $(this).val();  
           if(txt != '')  
           {  
             $.ajax({  
                     url:"select.php",  
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
             fetch_data();                  
           }  
      });
	  
	  load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });   
      $(document).on('click', '.createlink', function(){ 
            $.get('create.php', function(data) {
                alert("message : " + data);
            });
            return false;
      }); 
	  
	  
	  
	  
	  
	  
	  
	  


}); 			
 </script>  
