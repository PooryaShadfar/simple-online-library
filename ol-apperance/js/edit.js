 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"edit/select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit/edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     //alert(data);  
                }  
           });  
      }  
          $(document).on('blur', '.bookname', function(){  
           var id = $(this).data("id1");  
           var bookname = $(this).text();  
           edit_data(id, bookname, "bookname");  
      });  
      $(document).on('blur', '.booklng', function(){  
           var id = $(this).data("id2");  
           var booklng = $(this).text();  
           edit_data(id,booklng, "booklng");  
      });  
	  $(document).on('blur', '.bookauthor', function(){  
           var id = $(this).data("id3");  
           var bookauthor = $(this).text();  
           edit_data(id,bookauthor, "bookauthor");  
      }); 
	  $(document).on('blur', '.booktrans', function(){  
           var id = $(this).data("id4");  
           var booktrans = $(this).text();  
           edit_data(id,booktrans, "booktrans");  
      }); 
	  $(document).on('blur', '.bookshop', function(){  
           var id = $(this).data("id5");  
           var bookshop = $(this).text();  
           edit_data(id,bookshop, "bookshop");  
      }); 
	  $(document).on('blur', '.reldate', function(){  
           var id = $(this).data("id6");  
           var reldate = $(this).text();  
           edit_data(id,reldate, "reldate");  
      }); 
	  $(document).on('blur', '.reservation', function(){  
           var id = $(this).data("id7");  
           var reservation = $(this).text();  
           edit_data(id,reservation, "reservation");  
      }); 
	  $(document).on('blur', '.extrainfo', function(){  
           var id = $(this).data("id8");  
           var extrainfo = $(this).text();  
           edit_data(id,extrainfo, "extrainfo");  
      }); 
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id10");  
           {  
                $.ajax({  
                     url:"edit/delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          //alert(data);  
                          fetch_data();  
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
                url:"edit/select.php",  
                method:"POST",  
                data:{column_name:column_name, order:order},  
                success:function(data)  
                {  
                     $('#book_table').html(data);  
                     $('#'+column_name+'').append(arrow);  
                }  
           }) 
      });  
    $('#search_text').keyup(function(){  
           var txt = $(this).val();  
           if(txt != '')  
           {  
             $.ajax({  
                     url:"edit/select.php",  
                     method:"post",  
                     data:{search:txt},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          $('#book_table').html(data);  
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
                url:"edit/select.php",  
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
                alert("پیغام بازگشتی: " + data);
            });
            return false;
      }); 
 }); 	