<?php
$result = mysqli_query($connection, "
  SELECT 
    students.id, 
    students.name,
    students.avatar,
    carti.denumire AS book_name
    
  FROM 
    students
  LEFT JOIN `carti` ON students.carte_id = carti.id
");

?>
<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Students</li>
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

    <?
    while($element = mysqli_fetch_assoc($result)){
        ?>
      <div class="card" style="width: 18rem;">
        <img src="../public/img/user_avatar/<?=$element['avatar'];?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?=$element['name'];?></h5>
          <p class="card-text">
            Book: <?=$element['book_name']?:'Not selected';?>
          </p>
          <a href="?module=cart&action=add&id=<?=$element['id'];?>" class="btn btn-primary">To Cart</a>
        </div>
      </div>
        <?
    }?>

  <? }?>
</div>

