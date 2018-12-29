<?php include('header.php'); ?>

   <div class="container">
     <div class="row">
      <div class="col-md-12 text-center" style="margin-bottom: 50px;"><h4>Supplier Details</h4></div><br>

      <div class="col-md-6">
        
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-3">
         <a href="<?= base_url('welcome/exportsupplier'); ?>" class="btn  btn-warning">Download In Excel</a>
      </div>
      <br><br>
      <br><br>

      <div class="col-md-4">
        
      </div>
        <div class="col-md-8" style="margin-bottom: 30px;">
        <input id="myInput" type="text" name="myInput" placeholder="Search.." class="form-control col-md-12">
      </div><br>
      <br>
       <div class="col-md-12 table-responsive-md" >
        <table class="table table-striped " style="background-color: #efef88;" >
    <thead>
      <tr style="border: 1px solid black">
        <th style="border: 1px solid black">Sr  No.</th>        
        <th style="border: 1px solid black">Supplier Name</th>
        <th style="border: 1px solid black">Company Name</th>
        <th style="border: 1px solid black">Address</th>
        <th style="border: 1px solid black">City</th>
        <th style="border: 1px solid black">Pincode</th>
        <th style="border: 1px solid black">Mobile No.</th>
        <th style="border: 1px solid black">Email Id</th>
       
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

<?php include('footer.php'); ?>



 <script>
    $(function(){ 
        showAllEmployee();


            //function
        function showAllEmployee(){
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>ajax/supplier_Details',
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
                                    '<td style="border: 1px solid black">'+data[i].company_name+'</td>'+
                                    '<td style="border: 1px solid black">'+data[i].suppiler_address+'</td>'+
                                    '<td style="border: 1px solid black">'+data[i].city+'</td>'+
                                    '<td style="border: 1px solid black">'+data[i].pin_code+'</td>'+
                                    '<td style="border: 1px solid black">'+data[i].mobile_no+'</td>'+
                                    '<td style="border: 1px solid black">'+data[i].email+'</td>'+
                                    // '<td>'+
                                    //     '<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Edit</a>'+
                                    //     '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'">Delete</a>'+
                                    // '</td>'+
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