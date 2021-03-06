<?php
$this->Html->h1 = $this->Html->title = t("Categories");
$this->Html->breadcrumbs[] = $this->Html->title;
?>

<a class="btn btn-primary" href="<?=url("category/add")?>"><?=t("Add category")?></a>

<?=$search?>

<table class="striped category-list">
  <thead>
    <tr>
      <th><?=t("Name")?></th>
      <th class="actions"><?=t("Actions")?></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($items as $Category) { ?>
    <tr>
      <td><?=xss($Category->get("name"))?></td>
      <td class="actions">
        <a href="<?=url("category/edit/".$Category->id())?>"><?=t("Edit")?></a>
        <a href="<?=url("category/delete/".$Category->id())?>"><?=t("Delete")?></a>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>

<?=$pager?>
