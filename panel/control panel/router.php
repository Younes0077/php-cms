<?php

    include_once "C:/xampp/htdocs/resume\controllers/main.php";


    class router{
        private $condition = [
            "main"=>"main.php",
            "add_skill_tools"=>"add_skill_tools.php",
            "skill_tools"=>"skill_tools.php",
            "add_exp"=>"add_exp.php",
            "exps"=>"exps.php",
            "404"=>"404.php",
            "default"=>"404.php",
            "setting"=>"setting.php",
            ""=>"404.php",
            "edus"=>"edus.php",
            "add_edu"=>"add_edu.php",
            "edit_edu"=>"edit_edu.php",
            "edit_exp"=>"edit_exp.php",
            "skills"=>"skills.php",
            "add_skill"=>"add_skill.php",
            "awards"=>"awards.php",
            "add_awards"=>"add_awards.php",
            "profilePic"=>"profilePic.php"
        ];
        function router(){

        }


        function rout()
        {
            $condition_value = getparam("condition");
            if (isset($condition_value)) {
                if(array_key_exists("$condition_value",$this->condition)){
                    $condition_resualt = $this->condition["$condition_value"];
                    switch ($condition_value) {
                        case "main":
                            includebycheak("./muduls/$condition_resualt");
                            break;
                        case "404":
                            includebycheak("./includes/$condition_resualt");
                            break;
                        case "setting":
                            includebycheak("./muduls/$condition_resualt");
                            break;
                        case "add_exp":
                            includebycheak("./includes/$condition_resualt");
                            break;
                        case "exps":
                            includebycheak("./includes/$condition_resualt");
                            break;
                        case "edus":
                            includebycheak("./includes/$condition_resualt");
                            break;
                        case "add_edu":
                            includebycheak("./includes/$condition_resualt");
                            break;
                        case "edit_edu":
                            includebycheak("./includes/$condition_resualt");
                            break;
                        case "edit_exp":
                            includebycheak("./includes/$condition_resualt");
                            break;
                        case "skill_tools":
                            includebycheak("./includes/$condition_resualt");
                            break;
                        case "add_skill_tools":
                            includebycheak("./includes/$condition_resualt");
                            break;
                        case "add_skill":
                            includebycheak("./includes/$condition_resualt");
                            break;
                        case "skills":
                            includebycheak("./includes/$condition_resualt");
                            break;
                        case "add_awards":
                            includebycheak("./includes/$condition_resualt");
                            break;
                        case "awards":
                            includebycheak("./includes/$condition_resualt");
                            break;
                        case "profilePic":
                            includebycheak("./includes/$condition_resualt");
                            break;
                        default:
                            includebycheak("./includes/404.php");
                            break;
                    }
                }
                else{
                    includebycheak("./includes/404.php");
                }
            }
            else{
                includebycheak("./muduls/main.php");
            }
        }
    }

?>
