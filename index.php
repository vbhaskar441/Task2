<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Insert and Retrieve data from MySQL database with ajax</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="wrapper">
  	<form class="comment_form" id="curd_form" style="display:none">
      <div>
        <label for="name">Name:</label>
      	<input type="text" name="name" id="name">
      </div>
      <div>
      	<label for="Email">Email:</label>
      	<input type="text" name="Email" id="Email">
      </div>
      <div>
      	<label for="Phone">Phone:</label>
      	<input type="text" name="Phone" id="Phone">
      </div>
      <div>
      	<label for="City">City:</label>
      	<input type="text" name="City" id="City">
      </div>
      <input type="hidden" name="edit_id" id="edit_id">
      <button type="button" id="submit_btn">POST</button>
      <button type="button" id="update_btn" style="display: none;">UPDATE</button>
  	</form>
  	<table border='1' cellpadding="0" >
  		<thead>
  			<tr>
  				<th colspan='6' align="left"><input type='button' value='ADD' onclick='document.getElementById("curd_form").style.display = "block"' /></th>
  			</tr>
  			<tr>
  				<th width='5%'>ID</th>
  				<th width='25%'>name</th>
  				<th width='25%'>Email</th>
  				<th width='15%'>Phone</th>
  				<th width='10%'>City</th>
  				<th width='20%'>Actions</th>
  			</tr>
  		</thead>
  		<tbody id="tbody1">
  			<?php echo $comments; ?>
  		<tbody>
  	</table>
  	
  	
  </div>
</body>
</html>
<!-- Add JQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="script.js"></script>