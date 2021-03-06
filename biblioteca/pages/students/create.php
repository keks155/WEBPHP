<?
if(isset($_POST['name'])){
    if($_POST['name'] != '') {
        if(mysqli_query($connection,
            "
                INSERT INTO students 
                SET 
                    name = '{$_POST['name']}',
                    group_id = '{$_POST['group']}'
                 "
        )){
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

$resultGroups = mysqli_query($connection, "SELECT id, name FROM `groups`");

?>

<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="?module=students&action=read">Students</a></li>
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
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
      <small id="emailHelp" class="form-text text-muted">Student name.</small>
    </div>

    <div class="form-group">
      <label for="group">Group</label>
      <select class="form-control" id="group" name="group">
        <option value="0">Select group</option>
          <? while($element = mysqli_fetch_assoc($resultGroups)){?>
        <option value="<?=$element['id'];?>"><?=$element['name'];?></option>
        <? }?>
      </select>
      <small id="emailHelp" class="form-text text-muted">Group name.</small>
    </div>

    <input type="submit" class="btn btn-primary" value="add">
  </form>
</div>

