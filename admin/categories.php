<?php
ob_start();
session_start();
if (isset($_SESSION['username'])) {
  $pageTitle = "Categories";
  include("init.php");

  $do= isset($_GET['do']) ? $_GET['do'] : 'Manage';
                        // Manage
  if ($do=='manage') {
    $sort = "ASC";
    $sortArray =array("ASC","DESC");
    if (isset($_GET["sort"]) && in_array($_GET['sort'],$sortArray)) {
    $sort=$_GET["sort"];
    }
    $stmt5 = $conn->prepare("SELECT * FROM categories ORDER BY Ordering $sort");
    $stmt5->execute();
    $result= $stmt5->fetChAll();
    if (! empty($result)) {

?>
<h1 class="text-center"><strong><?php echo lang("manageCategory"); ?> </strong></h1>
 <div class="addcat">
   <a href="categories.php?do=addCategory" class="btn btn-primary"><?php echo lang("addCategory") ?></a>
</div>
<div class="container category">
  <div class="card">
    <div class="card-header ">
      <i class="fa fa-edit"></i> <strong><?php echo lang("manageCategory"); ?></strong>
       <div class="order float-right">
         <span> <i class ='fa fa-sort'></i> <strong><?php echo lang("ordering") ?> :</strong> [</span>
         <a href="categories.php?do=manage&sort=ASC" class="<?php if($sort=="ASC"){ echo "active";}; ?>"><?php echo lang("asc") ?></a>
         <span> | </span>
         <a href="categories.php?do=manage&sort=DESC" class="<?php if($sort=="DESC"){ echo "active";}; ?>"><?php echo lang("desc") ?> ]</a>
         <span> <i class ='fa fa-eye'></i>  <strong><?php echo lang("view")." : "; ?></strong> [</span>
          <span data-view='full' class="full"><?php  echo lang("full"); ?></span>
         <span> | </span>
         <span data-view='classic' class="classic"><?php echo lang("classic"); ?> ]</span>

       </div>
     </div>

    <div class="card-body">
      <?php
          foreach ($result as $value) {
            echo "<div class='catego'>";
            echo "<div class ='cate-button float-right'>";
            echo "<a href='?do=edit&id=".$value['CategoryID']."'class='btn btn-sm  btn-success'><i class='fa fa-edit'></i>".lang('edit')."</a>";
            echo "<a href='?do=delete&id=".$value['CategoryID']."'class='confirm btn btn-sm  btn-danger'><i class='fa fa-edit'></i>".lang('delete')."</a>";

            echo "</div>";
            echo "<h3> <strong>".$value['Name']."</strong> </h3>";
            echo "<div class='full-view'>";
                echo "<p>"; if ($value['Description']==""){echo lang('notDescription');} else { echo $value['Description']; } echo"</p>";
                if ($value['Visibilty']==1) { echo "<span class='vishiden'>".lang("hiden")."</span>";};
                if ($value['AllowComment']==1) { echo "<span class='comd'>".lang("commentDisabled")."</span>";};
                if ($value['AllowAds']==1) { echo "<span class='adsd'>".lang("adsDisabled")."</span>";};
            echo "</div>";

            echo "</div>";
            echo "<hr>";
          }
       ?>

    </div>

  </div>

</div>


<?php
} // end if there is no any Memeber
else {
  echo "<div class='container'>";
 alert_info(lang("noCategory"));
 echo "<div class='nobtnadd'>";
 echo "<a class='btn btn-primary float-left' href = '?do=addCategory'>".lang("addNewCategory")."</a>";
 echo "</div>";
 echo "</div>";
}
  }
                                                 // ADD
  elseif($do=="addCategory") {

    ?>
    <form class='login' action="?do=insert" method="post">
    <h3 class="text-center"><?php echo lang("addCategory")?></h3>
    <div class="form-group">
      <label for="exampleInputEmail1"><?php echo lang("name")?></label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="categoryName"  aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("nameOfCategory")?>" autocomplete="off">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1"><?php echo lang("ordering")?></label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="ordering" aria-describedby="emailHelp"  placeholder="<?php echo lang("enter") ." ".lang("rangeOrdering")?>" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1"><?php echo lang("description")?></label>
      <textarea  class="form-control" id="exampleInputEmail1" name="description" aria-describedby="emailHelp"  placeholder="<?php echo lang("enter") ." ".lang("descripthe")?>" autocomplete="off"></textarea>
    </div>


    <div class="vis ">
        <label for="vis"><?php echo lang("visibility")  ?></label>
        <div class="">
          <input type="radio" id="vis-yes" name="visibility" value="0"/ checked>
          <label for="vis-yes"><?php echo lang("yes"); ?></label>
        </div>
        <div class="">
          <input type="radio" id="vis-no" name="visibility" value="1"/>
          <label for="vis-no"><?php echo lang("no"); ?></label>
        </div>
    </div>
      <div class="alco ">
        <label for="alco"><?php echo lang("allowCommenting")  ?></label>
        <div class="">
            <input type="radio" id="alco-yes" name="allowCommenting" value="0" checked />
            <label for="alco-yes"><?php echo lang("yes"); ?></label>
        </div>
        <div class="">
            <input type="radio" id="alco-no" name="allowCommenting" value="1"  />
            <label for="alco-no"><?php echo lang("no"); ?></label>
        </div>
      </div>
      <div class="alads">
        <label for="alads"><?php echo lang("allowAds")  ?></label>
        <div class="">
          <input type="radio" id="alads-yes" name="AllowAds" value="0" checked />
          <label for="alads-yes"><?php echo lang("yes"); ?></label>
        </div>
        <div class="">
          <input type="radio" id="alads-no" name="AllowAds" value="1" />
          <label for="alads-no"><?php echo lang("no"); ?></label>
        </div>
      </div>
    <button type="submit" class="btn btn-primary "><?php echo lang("addCategory")?></button>
    </form>

  <?php

  }
  elseif ($do=="insert") {
    if (isset($_POST['categoryName']) && isset($_POST['visibility']) && isset($_POST['allowCommenting']) && isset($_POST['AllowAds'])) {
      $name = $_POST['categoryName'];
      $description = $_POST['description'];
      $ordering= $_POST['ordering'];
      $visivle = $_POST['visibility'];
      $allowc= $_POST['allowCommenting'];
      $allowads= $_POST['AllowAds'];
      $var = checkIteams("Name","categories",$name);
      $error=array();
    if ($var==1) {
      $msg='<div class="p-3 mb-2 bg-danger text-white text-center update-div">'.lang('existCategory').'</div>';
      $url ="categories.php?do=addCategory";
      redirectHome($msg, $url);
    }

    elseif($name==""){
      $msg='<div class="p-3 mb-2 bg-danger text-white text-center update-div">'.lang('categoryCant').'</div>';
      $url ="categories.php?do=addCategory";
      redirectHome($msg, $url);    }
    else{
        $stmt = $conn->prepare("INSERT INTO categories (Name,Description,Ordering,Visibilty,AllowComment,AllowAds) VALUES(:NAME, :DESCRIPTION, :ORDERING, :VISIBILITY, :ALLOWCOMMENT,:ALLOWADS)");
        $stmt ->execute(array(
          'NAME'                 => $name,
          "DESCRIPTION"          => $description,
          "ORDERING"             => $ordering,
          "VISIBILITY"           => $visivle,
          "ALLOWCOMMENT"         => $allowc,
          "ALLOWADS"             => $allowads
        ));


        $msg='<div class="p-3 mb-2 bg-success text-white text-center update-div-success">'.lang('successfulPreogress').'</div>';
        $url ="dashboard.php";
        redirectHome($msg, $url);
    }

    }
    else {

      $msg='<div class="p-3 mb-2 bg-danger text-white text-center update-div">'.lang('categoryCant').'</div>';
      $url ="categories.php?do=addCategory";
      redirectHome($msg, $url);
    }

  }

                       //Edit
 elseif($do=="edit") {
 if (isset($_GET['id']) && is_numeric($_GET['id'])) {
 $userid = $_GET['id'];
   $stmt = $conn->prepare("SELECT * FROM categories WHERE CategoryID = ? LIMIT 1");
  	$stmt ->execute(array($userid));
   $row = $stmt ->fetch();
   $count = $stmt->rowCount();

  	if ($count > 0) {

    ?>

 <form class='login' action="?do=update" method="post">
   <input type="hidden" name="id" value="<?php echo $userid; ?>">
   <h3 class="text-center"><?php echo lang("editCategory")?></h3>
   <div class="form-group">
     <label for="exampleInputEmail1"><?php echo lang("name")?></label>
     <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $row['Name'] ?>" name="categoryName"  aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("nameOfCategory")?>" autocomplete="off">
   </div>

   <div class="form-group">
     <label for="exampleInputEmail1"><?php echo lang("ordering")?></label>
     <input type="text" class="form-control" value="<?php echo $row['Ordering'] ?>" id="exampleInputEmail1" name="ordering" aria-describedby="emailHelp"  placeholder="<?php echo lang("enter") ." ".lang("rangeOrdering")?>" autocomplete="off">
   </div>
   <div class="form-group">
     <label for="exampleInputEmail1"><?php echo lang("description")?></label>
     <textarea  class="form-control" id="exampleInputEmail1" value="" name="description" aria-describedby="emailHelp"  placeholder="<?php if (empty($row['Description'])) {echo lang("notDescription"); } else{echo$row['Description'];}?>" autocomplete="off"></textarea>
   </div>


   <div class="vis ">
       <label for="vis"><?php echo lang("visibility")  ?></label>
       <div class="">
         <input type="radio" id="vis-yes" name="visibility" value="0" <?php if($row["Visibilty"]==0){echo "checked";} ?>/>
         <label for="vis-yes"><?php echo lang("yes"); ?></label>
       </div>
       <div class="">
         <input type="radio" id="vis-no" name="visibility" value="1" <?php if($row["Visibilty"]==1){echo "checked";} ?> />
         <label for="vis-no"><?php echo lang("no"); ?></label>
       </div>
   </div>
     <div class="alco ">
       <label for="alco"><?php echo lang("allowCommenting")  ?></label>
       <div class="">
           <input type="radio" id="alco-yes" name="allowCommenting" value="0" <?php if($row["AllowComment"]==0){echo "checked";} ?> />
           <label for="alco-yes"><?php echo lang("yes"); ?></label>
       </div>
       <div class="">
           <input type="radio" id="alco-no" name="allowCommenting" value="1" <?php if($row["AllowComment"]==1){echo "checked";} ?>  />
           <label for="alco-no"><?php echo lang("no"); ?></label>
       </div>
     </div>
     <div class="alads">
       <label for="alads"><?php echo lang("allowAds")  ?></label>
       <div class="">
         <input type="radio" id="alads-yes" name="AllowAds" value="0" <?php if($row["AllowAds"]==0){echo "checked";} ?> />
         <label for="alads-yes"><?php echo lang("yes"); ?></label>
       </div>
       <div class="">
         <input type="radio" id="alads-no" name="AllowAds" value="1" <?php if($row["AllowAds"]==1){echo "checked";} ?> />
         <label for="alads-no"><?php echo lang("no"); ?></label>
       </div>
     </div>
   <button type="submit" class="btn btn-primary "><?php echo lang("save")?></button>

 </form>

  <?php
 } // end if count();
 else {
   echo "you dont have permission ";
 }

 } // end elseif isset() numeric
 else {
   echo 0;
 }
 } // end elseif do edite

                                            // UDPDATE
elseif ($do=="update") {
if ($_SERVER['REQUEST_METHOD']=="POST") {

echo "<h1 class='text-center'>"; echo lang('updateMember'); echo "</h1>";
echo "<div class='container update_div'>";
$id = $_POST['id'];
$name = $_POST['categoryName'];
$description = $_POST['description'];
$ordering = $_POST['ordering'];
$visibility = $_POST['visibility'];
$allocommenting =$_POST['allowCommenting'];
$allowads= $_POST['AllowAds'];
$var = checkIteams("Name","Categories",$name);
$errors = array();
if (strLen($name)<2) {
$errors[0]="Username".lang("less")." <strong>2 Words</strong>";
}
elseif($var==1){
  $stmt= $conn->prepare("UPDATE categories SET Description = ?, Ordering = ?,Visibilty =?, AllowComment = ?, AllowAds = ?  WHERE CategoryID =?");
  $stmt -> execute(array($description,$ordering,$visibility,$allocommenting,$allowads,$id ));
  if ($stmt->rowCount() >0) {
    $msg = "<div class='alert alert-success text-center'>".lang('categoryNameExists')."</div>";
    redirectHome($msg,"?do=manage");

  }
  else{
  $msg = "<div class='alert alert-success text-center'>".lang('failedProgress')."</div>";
  redirectHome($msg,"?do=edit");
  }
}
elseif ($description=="") {
  $stmt= $conn->prepare("UPDATE categories SET Name = ?,Ordering = ?,Visibilty =?, AllowComment = ?, AllowAds = ?  WHERE CategoryID =?");
  $stmt -> execute(array($name,$ordering,$visibility,$allocommenting,$allowads,$id ));
  if ($stmt->rowCount() >0) {
  $msg = "<div class='alert alert-success text-center'>".lang('successfulPreogress')."</div>";
  redirectHome($msg,"?do=manage");
}
}
elseif(empty($errors)) {
$stmt= $conn->prepare("UPDATE categories SET Name = ?, Description = ?, Ordering = ?,Visibilty =?, AllowComment = ?, AllowAds = ?  WHERE CategoryID =?");
$stmt -> execute(array($name,$description,$ordering,$visibility,$allocommenting,$allowads,$id ));
if ($stmt->rowCount() >0) {
  $msg = "<div class='alert alert-success text-center'>".lang('successfulPreogress')."</div>";
  redirectHome($msg,"?do=manage");

}
else{
$msg = "<div class='alert alert-success text-center'>".lang('failedProgress')."</div>";
redirectHome($msg,"?do=edit");
}
} // end else if emty error

foreach ($errors as $value) {

 $msg = "<div class='alert alert-danger text-center'>".$value."</div>";;
redirectHome($msg,"?do=manage");


}

echo "</div>";

} // if update request method
}
                                       // END UPDATE
                                                              //START DELETE
elseif($do="delete"){

  echo "<h1 class='text-center'>".lang('deleteCategory')."</h1>";
  echo "<div class='container'>";
  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $catId=$_GET['id'];
  $check = checkIteams("CategoryID","categories",$catId);
  if ($check > 0) {
    $deletestmt = $conn ->prepare("DELETE FROM categories WHERE CategoryID = ? ");
    $deletestmt->execute(array($catId));
    $msg = "<div class='alert alert-success text-center'>".lang('successfulPreogress')."</div>";
    redirectHome($msg,"?do=manage");
  }
  else {
    header("location:dashboard.php");
  }


  }
  else {
    header("location:dashboard.php");
  }

  echo "</div>";

}
                                                              //END DELETE

include($template ."footer.php"); // footer
}
else {
  header("location:index.php");
  exit;
}

ob_end_flush();

 ?>
