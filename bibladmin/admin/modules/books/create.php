<?
if(isset($_POST['name'])){
    if($_POST['name'] != '') {
        if(mysqli_query($connection, "INSERT INTO `carti` SET denumire = '{$_POST['name']}',
        												      anul = '{$_POST['anul']}'"))


        {
            $msg = 'Succesfuly added!';
            $msgClass = 'success';
        } else {
            $msg = 'Add error!';
            $msgClass = 'danger';
        }
    }else {
        $msg = 'Error. Name can not be empty';
        $msgClass = 'danger';
    }
}

?>

<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="?module=books&action=read">books</a></li>
      <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
  </nav>
</div>

<div class="row">
  <form action="" method="post">

    <div class="alert alert-<?=$msgClass;?>" role="alert">
        <?=$msg;?>
    </div>

    <div class="form-group">
      <label for="name">Denumire</label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
      <label for="anul">anul</label>
      <input type="text" class="form-control" name="anul" id="anul" aria-describedby="emailHelp" placeholder="Enter name">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <input type="submit" class="btn btn-primary" value="add">
  </form>
</div>

