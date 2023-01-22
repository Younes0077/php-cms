<?php


$conn = new mysqli("localHost","root","","resume");
if($conn->connect_error){
    echo $conn->connect_error;
}
$fieldData=["title"=>"","subtitle"=>"","content"=>"","fromDate"=>"","toDate"=>""];

$fieldData_error=["title"=>"","subtitle"=>"","fromDate"=>"","toDate"=>""];

$state = "";

$id = getparam("id");


function getedu($conn,$id){
    $getdata = $conn->query("SELECT * FROM education WHERE id ='$id' ");
    $data = $getdata->fetch_assoc();
    return $data;
}



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
$demo = "";

function validate($var){
    trim($var);
    htmlspecialchars($var);
    stripcslashes($var);
    return $var;
}
$title=$subtitle=$content=$fromDate=$toDate = "";


$title = $fieldData["title"];
$subtitle = $fieldData["subtitle"];
$content = $fieldData["content"];
$fromDate = $fieldData["fromDate"];
$toDate = $fieldData["toDate"];

if ($state == 1) {
    $sql = "UPDATE education SET title='$title' ,subtitle='$subtitle',content='$content',fromDate='$fromDate',todate='$toDate' WHERE id='$id';";
    $conn->query($sql);
    $demo = "data send successfully";
} else {
    $demo = "ERROR";
}

$eduResualt = getedu($conn,$id);

?>
<h1 class="h3 mb-4 text-gray-800">public setting</h1>
<form method="POST" class="m-2">
    Edit education:
    <div class="row pt-2">
        <div class="col-12 col-sm-5">
            <div class="form-group">
                <label>title:</label>
                <input type="text" class="form-control form-control-user" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter title..." value="<?php echo $eduResualt["title"]; ?>">
            </div>
        </div>
        <div class="col-12 col-sm-5">
            <div class="form-group">
                <label>sub title:</label>
                <input type="text" class="form-control form-control-user" id="subtitle" name="subtitle"  aria-describedby="emailHelp" placeholder="enter subtitle..." value="<?php echo $eduResualt["subtitle"]; ?>">
            </div>
        </div>
    </div>
    <div class="row p-5">
        <div class="col-12 col-sm-5">
            <div class="form-group">
                <label>content:</label>
                <textarea type="text" cols="5" rows="10" class="form-control form-control-user" id="content" name="content" placeholder="Enter about text..." ><?php echo $eduResualt["content"]; ?></textarea>
            </div>
        </div>
    </div>
    <div class="row p-3">
        <div class="col-12 col-sm-5">
            <div class="form-group">
                <label>from date:</label>
                <input type="text" class="form-control form-control-user" id="fromDate" name="fromDate"  aria-describedby="emailHelp" placeholder="enter subtitle..." value="<?php echo $eduResualt["fromDate"]; ?>">
            </div>
        </div>
        <div class="col-12 col-sm-5">
            <div class="form-group">
                <label>to date:</label>
                <input type="text" class="form-control form-control-user" id="toDate" name="toDate"  aria-describedby="emailHelp" placeholder="enter subtitle..." value="<?php echo $eduResualt["toDate"]; ?>">
            </div>
        </div>
    </div>
    <input class="m-3 btn btn-primary" type="submit" name="submit" id="submit" value="EDIT"/>
    <?php if($state == 1){ ?>
        <div class="alert alert-success">edited successfully</div>
    <?php }elseif($state == 0){ ?>
        <div class="alert alert-danger">please fill the form</div>
    <?php } ?>
</form>





