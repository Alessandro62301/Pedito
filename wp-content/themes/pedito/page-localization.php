<?php 
    //template Name: Localizacao
?>
<?php get_header(); ?>

<body>
  <div id="localization-page" class="screen-height">

    <!--Header-->
    <header class="header">
      <div class="container">
        <div class="closer">
          <button class="button closer-localization arrow-back-button ">X</button>
        </div>
        <div class="logo-content">
          <div class="logo">
            <h1 class="sr-only">Logo Loja</h1>
            <?php $menu = get_page_by_title('Menu')->ID;?>
            <img src="<?php the_field('logo_do_restaurante',$menu)?>" width="93" height="93" alt="Logo Localização">
          </div>
          <div class="title-logo">
            <h2 class="title subt-4">Compartilhe o endereço com amigos e familiares</h2>
          </div>
        </div>
      </div>
    </header>

    <!--Localization-->
    <main class="localization">
      <div class="container">
        <div class="title-localization">
          <h2><?php the_field('endereco')?></h2>
        </div>
      </div>
    </main>

    <!--Maps-->
    <footer class="maps">
      <div class="container">
        <div class="wrapper">
          <div class="google-maps">
            <a href="#">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/google-maps.png" width="71" height="71" alt="google maps">
            </a>
          </div>
          <div class="waze">
            <a href="#">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/waze.png" width="71" height="71" alt="waze maps">
            </a>
          </div>
        </div>
      </div>
    </footer>

  </div>

<?php get_footer(); ?>
