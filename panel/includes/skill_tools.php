<?php
    include_once "../controllers/main.php";
    include_once "../controllers/connection.php";

    $conn = new mysqli("localHost","root","","resume");
    if($conn->connect_error){
        echo $conn->connect_error;
    }

    $ski = getskill($conn);


    $id = getparam("id");
    $sql = "DELETE FROM skills WHERE id='$id' ";
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
                        <th style="width:30%;">id</th>
                        <th style="width:30%;">class</th>
                        <th style="width:30%;">delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($ski as $skiitem){ ?>
                        <tr class="exp<?php echo $skiitem["id"]; ?>">
                            <td style="width:30%;"><?php echo $skiitem["id"]; ?></td>
                            <td style="width:50%;" class="<?php echo $skiitem["title"]; ?> fa-6x"></td>
                            <td><a class="fa fa-trash" style="color:red;width:30%" href="index.php?condition=skill_tools&id=<?php echo $skiitem["id"]; ?>"></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
