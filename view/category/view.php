<?php
  $this->Html->theme = "front";
  $this->Html->title = "Startsidan";
  setlocale(LC_ALL, 'sv_SE');
  setlocale(LC_ALL, "swedish");
?>

<div class="container">
  <div class="page-title">
    <div class="row">
      <div class="twelve columns">
        <div class="icon-nav">
          <a href="<?= BASE_URL ?>"><i class="fa fa-arrow-circle-left fa-5x"></i></a>
        </div>
        <h1>
          <i class="fa fa-tag"></i>
          <?=xss($Category->get('name'))?>
        </h1>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="eight columns">
      <?php if (!empty($posts)) { ?>
        <?php foreach ($posts as $Post) { ?>
        <a href="<?=$Post->url()?>">
          <img class="post-view" src="<?=$Post->image()->imageStyle("post_view")?>" alt="">
          <h3>
            <?=xss($Post->get("title"))?>
          </h3>
        </a>
        <div class="article">
          <?=shorten(strip_tags($Post->get("content")),550)?>
          <div class="article-footer">
            <div class="info">
              <span class=".u-pull-left">
                <a class="<?=$Category->getPath() == REQUEST_PATH ? 'active':''?>" href="<?=$Post->category()->url()?>">
                  <i class="fa fa-tag"></i>
                  <?=$Post->category()->get('name')?>
                </a>
              </span>
              <span class="u-pull-right">
                <i class="fa fa-clock-o"></i>
                <?=strftime("%y %m %d %H %M", $Post->get('created'))?>
              </span>
            </div>
          </div>
        </div>
        <?php } ?>
      <?php } else { ?>
        <h4><?= t("I'm sorry, but I can't seem to find one single matching post") ?></h4>
      <?php } ?>
      <?=$pager?>
    </div>
    <div class="four columns">
      <?=$post_search?>
      <ul class="category-list">
        <a href="/">
          <li>
            <i class="fa fa-tags"></i>
            <?= t("All categories") ?>
          </li>
        </a>
      <?php foreach ($categories as $Category) { ?>
        <a class="<?=$Category->getPath() == REQUEST_PATH ? 'active':''?>" href="<?=$Category->url()?>">
          <li>
            <i class="fa fa-tag"></i>
            <?=xss($Category->get("name"))?>
          </li>
        </a>
      <?php } ?>
      </ul>
    </div>
  </div>
</div>
