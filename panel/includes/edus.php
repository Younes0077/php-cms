


<?php

    include_once "../controllers/main.php";
    include_once "../controllers/connection.php";

    $username = "root";
    $servername = "localhost";
    $password = "";
    $dbname = "resume";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        echo $conn->connect_error;
    }

    $edu = geteducation($conn);

    $id = getparam("id");

    $sql = "DELETE FROM education WHERE id='$id' ";
    $conn->query($sql);

?>


<div class="container-fluid">

    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables education</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>title</th>
                        <th>sub title</th>
                        <th>from date</th>
                        <th> to date</th>
                        <th>content</th>
                    </tr>
                    </thead>
                    <tfoot>
                    </tfoot>
                    <tbody>
                    <?php foreach($edu as $edu_item){ ?>
                    <tr>
                        <td><?php echo $edu_item["title"]; ?></td>
                        <td><?php echo $edu_item["subtitle"]; ?></td>
                        <td><?php echo $edu_item["fromDate"]; ?></td>
                        <td><?php echo $edu_item["toDate"]; ?></td>
                        <td><?php echo $edu_item["content"]; ?></td>
                        <td><a class="fa fa-trash" style="color:red;" href="index.php?condition=edus&id=<?php echo $edu_item["id"]; ?>"></a></td>
                        <td><a class="fa fa-edit" style="color:lightseagreen" href="index.php?condition=edit_edu&id=<?php echo $edu_item["id"]; ?>"></a></td>
                    </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

