<?php
$this->Html->h1 = $this->Html->title = t("Edit category");
$this->Html->breadcrumbs[] = ["category/list", t("categories")];
$this->Html->breadcrumbs[] = $this->Html->title;

print $form;