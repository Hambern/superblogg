<?php
$this->Html->h1 = $this->Html->title = t("Delete post");
$this->Html->breadcrumbs[] = ["post/list", t("Posts")];
$this->Html->breadcrumbs[] = $this->Html->title;

print $form;