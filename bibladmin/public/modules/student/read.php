<?php

$result = mysqli_query($connection, "SELECT idcarte, denumire, anul FROM `carti`");

?>
<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Books</li>
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
      <th>Denumirea</th>
      <th>anul</th>
    </tr>
    </thead>
    <tbody>
    <?
    while($element = mysqli_fetch_assoc($result)){
        ?>

      <tr>
        <td><?=$element['idcarte'];?></td>
        <td><?=$element['denumire'];?></td>
        <td><?=$element['anul'];?></td>
      </tr>
        <?
    }?>
    </tbody>

  </table>
  <? }?>
</div>

