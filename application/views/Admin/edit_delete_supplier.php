<?php include('header.php'); ?>

   <div class="container">
     <div class="row">
      <div class="col-md-12 text-center" style="margin-bottom: 50px;"><h4>Supplier Details</h4></div><br>

      <div class="alert alert-success col-md-12" style="display: none;">
        


      </div>

      <div class="col-md-4">
<!--         <button class="btn btn-primary" id="addcompany">Add New Supplier</button> -->
      </div>
        <div class="col-md-8" style="margin-bottom: 30px;">
        <input id="myInput" type="text" name="myInput" placeholder="Search.." class="form-control col-md-12">
      </div><br>
      <br>
       <div class="col-md-12 table-responsive-md" >
        <table class="table table-striped table-responsive-md" style="background-color: #efef88;" id="resultsTable">
    <thead>
      <tr style="border: 1px solid black">
        <th style="border: 1px solid black">Sr  No.</th>
        <th style="border: 1px solid black">Supplier Name</th>
        
        <th style=" border: 1px solid black">Edit</th>
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
     </div>
   </div>


   <!-- modal Delete -->


   <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">Confirm Delete</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
          Do you want to delete this Supplier?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- Update Modal -->



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
              <label for="inputPassword" class="col-sm-4 col-form-label">Select Company Name</label>
              <div class="col-sm-8">
              <select class="form-control" name="company_name">
              <option value="" id="company_type">Select</option>
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
              <label for="inputPassword" class="col-sm-4 col-form-label">Supplier Name</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="suppiler_name" placeholder="Enter Supplier Name">
              </div>
              </div>

               <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Supplier Address</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="suppiler_address" placeholder="Enter Supplier Address">
              </div>
              </div>

              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">City</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="city" placeholder="Enter City">
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Pin Code</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="pin_code" placeholder="Enter Pin Code">
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Mobile Number</label>
              <div class="col-sm-8">
              <input type="number" class="form-control" name="mobile_no" placeholder="Enter Mobile Number">
              </div>
              </div>

                <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Email</label>
              <div class="col-sm-8">
              <input type="email" class="form-control" name="email" placeholder="Enter Email">
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




<!-- Add New Company -->
<!-- Add New Company -->
<!-- Add New Company -->
<!-- Add New Company -->
<!-- Add New Company -->


