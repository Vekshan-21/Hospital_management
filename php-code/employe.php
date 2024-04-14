<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="index.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
      overflow: hidden;
      background-color: #333;
    }

    .topnav a {
      float: left;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    .topnav a.active {
      background-color: #04AA6D;
      color: white;
    }
  </style>
</head>

<body>
  <div class="topnav">
    <a class="active" href="employe.php">Employes</a>
    <a href="client.php">Clients</a>
    <a href="hotel.php">Hotels</a>
    <a href="chambre.php">Chambres</a>
    <a href="reservations.php">Reservations</a>
    <a href="location.php">Locations</a>
    <a href="welcome.php">Logout</a>

  </div>
  <form method="post">
    <input type="text" name="name" placeholder="Name" />
    <input type="text" name="adresse" placeholder="Adresse" />
    <input type="number" name="nas" placeholder="NAS" />
    <input type="text" name="role" placeholder="Role" />
    <input type="submit" name="insert" class="button" value="Insert" />
    <br>
    <input type="number" name="id" placeholder="ID" />
    <input type="submit" name="delete" class="button" value="Delete" />
    <input type="submit" name="modify" class="button" value="Modify" />
  </form>
  <table>
    <tr>
      <th>ID</th>
      <th></th>
      <th>Name</th>
      <th></th>
      <th>Adresse</th>
      <th></th>
      <th>NAS</th>
      <th></th>
      <th>Role?</th>


    <tr>


      <?php
      $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
      $sql = "Select * From employee";
      $result = pg_query($cn, $sql);
      while ($row = pg_fetch_object($result)) {
        echo "<tr><td>" . $row->employeeid . "<td><td>" . $row->nom . "<td><td>" . $row->adresse . "<td><td>" . $row->nas . "<td><td>" . $row->role . "<td><td>";
        echo "</tr>";
      }



      ?>
      <table>

        <?php
        if (array_key_exists('insert', $_POST)) {
          button1();
        }
        if (array_key_exists('delete', $_POST)) {
          button2();
        }
        if (array_key_exists('modify', $_POST)) {
          button3();
        }

        function button1()
        {
          $Name = $_POST['name'];
          $Adresse = $_POST['adresse'];
          $Nas = $_POST['nas'];
          $Role = $_POST['role'];


          $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
          $sql = "Insert into employee (nom, adresse, nas,role)
          VALUES ('$Name','$Adresse', $Nas, '$Role')";

          pg_query($cn, $sql);
        }


        function button2()
        {
          $ID = $_POST['id'];
          $Adresse = $_POST['adresse'];
          $Nas = $_POST['nas'];
          $Role = $_POST['role'];


          $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
          $sql = "DELETE FROM employee WHERE employeeid=$ID;";

          pg_query($cn, $sql);
        }

        function button3()
        {
          $Name = $_POST['name'];
          $Adresse = $_POST['adresse'];
          $Nas = $_POST['nas'];
          $Role = $_POST['role'];
          $ID = $_POST['id'];
          $cn = pg_connect("host=localhost port=5432 dbname=ehotel user = postgres password=Jacky18062003");
          $sql = "Update employee
          SET nom = '$Name', adresse= '$Adresse', nas=$Nas, role ='$Role'
          Where employeeid = $ID
          ;";
          pg_query($cn, $sql);
        }







        ?>



</body>

</html>