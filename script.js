$(document).ready(function(){
  // save comment to database
  $(document).on('click', '#submit_btn', function(){
    var name  = $('#name').val();
    var Email = $('#Email').val();
    var Phone = $('#Phone').val();
    var City  = $('#City').val();

    $.ajax({
      url: 'server.php',
      type: 'POST',
      data: {
        'save': 1,
        'name': name,
        'Email': Email,
        'Phone': Phone,
        'City': City,
      },
      success: function(response){
       // console.log(response);
        $('#name').val('');
        $('#Email').val('');
        $('#Phone').val('');
        $('#City').val('');
         $('#edit_id').val('');
        $('#tbody1').append(response);
      }
    });
  });
  // delete from database
  $(document).on('click', '.delete', function(){
  	var id = $(this).data('id');
  	$clicked_btn = $(this);
  	$.ajax({
  	  url: 'server.php',
  	  type: 'GET',
  	  data: {
    	'delete': 1,
    	'id': id,
      },
      success: function(response){
        // remove the deleted comment
        $('#row_'+id).remove();
        $('#name').val('');
        $('#Email').val('');
        $('#Phone').val('');
        $('#City').val('');
         $('#edit_id').val('');
      }
  	});
  });
  
  $(document).on('click', '.edit', function(){
  	var edit_id = $(this).data('id');
    //console.log(edit_id);
  	var row =  $('#row_'+edit_id);

    var name = row.find('td:eq(1)').text(); 
    var Email = row.find('td:eq(2)').text(); 
    var Phone = row.find('td:eq(3)').text(); 
    var City = row.find('td:eq(4)').text(); 
    //console.log(name+'--'+Email+'---'+Phone+'--'+City);

  	// grab the comment to be editted
  
  	// place comment in form
    $('#curd_form').css('display','block');
  	$('#name').val(name);
    $('#Email').val(Email);
    $('#Phone').val(Phone);
    $('#City').val(City);
    $('#edit_id').val(edit_id);
  	$('#submit_btn').hide();
  	$('#update_btn').show();
  });
  $(document).on('click', '#update_btn', function(){
  	var id = $('#edit_id').val();
  	var name  = $('#name').val();
    var Email = $('#Email').val();
    var Phone = $('#Phone').val();
    var City  = $('#City').val();
  	$.ajax({
      url: 'server.php',
      type: 'POST',
      data: {
      	'update': 1,
      	'id': id,
      	'name': name,
      	'Email': Email,
        'Phone': Phone,
        'City': City,
      },
      success: function(response){
      	$('#name').val('');
        $('#Email').val('');
        $('#Phone').val('');
        $('#City').val('');
        $('#edit_id').val('');
      	$('#submit_btn').show();
      	$('#update_btn').hide();
      	$('#row_'+id).html(response);
        $('#curd_form').css('display','none');
      }
  	});		
  });
});