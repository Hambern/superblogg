<?php
  $this->Html->theme = "front";
  $this->Html->title = "Startsidan";
  setlocale(LC_ALL, 'sv_SE');
  setlocale(LC_ALL, "swedish");
?>

<div class="container">
  <div class="row">
    <div class="twelve columns">
      <div class="icon-nav">
        <a href="/"><i class="fa fa-arrow-circle-left fa-5x"></i></a>
      </div>
      <h1 class="page-title">
        <i class="fa fa-tag"></i>
        <?=xss($Category->get('name'))?>
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="eight columns">
      <?php foreach ($Posts as $Post) { ?>
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
      <?=$Pager?>
    </div>
    <div class="four columns">
      <ul class="category-list">
      <?php foreach ($Categories as $Category) { ?>
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