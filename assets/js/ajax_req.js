// catagory edit js 
$("#editCatForm").submit(function (event) {
  /* Act on the event */
  event.preventDefault();
  var data = $('#editCatForm').serialize();
  $.ajax({
    type: 'POST',
    url: "app/action/edit_cat.php",
    data: data,
    success: function(data){
     // $('.memberFormError').css('display', 'block');;
     // $('#memberFormError').html(data);
     alert(data);
    }
 });
});

// catagory delete content js 
$(document).on('click', '#catagoryDelete_btn', function(event) {
event.preventDefault();
/* Act on the event */
  $delete_id = $(this).data('id');
  var confirm_delete = confirm("Are You sure want to delete this item?")
  if (confirm_delete) {
  $.post('app/action/delete_cat.php', {delete_id : $delete_id , delete_data : 'delete_data'}, function(data) {
    if ($.trim(data) == 'true') {
      alert('data deleted successfull');
       location.reload();  
    }else{
      alert('faild to delete data');
    }
  });
  } 
});


// memeber all ajax request script
// memeber add 
  $("#adMemberForm").submit(function (event) {
    /* Act on the event */
    event.preventDefault();
    var data = $('#adMemberForm').serialize();
    $.ajax({
      type: 'POST',
      url: "app/action/add_member.php",
      data: data,
      success: function(data){
      if ($.trim(data) == 'yes') {
        alert("member added successfully");
            location.reload();
      }else{
        alert(data);
       
      }
      }

    });
  });
// member edit
$("#editMemberForm").submit(function (event) {
  /* Act on the event */
  event.preventDefault();
  var data = $('#editMemberForm').serialize();
   var isConfirm = confirm("Are You sure want to edit data");
   if (isConfirm) {
      $.ajax({
    type: 'POST',
    url: "app/action/edit_member.php",
    data: data,
    success: function(data){
     // $('.memberFormError').css('display', 'block');;
     // $('#memberFormError').html(data);
     alert(data);
    }
  });
   }else{
    alert('your data are save');
   }
});

// member delete  js 
$(document).on('click', '#memberDelete_btn', function(event) {
event.preventDefault();
/* Act on the event */
  $delete_id = $(this).data('id');
  var confirm_delete = confirm("Are You sure want to delete this item?")
  if (confirm_delete) {
  $.post('app/action/delete_member.php', {delete_id : $delete_id , delete_data : 'delete_data'}, function(data) {
    if (data == 'true') {
      alert('data deleted successfull');
       location.reload();  
    }else{
      alert(data);
    }
  });
  } 
});

// suppliar ajax request 
$("#adsuppliarForm").submit(function (event) {
    /* Act on the event */
    event.preventDefault();
    var data = $('#adsuppliarForm').serialize();
    $.ajax({
      type: 'POST',
      url: "app/action/add_suppliar.php",
      data: data,
      success: function(data){
        if ($.trim(data) == 'yes') {
          alert('suppliar added successfully.')
          location.reload();  
        }else{
          alert(data);
        }
        
      }
    });
  });

// suppliar ajax request 
$("#editSuppliarForm").submit(function (event) {
    /* Act on the event */
    event.preventDefault();
    var data = $('#editSuppliarForm').serialize();
    $.ajax({
      type: 'POST',
      url: "app/action/edit_suppliar.php",
      data: data,
      success: function(data){
       // $('.memberFormError').css('display', 'block');;
       // $('#memberFormError').html(data);
       alert(data);
      }
    });
  });
// suuppliar delete js 
// member delete  js 
$(document).on('click', '#suppliarDelete_btn', function(event) {
event.preventDefault();
/* Act on the event */
  $delete_id = $(this).data('id');
  var confirm_delete = confirm("Are You sure want to delete this item?")
  if (confirm_delete) {
  $.post('app/action/delete_suppliar.php', {delete_id : $delete_id , delete_data : 'delete_data'}, function(data) {
    if (data == 'true') {
      alert('data deleted successfull');
      location.reload();  
    }else{
      alert(data);
    }
  });
  } 
});

// product delete  js 
$(document).on('click', '#productDelete_btn', function(event) {
event.preventDefault();
/* Act on the event */
  $delete_id = $(this).data('id');
  var confirm_delete = confirm("Are You sure want to delete this item?")
  if (confirm_delete) {
  $.post('app/action/delete_product.php', {delete_id : $delete_id , delete_data : 'delete_data'}, function(data) {
    if (data == 'true') {
      alert('data deleted successfull');
       location.reload();  
    }else{
      alert(data);
    }
  });
  } 
});
// expense catagory delete  js 
$(document).on('click', '#ex_catagoryDelete_btn', function(event) {
event.preventDefault();
/* Act on the event */
  $delete_id = $(this).data('id');
  var confirm_delete = confirm("Are You sure want to delete this item?")
  if (confirm_delete) {
  $.post('app/action/delete_exCaragroy.php', {delete_id : $delete_id , delete_data : 'delete_data'}, function(data) {
    if (data == 'true') {
      alert('data deleted successfull');
       location.reload();  
    }else{
      alert(data);
    }
  });
  } 
});
// expense  delete  js 
$(document).on('click', '#expenseDelete_btn', function(event) {
event.preventDefault();
/* Act on the event */
  $delete_id = $(this).data('id');
  var confirm_delete = confirm("Are You sure want to delete this item?")
  if (confirm_delete) {
  $.post('app/action/delete_expense.php', {delete_id : $delete_id , delete_data : 'delete_data'}, function(data) {
    if (data == 'true') {
      alert('data deleted successfull');
       location.reload();  
    }else{
      alert(data);
    }
  });
  } 
});


