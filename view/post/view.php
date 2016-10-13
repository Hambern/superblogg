<?php
  $this->Html->theme = "front";
  $this->Html->title = $Post->get('title');
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
          <?=xss($Post->get('title'))?>
        </h1>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="twelve columns">
      <img class="post-view" src="<?=$Post->image()->imageStyle("post_view")?>" alt="">
    </div>
  </div>
  <div class="row">
    <div class="eight columns">
      <div class="article">
        <?=$Post->get("content")?>
        <div class="article-footer">
          <div class="borderless info">
            <span class=".u-pull-left">
              <a href="<?=$Post->category()->url()?>">
                <i class="fa fa-tag"></i>
                <?=$Post->category()->get('name')?>
              </a>
            </span>
            <span class="u-pull-right">
              <i class="fa fa-clock-o"></i>
              <?=date("y m d H M", $Post->get('created'))?>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="four columns">
      <?=$post_search?>
      <ul class="category-list">
      <?php foreach ($categories as $Category) { ?>
        <a href="<?=$Category->url()?>">
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
