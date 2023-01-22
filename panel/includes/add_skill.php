
<?php
    $conn = new mysqli("localHost","root","","resume");
    if($conn->connect_error){
        echo $conn->connect_error;
    }
    $fieldData=["title"=>""];
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

    $title = $fieldData["title"];


    if ($state == 1) {
        $sql = "INSERT INTO skills_tools (title) VALUES('$title')";
        $conn->query($sql);
        $demo = "data send successfully";
    } else {
        $demo = "ERROR";
    }


?>
<h1 class="h3 mb-4 text-gray-800">public setting</h1>
<form method="POST" class="m-2">
    <label>Add skill</label>
    <br>
    <div class="row pt-2">
        <div class="col-12 col-sm-5">
            <div class="form-group">
                <label>skill:</label>
                <input type="text" class="form-control form-control-user" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter skill...">
            </div>
        </div>
    </div>
    <input class="m-3 btn btn-primary" type="submit" name="submit" id="submit" value="send"/>
    <?php if($state == 1){ ?>
        <div class="alert alert-success">data send successfully</div>
    <?php }elseif($state == 0){ ?>
        <div class="alert alert-danger">please fill the form</div>
    <?php } ?>
</form>

