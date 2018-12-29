<?php include('header.php'); ?>

  

   <div class="container">
     <div class="row">
      <div class="col-md-12 text-center" style="margin-bottom: 50px;"><h4>All Medicine Details</h4></div><br>

     
      <div class="col-md-6"></div>
      <div class="col-md-3"></div>
      <div class="col-md-3">
        <a href="<?= base_url('welcome/Exportmedicine'); ?>" class="btn btn-lg btn-warning">Download In Excel</a>
      </div>
      <br>
      <br>

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
        <th style="border: 1px solid black">Medicine Name</th>
        <th style="border: 1px solid black">Salt Name</th>
        <th style="border: 1px solid black">Details</th>
        
        <th style="border: 1px solid black">Edit</th>
        <th style="border: 1px solid black">Delete</th>
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
                url: '<?php echo base_url() ?>ajax/medicine_fetch',
                async: false,
                dataType: 'json',
                success: function(data){
                    var html = '';
                    var i;
                    var x=1;
                    for(i=0; i<data.length; i++){
                        html +='<tr style="border: 1px solid black">'+
                                    '<td style="border: 1px solid black">'+x+'</td>'+
                                    '<td style="border: 1px solid black">'+data[i].trade_name+'</td>'+
                                    '<td style="border: 1px solid black">'+data[i].salt_name+'</td>'+
                                     '<td style="border: 1px solid black">'+
                                        '<a href="javascript:;" class="btn btn-info item-details" style="background-color: #808000" data="'+data[i].id+'">Details</a>'+'</td>'+                                    
                                    '<td style="border: 1px solid black">'+
                                        '<a href="javascript:;" class="btn btn-info item-edit" style="background-color: #abd680" data="'+data[i].id+'">Edit</a>'+'</td>'+
                                       '<td style="border: 1px solid black">' +
                                        '<a href="javascript:;" class="btn item-delete" style="background-color: #d6ab80; color:white;" data="'+data[i].id+'">Delete</a>'+
                                    '</td>'+
                                '</tr>';
                                x++;
                    }
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
      $('#myModal').find('.modal-title').text('Edit Medicine');
      $('#myForm').attr('action', '<?php echo base_url() ?>ajax/updatemedicine');
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>ajax/editmedicine',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data){
          // trade_name
// variats_name
// company_name
// supplier_name
// salt_name
// rate
// batch_no
// mfd_date
// exp_date
          $('input[name=trade_name]').val(data.trade_name);
          $('select[name=variats_name]').val(data.variats_name);
          $('select[name=company_name]').val(data.company_name);
          $('#supplier_name1').html(data.supplier_name);
          $('input[name=salt_name]').val(data.salt_name);
          $('input[name=rate]').val(data.rate);
          $('input[name=batch_no]').val(data.batch_no);
          $('input[name=mfd_date]').val(data.mfd_date);
          $('input[name=exp_date]').val(data.exp_date);
          $('input[name=txtId]').val(data.id);
        },
        error: function(){
          alert('Could not Edit Data');
        }
      });
    });





 // Update Data

    $('#btnSave').click(function(){
      var url = $('#myForm').attr('action');
      var data = $('#myForm').serialize();
      //validate form
      var trade_name = $('input[name=trade_name]');
      var variats_name = $('select[name=variats_name]');
      var company_name = $('select[name=company_name]');
      var supplier_name = $('select[name=supplier_name]');
      var salt_name = $('input[name=salt_name]');
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
      if(trade_name.val()==''){
        alert('Trade Name is empaty');
        exit;
      }else{
        result +='1';
      }
      if(variats_name.val()==''){
        alert('Select Variants');
        exit;
      }else{
        result +='2';
      }
        if(company_name.val()==''){
          alert('Select Company');
        exit;
      }else{
        result +='3';
      }
      
        if(supplier_name.val()==''){
          alert('Select Supplier');
        exit;
      }else{
        result +='4';
      }
        if(salt_name.val()==''){
          alert('Salt Name Is Empty');
        exit;
      }else{
        result +='5';
      }
        if(rate.val()==''){
          alert('Rate Is Empty');
        exit;
      }else{
      result +='6';
      }
        if(batch_no.val()==''){
          alert('Batch No Is Empty');
        exit;
      }else{      
        result +='7';
      }
      if(mfd_date.val()==''){
          alert('Select Mfd Date');
        exit;
      }else{      
        result +='8';
      }
      if(exp_date.val()==''){
          alert('Select Exp Date');
        exit;
      }else{      
        result +='9';
      }


      if(result=='123456789'){
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
              $('.alert-success').html('Medicine Edit successfully');
              // $('#msgsuccess').modal('hide');
              showAllEmployee();
            
          },
          error: function(){
            alert('Could not add data');
          }
        });
      }
    });




    //Details 
    $('#myTable').on('click', '.item-details', function(){
      var id = $(this).attr('data');
      $('#myModal1').modal('show');
      $('#myModal1').find('.modal-title').text('Details');
      
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>ajax/editmedicine',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data){
          // alert(data.trade_name);
          $('#medicine_name').html(data.trade_name);
          $('#variants').html(data.variats_name);
          $('#salt').html(data.salt_name);
          $('#company').html(data.company_name);
          $('#rate').html('Rs. '+data.rate);
          $('#mfd_date').html(data.mfd_date+' (yy-mm-dd)');
          $('#exp_date').html(data.exp_date+' (yy-mm-dd)');
          $('#batch_no').html(data.batch_no);
          $('#title_medicine').html(data.trade_name);
          $('#supplier').html(data.supplier_name);
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





<!-- Edit modal -->
<!-- Edit modal -->
<!-- Edit modal -->

<div id="myModal" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
          <form id="myForm" action="" method="post">
            <input type="hidden" name="txtId" >
              <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Trade Name</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="trade_name" placeholder="Enter Trade Name">
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Type Of Variants</label>
              <div class="col-sm-8">
              <select class="form-control" name="variats_name">
              <option value="">Select Variats</option>                  
              <option value="Capsules">Capsules</option>        
              <option value="Drops">Drops</option>        
              <option value="Injections">Injections</option>  
              <option value="Inhalers">Inhalers</option>        
              <option value="Implants or patches">Implants or patches</option>
              <option value="Suppositories">Suppositories</option>
              <option value="Syrup">Syrup</option>
              <option value="Tablet">Tablet</option>        
              <option value="Sprey">Sprey</option>        
              <option value="Other">Other</option>        


              </select> 
              </div>
              </div>

              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Company Name</label>
              <div class="col-sm-8">
              <select class="form-control" name="company_name" id="company_name">
              <option value="">Select Company</option>        
              <?php if(count($res)): ?>
              <?php foreach($res as $value): ?>
              <option value="<?php echo $value->company_name; ?>"><?php echo $value->company_name; ?></option>
              <?php endforeach; ?>  
              <?php else: ?>
              <?php endif; ?>

              </select> 
              </div>
              </div>

              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Select Supplier</label>
              <div class="col-sm-8">
              <select class="form-control" name="supplier_name" id="supplier_name">
              <!-- <option value="" >Select Supplier Name</option> -->
              <option  id="supplier_name1"></option>
                
              </select>
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Enter Salt Name</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="salt_name" placeholder="Enter Salt Name">
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Rate</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="rate" placeholder="Enter Rate">
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Batch No.</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="batch_no" placeholder="Enter Batch No">
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">MFD Date</label>
              <div class="col-sm-8">
              <input type="date" class="form-control" name="mfd_date">
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Exp- Date</label>
              <div class="col-sm-8">
              <input type="date" class="form-control" name="exp_date" >
              </div>
              </div>
             
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





 <!-- modal Delete -->


   <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">Confirm Delete</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
          Do you want to delete this Medicine?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->






<div id="myModal1" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title" id="title_medicine" style="color: red;"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">

        <input type="hidden" name="txtId" >
          <table class="table table-striped table-responsive-md" style="background-color: #FFE4B5;" id="resultsTable">
   
    <tbody >

      <tr style="border: 1px solid black">
        <td style="border: 1px solid black; color: #663399; ">Medicine Name</td>
        <td style="border: 1px solid black; color: #808000;" id="medicine_name"></td>
      
      </tr>
      <tr style="border: 1px solid black">
        <td style="border: 1px solid black;color: #808000;">Variants</td>
        <td style="border: 1px solid black; color: #663399;" id="variants"></td>
      </tr>
       <tr style="border: 1px solid black">
        <td style="border: 1px solid black;  color: #663399;">Salt</td>
        <td style="border: 1px solid black;color: #808000;" id="salt"></td>
      </tr>
       <tr style="border: 1px solid black">
        <td style="border: 1px solid black;color: #808000;">Company</td>
        <td style="border: 1px solid black;  color: #663399;" id="company"></td>
      </tr>
      
       <tr style="border: 1px solid black">
        <td style="border: 1px solid black; color: #663399;">Rate</td>
        <td style="border: 1px solid black;color: #808000;" id="rate"></td>
      </tr>
       <tr style="border: 1px solid black">
        <td style="border: 1px solid black;color: #808000;">Mfd Date</td>
        <td style="border: 1px solid black;  color: #663399;" id="mfd_date"></td>
      </tr>
       <tr style="border: 1px solid black">
        <td style="border: 1px solid black;  color: #663399;">Exp. Date</td>
        <td style="border: 1px solid black;color: #808000;" id="exp_date"></td>
      </tr>
       <tr style="border: 1px solid black">
        <td style="border: 1px solid black;color: #808000;">Batch No.</td>
        <td style="border: 1px solid black;  color: #663399;" id="batch_no"></td>
      </tr>

      <tr style="border: 1px solid black">
        <td style="border: 1px solid black;color: #663399;">Supplier Name</td>
        <td style="border: 1px solid black;  color: #808000;" id="supplier"></td>
      </tr>
      
      
    </tbody>
    
  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" style="background-color: #FFA07A" data-dismiss="modal">Close</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



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