<?php include('header.php'); ?>

<div class="container">
  <div class="row">
    <div class="alert alert-success col-md-12" style="display: none;" >
        


      </div>
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <center><h1>Medicine Consumed Section</h1></center>
      <br>
      <br>
     
      <form  id="myForm" action="" method="post"> 
      <!-- <button class="btn btn-success" name="add" id="add">Add</button> --> 
      <br>
      <br>
    
    <table class="table" id="dynamic_field">
       <tr>  
           <td>Medicine Name
           <select class="form-control" name="trade_name" id="trade_name">
  <option value="">Select Medicine</option>        
          <?php if(count($res)): ?>
            <?php foreach($res as $value): ?>
              <option value="<?php echo $value->trade_name; ?>"><?php echo $value->trade_name; ?></option>
          <?php endforeach; ?>  
        <?php else: ?>
        <?php endif; ?>
</select>
           </td>
           <td id="supplier_name"></td> 
           <td>Quantity<input type="number" name="quantity" id="number" placeholder="no of item" class="form-control name_list" /></td> 
           <td style="display: none;" id="show">Total Price<br><input type="number" name="price" class="form-control name_list" id="price" value="" readonly="" ></td>
           
    </tr> 
      
    </table>
  
</div>
    <div class="col-md-10"></div>
    <div class="col-md-2">
      <button class="btn btn-success" id="btnSave">Submit</button> 
    </div>

</form>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>
<?php include('footer.php'); ?>


<script>
  $(document).ready(function(){
   

      value();
      value1(); 

      
    function value(){
         $(document).on("keyup change blur"," #trade_name",function(){
   
        // $('#trade_name').change(function(){
          var val=null;
        var trade_name = $('#trade_name').val();
          $('#number').val(val);
          $('#price').val(val);
            
          
        // alert(trade_name);
         if(trade_name != '')
            {
            $.ajax({                
                url: '<?php echo base_url() ?>ajax/medicine_fetch_order_all',
                method:"POST",
                data:{trade_name:trade_name},              
                success: function(data){
                   $('#supplier_name').html(data); 
                    
                               
               },
                
                error: function(){
                    alert('Could not get Data from Database');
                }

            });

          }

        });

        }


       function value1(){
          //$('#number').keyup(function(){
             
            $(document).on("keyup mouseleave blur"," #number",function(){
           var rate = $('#rate').val();
            var number = $('#number').val();
           
            var stock = $('#stock').val();
             var result = '';
           
             var price=rate*number;
            
            if(number != '')
            {
             
             var price=rate*number;
             
              $('#show').show();
              $('#price').val(price);
               
            }else{
              $('#price').val(null);
            }
 
});
          }

       


      

         
  });

</script>

<script>
        $(document).ready(function(){
         

        
          
            


          $('#btnSave').click(function(){
      
      var data = $('#myForm').serialize();
     
   
      var trade_name = $('input[name=trade_name]');
      var quantity = $('input[name=quantity]');
      var rate = $('input[name=rate]');
      var price = $('input[name=price]');
      var stock = parseInt($('#stock').val());
      var number = parseInt($('#number').val());
     var name = $('#trade_name').val();
      var result = '';

     
        if(trade_name.val()==''){
          alert('Trade name is Empty');

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
        if(quantity.val()==''){
          alert('Quantity Is Empty');
        exit;
      }else{      
        result +='3';
      }
      if(price.val()==''){
          alert('Price is Empty');
        exit;
      }else{      
        result +='4';
      } 
      if(number>stock){
              alert(name +' only '+stock+' item available in your stock');
              exit;
            }else{
        result +='5';
      }
      

      if(result=='12345'){
        $.ajax({
          // type: 'ajax',
          method: "POST",
          url: '<?php echo base_url() ?>ajax/medicine_fetch_order_in',
          data: data,
          async: false,
          dataType: 'json',
          success: function(response){
            alert('Medicine Consumed SuccessFully');
            // $('#myForm')[0].reset();
            // $('.alert-success').show();             
            // $('.alert-success').html('Medicine Consumed  successfully').fadeIn().delay(100000).fadeOut('slow');
              // value();
            
          },
          error: function(){
            alert('Could not Consumed In');
          }
        });
      }
    });
      });
    </script>