<div id="addcompanymodal" class="modal fade fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title" style="color: green;">Add New Supplier</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
          <form id="myForm1" action="" method="post">
            <input type="hidden" name="txtId" >
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Select Company Name</label>
              <div class="col-sm-8">
              <select class="form-control" name="company_name_modal">
              <option value="" id="company_type">Select</option>
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
              <label for="inputPassword" class="col-sm-4 col-form-label">Supplier Name</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="suppiler_name_modal" placeholder="Enter Supplier Name">
              </div>
              </div>

               <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Supplier Address</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="suppiler_address_modal" placeholder="Enter Supplier Address">
              </div>
              </div>

              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">City</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="city_modal" placeholder="Enter City">
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Pin Code</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="pin_code_modal" placeholder="Enter Pin Code">
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Mobile Number</label>
              <div class="col-sm-8">
              <input type="number" class="form-control" name="mobile_no_modal" placeholder="Enter Mobile Number">
              </div>
              </div>

                <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Email</label>
              <div class="col-sm-8">
              <input type="email" class="form-control" name="email_modal" placeholder="Enter Email">
              </div>
              </div>
             
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnentry" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<?php include('footer.php'); ?>

   <script>
    $(function(){ 
        showAllEmployee();


            //function
        function showAllEmployee(){
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>ajax/fetchsupplier',
                async: false,
                dataType: 'json',
                success: function(data){

                    var html = '';
                    var i;
                    var x=1;
                    for(i=0; i<data.length; i++){
                    // alert(data[i].id);
                    // exit;
                        html +='<tr style="border: 1px solid black">'+
                                    '<td style="border: 1px solid black">'+x+'</td>'+
                                    '<td style="border: 1px solid black">'+data[i].suppiler_name+'</td>'+
                                    
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
          url: '<?php echo base_url() ?>ajax/deletesupplier',
          data:{id:id},
          dataType: 'json',
          success: function(response){
            if(response.success){
              // alert(response.success);
              $('#deleteModal').modal('hide');
              // alert('Company Deleted successfully');
              $('.alert-success').html('Supplier Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
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
      $('#myModal').find('.modal-title').text('Edit Supplier');
      $('#myForm').attr('action', '<?php echo base_url() ?>ajax/updatesupplier');
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>ajax/editsupplier',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data){
          $('select[name=company_name]').val(data.company_name);
          $('input[name=suppiler_name]').val(data.suppiler_name);
          $('input[name=suppiler_address]').val(data.suppiler_address);
          $('input[name=city]').val(data.city);
          $('input[name=pin_code]').val(data.pin_code);
          $('input[name=mobile_no]').val(data.mobile_no);
          $('input[name=email]').val(data.email);
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
      var company_name = $('select[name=company_name]');
      var suppiler_name = $('input[name=suppiler_name]');
      var suppiler_address = $('input[name=suppiler_address]');
      var city = $('input[name=city]');
      var pin_code = $('input[name=pin_code]');
      var mobile_no = $('input[name=mobile_no]');
      var email = $('input[name=email]');
      var result = '';
      if(company_name.val()==''){
        alert('Select Company Name');
        exit;
      }else{
        result +='1';
      }
      if(suppiler_name.val()==''){
        alert('Supplier Name Is Required');
        exit;
      }else{
        result +='2';
      }
        if(suppiler_address.val()==''){
          alert('Supplier Address Is Required');
        exit;
      }else{
        result +='3';
      }
      
        if(city.val()==''){
          alert('City Is Required');
        exit;
      }else{
        result +='4';
      }
        if(pin_code.val()==''){
          alert('Pin Code Is Required');
        exit;
      }else{
        result +='5';
      }
        if(mobile_no.val()==''){
          alert('Mobile Number Is Required');
        exit;
      }else{
      result +='6';
      }
        if(email.val()==''){
          alert('Email is Required');
        exit;


       
      }else{
      
        result +='7';
      }

      if(result=='1234567'){
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
              $('.alert-success').html('Supplier Details updated successfully').fadeIn().delay(4000).fadeOut('slow');
              showAllEmployee();
            
          },
          error: function(){
            alert('Could not add data');
          }
        });
      }
    });


    // Insert Data New Company By Modal

      $('#addcompany').click(function(){      
      $('#addcompanymodal').modal('show');      
      $('#btnentry').click(function(){
      var data = $('#myForm1').serialize();
     var company_name = $('select[name=company_name_modal]');
      var suppiler_name = $('input[name=suppiler_name_modal]');
      var suppiler_address = $('input[name=suppiler_address_modal]');
      var city = $('input[name=city_modal]');
      var pin_code = $('input[name=pin_code_modal]');
      var mobile_no = $('input[name=mobile_no_modal]');
      var email = $('input[name=email_modal]');
      var result = '';
      if(company_name.val()==''){
        alert('Select Company Name');
        exit;
      }else{
        result +='1';
      }
      if(suppiler_name.val()==''){
        alert('Supplier Name Is Required');
        exit;
      }else{
        result +='2';
      }
        if(suppiler_address.val()==''){
          alert('Supplier Address Is Required');
        exit;
      }else{
        result +='3';
      }
      
        if(city.val()==''){
          alert('City Is Required');
        exit;
      }else{
        result +='4';
      }
        if(pin_code.val()==''){
          alert('Pin Code Is Required');
        exit;
      }else{
        result +='5';
      }
        if(mobile_no.val()==''){
          alert('Mobile Number Is Required');
        exit;
      }else{
      result +='6';
      }
        if(email.val()==''){
          alert('Email is Required');
        exit;


       
      }else{
      
        result +='7';
      }
if(result=='1234567'){
        $.ajax({
          type: 'ajax',
          method: 'post',
          url: '<?php echo base_url() ?>ajax/addsupplier',
          data: data,
          async: false,
          dataType: 'json',
          success: function(response){
              $('#addcompanymodal').modal('hide');
              $('#myForm1')[0].reset();             
              $('.alert-success').html('Supplier Add successfully').fadeIn().delay(4000).fadeOut('slow');
              showAllEmployee();
            
          },
          error: function(){
            alert('Could not Add Supplier');
          }
        });
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