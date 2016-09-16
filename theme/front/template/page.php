<?php if (!empty($msgs)) { ?>
<div id="system-messages">
  <ul class="system-messages">
    <?php foreach ($msgs as $msg) { ?>
    <li class="system-message system-message-<?=$msg["type"]?>"><?=$msg["message"]?></li>
    <?php } ?>
  </ul>
</div>
<?php } ?>

<?php if ($h1) { ?>
  <h1 id="page-title"><?=$h1?></h1>
<?php } ?>

<?=$pre_content?>

<div id="content">
  <?=$content?>
</div>

<?=$post_content?>
