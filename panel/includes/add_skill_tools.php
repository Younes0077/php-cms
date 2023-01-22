<?php
    $conn = new mysqli("localHost","root","","resume");
    if($conn->connect_error){
        echo $conn->connect_error;
    }
    $fieldData=["logo"=>""];
    $state = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach ($fieldData as $name => $data) {
            if (!empty($_POST["$name"])) {
                $fieldData["$name"] = validate($_POST["$name"]);
                $state = 1;
            } else {
                $fieldData_error["$name"] = "$name is empty";
                $state = 0;
                break;
            }
        }
    }
    function validate($var){
        trim($var);
        htmlspecialchars($var);
        stripcslashes($var);
        return $var;
    }

    $logo = $fieldData["logo"];


    if ($state == 1) {
        $sql = "INSERT INTO skills (title) VALUES('$logo')";
        $conn->query($sql);
        $demo = "data send successfully";
    } else {
        $demo = "ERROR";
    }


?>
<h1 class="h3 mb-4 text-gray-800">public setting</h1>
<form method="POST" class="m-2">
    <label>Add logo:</label>
    <br>
    <div class="row pt-2">
        <div class="col-12 col-sm-5">
            <div class="form-group">
                <label>logo class</label>
                <input type="text" class="form-control form-control-user" id="title" name="logo" aria-describedby="emailHelp" placeholder="Enter title...">
            </div>
        </div>
    </div>
    <div class="btn btn-info text-white">To find the class names of different icons, refer to the <a href="https://fontawesome.com/icons">"https://fontawesome.com/icons"</a> site</div>
    <input class="m-3 btn btn-primary" type="submit" name="submit" id="submit" value="send"/>
    <?php if($state == 1){ ?>
        <div class="alert alert-success">data send successfully</div>
    <?php }elseif($state == 0){ ?>
        <div class="alert alert-danger">please fill the form</div>
    <?php } ?>
</form>
