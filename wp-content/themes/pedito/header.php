<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Pedito Login">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />
  <title><?php bloginfo('name')?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
  <header>
<?php
if(has_nav_menu('primary')){
  wp_nav_menu(array(
    'theme_location' => 'primary',
    'container' => 'nav',
    // 'container_class' => '',
    'fallback_cb' => false
  ));
}
    ?>
  </header>