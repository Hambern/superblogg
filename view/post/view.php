<?php
  $this->Html->theme = "front";
  $this->Html->title = $Post->get('title');
  setlocale(LC_ALL, 'sv_SE');
  setlocale(LC_ALL, "swedish");
?>

<div class="container">
  <div class="row">
    <div class="twelve column">
      <div class="icon-nav">
        <a href="/"><i class="fa fa-arrow-circle-left fa-5x"></i></a>
      </div>
      <h1 class="page-title">
        <?=xss($Post->get('title'))?>
      </h1>
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
              <?=strftime("%y %m %d %H %M", $Post->get('created'))?>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="four columns">
      <ul class="category-list">
      <?php foreach ($Categories as $Category) { ?>
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
