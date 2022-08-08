<?php 
    //template Name: Menu
?>
<?php get_header(); ?>

<div id="store" class="screen-height">

<!--Header-->
<header class="header">
  <div class="container">
    <div class="wrapper">
      <div class="localization">
        <a href="<?php echo get_home_url().'/localizacao'; ?>" class=".button-localization">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon/submit.svg" width="21" height="21" alt="Enviar localização">
        </a>
      </div>
      <div class="logo-content">
        <div class="logo">
          <img src="<?php the_field('logo_do_restaurante') ?>" width="120" height="120" alt="Logo">
        </div>
        <div class="title-logo">
          <h1 class="title main"><?php the_field('nome_do_restaurante') ?></h1>
        </div>
      </div>
      <form class="search">
        <label for=""></label>
        <input type="search" id="search" name="s" placeholder="O que você deseja ?">
      </form>
    </div>
  </div>
</header>

<!--Category-->

<main class="list-of-category">
  <div class="container">
    <div class="wrapper">
      <div class="title-content">
        <div class="food-title">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon/map-food.png" width="30" height="27" alt="food decoration">
        </div>
        <div class="title">
          <h2 class="subt-2"><?php the_field('titulo_do_cardapio') ?></h2>
        </div>
      </div>
      <nav class="nav">
        <ul class="nav-category">
          <?php   
            $args = array(
            'style' => 'list',
            'hide_empty' => 1,
            );
            
            foreach (get_categories($args) as $category) {
              if($category->term_id != 1):
          ?>
          <li class="item-category"><a href="<?php echo get_home_url().'/produtos/?c='.$category->term_id ?>" class="title subt-2"><?php  echo $category->name; ?></a></li>
          <?php endif; }?>
        </ul> 
      </nav>
    </div>
  </div>
</main>

<?php get_footer(); ?>