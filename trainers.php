<?php
    require('includes/header.php');
?>
<link rel = "stylesheet" type = "text/css" href = "/gym_management/assets/css/style2.css">

<script type = "text/javascript">
  $(document).ready(function () {
    $('#Trainers').addClass('active');
  });
</script>


<div  style = "width: 100%; height: 50%;">
    <img src = "/gym_management/assets/images/3.jpg" alt = "Los Angeles" style = "width: 100%; height: 100%;">
</div>
<h1 align="center">Meet Our Trainers</h1><hr>

<?php
  require('./includes/db.php');
  $details = "SELECT fname, email, specialization from members m  JOIN trainer t where m.username = t.username";

  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $details);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $count =  mysqli_num_rows($result);
  mysqli_stmt_close($stmt);
?>

<div  style = "width: 100%; overflow-x:auto;">
  <table>
    <tr>
      <th>Name</th>
      <th>Specialization</th>
      <th>Email</th>
    </tr>
    <?php
      while( $count > 0 ){
        $row = mysqli_fetch_array( $result, MYSQLI_NUM);
        echo "
          <tr>
            <td>{$row[0]}</td>
            <td>{$row[2]}</td>
            <td>{$row[1]}</td>
          </tr>\n";
        $count--;
      }
    ?>
  </table>
</div>
