<?

if(isset($_POST['name'])){
    if($_POST['name'] != '') {
        if(mysqli_query($connection, "UPDATE `carti` SET denumire = '{$_POST['name']}' WHERE id={$_GET['id']}")){
            $msg = 'Update succes';
            $msgClass = 'success';
        } else {
            $msg = 'Update ERROR';
            $msgClass = 'danger';
        }
    } else {
        $msg = 'Error. Name can not be empty';
        $msgClass = 'danger';
    }
}

$result = mysqli_query($connection, "SELECT id, denumire FROM `carti` WHERE id={$_GET['id']}");
if($result){
    $element = mysqli_fetch_assoc($result);
}
?>
<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="?module=books&action=read">books</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update</li>
    </ol>
  </nav>
</div>

<div class="row">
  <form action="" method="post">
    <div class="alert alert-<?=$msgClass;?>" role="alert">
        <?=$msg;?>
    </div>
    books name <input type="text" name="name" value="<?=$element['name'];?>">
    <input type="submit" value="update">
  </form>
</div>


