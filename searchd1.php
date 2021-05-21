<?php

// $obj = json_decode($_POST["json"]);

//     $invoice_id = $obj->{'name'};

$servernameDB = "localhost";
$usernameDB = "root";
$passwordDB = "";
$dbnameDB = "rfs2";

$conn = mysqli_connect($servernameDB, $usernameDB, $passwordDB, $dbnameDB);

$perpage = 10;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start = ($page - 1) * $perpage;

$sql = "select * from invoice limit {$start} , {$perpage} ";

mysqli_set_charset($conn, 'utf8');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "connection";
}

$sql = "SELECT invoice_id, company_id, company_format, invoice_number, name, organization, address, email, create_dt 
    FROM invoice WHERE Name LIKE '%" . $_POST['name'] . "%' OR email LIKE '%" . $_POST['name'] . "%' OR create_dt LIKE '%" . $_POST['name'] . "%' 
    OR address LIKE '%" . $_POST['name'] . "%' OR organization LIKE '%" . $_POST['name'] . "%' OR invoice_number LIKE '%" . $_POST['name'] . "%'
    OR company_format LIKE '%" . $_POST['name'] . "%' OR company_id LIKE '%" . $_POST['name'] . "%' OR invoice_id LIKE '%" . $_POST['name'] . "%'
    ORDER BY invoice_id ASC LIMIT " . $start . ", $perpage";

$query = mysqli_query($conn, $sql);

$sql2 = "SELECT invoice_id, company_id, company_format, invoice_number, name, organization, address, email, create_dt FROM invoice WHERE Name LIKE '%" . $_POST['name'] . "%' OR email LIKE '%" . $_POST['name'] . "%' OR create_dt LIKE '%" . $_POST['name'] . "%' 
OR address LIKE '%" . $_POST['name'] . "%' OR organization LIKE '%" . $_POST['name'] . "%' OR invoice_number LIKE '%" . $_POST['name'] . "%'
OR company_format LIKE '%" . $_POST['name'] . "%' OR company_id LIKE '%" . $_POST['name'] . "%' OR invoice_id LIKE '%" . $_POST['name'] . "%'
ORDER BY invoice_id ASC ";

$query2 = mysqli_query($conn, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);

//  $sql3 = "SELECT * FROM invoice INNER JOIN invoice_item ON invoice.invoice_id = invoice_item.invoice_id ";
$sql3 = "SELECT invoice_item.invoice_id,invoice.name,invoice_item.item_id,invoice_item.company_id,
invoice_item.description,invoice_item.price,invoice_item.total 
FROM invoice INNER JOIN invoice_item 
ON invoice.invoice_id = invoice_item.invoice_id LIMIT 5;
";
$query3 = mysqli_query($conn, $sql3);


//  if($query){
while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>
    <tr>
        <td><?php echo $result["invoice_id"]; ?></td>
        </th>
        <td><?php echo $result["company_id"]; ?></td>
        <td><?php echo $result["company_format"]; ?></td>
        <td><?php echo $result["invoice_number"]; ?></td>
        <td><?php echo $result["name"]; ?></td>
        <td><?php echo $result["organization"]; ?></td>
        <td><?php echo $result["address"]; ?></td>
        <td><?php echo $result["email"]; ?></td>
        <td><?php echo $result["create_dt"]; ?></td>
        <td><?php echo ''; ?><input type="button" onclick="myFunction1()" value=" + "></td>

        <!-- <td><?php echo $result["invoice_item.price"]; ?></td></th> -->
    </tr>
<?php  } ?>

<script>
    function myFunction1() {
        alert("Hello! I am an alert box!");
    }
</script>

<nav>
    <ul class="pagination">
        <a href="search.php?page=1" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
        <?php for ($i = 1; $i <= $total_page; $i++) { ?>
            <a href="search.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php } ?>
        <a href="search.php?page=<?php echo $total_page; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </ul>
</nav>

<!-- 
    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav> -->
<?php
echo "start ";
echo "$start ";
echo "perpage ";
echo "$perpage ";
echo "total_page ";
echo "$total_page ";
// echo "$query3";
?>
<?php
mysqli_close($conn);
?>