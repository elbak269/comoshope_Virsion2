<?php
ob_start();
session_start();
$setting_mypage_js=" ";
$setting_mypage_css =" ";
$pageTitle = "profile";
$set_footer = "";
$test = "test";
$file_empty = "";
include("init.php");
$clientid = getclientID($_SESSION['user']);

if(isset($_SESSION['user'])){

  if(isset($_POST["update_image"]) && isset($_FILES["MY_IMG_FOR_UPLOADE"])){
    $IMG_         = $_FILES["MY_IMG_FOR_UPLOADE"];
    $IMG_NAME     = $IMG_["name"];
    $IMG_SIZE     = $IMG_["size"];
    $IMG_TYPE     = $IMG_["type"];
    $IMG_TMP_NAME = $IMG_["tmp_name"];
    $IMG_ERROR    = $IMG_["error"];

if($IMG_ERROR == 4){
  $file_empty = lang("there_is_no_file_iploaded");
}else{
  $avatarAllExtision = array("jpeg","jpg","png","gif");
  $myexlpo =  explode(".",$IMG_NAME);
  $explode_img_name = strtolower( end($myexlpo) );

  $rand = rand(100,9999999999);
  $result_rand = $rand.$clientid.".jpg";
  $error = array();

  if($IMG_SIZE > 100000){
    $error[] =  lang("size_cant_higher_than")."10MO";
  }else if(!in_array($explode_img_name,$avatarAllExtision)){
    $error[] =  lang("extention_dose_not_alow");
  }

  if(!empty($error)){
  foreach ($error as $value) {
echo $value;
  }
}else{
  $img_link = "theme/image/userImg/".$_SESSION['user'];
  if(!file_exists($img_link)){
    mkdir($img_link);
  }


$url_for_db = $img_link."/".$result_rand;


$stmt = $conn->prepare("UPDATE clients SET Avatar = :AVATAR
where ClientID = :CLIENTID");
$stmt->bindParam(":AVATAR",$url_for_db,PDO::PARAM_STR);
$stmt->bindParam(":CLIENTID",$clientid,PDO::PARAM_INT);
$stmt->execute();
if($stmt->rowCount() >0 ){
  move_uploaded_file($IMG_TMP_NAME,"theme/image/userImg/".$_SESSION['user']."/".$result_rand);
}

}

}


}
?>


<div class="cont">


  <h1 class="text-center"><?php echo  lang("mypage"); ?></h1>

  <div class="container">

    <div class="row ">




      <div class="col-sm-12  col-lg-7 cont_row_le">
        <div class="div_inputs">
          <?php function  my_page_id($clientid){
            global $conn;
            $stmt = $conn->prepare("SELECT  client_page_id FROM client_page
              INNER JOIN clients ON clients.ClientID = client_page.ClientID
              WHERE client_page.ClientID = :ClientID");
            $stmt->bindParam(":ClientID",$clientid,PDO::PARAM_INT);
            $stmt->execute();
            $fetc = $stmt->fetchAll();
            $page_id  ="";
            foreach ($fetc as $value) {
                $page_id = $value["client_page_id"];
            }

            return $page_id;
          }

           ?>
             <div class="">
               <div class="row">
                 <div class="col-4">
                  <input id="link_my_page" type="text" class="form-control" name="page_name_input" maxlength="50" placeholder="" value="<?php echo "mypage.php?user=".my_page_id($clientid); ?>">
                 </div>
                 <div class="col-8">
                  <button id="btn_copy" type="button" class="btn btn-sm btn-primary" name="button"><i class="fas fa-copy"></i> <?php echo lang("copy"); ?></button>
                 </div>

               </div>

             </div>


          <strong> <label for="title"><?php echo lang("page_name"); ?></label> </strong>
          <input id="page_name_input" type="text" class="form-control" name="page_name_input" maxlength="50" placeholder="<?php echo get_page_name($clientid); ?>" value="">
          <p><i class="fas fa-info-circle"></i> <strong>  <?php echo lang("note"); ?></strong > <span class="span_not_pagena"><?php echo lang("npagename_note_for_mypage"); ?></span> </p>
          <button id="btn_edit_page_name" type="button" name="update_page_name" class="btn btn-sm btn-primary"  name="button"><?php echo lang("edit_page_name"); ?></button>
          <p> <strong> <label for="pagedsecttetare"> <?php echo lang("page_description") ?> </label> </strong></p>
          <textarea id="pagedsecttetare" name="name" maxlength="1000" rows="5"> <?php echo  page_description($clientid);  ?></textarea>
          <p> <i class="fas fa-info-circle"></i> <strong>  <?php echo lang("note"); ?> </strong> <?php echo lang("description_note"); ?></p>
          <button id="btn_edit_DESC" type="button" class="btn btn-sm btn-primary"  name="button"><?php echo lang("edit_page_name"); ?></button>

        </div>

        <?php
        $myimg =  checkimg_exixts($clientid);
        if($myimg=="" || $myimg == null){
        ?>
        <div class="div_img">
          <div class="row">
            <div class="div_uplod_img ">
            <p class="text-info"><i class="fas fa-info-circle"></i> <?PHP echo lang("fromate_img"); ?></p>
            </div>
            <div class="div_uplod_img div_uplod_img_right  text-center">
              <form class="" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
              <img id="img_user" name=""  src="theme/image/avatar.png" alt="">
              <div class="custom-file">
               <input type="file" name="MY_IMG_FOR_UPLOADE" class="custom-file-input" id="customFile">
               <label class="custom-file-label" for="customFile"></label>
             </div>
             <div class="div_btn">
               <p class="img_have_notuploded text-danger"><?PHP echo lang("img_have_notuploded"); ?></p>
               <button type="button"  id="choiceimg" class="btn btn-sm btn-primary" name="update_image" ><i class="fas fa-images"></i></i> <?PHP echo lang("choice_img"); ?> </button>
              <button type="submit"  id="btn_uplade_img" class="btn btn-sm btn-success" name="update_image" ><i class="fas fa-images"></i></i> <?PHP echo lang("upload_image"); ?> </button>
             </div>

              <!--<p class="changimg"> </p> -->
             </form>

            </div>
          <!--  <div class="col">
              <div class="form-group chkbxdiv">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" checked>
                <label class="form-check-label" for="gridCheck" >
                <?php// echo lang("show_img"); ?>

                </label>
              </div>
            </div>

          </div> -->

          </div>

        </div>
        <?php
        }else{

          function get_show_img_my_page_state($clientid){
            global $conn;
            $stmt = $conn->prepare("SELECT  show_img FROM client_page
              INNER JOIN clients ON clients.ClientID = client_page.ClientID
              WHERE client_page.ClientID = :ClientID");
            $stmt->bindParam(":ClientID",$clientid,PDO::PARAM_INT);
            $stmt->execute();
            $fetc = $stmt->fetchAll();
            $show_img1 ="";
            foreach ($fetc as $value) {
                $show_img1 = $value["show_img"];
            }

            return $show_img1;
          }



        ?>
        <div class="div_img">
          <div class="row">
            <div class="div_else_img">
            <p  class="text-info text-center"><i class="fas fa-info-circle"></i> <?PHP echo lang("its_better_show_your_pic"); ?></p>
            </div>
            <div class="div_else_img text-center">
              <img id="img_user"  src="<?php echo $myimg  ?> " alt="">
              <div class="custom-file">
               <input type="file" name="MY_IMG_FOR_UPLOADE" class="custom-file-input" id="customFile">
               <label class="custom-file-label" for="customFile"></label>
             </div>
              <div class="div_btn">
                <p class="img_have_notuploded text-danger"><?PHP echo lang("img_have_notuploded"); ?></p>
                <button type="button"  id="choiceimg" class="btn btn-sm btn-primary" name="update_image" ><i class="fas fa-images"></i></i> <?PHP echo lang("choice_img"); ?> </button>
               <button type="submit"  id="btn_uplade_img" class="btn btn-sm btn-success" name="update_image" ><i class="fas fa-images"></i></i> <?PHP echo lang("upload_image"); ?> </button>
              </div>
            </div>
            <div class="div_else_img">

              <?php if(get_show_img_my_page_state($clientid) == "true"){ ?>

                <div class="row text-center">

                  <div class="col">
                    <div class="form-group text-center">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck" checked>
                      <label class="form-check-label" for="gridCheck" >
                        <?php echo lang("show_img"); ?>
                      </label>
                    </div>
                  </div>

                  </div>

                  <div class="col">
                        <a class="text-center"  href="<?php echo "mypage.php?user=".my_page_id($clientid); ?>"> <i class="fas fa-home"></i></i> <?PHP echo lang("mypage"); ?></a>
                  </div>

                </div>



          <?php }else{ ?>

            <div class="row text-center">

              <div class="col">
                <div class="form-group ">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck" >
                  <label class="form-check-label" for="gridCheck" >
                    <?php echo lang("show_img"); ?>
                  </label>

                </div>

              </div>

              </div>
              <div class="col">
                 <a id="link_to_mpg"  href="<?php echo "mypage.php?user=".my_page_id($clientid); ?>"> <i class="fas fa-home"></i></i> <?PHP echo lang("mypage"); ?></a>
              </div>


            </div>



          <?php }?>
            </div>

          </div>

        </div>

        <?php
        }

         ?>

      </div>



      <div class="col-sm-12 col-lg-4">
       <div class="sidebar_left">
        <div class="row">
          <div class="col-sm-12 ">

            <div class="div_alltime">
              <?php
              function get_all_reward_all_time_for_client($clientid){
                global $conn;
                $sql = $conn->prepare("SELECT COUNT(orders_details_id) FROM orderdetails WHERE reward_for_client_id = :REWARDS_CLIENT" );
                $sql->bindParam(":REWARDS_CLIENT",$clientid,PDO::PARAM_INT);
                $sql ->execute();
                return $sql->fetchColumn();
              }
              function reward_withdrawn($clientid){
                global $conn;
                $sql = $conn->prepare("SELECT SUM(Amount) AS value_sum FROM reward_withdrawn WHERE ClientID = :CLIENTID" );
                $sql->bindParam(":CLIENTID",$clientid,PDO::PARAM_INT);
                $sql ->execute();
                $fetch = $sql->fetchAll();
                $mysum = "";
                foreach ($fetch as  $value) {
                  $mysum =$value["value_sum"];
                }
                return $mysum;
              }


              ?>
              <p class="text-center"><?php echo lang("All_Time_Earned"); ?> <span class="amount_sp"> <?PHP ECHO  get_all_reward_all_time_for_client($clientid)*$reward_client; ECHO " EURO"; ?></span> <!-- <span class="FROM__SPAN"><?php //echo lang("From"); ?> <span id="from_sapn"><?php // echo date("Y/m/d"); ?></span> </span> --> </p>
              <p class="text-center"><?php echo lang("count_sales"); ?> <span class="times_spn" ><?PHP echo get_all_reward_all_time_for_client($clientid)."".lang("times"); ?></span> </p>
              <p class="text-center"><?php echo lang("Withdrawn"); ?> <span class="amount_sp text-center"><?php
              if(reward_withdrawn($clientid)==null){
                echo "0 EURO";
              }else {
              ECHO   reward_withdrawn($clientid) ."EURO";
              }

                ?></span> </p>

            </div>

          </div>

          <div class="col-sm-12 ">

            <div class="div_disponible">
              <p class="text-center"><?php echo lang("Rewards_available"); ?> <!-- <span class="FROM__SPAN"><?php// echo lang("From"); ?> <span id="from_sapn"><?php //echo date("Y/m/d"); ?></span> </span> --> </p>
              <p class="text-center" ><?php
              $amount_all_time = get_all_reward_all_time_for_client($clientid)*$reward_client;
              $withdrawn = 0;
              if(reward_withdrawn($clientid)==null){
                $withdrawn =0;
              }else {
              $withdrawn = reward_withdrawn($clientid);
              }
                $total_disponible = $amount_all_time - $withdrawn;
              echo $total_disponible." EURO"
              ?> </p>
              <p class="text-center" > <span class="kep_till"><?php echo $max_amountodr_withdrawn.lang("kipp_till"); ?></span> </p>

            </div>

          </div>


          <div class="col-sm-12 ">

            <div class="Rewards_disponibles text-center">
              <p class="text-center" > <?php echo lang("rewaeds_pedding"); ?> <!-- <span class="FROM__SPAN"><?php //echo lang("From"); ?> <span id="from_sapn"><?php //echo date("Y/m/d"); ?></span> --> </p>
              <p class="text-center">
                <?PHP

                  function pedding_rewareds($clientid){
                    global $conn;
                    $sql = $conn->prepare("SELECT COUNT(orders_details_id)  FROM orderdetails WHERE reward_for_client_id = :CLIENTID AND StatusOrder =3 " );
                    $sql->bindParam(":CLIENTID",$clientid,PDO::PARAM_INT);
                    $sql ->execute();
                    $fetch2 = $sql->fetchColumn();
                    return $fetch2;
                  }



                $pedding_rest = pedding_rewareds($clientid)*$reward_client;
                ECHO $pedding_rest." EURO";


                 ?>

              </p>




            </div>

          </div>

        </div>



      </div>

    </div>

    </div>


  </div>

  <div id="satus" class="">

  </div>


</div>


<?php

include($template ."footer.php");
}else{
  header("location:index.php");
  exit();
}
ob_end_flush();
 ?>
