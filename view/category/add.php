<?php
$this->Html->h1 = $this->Html->title = t("Add category");
$this->Html->breadcrumbs[] = ["category/list", t("categories")];
$this->Html->breadcrumbs[] = $this->Html->title;

print $form;