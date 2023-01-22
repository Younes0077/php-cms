<?php


$conn = new mysqli("localHost","root","","resume");
    if($conn->connect_error){
        echo $conn->connect_error;
    }

$fieldData =["fullName" =>"","website_title" =>"","telNumber" => "","emailAddress" => "","github" =>"",
"instagramLink" => "" ,"twitterLink" => "" ,"telegramLink" => "","interest" => "","postalAddress" => "","about" => ""];

$fieldData_error =["fullName" =>"","website_title" =>"","telNumber" => "","emailAddress" => "","instagramLink" => "" ,"twitterLink" => "" , "telegramLink" => "","interest" => "","postalAddress" => "","about" => ""];

$state = "";
$demo = 0;

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


    $demo = "";

    if ($state == 1) {
        foreach ($fieldData as $name => $data) {
            $sql = "UPDATE gerenal_info SET $name = '$data ' ";
            $conn->query($sql);
        }
        $demo = 1;
    } else {
        $demo = 0;
    }
}

function validate($var){
    trim($var);
    htmlspecialchars($var);
    stripcslashes($var);
    return $var;
}
?>






<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">public setting</h1>
    <form method="POST">
        personal info:
        <div class="row pt-2">
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="website_title" name="website_title" aria-describedby="emailHelp" placeholder="Enter website title...">
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="fullName" name="fullName"  aria-describedby="emailHelp" placeholder="full name...">
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="telNumber" name="telNumber" aria-describedby="emailHelp" placeholder="Enter tel number...">
                </div>
            </div>
        </div>
        social media:
        <div class="row pt-2">
            <div class="col-12 col-sm-3">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="emailAddress" name="emailAddress" aria-describedby="emailHelp" placeholder="Enter email...">
                </div>
            </div>
            <div class="col-12 col-sm-3">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="instagramLink" name="instagramLink" aria-describedby="emailHelp" placeholder="instagram link...">
                </div>
            </div>
            <div class="col-12 col-sm-2">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="twitterLink" name="twitterLink" aria-describedby="emailHelp" placeholder="Enter twitter link...">
                </div>
            </div>
            <div class="col-12 col-sm-2">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="telegramLink" name="telegramLink" aria-describedby="emailHelp" placeholder="Enter telegram link...">
                </div>
            </div>
            <div class="col-12 col-sm-2">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="github" name="github" aria-describedby="emailHelp" placeholder="Enter github link...">
                </div>
            </div>
        </div>
        <label><b style="font-size: 18px">information:</b></label>
        <hr>
        <div class="row pt-12">
            postal address
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <textarea type="text" cols="5" rows="5" class="form-control form-control-user" id="postalAddress" name="postalAddress" placeholder="Enter postal address..."></textarea>
                </div>
            </div>
            enter interest
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <textarea type="text" cols="5" rows="5" class="form-control form-control-user" id="interest" name="interest" placeholder="Enter interest text..."></textarea>
                </div>
            </div>
        </div>
        <div class="row pt-4">
            about:
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <textarea type="text" cols="5" rows="5" class="form-control form-control-user" id="about" name="about" placeholder="Enter about text..."></textarea>
                </div>
            </div>
        </div>
        <div class="row pt-5 ">
            <div class="col-12 col-sm-3">
                <input type="submit" name="submit"  value="submit" class="btn btn-primary btn-user btn-block">
                <?php if($demo == 1){ ?>
                <div class="alert alert-success mt-2">data send successfully</div>
                <?php }else{ ?>
                <div class="alert alert-danger mt-2">fill the fields</div>
                <?php } ?>
            </div>
        </div>
    </form>
</div>



