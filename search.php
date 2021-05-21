<!DOCTYPE html>
<html lang="en">

<head>
  <title>Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->


</head>

<body>
  <!-- 
  <div class="jumbotron text-center">
    <h1>Live Search in Database</h1>
  </div> -->

  <div class="container">
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="search" style="width:1100px;">
        <!-- <table class="table table-hover"> -->
        <div>
          <br>
        </div>
        <table width="1200" border="1">
          <thead>
            <tr>
              <th width="50">
                <div align="center">invoice_id </div>
              </th>
              <th width="50">
                <div align="center">company_id </div>
              </th>
              <th width="70">
                <div align="center">company_format </div>
              </th>
              <th width="120">
                <div align="center">invoice_number </div>
              </th>
              <th width="150">
                <div align="center">name </div>
              </th>
              <th width="200">
                <div align="center">organization </div>
              </th>
              <th width="200">
                <div align="center">address </div>
              </th>
              <th width="150">
                <div align="center">email </div>
              </th>
              <th width="150">
                <div align="center">create_dt </div>
              </th>
              <th width="50">
                <div align="center">more </div>
                
              
            </tr>
          </thead>
          <tbody id="output">
          </tbody>
        </table>
        

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
        </nav>

      </div>
      <div class="col-sm-3">
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#search").keypress(function() {

        // // let number = $('#number').val()
        //  name = $("#search").val(),


        //     // เตรียมข้อมูลไว้แปลงเป็นJSON
        //     obj = {
        //       //customer_id: customerId,
        //       name: name
        //     }
        //     // แปลงเป็นstring
        //     var json = JSON.stringify(obj);

        $.ajax({
          type: 'POST',
          url: 'searchd1.php',
          // dataType: 'json',
          data: {
            // "json": json
            name: $("#search").val(),
          },
          success: function(data) {
            $("#output").html(data);
            // alert("กรอกข้อมูลไม่ครบ");
          }
        });
      });
    });
  </script>

</body>

</html>