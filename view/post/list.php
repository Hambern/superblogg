<?php
$this->Html->h1 = $this->Html->title = t("Posts");
$this->Html->breadcrumbs[] = $this->Html->title;
?>

<a class="btn btn-primary" href="<?=url("post/add")?>"><?=t("Add post")?></a>

<?=$search?>

<table class="striped post-list">
  <thead>
    <tr>
      <th class="actions"><?=t("Actions")?></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($items as $Post) { ?>
    <tr>
      <td class="actions">
        <a href="<?=url("post/edit/".$Post->id())?>"><?=t("Edit")?></a>
        <a href="<?=url("post/delete/".$Post->id())?>"><?=t("Delete")?></a>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>

<?=$pager?>