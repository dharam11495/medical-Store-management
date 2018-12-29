<?php include('header.php'); ?>

   <div class="container">
     <div class="row">
      <div class="col-md-12 text-center" style="margin-bottom: 50px;"><h4>Company Details</h4></div><br>

      <div class="alert alert-success col-md-12" style="display: none;">
        


      </div>

      <div class="col-md-4">
       <!--  <button class="btn btn-primary" id="addcompany">Add New Company</button> -->
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
        <th style="border: 1px solid black">Company Name</th>
        
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
          Do you want to delete this Company?
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
              <label for="staticEmail" class="col-sm-4 col-form-label">Company Name</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="company_name" placeholder="Enter Company Name">
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Company Address</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="company_address" placeholder="Enter Company Address">
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
              <label for="inputPassword" class="col-sm-4 col-form-label">Company Registration Number</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="register_no" placeholder="Enter Company Registration Number">
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Company CIN Number</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="cin_no" placeholder="Enter Company CIN Number">
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Select Company Type</label>
              <div class="col-sm-8">
              <select class="form-control" name="company_type">
              <option value="" id="company_type">Select</option>
                <?php if(count($res)): ?>
                <?php foreach($res as $value): ?>
                <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                <?php endforeach; ?>  
                <?php else: ?>
                <?php endif; ?>
              </select>
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


<div id="addcompanymodal" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title" style="color: green;">Add New Company</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
          <form id="myForm1" action="" method="post">
            <input type="hidden" name="txtId" >
              <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Company Name</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="company_name_modal" placeholder="Enter Company Name">
              <?php  echo form_error('company_name_modal');  ?>
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Company Address</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="company_address_modal" placeholder="Enter Company Address">
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
              <label for="inputPassword" class="col-sm-4 col-form-label">Company Registration Number</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="register_no_modal" placeholder="Enter Company Registration Number">
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Company CIN Number</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="cin_no_modal" placeholder="Enter Company CIN Number">
              </div>
              </div>
              <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Select Company Type</label>
              <div class="col-sm-8">
              <select class="form-control" name="company_type_modal">
              <option value="" id="company_type">Select</option>
                <?php if(count($res)): ?>
                <?php foreach($res as $value): ?>
                <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                <?php endforeach; ?>  
                <?php else: ?>
                <?php endif; ?>
              </select>
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
                url: '<?php echo base_url() ?>welcome/fetchcompany',
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
                                    '<td style="border: 1px solid black">'+data[i].company_name+'</td>'+
                                    
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
          url: '<?php echo base_url() ?>ajax/deletecompany',
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
      $('#myModal').find('.modal-title').text('Edit Company');
      $('#myForm').attr('action', '<?php echo base_url() ?>ajax/updatecompany');
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>ajax/editcompany',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data){
          $('input[name=company_name]').val(data.company_name);
          $('input[name=company_address]').val(data.company_address);
          $('input[name=city]').val(data.city);
          $('input[name=pin_code]').val(data.pin_code);
          $('input[name=register_no]').val(data.register_no);
          $('input[name=cin_no]').val(data.cin_no);
          $('select[name=company_type]').val(data.company_type);
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
      var company_name = $('input[name=company_name]');
      var company_address = $('input[name=company_address]');
      var city = $('input[name=city]');
      var pin_code = $('input[name=pin_code]');
      var register_no = $('input[name=register_no]');
      var cin_no = $('input[name=cin_no]');
      var company_type = $('select[name=company_type]');
      var result = '';
      if(company_name.val()==''){
        alert('Company Name Is Required');
        exit;

        // company_name.parent().parent().addClass('has-error');
      }else{
        // company_name.parent().parent().removeClass('has-error');
        result +='1';
      }
      if(company_address.val()==''){
        alert('Company Address Is Required');
        exit;
        // company_address.parent().parent().addClass('has-error');
      }else{
        // company_address.parent().parent().removeClass('has-error');
        result +='2';
      }
        if(city.val()==''){
          alert('City Is Required');
        exit;

        // city.parent().parent().addClass('has-error');
      }else{
        // city.parent().parent().removeClass('has-error');
        result +='3';
      }
        if(pin_code.val()==''){
          alert('Pin Code Is Required');
        exit;


        // pin_code.parent().parent().addClass('has-error');
      }else{
        // pin_code.parent().parent().removeClass('has-error');
        result +='4';
      }
        if(register_no.val()==''){
          alert('Registration Number Is Required');
        exit;


        // register_no.parent().parent().addClass('has-error');   


         
      }else{
        // register_no.parent().parent().removeClass('has-error');
        result +='5';
      }
        if(cin_no.val()==''){
          alert('CIN Number Is Required');
        exit;


        // cin_no.parent().parent().addClass('has-error');
      }else{
        // cin_no.parent().parent().removeClass('has-error');
        result +='6';
      }
        if(company_type.val()==''){
          alert('Pelease Select Company Type');
        exit;


        // company_type.parent().parent().addClass('has-error');
      }else{
        // company_type.parent().parent().removeClass('has-error');
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
              $('.alert-success').html('Company Details updated successfully').fadeIn().delay(4000).fadeOut('slow');
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
      var company_name = $('input[name=company_name_modal]');
      var company_address = $('input[name=company_address_modal]');
      var city = $('input[name=city_modal]');
      var pin_code = $('input[name=pin_code_modal]');
      var register_no = $('input[name=register_no_modal]');
      var cin_no = $('input[name=cin_no_modal]');
      var company_type = $('select[name=company_type_modal]');
      var result = '';
      if(company_name.val()==''){
        alert('Company Name Is Required');
        exit;
      }else{
        result +='1';
      }
      if(company_address.val()==''){
        alert('Company Address Is Required');
        exit;
      }else{
        result +='2';
      }
        if(city.val()==''){
          alert('City Is Required');
        exit;
      }else{
        result +='3';
      }
        if(pin_code.val()==''){
          alert('Pin Code Is Required');
        exit;
      }else{
        result +='4';
      }
        if(register_no.val()==''){
          alert('Registration Number Is Required');
        exit;
      }else{
        // register_no.parent().parent().removeClass('has-error');
        result +='5';
      }
        if(cin_no.val()==''){
          alert('CIN Number Is Required');
        exit;
      }else{
        result +='6';
      }
        if(company_type.val()==''){
          alert('Pelease Select Company Type');
        exit;
      }else{
        result +='7';
      }

if(result=='1234567'){
        $.ajax({
          type: 'ajax',
          method: 'post',
          url: '<?php echo base_url() ?>ajax/addcompany',
          data: data,
          async: false,
          dataType: 'json',
          success: function(response){
              $('#addcompanymodal').modal('hide');
              $('#myForm1')[0].reset();             
              $('.alert-success').html('Company Add successfully').fadeIn().delay(4000).fadeOut('slow');
              showAllEmployee();
            
          },
          error: function(){
            alert('Could not Add Company');
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