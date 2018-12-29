<?php include('header.php'); ?>

  

   <div class="container">
     <div class="row">
      <div class="col-md-12 text-center" style="margin-bottom: 50px;"><h4>Consumed Sheet</h4></div><br>

     
      

      <br>

      <div class="col-md-4"></div>
      
        <div class="col-md-8" style="margin-bottom: 30px;"> 

      

         
          <input id="myInput" type="text" name="myInput" placeholder="Search.." class="form-control col-md-12">
          </div>
          <br>

          <div id="msgsuccess" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
          
          <div class="modal-body alert-success">
         
          </div>
            
            <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        <!-- <button type="button" id="btnDelete" class="btn btn-danger">Ok</button> -->
      </div>
          </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->


        <!--   <div class="alert alert-success modal " role="dialog" style="display: none;" 
tabindex="-1"></div> -->
         
       
    </div>
   <br>
      <br>
       
       
      <div class="col-md-12 table-responsive-md" >
        <table class="table table-striped table-responsive-md" style="background-color: #efef88;" id="resultsTable">
    <thead>
      <tr style="border: 1px solid black">
      
        <th style="border: 1px solid black">Sr  No.</th>
         <th style="border: 1px solid black">Date & Time</th>
        
        <th style="border: 1px solid black">Medicine Name</th>
              
        <th style="border: 1px solid black">Consumed</th>
       
        <th style="border: 1px solid black">Rate</th>
        <th style="border: 1px solid black">Total</th>
       
      </tr>
    </thead>
    <tbody id="myTable">
      
      
    </tbody>
    
  </table>
         
       </div>
       
       <br>
       <br>
       <br>
       <br>
     </div>
   </div>

 </div>
 </div>
   
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

   

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
<!-- ajax/medicine_fetc -->
    <script>
        $(function(){ 
        showAllEmployee();
        function showAllEmployee(){
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>ajax/medicine_fetch_consumed',
                async: false,
                dataType: 'json',
                success: function(data){
                    var html = '';
                    var i;
                    var x=1;
                    var t='';
                    var r='';
                    var q='';
                    var Total=0;

                    for(i=0; i<data.length; i++){
                      r=data[i].rate;
                       q=data[i].quantity;

                       t=r*q;
                       
                     
                     
                        html +='<tr style="border: 1px solid black">'+
                        
                                    '<td style="border: 1px solid black">'+x+'</td>'+
                                    '<td style="border: 1px solid black"><b>'+data[i].date_time+'</b></td>'+ 
                                    '<td style="border: 1px solid black">'+data[i].trade_name+'</td>'+
                                    
                                    '<td style="border: 1px solid black">'+data[i].quantity+'</td>'+
                                     
                                     
                                    
                                      '<td style="border: 1px solid black"><b>Rs. '+data[i].rate+'</b></td>'+
                                       '<td style="border: 1px solid black"><b>Rs. '+t+'</b></td>'+
                                                                        
                                    
                                '</tr>'+
                                

                                x++;
                                Total=Total+t;
                    }
                           html   +='<tr style="border: 1px solid black">'+
                        
                                    '<td style="border: 1px solid black"><b>Total</b></td>'+
                                    '<td style="border: 1px solid black"></td>'+
                                   
                                   
                                    '<td style="border: 1px solid black"></td>'+
                                    '<td style="border: 1px solid black"></td>'+
                                    '<td style="border: 1px solid black"></td>'+
                                    '<td style="border: 1px solid black"><b>Rs. '+Total+'</b></td>'+ 
                                    
                                                                        
                                    
                                '</tr>';
                              
                   
                    $('#myTable').html(html);
                },
                error: function(){
                    alert('Could not get Data from Database');
                }
            });
        }


         //delete- 
    $('#myTable').on('click', '.item-delete', function(){

      var id = $(this).attr('data');
      $('#deleteModal').modal('show');
      //prevent previous handler - unbind()
      $('#btnDelete').unbind().click(function(){
        $.ajax({
          type: 'ajax',
          method: 'get',
          async: false,
          url: '<?php echo base_url() ?>ajax/deletemedicine',
          data:{id:id},
          dataType: 'json',
          success: function(response){
            if(response.success){
              // alert(response.success);
              $('#deleteModal').modal('hide');
              // alert('Company Deleted successfully');
              $('.alert-success').html('Company Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
              showAllEmployee();
            }else{
              alert('Error');
            }
          },
          error: function(){
            alert('Error deleting');
          }
        });
      });
    });




    //edit
    $('#myTable').on('click', '.item-edit', function(){
      var id = $(this).attr('data');
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Take In Medicine');
      $('#myForm').attr('action', '<?php echo base_url() ?>ajax/ordertakein');
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>ajax/orderdetails',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data){
    
          $('input[name=trade_name]').val(data.trade_name);
          $('input[name=variats_name]').val(data.variats_name);
          $('input[name=company_name]').val(data.company_name);
          $('input[name=supplier_name]').val(data.supplier_name);
          $('input[name=salt_name]').val(data.salt_name);
          $('input[name=date_time]').val(data.date_time);
          $('input[name=quantity]').val(data.pending);
          $('input[name=rate]').val(data.rate);
          $('input[name=batch_no]').val(data.batch_no);
          $('input[name=mfd_date]').val(data.mfd_date);
          $('input[name=pending]').val(data.pending);
          $('input[name=exp_date]').val(data.exp_date);
          $('input[name=txtId]').val(data.id);
        },
        error: function(){
          alert('Could not Take In ');
        }
      });
    });





 // Update Data

    $('#btnSave').click(function(){
      var url = $('#myForm').attr('action');
      var data = $('#myForm').serialize();
      //validate form
   
      var take_in_quantity = $('input[name=take_in_quantity]');
      var rate = $('input[name=rate]');
      var batch_no = $('input[name=batch_no]');
      var mfd_date = $('input[name=mfd_date]');
      var exp_date = $('input[name=exp_date]');
      var result = '';
//       trade_name
// variats_name
// company_name
// supplier_name
// salt_name
// rate
// batch_no
// mfd_date
// exp_date
     
        if(take_in_quantity.val()==''){
          alert('Take In Quantity Is Empty');
        exit;
      }else{
        result +='1';
      }
        if(rate.val()==''){
          alert('Rate Is Empty');
        exit;
      }else{
      result +='2';
      }
        if(batch_no.val()==''){
          alert('Batch No Is Empty');
        exit;
      }else{      
        result +='3';
      }
      if(mfd_date.val()==''){
          alert('Select Mfd Date');
        exit;
      }else{      
        result +='4';
      }
      if(exp_date.val()==''){
          alert('Select Exp Date');
        exit;
      }else{      
        result +='5';
      }


      if(result=='12345'){
        $.ajax({
          type: 'ajax',
          method: 'post',
          url: url,
          data: data,
          async: false,
          dataType: 'json',
          success: function(response){
              $('#myModal').modal('hide');
              $('#myForm')[0].reset();
              $('#msgsuccess').modal('show');             
              $('.alert-success').html('Order Take In successfully');
              // $('#msgsuccess').modal('hide');
              showAllEmployee();
            
          },
          error: function(){
            alert('Could not Take In');
          }
        });
      }
    });




    //Details 
    $('#myTable').on('click', '.item-details', function(){
      var id = $(this).attr('data');
      $('#myModal1').modal('show');
      $('#myModal1').find('.modal-title').text('hhhhh');
      
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>ajax/medicine_fetch_take_in',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data){
          var order=data.date_time;
          var takein=data.date_take_in;
        if(order==takein){
          show='First Time';
        }else{
          show=data.date_time;
        }
          $('#medicine_name').html(data.trade_name);
          $('#variants').html(data.supplier_name);
          $('#salt').html(data.quantity);
          $('#company').html(show);
          $('#take_in_id').html(data.take_in_quantity);
          $('#take_in_date_id').html(data.date_take_in);
          $('#pending_id').html(balance);
           $('#title_medicine').html(data.trade_name);
        },
        error: function(){
          alert('Could not Fatch Data');
        }
      });
    });

   });
    </script>

   <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>











<script>
        $(document).ready(function(){
          $('#company_name').change(function(){
            var company_name = $('#company_name').val();
            // alert(company_name);
            if(company_name != '')
            {
                // alert(company_name);
                $.ajax({
                    url:'<?= base_url(); ?>/Welcome/getsupplier',
                    method:"POST",
                    data:{company_name:company_name},
                    success:function(data)
                    {
                        $('#supplier_name').html(data);
                        // alert(data);
                    }
                })
            }
          });
      });
    </script>


</html>