// product edit
$("#editProduct").submit(function (event) {
  /* Act on the event */
  event.preventDefault();
  var data = $('#editProduct').serialize();
   var isConfirm = confirm("Are You sure want to edit data");
   if (isConfirm) {
      $.ajax({
    type: 'POST',
    url: "app/action/edit_product.php",
    data: data,
    success: function(data){
     alert(data);
    }
  });
   }else{
    alert('your data are save');
   }
});



// add expensecatagory
// product edit
$("#addexpenseCat").submit(function (event) {
  /* Act on the event */
  event.preventDefault();
  var data = $('#addexpenseCat').serialize();
    $.ajax({
    type: 'POST',
    url: "app/action/addexpense_cat.php",
    data: data,
    success: function(data){
     if ($.trim(data) == 'yes') {
      alert('Expense catagory added successfylly');
       location.reload();  
     }else{
      alert(data);
     }
    }
  });
});









// expense add 
  $("#addExpenseForm").submit(function (event) {
    /* Act on the event */
    event.preventDefault();
    var data = $('#addExpenseForm').serialize();
    $.ajax({
      type: 'POST',
      url: "app/action/add_expense.php",
      data: data,
      success: function(data){
        alert(data);
      }
    });
  });

// edit expense  
  $("#editExpenseForm").submit(function (event) {
    /* Act on the event */
    event.preventDefault();
    var data = $('#editExpenseForm').serialize();
    $.ajax({
      type: 'POST',
      url: "app/action/edit_expense.php",
      data: data,
      success: function(data){
        alert(data);
      }
    });
  });





// staff add ajax  
  $("#adstaffForm").submit(function (event) {
    /* Act on the event */
    event.preventDefault();
    var data = $('#adstaffForm').serialize();
    $.ajax({
      type: 'POST',
      url: "app/action/add_staff.php",
      data: data,
      success: function(data){
        if ($.trim(data) == 'yes') {
          alert('Staff added successfully');
         $("#adstaffForm")[0].reset();
        }else{
          alert(data);
        }
      }
    });
  });
// staff update ajax  
  $("#editstaffForm").submit(function (event) {
    /* Act on the event */
    event.preventDefault();
    var data = $('#editstaffForm').serialize();
    $.ajax({
      type: 'POST',
      url: "app/action/edit_staff.php",
      data: data,
      success: function(data){
        alert(data);
      }
    });
  });
// user update ajax  
  $("#update_userForm").submit(function (event) {
    /* Act on the event */
    event.preventDefault();
    var data = $('#update_userForm').serialize();
    $.ajax({
      type: 'POST',
      url: "app/action/edit_update.php",
      data: data,
      success: function(data){
        if ($.trim(data) == 'yes') {
          window.location.href = "app/action/logout.php"
        }else{
          alert(data);
        }
      }
    });
  });

  // staff delete content js 
$(document).on('click', '#staff_delete_btn', function(event) {
event.preventDefault();
/* Act on the event */
  $delete_id = $(this).data('id');
  var confirm_delete = confirm("Are You sure want to delete this item?")
  if (confirm_delete) {
  $.post('app/action/delete_staff.php', {delete_id : $delete_id , delete_data : 'delete_data'}, function(data) {
    if ($.trim(data) == 'true') {
      alert('data deleted successfull');
       location.reload();  
    }else{
      alert('faild to delete data');
    }
  });
  } 
});


// send sms ajax request
  $("#sendSmsForm").submit(function (event) {
    /* Act on the event */
    event.preventDefault();
    var sms_number = $('#sms_number').val();
    var sms_message = $('#sms_message').val();
    var data = $('#sendSmsForm').serialize();

    if (sms_number != '' && sms_message != '') {
       $.ajax({
        type: 'POST',
        url: "app/action/send_sms.php",
        data: data,
        success: function(data){
          alert(data);
        }
      });
    }else{
      alert('All field must be filled out');
    }
  });



  // FactoryProduct js 
  //Add FactoryProduct js 
    $("#addFactoryProduct").submit(function (event) {
    /* Act on the event */
    event.preventDefault();
    var data = $('#addFactoryProduct').serialize();
    $.ajax({
      type: 'POST',
      url: "app/action/add_factoryProduct.php",
      data: data,
      success: function(data){
        alert(data);
      }
    });
  });

//factory product edit
$("#editFactoryProduct").submit(function (event) {
  /* Act on the event */
  event.preventDefault();
  var data = $('#editFactoryProduct').serialize();
   var isConfirm = confirm("Are You sure want to edit data");
   if (isConfirm) {
      $.ajax({
    type: 'POST',
    url: "app/action/edit_factoryProduct.php",
    data: data,
    success: function(data){
     alert(data);
    }
  });
   }else{
    alert('your data are save');
   }
});
// factory product delete content js 
$(document).on('click', '#factoryProductDelete_btn', function(event) {
event.preventDefault();
/* Act on the event */
  $delete_id = $(this).data('id');
  var confirm_delete = confirm("Are You sure want to delete this item?")
  if (confirm_delete) {
  $.post('app/action/delete_factoryProduct.php', {delete_id : $delete_id , delete_data : 'delete_data'}, function(data) {
    if ($.trim(data) == 'true') {
      alert('data deleted successfull');
       location.reload();  
    }else{
      alert('faild to delete data');
    }
  });
  } 
});