<?php if (isset($_GET['modal']) && $_GET['modal']): ?>
  <div class="modal-header"> <button type="button" class="close" data-dismiss="modal">×</button>
   <h3> <?php print $title; ?></h3>
  </div>
  <?php print render($page['content']); ?>

<?php else: ?>
  <header id="header" role="banner">
    <div id="navbar" class="navbar navbar-medium navbar-static-top">
      <div class="navbar-inner">
        <div class="container row-fluid">
          <?php if ($logo): ?>
            <div id="logo-wrapper" class="span6">
              <div id="logo">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo-link"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
              </div>
              <div id="tagline">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="tagline-link"><img src="/sites/all/themes/infopeople/images/tagline_2013.png" alt="<?php print t('Home'); ?>" /></a>
              </div>
            </div>
          <?php endif; ?>
          <?php print render($page['masthead']) ?>
          <?php if ($site_name || $site_slogan): ?>
            <!--       <hgroup id="name-and-slogan" > -->
            <?php if ($site_name): ?>
              <!--  <h1 id="site-name"> -->
              <a class="brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              <!-- </h1> -->
            <?php endif; ?>
            <!--  </hgroup> /#name-and-slogan -->
          <?php endif; ?>
          <div id="gplus-wrapper"><a href="https://plus.google.com/118030402011071787281?prsrc=3" rel="publisher" style="text-decoration:none;">
            <img src="/sites/all/themes/infopeople/social/google.png" alt="Google+" /></a>
          </div>
            <?php if ($main_menu): ?>
              <nav id="main-menu" role="navigation">
                <a id="mobile-site-nav" class="btn btn-info" data-toggle="collapse" data-target=".nav-collapse">
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
                    </nav>
                  </div>
                <?php endif; ?>
                <?php if ($search_block) : ?>
                  <div id="nav-search-bar">
                  <?php print $search_block; ?>
                  </div>
                <?php endif;?>
              </nav>
            <?php endif; ?>
            <a id="mobile-site-nav" class="btn btn-navbar visible-phone" data-toggle="collapse" data-target="#site-nav">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <?php
            echo "<div id=\"site-nav\" class=\"nav-collapse\">";
            echo render($page['navigation']);
              if ($search_block) :
                echo '<div id="nav-search-bar">';
                echo $search_block;
                echo "</div>";
              endif;
            echo "</div>"; ?>
          </div>
        </div>
      </div><!-- /#navigation -->
    <?php print render($page['header']); ?>
  </header>
  <div id="main">
    <div class="container">
      <div class="row-fluid">
        <div id="content" class="column" role="main">
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
          <?php print render($page['highlighted']); ?>
          <?php print render($tabs); ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?>
            <ul class="action-links nav nav-pills"><?php print render($action_links); ?></ul>
          <?php endif; ?>
          <?php print render($page['content']); ?>
          <?php print $feed_icons; ?>
        </div><!-- /#content -->
        <?php
          // Render the sidebars to see if there's anything in them.
          $sidebar_first  = render($page['sidebar_first']);
          $sidebar_second = render($page['sidebar_second']);
        ?>
        <?php if ($sidebar_first || $sidebar_second): ?>
          <aside class="sidebars">
            <?php print $sidebar_first; ?>
            <?php print $sidebar_second; ?>
          </aside><!-- /.sidebars -->
        <?php endif; ?>
      </div>
    </div>
  </div><!-- /#main -->
  <footer id="footer" class="<?php print $classes; ?>">
    <div class="container">
      <div class="row">
        <div class="span6">
          <?php print render($page['footer_left']); ?>
        </div>
        <div class="span6">
          <?php print render($page['footer_right']); ?>
        </div>
      </div>
    </div>
  </footer><!-- region__footer -->
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
