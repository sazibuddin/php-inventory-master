

  // member  data ajax js 
 $('#empTable').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'app/ajax/member_data.php',
          // "type" : "POST"
      },
      'columns': [
         { data: 'member_id' },
         { data: 'name' },
         { data: 'company' },
         { data: 'address' },
         { data: 'con_num' },
         { data: 'total_buy' },
         { data: 'total_paid' },
         { data: 'total_due' },
         { data: 'action' },
      ]
   });
// end member data ajax js 
  // member  data ajax js 
 $('#suppliarTable').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'app/ajax/suppliar_data.php',
          // "type" : "POST"
      },
      'columns': [
         { data: 'suppliar_id' },
         { data: 'name' },
         { data: 'company' },
         { data: 'address' },
         { data: 'con_num' },
         { data: 'total_buy' },
         { data: 'total_paid' },
         { data: 'total_due' },
         { data: 'action' },
      ]
   });
// end member data ajax js 

  // staff  data ajax js 
 $('#staffTable').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'app/ajax/staff_data.php',
          // "type" : "POST"
      },
      'columns': [
         { data: 'id' },
         { data: 'name' },
         { data: 'designation' },
         { data: 'con_no' },
         { data: 'email' },
         { data: 'address' },
         { data: 'action' },
      ]
   });
// end staff data ajax js 



// catagory add jquery 
  $("#addCatForm").submit(function (event) {
    /* Act on the event */
    event.preventDefault();
    var data = $('#addCatForm').serialize();
    $.ajax({
      type: 'POST',
      url: "app/action/add_catagory.php",
      data: data,
      success: function(data){
        if ($.trim(data) == 'yes') {
          alert('Catagory added successfull');
          location.reload();
        }
      }
    });
  });

// catagory data ajax  
   $('#catagoryTable').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'app/ajax/catagory_data.php',
          // "type" : "POST"
      },
      'columns': [
         { data: 'id' },
         { data: 'name' },
         { data: 'description' },
         { data: 'action' },
      ]
   });
//end of Member ajax js 

// catagory data ajax js 
   $('#ex_catagoryTable').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'app/ajax/ex_catagory_data.php',
          // "type" : "POST"
      },
      'columns': [
         { data: 'id' },
         { data: 'name' },
         { data: 'description' },
         { data: 'action' },
      ]
   });
//end of Member ajax js 

// product add jquery 
  $("#addProduct").submit(function (event) {
    /* Act on the event */
    event.preventDefault();
    var product_name = $('#product_name').val();
    var brand = $('#brand').val();
    var p_catagory = $('#p_catagory').val();
    if (product_name != '' && brand != '' && p_catagory != null) {
       var data = $('#addProduct').serialize();
      $.ajax({
        type: 'POST',
        url: "app/action/add_product.php",
        data: data,
        success: function(data){
          if ($.trim(data) == 'yes') {
            $('.addProductError-area').show();
            $('#addProductError').html('Product added successfull');
            $("#addProduct")[0].reset();
          }else{
             $('.addProductError-area').show();
          $('#addProductError').html(data);
        }
        }
      });
    }else{
        $('.addProductError-area').show();
          $('#addProductError').html('pleasse filled out all required filled');
    }
   
  });

// product data ajax js 
   $('#productTable').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'app/ajax/product_data.php',
          // "type" : "POST"
      },
      'columns': [
         { data: 'product_id' },
         { data: 'product_name' },
         { data: 'brand_name' },
         { data: 'catagory_name' },
         { data: 'product_source' },
         { data: 'quantity' },
         { data: 'buy_price' },
         { data: 'sell_price' },
         { data: 'action' }
      ]
   });

