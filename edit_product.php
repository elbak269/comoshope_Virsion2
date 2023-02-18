<?php
ob_start();


// ADD NEW ITEM
$pageTitle = "Edit Product";
$login_css = " ";
$edit_product_css = " ";
$loginjs=" ";
$edit_product_js ="";
$add_product = " ";
session_start();
if (isset($_SESSION['user'])) {
$notheader="";
include("init.php");
$sallerid =  getsellerid($_SESSION['user']);
?>
<input id="seller__" type="hidden" name="" value="<?php echo $sallerid;  ?>">
<input type="hidden" id="user__" name="" value="<?php echo $_SESSION['user']; ?>">

<?php
$clientid = getclientID($_SESSION['user']);
if (isset($_GET["edit_product"]) || isset($_GET['product_id'])) {

?>

<input id="__pruduct" type="hidden" name="" value="<?php echo $_GET['product_id']; ?>">
<div class="pro d-none">
  <div class="pompt_cont ">
    <div class="promt_add_category ">
  <p class="text-center"><?php echo lang("edit_prduct"); ?></p>
  <div class="form-group">
  <label for="inpuy_add_catego"><?php echo lang("nameOfCategory")?>  </label> <span class="reqired">*</span>
  <input type="input" class="form-control" id="inpuy_add_catego"name="itemName" required  aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("nameOfCategory")?>" autocomplete="off">
  <button type="button" id="btn_add_new_catego" class="btn btn-sm btn-primary" name="button"><i class="fas fa-plus"></i> <?php echo lang("addCategory"); ?></button>
  <button type="button" id="btn_cacel_category" class="btn btn-sm btn-danger" name="button"><i class="fas fa-window-close"></i> <?PHP echo lang("cancell"); ?></button>
  <div id="ALET_EMPTY_CAT_IMPT" class="alert alert-danger d-none">
  <p class="text-center"> <?php echo lang("categoryCant"); ?></p>
  </div>
  </div>
    </div>
  </div>
</div>



<div class="pro_BRAND d-none">
  <div class="pompt_cont ">
    <div class="promt_add_category ">
  <p class="text-center"><?php echo lang("add_brand"); ?></p>
  <div class="form-group">
  <label for="inpuy_add_catego"><?php echo lang("brand_name")?>  </label> <span class="reqired">*</span>
  <input type="input" class="form-control" id="inpuy_add_brand"name="itemName" required  aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("brand_name")?>" autocomplete="off">
  <button type="button" id="btn_add_new_brand" class="btn btn-sm btn-primary" name="button"><i class="fas fa-plus"></i> <?php echo lang("add_brand"); ?></button>
  <button type="button" id="btn_cacel_BRAND" class="btn btn-sm btn-danger" name="button"><i class="fas fa-window-close"></i> <?PHP echo lang("cancell"); ?></button>
  <div id="ALET_EMPTY_BRAND_IMPT" class="alert alert-danger d-none">
  <p class="text-center"> <?php echo lang("categoryCant"); ?></p>
  </div>
  </div>
    </div>

  </div>

</div>



<div class='cont '>



  <h1 class="text-center"><?php echo lang("edit_prduct")?></h1>

  <div class="row">
    <div class="col-12 "> <!---col-sm-12 col-md-7 col-lg-7 col-xl-7-->
      <div class="inside_col">

    <!--  <form class='login ' action="?isert_items" method="POST" enctype="multipart/form-data">gggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg --> <!--FORM-->

      <div class="form-group">
      <label for="nameOfItem"><?php echo lang("productName")?>  </label> <span class="reqired">*</span>
      <input type="text" class="form-control" id="nameOfItem_id" max="100" name="itemName" required  aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("nameOfItem")?>" autocomplete="off">
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1"><?php echo lang("description")?></label> <span class="reqired">*</span>
      <textarea class="form-control" id="itemDescription_id" name="itemDescription" placeholder="<?php echo "Entrez La" ." ".lang("descriptionItem")?>" rows="3" cols="80"></textarea>
      </div>
      <div class="row">
        <div class=" col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
          <div class="form-group">
            <label for="priceofitem"><?php echo lang("price")?></label> <span class="reqired">*</span>
            <input type="number" class="form-control" id="priceofitem_id" name="price" required  aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("itemPrice")?>" autocomplete="off">
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
          <div class="form-group">
            <label for="currencyitem"><?php echo lang("currency")?></label> <span class="reqired">*</span>
            <select id="currencyitem_id" class="form-control" name="current">

            <?php
            $stmtmo = $conn->prepare("SELECT * FROM currency ");
            $stmtmo-> execute();
            $fetch = $stmtmo ->fetchAll();
            foreach ($fetch as  $value) {
            echo "<option data-optional='".$value['CurrencyName']."' value='".$value['CurrencyID']."' >".$value["CurrencyName"]."</option>";
            }

            ?>
            </select>
          </div>
        </div>

      </div>

      <div class="form-group">
      <label for="countryitem"><?php echo lang("country")?></label>
      <input type="text" class="form-control" id="countryitem" name="country" aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("countryOfMade")?>" autocomplete="off">
      </div>

      <div class="form-group">
      <label for="exampleInputEmail1"><?php echo lang("status")?></label> <span class="reqired">*</span>
      <select id="status_id" class="form-control" name="status">
        <?php
        $stm_use_status = $conn->prepare("SELECT Value_ST FROM used_status_product");
        $stm_use_status->execute();
        $feusts = $stm_use_status->fetchAll();

        foreach ($feusts as  $value) {
          echo "<option value='".$value["Value_ST"]."'>".$value["Value_ST"]."</option>";
        }

        ?>

      </select>
      </div>
      <div class="row div_all_cat_bra" >
        <div class="col-12 "> <!--category-->
          <div class="form-group div_cat___">
          <label for="exampleInputEmail1"><?php echo lang("category")?></label> <span class="reqired">*</span>
          <select class="form-control" id="select_box_cate" name="categoryid">

          <?php
          $stmt =$conn->prepare("SELECT CategoryID ,Name  FROM categories ORDER BY CategoryID ASC");
          $stmt->execute();
          $cat = $stmt->fetchAll();

          foreach ($cat as  $value) {
          echo "<option  value='".$value['CategoryID']."'> ".$value['Name']." </option>";
          }

          ?>
          </select>
          </div>

        </div>

        <div class="col-12 "> <!--brands  col-sm-12 col-md-6 col-lg-6 col-xl-6-->
          <div class="form-group">
          <label for="exampleInputEmail1"><?php echo lang("brandM")?></label> <span class="reqired">*</span>
          <select id="_BRAND_SELECT" class="form-control" name="brand">

          <?php
          $stmt =$conn->prepare("SELECT * FROM brand");
          $stmt->execute();
          $cat = $stmt->fetchAll();

          foreach ($cat as  $value) {
          echo "<option  value='".$value['BrandID']."'> ".$value['BrandName']." </option>";
          }

          ?>
          </select>
          </div>

        </div>



        <div class=" col-12 div_feature_for_mobile  d-none">

          <div class="col-12  ">
            <div class="form-group">
            <label for="__storage"><?php echo lang("operaring_system")?> *</label>
            <select id="__oprating_system" class="form-control" name="__oprating_system">
                <option value=""><?php echo lang("choice_os"); ?></option>
                <?php
                foreach (GET_OMOBILE_OPERATING_SYSTEM() as  $value) {
                  echo "<option  value='".$value['OS_ID']."'> ".$value['OS_NAME']." </option>";
                }

                 ?>
               </select>
              </div>

          </div>

          <div class="col-12 ">
            <div class="form-group">
            <label for="camera_resolution"><?php echo lang("camera_resolution")?> *</label>

            <select id="camera_resolution__" class="form-control" name="camera_resolution__">

            <?php
            $stmt =$conn->prepare("SELECT * FROM camera_resolution ORDER BY Resolution_Value ASC ");
            $stmt->execute();
            $cat = $stmt->fetchAll();

            foreach ($cat as  $value) {
            echo "<option  value='".$value['Resolution_ID']."'> ".$value['Resolution_Value']." </option>";
            }

            ?>
            </select>
            </div>

          </div>



          <div class=" col-12 ">
            <div class="form-group">
            <label for="_ram_"><?php echo lang("ram")?> *</label>
            <select id="_ram_" class="form-control" name="_ram_">
                <option value=""><?php echo lang("choice_ram"); ?></option>
                <?php
                foreach (GET_MEMORY_RAME_FOR_MOBILE() as  $value) {
                  echo "<option  value='".$value['RamID']."'> ";
                if($value["Rame_Value"] < 1){ echo $value["Rame_Value"].lang("mg"); } else{echo $value["Rame_Value"].lang("gb"); }
                echo   "</option>";
                }

                 ?>

          </select>
          </div>

          </div>

          <div class="col-12 col_div_storage ">
              <div class="form-group">
              <label for="__storage"><?php echo lang("storage")?> *</label>
              <select id="__storage" class="form-control" name="__storage">
                <option value=""><?php echo lang("choice_storage"); ?></option>

                <?php
                foreach (GET_MEMORY_SPACE_FOR_MOBILE() as  $value) {
                  echo "<option  value='".$value['Storage_ID']."'> ";
                if($value["Storage_Value"] < 1){ echo $value["Storage_Value"].lang("mg"); } else{echo $value["Storage_Value"].lang("gb"); }
                echo   "</option>";
                }

                 ?>
               </select>
               </div>

          </div>



          <div class="col-12  ">
            <div class="form-group">
            <label for="__SIM"><?php echo lang("sim")?> *</label>
            <select id="__SIM" class="form-control" name="__SIM">
            <option value=""><?php echo lang("choice_sim"); ?></option>
                <?php
                $stmt_sim =$conn->prepare("SELECT * FROM SIM_Card_Slot ");
                $stmt_sim->execute();
                $__sim = $stmt_sim->fetchAll();
                foreach ($__sim as  $value) {
                  echo "<option  value='".$value['SIM _Card _Slot_ID']."'> ".$value['SIM _Card _Slot_VALUE']." </option>";
                }

                 ?>
               </select>
              </div>

          </div>

          <div class="col-12  text-center div_net___work">
            <p class="text-center"><?php echo lang("network"); ?></p>
                <?php
                $stmt_sim =$conn->prepare("SELECT * FROM network WHERE Device_ID = 1 ");
                $stmt_sim->execute();
                $__sim = $stmt_sim->fetchAll();

                foreach ($__sim as  $value) {?>

                  <div class="form-check check_box_network">
                          <input type="checkbox" name="network_for_mobile" value="<?php echo $value["connective_id"];?>" class="form-check-input network_for_mobile" id="network_for_mobile<?php echo $value["connective_id"];?>">
                          <label class="form-check-label" for="network_for_mobile<?php echo $value["connective_id"];?>"><?php echo $value["Conective_value"];?></label>
                       </div>
                  <?php

                }

                 ?>

          </div>



        </div>




        <div class=" col-12 div_feature_for_computer  d-none">

          <div class="col-12  ">

            <div class="form-group">
            <label for="__cpu_for_computer"><?php echo lang("cpu")?> *</label>
            <select id="__cpu_for_computer" class="form-control" name="__cpu_for_computer">
                <option value=""><?php echo lang("cpu_cant_empty"); ?></option>


                <?php
                $stmt_sim =$conn->prepare("SELECT cpu.* ,cpugenerations.generation as cpu_gene ,cpugenerations.description FROM cpu
                  INNER JOIN cpugenerations ON  cpugenerations.id = cpu.generation
                   WHERE Device_Type = 2 OR CpuID = 9999999 ");
                $stmt_sim->execute();
                $__sim = $stmt_sim->fetchAll();

                foreach ($__sim as  $value) {

                      echo "<option  value='".$value['CpuID']."'> ".$value['CPUNAME']." ".$value['cpu_gene'] ." </option>";
                }

                 ?>
               </select>
               </div>

          </div>

          <div class="col-12  ">

            <div class="form-group">
            <label for="__gpu_forcomputer"><?php echo lang("gpu")?> *</label>
            <select id="__gpu_forcomputer" class="form-control" name="__gpu_forcomputer">
               <option value=""><?php echo lang("choice_gpu"); ?></option>

                <?php
                $stmt_sim =$conn->prepare("SELECT * FROM gpu
                  ORDER BY GPU_ID ASC ");
                $stmt_sim->execute();
                $__sim = $stmt_sim->fetchAll();

                foreach ($__sim as  $value) {
                      echo "<option  value='".$value['GPU_ID']."'> ".$value['GPU_NAME']." </option>";
                }

                 ?>
               </select>
               </div>

          </div>


          <div class="col-12  ">
            <div class="form-group">
            <label for="__oprating_system_FOR_COMPUTER"><?php echo lang("operaring_system")?> *</label>
            <select id="__oprating_system_FOR_COMPUTER" class="form-control" name="__oprating_system_FOR_COMPUTER">
              <option value=""><?php echo lang("choice_os"); ?></option>
                <?php
                foreach (GE_COMPUTER__OPERATING_SYSTEM() as  $value) {
                  echo "<option  value='".$value['OS_ID']."'> ".$value['OS_NAME']." </option>";
                }

                 ?>
               </select>
              </div>

          </div>
          <div class=" col-12 ">
            <div class="form-group">
            <label for="_ram__computer"><?php echo lang("ram")?> *</label>
            <select id="_ram__computer" class="form-control" name="_ram__computer">
              <option value=""><?php echo lang("choice_ram"); ?></option>
                <?php
                foreach (GET_ALL__MEMORY_RAME() as  $value) {
                  echo "<option  value='".$value['RamID']."'> ";
                if($value["Rame_Value"] < 1){ echo $value["Rame_Value"].lang("mg"); } else{echo $value["Rame_Value"].lang("gb"); }
                echo   "</option>";
                }
                 ?>
          </select>
          </div>

          </div>

          <div class="col-12 col_div_storage ">
              <div class="form-group">
              <label for="__storage_FOR_COMPUTER"><?php echo lang("storage")?> *</label>
              <select id="__storage_FOR_COMPUTER" class="form-control" name="__storage_FOR_COMPUTER">
                <option value=""><?php echo lang("choice_storage"); ?></option>

                <?php
                foreach (GET_ALL_MEMORY_SPACE() as  $value) {
                  echo "<option  value='".$value['Storage_ID']."'> ";
                if($value["Storage_Value"] < 1){ echo $value["Storage_Value"].lang("mg"); } else{echo $value["Storage_Value"].lang("gb"); }
                echo   "</option>";
                }

                 ?>
               </select>
               </div>

          </div>

          <div class="col-12  ">
              <div class="form-group">
              <label for="__ssd"><?php echo lang("ssd")?> *</label>
              <select id="__ssd" class="form-control" name="__ssd">

                <?php
                foreach (GET_ALL_SSD() as  $value) {
                  echo "<option  value='".$value['SSD_ID']."'> ";
                if($value["SSD_VALUE"] < 1){ echo $value["SSD_VALUE"].lang("mg"); } else{echo $value["SSD_VALUE"].lang("gb"); }
                echo   "</option>";
                }

                 ?>
               </select>
               </div>

          </div>



          <div class="col-12  text-center div__net_for_com">
            <p class="text-center"><?php echo lang("network"); ?> </p>
                <?php
                $stmt_sim =$conn->prepare("SELECT * FROM network WHERE Device_ID = 2 ");
                $stmt_sim->execute();
                $__sim = $stmt_sim->fetchAll();

                foreach ($__sim as  $value) {?>

                  <div class="form-check check_box_network">
                          <input class="network_for_COMPUTER" type="checkbox" name="network_for_COMPUTER" value="<?php echo $value["connective_id"]; ?>" class="form-check-input" id="network_for_COMPUTER<?php echo $value["connective_id"];?>">
                          <label class="form-check-label" for="network_for_COMPUTER<?php echo $value["connective_id"];?>"><?php echo $value["Conective_value"];?></label>
                       </div>

                  <?php

                }

                 ?>

          </div>



        </div>




      </div>

      <div class="row row_tags">

        <div class="info_div alert alert-info d-none">
          <p class="text-center"> <strong><?php echo lang("wahts_tag");  ?></strong> </p>
          <p><?php echo lang("tag_descr"); ?></p>
        </div>
        <div class=" div_input_info_tag">
          <div class="form-group">
          <label for="tags"><?php echo lang("tags")." // "."<span>".lang('separateTagsWith')." ( , )"."</span>";?> <i id="img_info_tag" class="far fa-question-circle"></i></label>
          <input type="text" class="form-control" id="tags" name="tags"  aria-describedby="emailHelp" placeholder="" autocomplete="off">

          </div>
        </div>
      <!--  <div id="img_info_tag" class=" div_img_info_tag">
            <img  src="theme/image/question_mark.png" class="info_tage_ico" alt="">
        </div> -->



      </div>



<div class="row">
    <div class="">


    </div>

  <div class="value_ship">

  </div>
</div>

<div class="cont_sipment__">
  <p class="text-center"> <strong> <?php echo lang("shippment_product"); ?></strong></p>
<table class="table table-hover">

<tbody>
<tr>
<td>  <div class="form-check">
  <input type="checkbox" name="checkbox_ngazidja" class="form-check-input" value="1" id="ship_ngazidja">
  <label class="form-check-label" for="ship_ngazidja"><?php echo lang("shipping_to").lang("ngazidja"); ?></label>
  </div>
</td>

<td class="td_ngazidja">
  <div class="row ">
    <div class="col-12 ">
      <div class="div_payme_method">
        <div class="div_titlt_payment_meth_ngaz">
      <p class="text-center"><?php echo lang("payment_method")." *"; ?> <i id="img_id_info_paym_ngaz" class="far fa-question-circle"></i></p>
        </div>

          <div class="info_div_payme_method_ngazija alert alert-info d-none ">
            <p class="text-center"> <strong><?php echo lang("whats")." ".lang("payment_method");  ?></strong> </p>
            <p class="text-center" ><?php echo lang("payme_method_descr").lang("ngazidja"); ?></p>
          </div>



        <div class="check_div_paym_meth_ngaz text-center">
        <?php
        foreach (get_PAYMENT_METHOD() as  $value) {
        ?>
        <div class="form-check check_box_payment_metho check_box_paym_ngazidja">
         <input type="checkbox" name="paym_id_ngazidja" class="form-check-input payments_ngazidja chk_box_pay_nga" value="<?php echo $value["payment_id"]; ?>" id="paym_id_ngazidja<?php echo $value["payment_id"] ?> ">
         <label class="form-check-label" for="paym_id_ngazidja<?php echo $value["payment_id"] ?> "><?php echo $value["payment_name"];?></label>
         </div>
        <?php
        }
     ?>
     </div>
     </div>
    </div>

    <div class="col-12">
      <div class="row">
        <div class="info_div_ship_method_ngazija alert alert-info d-none ">
          <p class="text-center"> <strong><?php echo lang("whats")." ".lang("shippingMethod");  ?></strong> </p>
          <p class="text-center" ><?php echo lang("ship_method_desc").lang("ngazidja"); ?></p>
        </div>

        <div class="col_div_input_ship_metho_ngazidja">
          <div class="form-group">
            <label for="ship_metho_ngazidja"><?php echo lang("shippingMethod");?> * <i id="img_inf_ship_meth_nga" class="far fa-question-circle"></i></label>
            <select id="ship_metho_ngazidja" class="form-control" name="ship_metho_ngazidja">
            <?php
            $stmtmo = $conn->prepare("SELECT * FROM shipping ");
            $stmtmo-> execute();
            $fetch = $stmtmo ->fetchAll();
            foreach ($fetch as  $value) {
            echo "<option  value='".$value['ShippingID']."' >".$value["ShippingName"]."</option>";
            }
            ?>
            </select>
          </div>

        </div>


      </div>
    </div>

    <div class="col-12">

      <div class="row row_ship_pric_nga">
        <div class="info_div_ship_price_ngazija alert alert-info d-none ">
          <p class="text-center"> <strong><?php echo lang("whats")." ".lang("ship_price_to_ngazidja");  ?></strong> </p>
          <p class="text-center" ><?php echo lang("ship_price_desc").lang("ngazidja"); ?></p>
        </div>

        <div class="col_div_input_ship_nga">
          <div class="form-group div_value_cont">
              <label class="form-check-label" for="ship__price_ngazidja"><?php echo lang("ship_price_to_ngazidja")?>* <i  id="img_id_info_ship_ngazidja"class="far fa-question-circle"></i> </label>
       <input type="number" class="form-control" id="ship__price_ngazidja" name="ship__price_ngazidja" required  placeholder="<?php echo lang("enter") ." ".lang("SHIP_PRICE").lang("ngazidja")?>" autocomplete="off">
         <span class="curen_logo "><?php echo lang("euro") ?></span>
          <span></span>
          </div>

        </div>
      </div>


    </div>
    <div class="col-12">
      <div class="row">
        <div class="info_div_EAXPECT_DA_ngazija alert alert-info d-none ">
          <p class="text-center"> <strong><?php echo lang("whats")." ".lang("expect_date_to_ngazidja");  ?></strong> </p>
          <p class="text-center" ><?php echo lang("expect_date_dscr").lang("ngazidja"); ?></p>
        </div>

        <div class="col_div_input_expec_nga">
          <div class="form-group div_value_cont">
          <label class="form-check-label" for="estamit_day_ngazidja_value"><?php echo lang("expect_date_to_ngazidja");?> * <i id="img_id_info_expect_ngazidja" class="far fa-question-circle"></i></label>
          <input type="number" class="form-control" maxlength="5" id="estamit_day_ngazidja_value" name="estamit_day_ngazidja_" required  placeholder="<?php echo lang("enter") ." ".lang("estimatedDelivery").lang("ngazidja")?>" autocomplete="off">
         <span class="days_logo "><?php echo lang("days")?></span>
          </div>

        </div>


      </div>

    </div>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="fixed_shpping_price_ngazidja" >
    <label class="form-check-label" for="fixed_shpping_price_ngazidja">
      <?PHP ECHO lang("fixed_shipping_price"); ?>
    </label>
</div>

</td>

</tr>


<tr>
<td>  <div class="form-check">
  <input type="checkbox" class="form-check-input" name="checkbox_NDUWANI" value="1" id="ship_ndzuwani">
  <label class="form-check-label"  for="ship_ndzuwani"><?php echo lang("shipping_to").lang("ndzuwani"); ?></label>
     </div>
</td>
<td class="td_ndzuwani">
  <div class="row">

          <div class="col-12 ">
            <div class="div_payme_method">
              <div class="div_titlt_payment_meth_ndzu">
            <p class="text-center"><?php echo lang("payment_method")." *"; ?> <i id="img_id_info_paym_ndzu" class="far fa-question-circle"></i></p>
              </div>

                <div class="info_div_payme_method_ndzuwani alert alert-info d-none ">
                  <p class="text-center"> <strong><?php echo lang("whats");  ?></strong> </p>
                  <p class="text-center" ><?php echo lang("payme_method_descr").lang("ndzuwani"); ?></p>
                </div>

              <div class="check_div_paym_meth_ndzu text-center">
              <?php
              foreach (get_PAYMENT_METHOD() as  $value) {
              ?>
              <div class="form-check check_box_payment_metho">
               <input type="checkbox" name="payme_id_ndzuwani" class="form-check-input payme_id_ndzuwani ckb_paym_ndzuwani " value="<?php echo $value["payment_id"] ?>" id="payme_id_ndzuwani<?php echo $value["payment_id"] ?> ">
               <label class="form-check-label" for="payme_id_ndzuwani<?php echo $value["payment_id"] ?> "><?php echo $value["payment_name"];?></label>
               </div>
              <?php
              }
           ?>
           </div>
           </div>
          </div>

          <div class="col-12">
            <div class="row">

              <div class="info_div_ship_method_ndzuwani alert alert-info d-none ">
                <p class="text-center"> <strong><?php echo lang("whats")." ".lang("shippingMethod");;  ?></strong> </p>
                <p class="text-center" ><?php echo lang("ship_method_desc").lang("ndzuwani"); ?></p>
              </div>

              <div class="col_div_input_ship_metho_ndzuwani">
                <div class="form-group">
                  <label for="ship_metho_ndzuwa_selc"><?php echo lang("shippingMethod");?> * <i id="img_inf_ship_meth_ndzu" class="far fa-question-circle"> </i></label>
                  <select id="ship_metho_ndzuwa_selc" class="form-control" name="ship_metho_ndzuwa_selc">
                  <?php
                  $stmtmo = $conn->prepare("SELECT * FROM shipping ");
                  $stmtmo-> execute();
                  $fetch = $stmtmo ->fetchAll();
                  foreach ($fetch as  $value) {
                  echo "<option  value='".$value['ShippingID']."' >".$value["ShippingName"]."</option>";
                  }

                  ?>
                  </select>
                </div>

              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="row row_ship_pric_ndzu">
                  <div class="info_div_ship_price_ndzuwani alert alert-info d-none ">
                    <p class="text-center"> <strong><?php echo lang("whats")." ".lang("ship_price_to_ndzuwani");  ?></strong> </p>
                    <p class="text-center" ><?php echo lang("ship_price_desc").lang("ndzuwani"); ?></p>
                  </div>
                  <div class="col_div_input_ship_nga">
                    <div class="form-group div_value_cont">
                      <label class="form-check-label" for="ship_ndzuwani_price"><?php echo lang("SHIP_PRICE").lang("ndzuwani");?> *  <i id="img_id_info_ship_ndzuwani" class="far fa-question-circle"> </i> </label>
                     <input type="number" class="form-control"  id="ship_ndzuwani_price" name="ship_ndzuwani_price" required  placeholder="<?php echo lang("enter") ." ".lang("SHIP_PRICE").lang("ndzuwani")?>" autocomplete="off">
                     <span class="curen_logo "><?php echo lang("euro") ?></span>
                   </div>
                 </div>
            </div>


          </div>

          <div class="col-12">
            <div class="row">
              <div class="info_div_EAXPECT_DA_ndzuwani alert alert-info d-none ">
                <p class="text-center"> <strong><?php echo lang("whats")." ".lang("expect_date_to_ndzuwani");  ?></strong> </p>
                <p class="text-center" ><?php echo lang("expect_date_dscr").lang("ndzuwani"); ?></p>
              </div>
              <div class="col_div_input_expec_ndzu">
                 <div class="form-group div_value_cont">
                    <label class="form-check-label" for="estamit_day_ndzuwani_value"><?php echo lang("expect_date_to_ndzuwani");?> * <i id="img_id_info_expect_ndzuwani" class="far fa-question-circle"> </i></label>
                    <input type="number" class="form-control" maxlength="5" id="estamit_day_ndzuwani_value" name="estamit_day_ndzuwani" required  placeholder="<?php echo lang("estimatedDelivery") ." ".lang("SHIP_PRICE").lang("ndzuwani")?>" autocomplete="off">
                    <span class="days_logo "><?php echo lang("days") ?></span>
                </div>
              </div>
            </div>


          </div>
  </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="fixed_shpping_price_ndzuwani" >
        <label class="form-check-label" for="fixed_shpping_price_ndzuwani">
          <?PHP ECHO lang("fixed_shipping_price"); ?>
        </label>
    </div>
</td>
</tr>

<tr>
<td>
   <div class="form-check">
      <input type="checkbox" name="ceckbox_ship_wali" value="1" class="form-check-input" id="ship_wali">
      <label class="form-check-label" for="ship_wali"><?php echo lang("shipping_to").lang("mwali"); ?></label>
  </div>
</td>
<td class="td_mwali">
  <div class="row">

          <div class="col-12 ">
                <div class="div_payme_method">
                  <div class="div_titlt_payment_meth_mwal">
                   <p class="text-center"><?php echo lang("payment_method")." *"; ?> <i id="img_id_info_paym_mwal" class="far fa-question-circle"></i></p>
                  </div>

                    <div class="info_div_payme_method_mwali alert alert-info d-none ">
                      <p class="text-center"> <strong><?php echo lang("whats")." ".lang("payment_method");  ?></strong> </p>
                      <p class="text-center" ><?php echo lang("payme_method_descr").lang("mwali"); ?></p>
                    </div>
                  <div class="check_div_paym_meth_mwal text-center">
                  <?php
                  foreach (get_PAYMENT_METHOD() as  $value) {
                  ?>
                  <div class="form-check check_box_payment_metho">
                   <input type="checkbox" name="paym_id_mwali" class="form-check-input paym_id_mwali chkbx_paym_mwali" value="<?php echo $value["payment_id"];?>" id="paym_id_mwali<?php echo $value["payment_id"] ?> ">
                   <label class="form-check-label" for="paym_id_mwali<?php echo $value["payment_id"] ?> "><?php echo $value["payment_name"];?></label>
                   </div>
                  <?php
                  }
               ?>
               </div>
               </div>
          </div>

          <div class="col-12">
            <div class="row">
              <div class="info_div_ship_method_mwali alert alert-info d-none ">
                <p class="text-center"> <strong><?php echo lang("whats")." ".lang("shippingMethod");  ?></strong> </p>
                <p class="text-center" ><?php echo lang("ship_method_desc").lang("mwali"); ?></p>
              </div>

              <div class="col_div_input_ship_metho_mwali">
                <div class="form-group">
                  <label for="ship_metho_mwali"><?php echo lang("shippingMethod");?> * <i id="img_inf_ship_meth_mwal" class="far fa-question-circle"></i></label>
                  <select id="ship_metho_mwali" class="form-control" name="ship_metho_mwali">
                  <?php
                  $stmtmo = $conn->prepare("SELECT * FROM shipping ");
                  $stmtmo-> execute();
                  $fetch = $stmtmo ->fetchAll();
                  foreach ($fetch as  $value) {
                  echo "<option  value='".$value['ShippingID']."' >".$value["ShippingName"]."</option>";
                  }

                  ?>
                  </select>
                </div>

              </div>
            </div>
          </div>


          <div class="col-12">
                <div class="row row_ship_pric_ndzu">
                  <div class="info_div_ship_price_mwali alert alert-info d-none ">
                    <p class="text-center"> <strong><?php echo lang("whats")." ".lang("ship_price_to_mwali");  ?></strong> </p>
                    <p class="text-center" ><?php echo lang("ship_price_desc").lang("mwali"); ?></p>
                  </div>

                    <div class="col_div_input_ship_nga">
                      <div class="form-group div_value_cont">
                          <label class="form-check-label" for="ship_mwali_price"><?php echo lang("SHIP_PRICE").lang("mwali");?> * <i id="img_id_info_ship_mwali" class="far fa-question-circle"></i></label>
                         <input type="number" class="form-control" id="ship_mwali_price" name="ship_mwali_price" required  placeholder="<?php echo lang("enter") ." ".lang("SHIP_PRICE").lang("mwali")?>" autocomplete="off">
                         <span class="curen_logo "><?php echo lang("euro"); ?></span>
                      </div>
                    </div>
                </div>
          </div>


          <div class="col-12">
               <div class="row">

                 <div class="info_div_EAXPECT_DA_mwali alert alert-info d-none ">
                   <p class="text-center"> <strong><?php echo lang("whats")." ".lang("expect_date_to_mwali");  ?></strong> </p>
                   <p class="text-center" ><?php echo lang("expect_date_dscr").lang("mwali"); ?></p>
                 </div>
                 <div class="col_div_input_expec_mwa">
                   <div class="form-group div_value_cont">
                         <label class="form-check-label" for="estamit_day_mwali_value"><?php echo lang("expect_date_to_mwali");?> * <i id="img_id_info_expect_mwali" class="far fa-question-circle"></i></label>
                      <input type="number" class="form-control" maxlength="5" id="estamit_day_mwali_value" name="estamit_day_mwali_" required  placeholder="<?php echo lang("enter") ." ".lang("estimatedDelivery").lang("mwali")?>" autocomplete="off">
                      <span class="days_logo "><?php echo lang("days"); ?></span>
                   </div>

               </div>
                </div>

        </div>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="fixed_shpping_price_mwali" >
          <label class="form-check-label" for="fixed_shpping_price_mwali">
            <?PHP ECHO lang("fixed_shipping_price"); ?>
          </label>
      </div>


</td>
</tr>

<tr>
<td> <div class="form-check">
        <input type="checkbox" name="checkbox_france" value="1" class="form-check-input" id="ship_france">
        <label class="form-check-label" for="ship_france"><?php echo lang("shipping_to").lang("france"); ?></label>
     </div>
</td>
<td class="td_france">

  <div class="row">
    <div class="col-12 ">
          <div class="div_payme_method">
            <div class="div_titlt_payment_meth_france">
             <p class="text-center"><?php echo lang("payment_method")." *"; ?> <i id="img_id_info_paym_france" class="far fa-question-circle"></i></p>
            </div>

              <div class="info_div_payme_method_france alert alert-info d-none ">
                <p class="text-center"> <strong><?php echo lang("whats")." ".lang("payment_method");  ?></strong> </p>
                <p class="text-center" ><?php echo lang("payme_method_descr").lang("france"); ?></p>
              </div>
            <div class="check_div_paym_meth_france text-center">
            <?php
            foreach (get_PAYMENT_METHOD() as  $value) {
            ?>
            <div class="form-check check_box_payment_metho">
             <input type="checkbox" name="paym_id_france" class="form-check-input paym_id_france chkx_payme_france" value="<?php echo $value["payment_id"] ?>" id="paym_id_france<?php echo $value["payment_id"] ?> ">
             <label class="form-check-label" for="paym_id_france<?php echo $value["payment_id"] ?> "><?php echo $value["payment_name"];?></label>
             </div>
            <?php
            }
         ?>
         </div>
         </div>
    </div>

    <div class="col-12">
      <div class="row">
        <div class="info_div_ship_method_france alert alert-info d-none ">
          <p class="text-center"> <strong><?php echo lang("whats")." ".lang("shippingMethod");  ?></strong> </p>
          <p class="text-center" ><?php echo lang("ship_method_desc").lang("france"); ?></p>
        </div>

        <div class="col_div_input_ship_metho_france">
          <div class="form-group">
            <label for="ship_metho_france"><?php echo lang("shippingMethod");?> * <i id="img_inf_ship_meth_france" class="far fa-question-circle"></i></label>
            <select id="ship_metho_france" class="form-control" name="ship_metho_france">
            <?php
            $stmtmo = $conn->prepare("SELECT * FROM shipping ");
            $stmtmo-> execute();
            $fetch = $stmtmo ->fetchAll();
            foreach ($fetch as  $value) {
            echo "<option  value='".$value['ShippingID']."' >".$value["ShippingName"]."</option>";
            }

            ?>
            </select>
          </div>

        </div>
      </div>
    </div>


    <div class="col-12">
      <div class="row row_ship_pric_ndzu">
        <div class="info_div_ship_price_france alert alert-info d-none ">
          <p class="text-center"> <strong><?php echo lang("whats")." ".lang("ship_price_to_france");  ?></strong> </p>
          <p class="text-center" ><?php echo lang("ship_price_desc").lang("france"); ?></p>
        </div>

        <div class="col_div_input_ship_nga">
          <div class="form-group div_value_cont">
              <label class="form-check-label" for="ship_france_price"><?php echo lang("SHIP_PRICE").lang("france");?> * <i id="img_id_info_ship_france" class="far fa-question-circle"></i></label>
             <input type="number" class="form-control" id="ship_france_price" name="ship_france_price" required  placeholder="<?php echo lang("enter") ." ".lang("SHIP_PRICE").lang("france")?>" autocomplete="off">
             <span class="curen_logo "><?php echo lang("euro") ?></span>
           </div>

        </div>


      </div>


    </div>
    <div class="col-12">

      <div class="row">
        <div class="info_div_EAXPECT_DA_france alert alert-info d-none ">
          <p class="text-center"> <strong><?php echo lang("whats")." ".lang("expect_date_to_france");  ?></strong> </p>
          <p class="text-center" ><?php echo lang("expect_date_dscr").lang("france"); ?></p>
        </div>


        <div class="col_div_input_expec_fra">
          <div class="form-group div_value_cont">
             <label class="form-check-label" for="estamit_day_france_value"><?php echo lang("expect_date_to_france");?>  * <i id="img_id_info_expect_france" class="far fa-question-circle"></i> </label>
             <input type="number" class="form-control" maxlength="5" id="estamit_day_france_value" name="estamit_day_france_" required  placeholder="<?php echo lang("enter") ." ".lang("estimatedDelivery").lang("france")?>" autocomplete="off">
             <span class="days_logo "><?php echo lang("days") ?></span>
          </div>
        </div>


      </div>




    </div>

  </div>

  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="fixed_shpping_price_france" >
    <label class="form-check-label" for="fixed_shpping_price_france">
      <?PHP ECHO lang("fixed_shipping_price"); ?>
    </label>
</div>

</td>
</tr>
</tbody>
</table>




</div>

<div class=" text-center">
  <div class="form-check ">
   <input type="checkbox" name="" class="form-check-input" value="1" id="edit_prudts_img">
   <label class="form-check-label" for=""> <strong> <?php echo lang("edit_products_img");?> </strong></label>
   </div>

</div>
      <div class="row div_cont_choice_img div_imgs_prd__">

       <div class="col-sm-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
         <div class=" pic_3">

           <div class="custom-file form-group">
             <input type="file" name="chooseItemPic1" class="custom-file-input" id="chooseItemPic1" placeholder="" accept="image/*" required >
             <label id="show_pic_item"  class="custom-file-label show_pic_item" for="chooseItemPic1"><?php echo lang('chooseItemPic1'); ?></label>
           </div>

         </div>
         <div class="divbtn__img">
           <p  class="p_lab" ><?php echo lang("first_img_for_prod")?> <span class="reqired">*</span></p>
         <img  id="BTN_CHOICE_IMG_1"  src="theme/image/add_imag.png">
          <i class="far fa-check-circle i_img1"></i>
         </div>

       </div>

       <div class="col-sm-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
         <div class=" pic_3">

           <div class="custom-file form-group">
             <input type="file" name="itemPic2" class="custom-file-input" id="itemPic2" accept="image/*" required>
             <label id="show_pic_item"  class="custom-file-label show_pic_item" for="itemPic2"><?php echo lang('chooseItemPic2'); ?></label>
           </div>

         </div>
         <div class="divbtn__img">
           <p class="p_lab"  ><?php echo lang("second_img_for_prod")?> <span class="reqired">*</span></p>
           <img  id="BTN_CHOICE_IMG_2" class="" src="theme/image/add_imag.png">
           <i class="far fa-check-circle i_img2"></i>
          </div>

       </div>

       <div class="col-sm-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
         <div class="pic_3">

           <div class="custom-file form-group">
             <input type="file" name="itemPic3" class="custom-file-input" id="itemPic3" accept="image/*" required>
             <label id="show_pic_item" name ="show_pic_item" class="custom-file-label show_pic_item" for="itemPic3"><?php echo lang('chooseItemPic3'); ?></label>
           </div>

         </div>
          <div class="divbtn__img">
            <p  class="p_lab"  ><?php echo lang("last_img_for_prod")?> <span class="reqired">*</span></p>
            <img  id="BTN_CHOICE_IMG_3" src="theme/image/add_imag.png">
            <i  class="far fa-check-circle i_img3"></i>
          </div>

       </div>


      </div>
        <div class="text-center">
            <button id="btn_subm" type="submit" class="btn btn-primary "><i class="fas fa-plus"></i> <?php echo lang("add_the_product")?></button>
        </div>





    </div>
    </div>
<!--
    <div class="sidebar_login col-12 ">
      <div class="inside_col">
        <h4 class="text-center"><?php echo lang("itemPreview");?></h4>
      <div class="img_div">
        <div class="show_img">
          <img id="slider_item_pic_1" src="<?php echo $img."6.jpg"   ?>" class='img-thumbnail slider_item_pic_1' alt=""  >
          <div class="content">
            <div class="">
              <div id="item_name" class="item_name">ItemName</div>
            </div>

            <div class=" rating_star ">
              <span class="fa fa-star checked_f"></span>
              <span class="fa fa-star checked_f"></span>
              <span class="fa fa-star checked_f"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
            </div>
            <p  class="price_currency">
              <span id="price_span" class="price_span"></span>
            <span id="currency_item" class="currency_span">  </span>
            </p>

            <p>
              <span><?php echo lang('shippingMethod')  ?></span>
              <span id="shippig_item" class='shippingCompany float-right'></span>

            </p>

          </div>
        </div>

        <div class="slider_pic_add_item ">   <!--START SLIDER PICS-->
        <!--
          <img id=""  src="<?php echo $img."6.jpg"   ?>" class='fullpic' alt="">
        </div>
        <div class="row img_thuls">
          <div class=" col img_thumna">
            <img id="img_thumna1" src="<?php echo $img."6.jpg"   ?>" class='img-thumbnail fullpic slider_item_pic_1 selected' alt="">
          </div>
          <div class=" col img_thumna">
            <img id="img_thumna2" src="<?php echo $img."6.jpg"   ?>" class='img-thumbnail img_thumna2' alt="">
          </div>
          <div class=" col img_thumna">
            <img id="img_thumna3" src="<?php echo $img."6.jpg"   ?>" class='img-thumbnail img_thumna3' alt="">
          </div>

        </div>

      </div>
    </div>
  </div> -->

  </div>
  <div class=" text-center">
    <button id="btn_edit_prd" class="btn btn-primary text-center"><i class="fas fa-edit"></i> <?php echo lang("edit_the_product")?></button>
  </div>

<div class=" div_eror_ alert alert-danger text-center d-none">

</div>

<div class=" div_success_ alert alert-success text-center d-none">

</div>


</div>
<?php


include($template ."footer.php");
}
else {
//  header("location:index.php");
  exit();
}
}
else {
  header("location:index.php");
  exit();
}
ob_end_flush();
 ?>
