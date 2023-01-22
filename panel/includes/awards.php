
<?php
include_once "../controllers/main.php";
include_once "../controllers/connection.php";

$conn = new mysqli("localHost","root","","resume");
if($conn->connect_error){
    echo $conn->connect_error;
}

$ski = getawards($conn);

$id = getparam("id");
$sql = "DELETE FROM awards WHERE id='$id' ";
$conn->query($sql);
?>
<div class="container-fluid">

    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables experience</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th style="width:30%;">awards</th>
                        <th style="width:30%;">action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($ski as $awaitem){ ?>
                        <tr class="exp<?php echo $awaitem["id"]; ?>">
                            <td><?php echo $awaitem["title"]; ?></td>
                            <td><a class="fa fa-trash" style="color:red;width:30%" href="index.php?condition=awards&id=<?php echo $awaitem["id"]; ?>"></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>