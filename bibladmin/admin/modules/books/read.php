<?php

if(mysqli_query($connection, "DELETE FROM `carti` WHERE id={$_GET['id']}")){
    $msg = 'Succesfuly deleted!';
} else {
    $msg = 'Delete error!';
}

$result = mysqli_query($connection, "SELECT id, denumire, anul FROM `carti`");

?>
<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">books</li>
    </ol>
  </nav>
</div>
<div class="row">

  <?
  if(!$result){?>
    <div class="alert alert-warning" role="alert">
      No data
    </div>
  <?} else {?>

  <table class="table">
    <thead>
    <tr>
      <th>ID</th>
      <th>Denumire</th>
      <th>anul</th>
      <th>
        <a class="btn btn-primary" href="?module=books&action=create">Create</a>
      </th>
    </tr>
    </thead>
    <tbody>
    <?
    while($element = mysqli_fetch_assoc($result)){
        ?>
      <tr>
        <td><?=$element['id'];?></td>
        <td><?=$element['denumire'];?></td>
        <td><?=$element['anul'];?></td>

        <td>
          <a href="index.php?module=books&action=read&idcarte=<?=$element['id'];?>" onclick="return confirm('Do you want to delete?')">X</a>
          <a href="index.php?module=books&action=update&id=<?=$element['id'];?>">M</a>
        </td>
      </tr>
        <?
    }?>
    </tbody>

  </table>
  <? }?>
</div>

