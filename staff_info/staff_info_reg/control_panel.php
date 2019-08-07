<!DOCTYPE html>
<html>
  
<head>
  <meta charset="utf-8">
  <title>Control Panel</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="control_panel.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

</head>

<body class="container" onload="check_db();">
  <header>
    <img src="../../images/Citizen-logo.png" id="header-logo">
    <hr>
  	<nav>
  		<ul>
          <li><a href="control_panel.php">Control Panel</a></li>
    			<li><a href="staff_reg.php">Register</a></li>
    			<li><a href="staff_update.php">Update</a></li>
    			<li><a href="staff_delete.php">Delete</a></li>
  		</ul>
  	</nav>
  </header>



  <script type="text/javascript">
    /*     UPDATES STATUS IF STAFF_DB.TXT EXISTS     */
    function check_db() {
      var file_check = <?php 
        if(file_exists('staff_db')) {
          if(file_exists('staff_db/staff_db.txt')) {
            if(file_exists('staff_db/staff_picture')) {
              echo 1;
            }
            else {
              echo 4;
            }
          }
          else {
            echo 3;
          }
        }
        else {  
          echo 2;
        }
      ?>;
      if (file_check === 1) {
        document.getElementById("finding_status").innerHTML = "All files/folders found.";
        document.getElementById("finding_status").style.color = "green";
        document.getElementById("create_status").innerHTML = "Can't create because all files/folders exists!";
        document.getElementById("create_status").style.color = "red";
        document.getElementById("CreateBtn").disabled = true;
      }
      else if (file_check === 2) {
        document.getElementById("finding_status").innerHTML = "staff_db folder missing!";
        document.getElementById("finding_status").style.color = "red";
      }
      else if (file_check === 3) {
        document.getElementById("finding_status").innerHTML = "staff_db.txt missing!";
        document.getElementById("finding_status").style.color = "red";
      }
      else if (file_check === 4) {
        document.getElementById("finding_status").innerHTML = "staff_picture folder missing!";
        document.getElementById("finding_status").style.color = "red";
      }
    }
    /*     RELOAD PAGE     */
    function misDir() {
      window.location.reload();
    }
  </script>



  <div id="wrapper">
    <p>Check for file before attempting to create database.</p><br /><br />
    <button id="checkBtn" onclick="misDir();">CHECK DATABASE</button>
    <p>Text Database status:</p>
    <p id="finding_status" name="find_button"></p><br /><br />
    <button id="CreateBtn" onclick="window.location.href = 'dbCreator.php';">SETUP DATABASE</button>
    <p id="create_status" name="create_button">---</p>
  </div>
</body>
</html>