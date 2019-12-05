<?

if(isset($_POST['name'])){
    if($_POST['name'] != '') {
        if(mysqli_query($connection, "UPDATE students SET name = '{$_POST['name']}' WHERE id={$_GET['id']}")){
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

$result = mysqli_query($connection, "SELECT id, name FROM students WHERE id={$_GET['id']}");
if($result){
    $element = mysqli_fetch_assoc($result);
}
?>
<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="?module=students&action=read">Students</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update</li>
    </ol>
  </nav>
</div>

<div class="row">
  <form action="" method="post">
    <div class="alert alert-<?=$msgClass;?>" role="alert">
        <?=$msg;?>
    </div>
    Student name <input type="text" name="name" value="<?=$element['name'];?>">
    <input type="submit" value="update">
  </form>
</div>