//factory product data ajax js 
   $('#otherProductTable').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'app/ajax/factoryProduct_data.php',
          // "type" : "POST"
      },
      'columns': [
         { data: 'id' },
         { data: 'product_id' },
         { data: 'product_name' },
         { data: 'brand_name' },
         { data: 'catagory_name' },
         { data: 'quantity' },
         { data: 'product_expense' },
         { data: 'sell_price' },
         { data: 'action' }
      ]
   });

   // purchase table ajax js 
   // product data ajax js 
   $('#purchaseTable').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'app/ajax/purchase_data.php',
          // "type" : "POST"
      },
      'columns': [
         { data: 'id' },
         { data: 'product_name' },
         { data: 'purchase_date' },
         { data: 'purchase_quantity' },
         { data: 'purchase_price' },
         { data: 'purchase_sell_price' },
         { data: 'purchase_net_total' },
         { data: 'purchase_due_bill' },
         { data: 'return_status' },
         { data: 'action' }
      ]
   });
   // purchase return ajax js 
   $('#purchasereturnTable').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'app/ajax/purchase_return_data.php',
          // "type" : "POST"
      },
      'columns': [
         { data: 'id' },
         { data: 'sell_id' },
         { data: 'suppliar_name' },
         { data: 'return_date' },
         { data: 'product_name' },
         { data: 'return_quantity' },
         { data: 'subtotal' },
         { data: 'discount' },
         { data: 'netTotal' }
      ]
   });


   // product sell data ajax js 
   $('#sellTable').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'app/ajax/sell_data.php',
          // "type" : "POST"
      },
      'columns': [
         { data: 'id' },
         { data: 'customer_name' },
         { data: 'order_date' },
         { data: 'sub_total' },
         { data: 'prev_due' },
         { data: 'net_total' },
         { data: 'paid_amount' },
         { data: 'due_amount' },
         { data: 'return_status' },
         { data: 'payment_type' },
         { data: 'action' },
      ]
   });
   // product sell data ajax js 
   $('#sell_returnList').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'app/ajax/sell_return_data.php',
          // "type" : "POST"
      },
      'columns': [
         { data: 'id' },
         { data: 'customer_name' },
         { data: 'invoice_id' },
         { data: 'return_date' },
         { data: 'amount' },
      ]
   });

// product 

  // expense  data ajax js 
   $('#expenseList').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'app/ajax/expense_data.php',
          // "type" : "POST"
      },
      'columns': [
         { data: 'id' },
         { data: 'ex_date' },
         { data: 'expense_for' },
         { data: 'amount' },
         { data: 'expense_cat' },
         { data: 'ex_description' },
         { data: 'action' }
      ]
   });



// sell option js 
$(document).ready(function() {
  addNewRow();
$('#addNewRowBtn').on('click', function(event) {
  event.preventDefault();
  /* Act on the event */
  addNewRow();
});

  function addNewRow() {
    $.ajax({
      url : "app/ajax/addNewRow.php",
      method : "POST", 
      data : {getOrderItem:1},
      success : function(data){

        $('#invoiceItem').append(data);
        $(".select2").select2();
        var n = 0;
        $('.si_number').each(function() {
          $(this).html(++n);
        });
      }
    })
  }

  $(document).on('click', '.cancelThisItem', function(event) {
    event.preventDefault();
    /* Act on the event */
    $(this).parent().parent().remove();
    invoice_calculate(0);
  });

  $(document).on('change', '.pid', function(event) {
    event.preventDefault();
   var pid = $(this).val();
   var tr = $(this).parent().parent();
   $.ajax({
    url : 'app/ajax/single_sell_item.php',
    method : 'POST',
    dataType : 'json',
    data : {getSellSingleInfo:1,id:pid},
    success : function(data){
     tr.find('.qaty').val(data["quantity"]);
     tr.find('.oqty').val(1);
     tr.find('.price').val(data["sell_price"]);
     tr.find('.pro_name').val(data["product_name"]);
     tr.find('.tprice').val(tr.find('.oqty').val() * tr.find('.price').val());
     invoice_calculate(0);
    }
   });
  });
 $(document).on('keyup', '.oqty', function(event) {
  var qty = $(this);
  var tr = $(this).parent().parent();
  if ((qty.val() - 0) > (tr.find('.qaty').val() - 0)) {
    alert('please enter a valid quantity');
  }else{
    tr.find('.tprice').val(tr.find('.oqty').val() * tr.find('.price').val());
    invoice_calculate(0);
  }
 });

 //find total previous due
$(document).on('change', '#customer_name', function(event) {
  event.preventDefault();
  /* Act on the event */
  var customer_id = $('#customer_name').val();

   $.ajax({
    url : 'app/ajax/find_customer_due.php',
    method : 'POST',
    dataType : 'json',
    data : {getcusTotalDue:1,id:customer_id},
    success : function(data){
     $('#prev_due').val(data["total_due"]);
    }
   });

});
 // calculate function 
 function invoice_calculate(dis) {
  var set_sub_total = 0;
  var net_total = 0;
  var previous_due = parseInt($('#prev_due').val());
  var discount = dis;

  $('.tprice').each(function() {   
     set_sub_total = set_sub_total + ($(this).val() * 1);
     $('#netTotal').val(net_total);
  });
  var make_discount = (set_sub_total/100) * discount;
  $('#s_discount_amount').val(make_discount);
  net_total = set_sub_total - make_discount;
  net_total = (net_total + previous_due);

  $('#subtotal').val(set_sub_total);
  $('#netTotal').val(net_total);
 }
// discount calaulation js 
$('#discount').on('keyup', function(event) {
  event.preventDefault();
  /* Act on the event */
  var discount = $(this).val();
  invoice_calculate(discount);
});

$(document).on('keyup', '.price', function(event) {
  event.preventDefault();
  /* Act on the event */
   var tr = $(this).parent().parent();
  var new_price = $(this).val();
  var new_res = tr.find('.tprice').val(new_price);
  invoice_calculate(0);
});

 $(document).on('keyup', '#s_discount_amount', function(event) {
  event.preventDefault();
  /* Act on the event */
  var s_discount_amount = $('#s_discount_amount').val();
  var subtotal = $('#subtotal').val();

  var p_make_dis_amount = subtotal - s_discount_amount;
  $('#netTotal').val(p_make_dis_amount);
});

// paid and due bill calaulation
  $('#paidBill').on('keyup', function(event) {
    event.preventDefault();
    /* Act on the event */
    var paid_bill = $(this).val();
    var due_bill = $('#netTotal').val() - paid_bill;
    $('#dueBill').val(due_bill);

  });

  // creating order js 

  $('#sellBtn').on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    var invoice =  $('#sellForm').serialize();
    var customer_name = $('#customer_name').val();
    var payMethode = $('#payMethode').val();
    if (customer_name != null && payMethode != null) {
      $.ajax({
        url : 'app/action/sell.php',
        method : 'POST',
        data : $('#sellForm').serialize(),
        success : function(data){
          var get_data = data;
          if (isNaN(get_data) != true ) {
              // window.location.href="app/invoice/sell_invoice_pdf.php?"+invoice;
              window.location.href="index.php?page=view_sell&&view_id="+get_data;
           }else{
            alert('Failed to make sell. please try again.');
          }
        }
      });
    }else{
      alert('You missed some required field');
    }
 
  });


});


