
<?php
$conn = new mysqli("localHost","root","","resume");
if($conn->connect_error){
    echo $conn->connect_error;
}
$fieldData=["profilepic"=>""];
$state = "";
if(postparam("submit") != null) {
    $upload_file = move_uploaded_file($_FILES['profilepic']['tmp_name'],'img/'.'profile.jpg');
    if($upload_file){
        $state = 1;
    }
    else{
        $state = 0;
    }
}
else{
    $state = 0;
}

?>
<h1 class="h3 mb-4 text-gray-800">public setting</h1>
<form method="POST" class="m-2" enctype="multipart/form-data">
    <label>Add Pic</label>
    <br>
    <div class="row pt-2" >
        <div class="col-12 col-sm-3" style="text-align: center">
            <img src="http://localhost/resume/panel/img/profile.jpg" style="width:120px;height:120px;" class="rounded-circle"/>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-12 col-sm-3">
            <div class="form-group">
                <input type="file"  class="form-control form-control-user " id="profilepic" name="profilepic"  placeholder="Enter file...">
            </div>
        </div>
    </div>
    <input class="m-3 btn btn-primary"  type="submit" name="submit" id="submit" value="Update profile"/>
    <?php if($state == 1){ ?>
        <div class="alert alert-success">data send successfully</div>
    <?php }elseif($state == 0){ ?>
        <div class="alert alert-danger">please fill the form</div>
    <?php } ?>
</form>


