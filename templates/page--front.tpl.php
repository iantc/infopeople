<?php if (isset($_GET['modal']) && $_GET['modal']): ?>
  <div class="modal-header"> <button type="button" class="close" data-dismiss="modal">×</button>
   <h3> <?php print $title; ?></h3>
  </div>
  <?php print render($page['content']); ?>

<?php else: ?>
    <header id="header" role="banner">
      <div id="navbar" class="navbar navbar-medium navbar-static-top">
        <div class="navbar-inner">
          <div class="container">
            <?php if ($logo): ?>
              <div id="logo">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
              </div>
            <?php endif; ?>
            <?php if ($site_name || $site_slogan): ?>
      <!--       <hgroup id="name-and-slogan" > -->
              <?php if ($site_name): ?>
      <!--           <h1 id="site-name"> -->
                  <a class="brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
      <!--           </h1> -->
              <?php endif; ?>

      <!--       </hgroup><!-- /#name-and-slogan -->
          <?php endif; ?>
      <?php print render($page['masthead']) ?>
      <!-- Place this code where you want the badge to render. -->
          <div id="gplus-wrapper"><a href="https://plus.google.com/118030402011071787281?prsrc=3" rel="publisher" style="text-decoration:none;">
          <img src="/sites/all/themes/infopeople/social/google.png" alt="Google+" /></a></div>
          <?php if ($main_menu): ?>
            <nav id="main-menu" role="navigation">
              <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <?php
              // This code snippet is hard to modify. We recommend turning off the
              // "Main menu" on your sub-theme's settings form, deleting this PHP
              // code block, and, instead, using the "Menu block" module.
              // @see http://drupal.org/project/menu_block
              $tree = menu_tree('main-menu');
              //indicate this is main menu being rendered
              $tree['#main_menu'] = TRUE;
              foreach ($tree as $id => &$element) {
                if (is_numeric($id)) {
                  $element['#main_menu'] = TRUE;
                }
              }
              print '<div class="nav-collapse">' . theme('links__system_main_menu', array(
                'links' => $tree,
                'attributes' => array(
                  'class' => array('nav', 'links', 'inline', 'clearfix'),
                ),
                'heading' => array(
                  'text' => t('Main menu'),
                  'level' => 'h2',
                  'class' => array('element-invisible'),
                ),
              )) . '</div>' ;
               ?>
            <?php if ($secondary_menu): ?>
              <div class="nav-collapse" id = "secondary-menu-wrapper">
              <nav id="secondary-menu" role="navigation">
                <?php
                   print theme('links__system_secondary_menu', array(
                      'links' => $secondary_menu,
                      'attributes' => array(
                        'class' => array('nav', 'links', 'inline', 'clearfix'),
                      ),
                      'heading' => array(
                        'text' => $secondary_menu_heading,
                        'level' => 'h2',
                        'class' => array('element-invisible'),
                      ),
                    ));
                ?>
                </nav> </div>
              <?php endif; ?>

              <?php if ($search_block) : ?>
                <div id="nav-search-bar">
                <?php print $search_block; ?>
                </div>
              <?php endif;?>

                  </nav>

            <?php endif; ?>

      <?php print render($page['navigation']); ?>


    <?php if ($site_slogan): ?>
      <h2 id="site-slogan">
        <?php print $site_slogan; ?>
      </h2>
    <?php endif; ?>

          </div>
        </div>

    </div><!-- /#navigation -->

    <?php print render($page['header']); ?>

  </header>
  <?php
    // Render the sidebars to see if there's anything in them.
    $sidebar_first  = render($page['sidebar_first']);
    $sidebar_second = render($page['sidebar_second']);
  ?>

  <div id="main">
    <div class="container">
      <div class="row-fluid">
        <div class="span2">
          <?php if ($sidebar_first): ?>
            <?php print $sidebar_first; ?>
          <?php endif; ?>
        </div>
        <div id="front-content" class="column span10" role="main">
          <div class="row-fluid">
            <div id="front-collage" class="span10">
              <div id="front-collage-inner"></div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="span9">
              <?php print render($page['highlighted']); ?>
              <?php print $breadcrumb; ?>
              <a id="main-content"></a>
              <?php print render($title_prefix); ?>
              <?php if ($title): ?>
                <div class="page-header">
                <h1 class="title" id="page-title"><?php print $title; ?></h1>
                </div>
              <?php endif; ?>
              <?php print render($title_suffix); ?>
              <?php print $messages; ?>
              <?php print render($tabs); ?>
              <?php print render($page['help']); ?>
              <?php if ($action_links): ?>
                <ul class="action-links nav nav-pills"><?php print render($action_links); ?></ul>
              <?php endif; ?>
              <?php print render($page['content']); ?>
              <?php print $feed_icons; ?>
            </div>
            <div class="span3">
            <?php if ($sidebar_second): ?>
              <?php print $sidebar_second; ?>
            <?php endif; ?>
            </div>
          </div>
        </div><!-- /#content -->
      </div>
    </div>
  </div><!-- /#main -->

  <?php print render($page['footer']); ?>
  <?php if ($login_block): ?>
    <?php print $login_block; ?>
  <?php endif; ?>


<?php print render($page['bottom']); ?>

<div id="forms-modal" class = "modal hide">
  <div id="waiting_modal">
    <div class="modal-header"> <button type="button" class="close" data-dismiss="modal">×</button>
     <h3> <?php print t('Please wait...'); ?> </h3>
    </div>
    <div class="modal-body">
      <div class="progress progress-striped active">
        <div class="bar" style="width: 100%;"></div>
      </div>
   </div>
  </div>
  <div id="content_modal"></div>
</div>

<?php endif; ?>