// sell edit js 

$(document).on('click', '#editSellBtn', function(event) {
  event.preventDefault();
  /* Act on the event */
  var isConfirm = confirm("Are You sure want to edit this sell");
   var payMethode = $('#payMethode').val();
    
  if (isConfirm) {
    if (payMethode != null) {
    // ajax request send 
    $.ajax({
        url : 'app/action/edit_sell.php',
        method : 'POST',
        data : $('#editSellForm').serialize(),
        success : function(data){
          var get_data = data;
          if (isNaN(get_data) != true ) {
              window.location.href="index.php?page=view_sell&&view_id="+get_data;
           }else{
            alert(data);
          }
        }
      });
    }else{
      alert('please select a payment methode');
    }
  }else{
    alert('Your data are save');
  }
});                                                                                                                                                     

//end of sell option js 





// report table ajax
// customer blance report  data ajax js 
   $('#customer_blance_report_data').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'app/ajax/customer_blance_report_data.php',
          // "type" : "POST"
      },
      'columns': [
         { data: 'member_id' },
         { data: 'member_name' },
         { data: 'company' },
         { data: 'phone_number' },
         { data: 'cus_total_transaction' },
         { data: 'cus_paid_total' },
         { data: 'cus_due_toal' }
      ]
   });
   // suppliar blance report  data ajax js 
   $('#suppliar_blance_report_data').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'app/ajax/suppliar_blance_report_data.php',
          // "type" : "POST"
      },
      'columns': [
         { data: 'supplier_id' },
         { data: 'supplier_name' },
         { data: 'company' },
         { data: 'phone_number' },
         { data: 'net_total' },
         { data: 'paid_bill' },
         { data: 'due_bill' }
      ]
   });

// sell return js 

$(document).on('keyup', '.returnQty', function(event) {
  var rqty = $(this);
  var tr = $(this).parent().parent();
  if ((rqty.val() - 0) > (tr.find('.orderQty').val() - 0)) {
    alert('Return quantity must not getter than order quantity');
  }
 });

$('#returnSellBtn').on('click', function(event) {
  event.preventDefault();
  /* Act on the event */
   var orderQty = $('.orderQty').val(); 
   var returnQty = $('.returnQty').val(); 
   var isConfirm = confirm("Are You sure want to edit this sell");
  if (isConfirm) {
    // ajax request send 
    $.ajax({
        url : 'app/action/sell_return.php',
        method : 'POST',
        data : $('#returnSell').serialize(),
        success : function(data){
         
         if ($.trim(data) == 'yes') {
          alert('Product return successfull');
         }else{
          alet(data);
         }
        }
      });
  }else{
    alert('Your data are save');
  }

});

  function editAddNewRow() {
    $.ajax({
      url : "app/ajax/addNewRow.php",
      method : "POST", 
      data : {getOrderItem:1},
      success : function(data){

        $('#editInvoiceItem').append(data);
        $(".select2").select2();
        var n = 0;
        $('.si_number').each(function() {
          $(this).html(++n);
        });
      }
    })
  }

$('#EditaddNewRowBtn').on('click', function(event) {
  event.preventDefault();
  /* Act on the event */
  editAddNewRow();
});