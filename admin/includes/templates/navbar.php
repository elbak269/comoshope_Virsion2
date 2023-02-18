<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand" href="index.php"><?php echo lang("brand"); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="dashboard.php"><?php echo lang("home_admin"); ?><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="categories.php?do=manage"><?php echo lang("categories"); ?><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="items.php"><?php echo lang("iteams"); ?><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="showMember.php?UserID=<?php echo $_SESSION['UserID']; ?>"><?php echo lang("sellers"); ?><span class="sr-only">(current)</span></a>
      </li>

    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['username'];  ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../index.php"><?php echo lang("visitShop") ?></a>
          <a class="dropdown-item" href="members.php?do=edit&UserID=<?php echo $_SESSION['UserID']; ?>"><?php echo lang("edit_profile"); ?></a>
          <a class="dropdown-item" href="#"><?php echo lang("setting"); ?></a>
          <a class="dropdown-item" href="logout.php"><?php echo lang("logout"); ?></a>
          <a href="addMember.php?UserID=<?php echo $_SESSION['UserID']; ?>" id="addMember-btn" class="dropdown-item"><?php echo lang('addNewMemeber')?></a>
        </div>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">


    </form>
  </div>
</nav>
