<?php 


    $username = "root";
    $servername = "localhost";
    $password = "";
    $dbname = "resume";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        echo $conn->connect_error;
    }

    function getgenralidnfo($conn){
        $sql = "SELECT * FROM gerenal_info limit 1";
        $select = $conn->query($sql);

        $data = $select->fetch_assoc();
        return $data;

    }
    function getEexperience($conn,){
        $sql = "SELECT * FROM experience ";
        $select = $conn->query($sql);
        $data = [];
        while($row = $select->fetch_assoc()){
            array_push($data,$row);
        }       
        return $data;

    }
  

    function geteducation($conn){
        $sql = "SELECT * FROM education ";
        $data =[];
        $select = $conn->query($sql);
        while($row = $select->fetch_assoc()){
            array_push($data,$row);
        }
        return $data;
    }
    
    function getskill($conn){
        $sql = "SELECT * FROM skills ";
        $select = $conn->query($sql);
        $data = [];
        while($row = $select->fetch_assoc()){
            array_push($data,$row);
        }
        return $data;

    }
    
        
    function getawards($conn){
        $sql = "SELECT * FROM awards ";
        $select = $conn->query($sql);
        $data = [];
        while($row = $select->fetch_assoc()){
            array_push($data,$row);
        }
        return $data;

    }

    function getskilltool($conn){
        $sql = "SELECT * FROM skills_tools ";
        $select = $conn->query($sql);
        $data = [];
        while($row = $select->fetch_assoc()){
            array_push($data,$row);
        }
        return $data;

    }

    $awz = getawards($conn);
    $edu = geteducation($conn);
    $exp = getEexperience($conn);
    $ski = getskill($conn);
    $ski_tool = getskilltool($conn);
    $genralinforesualt = getgenralidnfo($conn);


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php $genralinforesualt["website_title"] ?></title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none"><?php echo $genralinforesualt['fullName']?></span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?php echo $genralinforesualt["profilepic"]?>" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Interests</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        <?php echo $genralinforesualt['fullName']?>
                        <span class="text-primary"></span>
                    </h1>
                    <div class="subheading mb-5">
                    <?php echo $genralinforesualt['postalAddress']  ?>  · <?php echo $genralinforesualt['mobile']  ?>  ·<?php echo $genralinforesualt['telNumber']  ?> ·
                        <a href="<?php echo 'mailto:'.$genralinforesualt['emailAddress'] ?>" class="text-info"><?php echo $genralinforesualt['emailAddress'] ?></a>
                    </div>
                    <p class="lead mb-5"><?php echo $genralinforesualt["about"]; ?></p>
                    <div class="social-icons">
                        <a class="social-icon" href="<?php echo $genralinforesualt['instagramLink'] ?>"><i class="fab fa-instagram"></i></a>
                        <a class="social-icon" href="<?php echo $genralinforesualt['github'] ?>"><i class="fab fa-github"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="social-icon" href="<?php echo $genralinforesualt['telegramLink'] ?>"><i class="fab fa-telegram"></i></a>
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Experience-->
            <section class="resume-section" id="experience">
                
                <div class="resume-section-content">
                    <h2 class="mb-5">Experience</h2>
                    <?php foreach($exp as $expitem){?>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0"><?php echo $expitem["title"];?></h3>
                            <div class="subheading mb-3"><?php echo $expitem["subtitle"] ?></div>
                            <p><?php echo $expitem["content"] ?></p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"><?php echo $expitem["fromDate"] ?> -  <?php echo $expitem["toDate"] ?></span></div>
                    </div>
                    <?php } ?>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Education-->
            <section class="resume-section" id="education">
                <?php foreach($edu as $eduitem){ ?>
                <div class="resume-section-content">
                    <h2 class="mb-5">Education</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0"><?php echo $eduitem["title"] ?></h3>
                            <div class="subheading mb-3"><?php echo $eduitem["subtitle"] ?></div>
                            <div><?php echo $eduitem["content"] ?></div>
                            <p>GPA: 3.23</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"><?php echo $eduitem["fromDate"] ?> - <?php echo $eduitem["toDate"] ?></span></div>
                    </div>
                    <?php } ?>
            </section>
            <hr class="m-0" />
            <!-- Skills-->
            <section class="resume-section" id="skills">
                <div class="resume-section-content">
                    <h2 class="mb-5">Skills</h2>
                    <div class="subheading mb-3">Programming Languages & Tools</div>
                    <ul class="list-inline dev-icons">
                        <?php foreach($ski as $skiitem){ ?>
                        <li class="list-inline-item"><i class="<?php echo $skiitem["title"] ?>"></i></li>
                        <?php } ?>
                    </ul>
                    <div class="subheading mb-3">Workflow</div>
                    <ul class="fa-ul mb-0">
                        <?php foreach($ski_tool as $ski_tool_item) {  ?>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            <?php echo $ski_tool_item["title"] ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Interests-->
            <section class="resume-section" id="interests">
                <div class="resume-section-content">
                    <h2 class="mb-5">Interests</h2>
                    <p><?php echo $genralinforesualt["interest"] ?></p>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Awards-->
            <section class="resume-section" id="awards">
                <div class="resume-section-content">
                    <h2 class="mb-5">Awards & Certifications</h2>
                    <ul class="fa-ul mb-0">
                        <?php foreach($awz as $awzitem){ ?>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            <?php echo $awzitem["title"] ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </section>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
