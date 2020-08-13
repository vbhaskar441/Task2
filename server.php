<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'interviewtask');
  if (!$conn) {
    die('Connection failed ' . mysqli_error($conn));
  }

  if(isset($_POST['save'])){
    $name  = $_POST['name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
  	$City  = $_POST['City'];
  	$sql = "INSERT INTO user (name, Email, Phone, City) VALUES ('{$name}', '{$Email}','{$Phone}','{$City}')";
  	if (mysqli_query($conn, $sql)) {
  	  $Id = mysqli_insert_id($conn);
      $saved_comment = '<tr id="row_'.$Id.'"><td>'.$Id.'</td>
                  <td>'.$name.'</td>
                  <td>'.$Email.'</td>
                  <td>'.$Phone.'</td>
                  <td>'.$City.'</td>
                  <td><span class="delete" data-id="' . $Id . '" >&nbsp;delete&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;<span></span><span class="edit" data-id="' . $Id . '">&nbsp;edit&nbsp;</span></td></tr>';
  	  echo $saved_comment;
  	}else {
  	  echo "Error: ". mysqli_error($conn);
  	}
  	exit();
  }
  // delete comment fromd database
  if (isset($_GET['delete'])) {
  	$Id = $_GET['id'];
  	$sql = "DELETE FROM user WHERE Id=" . $Id;
  	mysqli_query($conn, $sql);
  	exit();
  }
  if (isset($_POST['update'])) {
  	$Id = $_POST['id'];
  	$name  = $_POST['name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $City  = $_POST['City'];
  	$sql = "UPDATE user SET name='{$name}', Email='{$Email}', Phone='{$Phone}', City='{$City}' WHERE id=".$Id;
  	if (mysqli_query($conn, $sql)) {
  		$id = mysqli_insert_id($conn);
  		$saved_comment = '<td>'.$Id.'</td>
                  <td>'.$name.'</td>
                  <td>'.$Email.'</td>
                  <td>'.$Phone.'</td>
                  <td>'.$City.'</td>
                  <td><span class="delete" data-id="' . $Id . '" >&nbsp;delete&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;<span></span><span class="edit" data-id="' . $Id . '">&nbsp;edit&nbsp;</span></td>';
  	  echo $saved_comment;
  	}else {
  	  echo "Error: ". mysqli_error($conn);
  	}
  	exit();
  }

  // Retrieve comments from database
  $sql = "SELECT * FROM user";
  $result = mysqli_query($conn, $sql);
  $comments = '<div id="display_area">'; 
  while ($row = mysqli_fetch_array($result)) {
  	$comments .= '<tr id="row_'.$row['Id'].'"><td>'.$row['Id'].'</td>
                  <td>'.$row['name'].'</td>
                  <td>'.$row['Email'].'</td>
                  <td>'.$row['Phone'].'</td>
                  <td>'.$row['City'].'</td>
                  <td><span class="delete" data-id="' . $row['Id'] . '" >&nbsp;delete&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;<span></span><span class="edit" data-id="' . $row['Id'] . '">&nbsp;edit&nbsp;</span></td></tr>';
  }
  $comments .= '</div>';
?>