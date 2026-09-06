<?php

/**
 * @file
 * Eldir's maintenance page.
 *
 * Drupal renders a site held in maintenance mode through maintenance_page,
 * not through html.tpl.php + page.tpl.php. Without a theme copy of this
 * template core's stock modules/system/maintenance-page.tpl.php is used, and
 * eldir's stylesheet, written for its own page shell, turns that markup into
 * a broken-looking page: this template reproduces page.tpl.php's shell so a
 * panel in maintenance mode looks like every other panel page.
 *
 * Regions arrive pre-rendered as strings here (template_preprocess_maintenance_page()),
 * so they are printed rather than passed through render().
 *
 * @see template_preprocess_maintenance_page()
 * @see eldir_preprocess_maintenance_page()
 * @see page.tpl.php
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="aegir <?php print $classes; ?>">
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <div id="page-wrapper">

    <div id="header" class='reverse'><div class='limiter clearfix'>
      <?php if (!empty($logo)): ?>
      <div class="logo">
        <a href="<?php print $front_page; ?>"><img src="<?php if (isset($svg_logo)): print $svg_logo; else: print $logo; endif ?>" /></a>
      </div>
      <?php endif; ?>
      <?php if (!empty($site_name)): ?><div class='site-name'><?php print $site_name; ?></div><?php endif; ?>
    </div></div><!-- /header -->

    <div id='navigation' class='reverse'><div class='limiter clearfix'>
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif; ?>
    </div></div>

    <?php if (!empty($messages)): ?>
    <div id="console" class='reverse'><div class='limiter clearfix'>
      <?php print $messages; ?>
    </div></div>
    <?php endif; ?>

    <div id='header-region'><div class='limiter clearfix'>
      <?php if (!empty($header)): print $header; endif; ?>
      <?php if (!empty($title)): ?><h2 class='page-title'><?php print $title; ?></h2><?php endif; ?>
    </div></div>

    <div id='page'><div class='limiter clearfix'>

      <div id='main'>
        <div class='page-content'>
          <a id="main-content"></a>
          <?php if (!empty($help)): print $help; endif; ?>
          <?php print $content; ?>
          <?php if (!empty($content_bottom)): print $content_bottom; endif; ?>
        </div>
      </div><!-- /main -->
      <?php if (!empty($sidebar_first) || !empty($sidebar_second)): ?>
      <div id="right" class="sidebar"><?php if (!empty($sidebar_first)): print $sidebar_first; endif; if (!empty($sidebar_second)): print $sidebar_second; endif; ?></div>
      <?php endif; ?>

    </div></div>

    <div id="footer" class='reverse'><div class='limiter'>

      <?php if ($site_footer = variable_get('site_footer', '')): ?>
      <?php print render($site_footer); ?>
      <?php endif; ?>

      <?php if (!empty($footer)): print $footer; endif; ?>
    </div></div>

  </div><!-- /#page-wrapper -->
</body>
</html>
