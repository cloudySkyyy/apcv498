<?php include "../inc/dbinfo.inc"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr" class="external-links ua-brand-icons sticky-footer">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APCV498 SunTech</title>
    <link rel="stylesheet" href="https://cdn.uadigital.arizona.edu/lib/ua-brand-icons/v1.1.0/ua-brand-icons.min.css">
    <link rel="stylesheet"
        href="https://cdn.uadigital.arizona.edu/lib/ua-bootstrap/v1.0.0-beta.26/ua-bootstrap.min.css">
</head>

<div>
    <header id="region_header_ua" class="l-arizona-header bg-red">
        <section class="container l-container">
            <div class="row">
                <a href="http://www.arizona.edu" title="The University of Arizona homepage" class="arizona-logo">
                    <img alt="The University of Arizona Wordmark Line Logo White"
                        src="https://cdn.uadigital.arizona.edu/logos/v1.0.0/ua_wordmark_line_logo_white_rgb.min.svg"
                        class="arizona-line-logo">
                </a>
            </div>
        </section>
    </header>
</div>

<div>
    <ul class="nav navbar-nav">
        <li class="false"><a href="index.html">Home</a></li>
        <li class="false"><a href="">Link</a></li>
        <li class="false"><a href="">Link</a></li>
    </ul>
</div>

<section class="container">
    <h1>Hello, world!</h1>
    <?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  /* Ensure that the school table exists. */
  VerifySchoolTable($connection, DB_DATABASE);

  /* If input fields are populated, add a row to the SCHOOL table. */
  $school_name = htmlentities($_POST['NAME']);
  $school_address = htmlentities($_POST['ADDRESS']);

  if (strlen($school_name) || strlen($school_address)) {
    AddSchool($connection, $school_name, $school_address);
  }
?>

    <!-- Input form -->
    <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
        <table border="1">
            <tr>
                <td>NAME</td>
                <td>ADDRESS</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="NAME" maxlength="45" size="30" />
                </td>
                <td>
                    <input type="text" name="ADDRESS" maxlength="90" size="60" />
                </td>
                <td>
                    <input type="submit" value="Add Data" />
                </td>
            </tr>
        </table>
    </form>

    <!-- Display table data. -->
    <table border="1" cellpadding="2" cellspacing="2">
        <tr>
            <td>ID</td>
            <td>NAME</td>
            <td>ADDRESS</td>
        </tr>

        <?php

$result = mysqli_query($connection, "SELECT * FROM SCHOOLS");

while($query_data = mysqli_fetch_row($result)) {
  echo "<tr>";
  echo "<td>",$query_data[0], "</td>",
       "<td>",$query_data[1], "</td>",
       "<td>",$query_data[2], "</td>";
  echo "</tr>";
}
?>

    </table>

    <!-- Clean up. -->
    <?php

  mysqli_free_result($result);
  mysqli_close($connection);

?>
</section>
<div>
    <footer id="footer_site">
        <div class="container">
        </div>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdn.uadigital.arizona.edu/lib/ua-bootstrap/v1.0.0-beta.26/ua-bootstrap.min.js"></script>

</body>

</html>


<?php

/* Add a School to the table. */
function AddSchool($connection, $name, $address) {
   $n = mysqli_real_escape_string($connection, $name);
   $a = mysqli_real_escape_string($connection, $address);

   $query = "INSERT INTO SCHOOLS (NAME, ADDRESS) VALUES ('$n', '$a');";

   if(!mysqli_query($connection, $query)) echo("<p>Error adding school data.</p>");
}

/* Check whether the table exists and, if not, create it. */
function VerifySchoolsTable($connection, $dbName) {
  if(!TableExists("SCHOOLS", $connection, $dbName))
  {
     $query = "CREATE TABLE SCHOOLS (
         ID int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         NAME VARCHAR(45),
         ADDRESS VARCHAR(90)
       )";

     if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>");
  }
}

/* Check for the existence of a table. */
function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);

  $checktable = mysqli_query($connection,
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

  if(mysqli_num_rows($checktable) > 0) return true;

  return false;
}
?>
