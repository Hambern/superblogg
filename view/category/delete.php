<?php
$this->Html->h1 = $this->Html->title = t("Delete category");
$this->Html->breadcrumbs[] = ["category/list", t("Categories")];
$this->Html->breadcrumbs[] = $this->Html->title;

print $form;