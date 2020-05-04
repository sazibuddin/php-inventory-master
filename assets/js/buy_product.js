$(document).on('change', '#p_product_name', function(event) {
	event.preventDefault();
	/* Act on the event */
	$p_product_id = $(this).val();

	$.post('app/ajax/find_product_details.php', {p_product_id : $p_product_id , find_p_details : 'find_p_details'}, function(data) {
    		var  data = JSON.parse(data)
    		$('#p_p_quantity').val(data.quantity);
    		$('#p_p_price').val(data.buy_price);
    		$('#p_p_sell_price').val(data.sell_price);
  	});
});

 function purchase_calculate(p_dis) {
 	var p_discount = p_dis;
 	var p_net_total = 0;
 	var p_dis_amount = p_dis_amount;

  var supliar_prev_total_due = parseInt($('#supliar_prev_total_due').val());
 	var p_set_sub_total = $('#p_subtotal').val();
 	var p_make_discount = (p_set_sub_total/100) * p_discount;



 	$('#p_discount_amount').val(p_make_discount);
  net_total = p_set_sub_total - p_make_discount;

 	net_total = net_total + supliar_prev_total_due;
 	$('#p_netTotal').val(net_total);

 }

 $(document).on('keyup', '#p_pn_quantity', function(event) {
 	event.preventDefault();
 	/* Act on the event */
 	var purchas_quantity = $('#p_pn_quantity').val();
 	var purchas_price = $('#p_p_price').val();
// 
 	var p_sub_total = (purchas_quantity * purchas_price);
 	$('#p_subtotal').val(p_sub_total);
  
 	$('#p_netTotal').val(p_sub_total);
 	purchase_calculate(0);

 });

// $(document).on('keyup', '#p_pn_quantity', function(event) {
//   event.preventDefault();
//   /* Act on the event */
//   var purchas_quantity = $('#p_pn_quantity').val();
//   var purchas_price = $('#p_p_price').val();

  // var supliar_prev_total_due = parseInt($('#supliar_prev_total_due').val());

//   // alert(supliar_prev_total_due);
  
 
//   var p_sub_total = (purchas_quantity * purchas_price);
//   var subtotal = $('#p_subtotal').val(p_sub_total);
//   // var new_nettotal = (p_sub_total + supliar_prev_total_due);

//   alert(new_nettotal);
  
//   // console.log(new_nettotal);
//   $('#p_netTotal').val(new_nettotal);
//   purchase_calculate(0);

//  });

 $(document).on('keyup', '#p_discount', function(event) {
 	event.preventDefault();
 	/* Act on the event */
 	var p_discount = $(this).val();
	purchase_calculate(p_discount);

 });

 //find total previous due for suppliar
$(document).on('change', '#p_supliar', function(event) {
  event.preventDefault();
  /* Act on the event */
  var suppliar_id = $('#p_supliar').val();

   $.ajax({
    url : 'app/ajax/find_suppliar_due.php',
    method : 'POST',
    dataType : 'json',
    data : {getsuppliarTotalDue:1,id:suppliar_id},
    success : function(data){
     $('#supliar_prev_total_due').val(data["total_due"]);
    }
   });
});


 $(document).on('keyup', '#p_discount_amount', function(event) {
 	event.preventDefault();
 	/* Act on the event */
 	var p_discount_amount = $('#p_discount_amount').val();
 	var p_sub_totall = $('#p_subtotal').val();

 	var p_make_dis_amount = p_sub_totall - p_discount_amount;
 	$('#p_netTotal').val(p_make_dis_amount);
});

 $(document).on('keyup', '#p_paidBill', function(event) {
 	event.preventDefault();
 	/* Act on the event */
 	var p_paidBill = $('#p_paidBill').val();
 	var p_d_p_netTotal = $('#p_netTotal').val();
 	var p_dueBill = p_d_p_netTotal - p_paidBill;
  $('#p_dueBill').val(p_dueBill);
 });


 $(document).on('click', '#addByproductBtn', function(event) {
  event.preventDefault();
  /* Act on the event */
  var b_supliarname = $('#p_supliar').val();
  var b_puchar_date = $('#puchar_date').val();
  var b_p_product_name = $('#p_product_name').val();
  var b_p_pn_quantity = $('#p_pn_quantity').val();
  var b_p_p_price = $('#p_p_price').val();
  var b_p_p_sell_price = $('#p_p_sell_price').val();
  var b_p_payMethode = $('#p_payMethode').val();
  var b_p_netTotal = $('#p_netTotal').val();
  var b_p_paidBill = $('#p_paidBill').val();
  var b_p_dueBill = $('#p_dueBill').val();
  
  if (b_supliarname != null && b_puchar_date != '' && b_p_product_name != null && b_p_pn_quantity != '' && b_p_p_price != '' && b_p_p_sell_price != '' && b_p_payMethode != null) {
     if ((b_p_paidBill -0) < (b_p_netTotal -0)) {
      // ajax request for submit 
      $.ajax({
      url : 'app/action/buy_product.php',
      method : 'POST',
      data : $('#addByproductForm').serialize(),
      success : function(data){
        if ($.trim(data) == 'yes') {
          alert('product purchase successfull');
          $("#addByproductForm")[0].reset();
        }else{
          alert(data);
        }
      }
    });
     }else{
      alert('Paid amount should not getter than net total')
     }
  }else{
    alert('Please filled out all required field'); 
  }
   
 });
 $(document).on('click', '#purchaseEditBtn', function(event) {
 	event.preventDefault();
 	/* Act on the event */
  var b_supliarname = $('#p_supliar').val();
  var b_puchar_date = $('#puchar_date').val();
  var b_p_product_name = $('#p_product_name').val();
  var b_p_pn_quantity = $('#p_pn_quantity').val();
  var b_p_p_price = $('#p_p_price').val();
  var b_p_p_sell_price = $('#p_p_sell_price').val();
  var b_p_payMethode = $('#p_payMethode').val();
  

     $.ajax({
      url : 'app/action/edit_purchase.php',
      method : 'POST',
      data : $('#purchaseEditForm').serialize(),
      success : function(data){
       alert(data);
      }
    });
 });


// $('.purchasePaymentBtn').on('click',  function(event) {
//   event.preventDefault();
//   /* Act on the event */

//   console.log('yes');
// });

// catagory edit js 
$("#purchase_payForm").submit(function (event) {
  /* Act on the event */
  event.preventDefault();
  var pay_amount = $('#pay_amount').val();
  var payment_date = $('#payment_date').val();
  var data = $('#purchase_payForm').serialize();
  if (pay_amount > 0) {
    if (payment_date != '') {
    $.ajax({
    type: 'POST',
    url: "app/action/purchase_payment.php",
    data: data,
    success: function(data){
     // alert(data);
     if ($.trim(data) == 'yes') {
      alert('Payment successfull');
       window.location.href="index.php?page=suppliar";
      wind
     }else{
      alert(data);
     }
    }
 });
  }else{
    alert("please select a payment date");
  }
  }else{
    alert("Pay amount must not be less than 0");
  }
});
// sellpay js 
$("#sell_payForm").submit(function (event) {
  /* Act on the event */
  event.preventDefault();
  var spay_amount = $('#spay_amount').val();
  var spay_type = $('#spay_type').val();
  var data = $('#sell_payForm').serialize();
  if (spay_amount > 0) {
    if (spay_type != null) {
    $.ajax({
    type: 'POST',
    url: "app/action/sell_payment.php",
    data: data,
    success: function(data){
     alert(data);
    }
 });
  }else{
    alert("please select a payment type");
  }
  }else{
    alert("Pay amount must not be less than 0");
  }
});



// purchase retun js 

$('#purchaserreturnBtn').on('click', function(event) {
  event.preventDefault();
  /* Act on the event */ 

  var data = $('#purchasereturnForm').serialize();
  var p_p_quantity = parseInt($('#p_p_quantity').val());
  var p_pn_quantity = $('#p_pn_quantity').val();

  var isConfirm = confirm("Are you sure want to refund this ? ");

  if (isConfirm) {
    if (p_pn_quantity > p_p_quantity) {
      alert('Refund quantity not more than purchase quantity');
    }else{
      $.ajax({
    type: 'POST',
    url: "app/action/purchase_return.php",
    data: data,
    success: function(data){
     if ($.trim(data) == 'yes') {
      alert('Product refund successfull');
      location.reload();
     }else{
      alert(data);
     }
    }
 });
    }
  }

});