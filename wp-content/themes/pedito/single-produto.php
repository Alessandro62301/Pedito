<?php get_header(); ?>
<?php $menu = get_page_by_title('Menu')->ID;
?>

<div id="request-page">

<!--Header-->
<header class="header-internal-screen">
  <div class="container">
    <div class="wrapper">
      <div class="logo-content">
        <div class="logo">
          <a href="/menu">
            <img src="<?php the_field('logo_do_restaurante',$menu) ?>" width="46" height="46" alt="Logo">
          </a>
        </div>
        <div class="title-logo">
          <h1 class="title subt-2"><?php the_field('nome_do_restaurante',$menu) ?></h1>
        </div>
      </div>
      <div class="search-menu">
        <form class="search">
          <label for="search">Buscar</label>
            <input type="search" id="search" name="s" placeholder="<?php the_field('texto_do_campo_de_busca',$menu) ?>">
        </form>
        <div class="menu">
          <a href="/localizacao" class="button-localization">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon/localization-red.png" width="20" height="20" alt="Enviar Localização">
          </a>
        </div>
      </div>
    </div>
  </div>
</header>

<!--Category Selected-->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
$post_id = get_the_ID();
?>

<section class="category-selected internal-screen">
  <div class="container">
    <div class="wrapper">
      <div class="arrow-back">
        <button class="arrow-back-button">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon/arrow-back.png" width="24" height="16" alt="voltar">
        </button>
      </div>
      <div class="title-category-selected">
        <div class="title subt-2">
          <h2><?php the_title();?></h2>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Request-->
<main class="request internal-screen">
  <div class="container container-default">
    <div class="request-selected">
      <div class="photo-request">
        <img src="<?php (get_field('image'))? the_field('image') : the_field('imagem_padrao',$menu); ?>" width="348" height="234" alt="Foto do produto">
      </div>
      <div class="content">
        <div class="title-request">
          <h2 class="title subt-2"><?php the_title(); ?></h2>
        </div>
        <div class="description-request">
          <p class="description desc-1">
            <?php the_field('description');?>
          </p>
          <p class="description desc-1">Serve: <span><?php the_field('amount')?> pessoas</span></p>
        </div>
        <div class="price">
          <span>R$<?php the_field('price')?></span>
        </div>
        <div class="ask-too">
          <h2 class="title subt-2">Peça também</h2>
        </div>
      </div>
    </div>
    <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
  </div>
</main>

<!--List of Requests-->
<section class="list-of-requests internal-screen">
  <div class="container container-default">
    <ul class="row-content">
        <?php 
            $qCategory = get_field('categoria_para_recomendar');
            if($qCategory != '') {
              $args = array(
                'post_type' => 'produto',
                'cat' => $qCategory,
                'posts_per_page' => 4,

                );
            } else {
              $args = array(
                'post_type' => 'produto',
                'posts_per_page' => 4,
                );
            }
            $query = new WP_Query( $args );
          ?>
    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php if(get_the_ID() != $post_id ) : ?>
      <li class="row">
        <a href="<?php the_permalink();?>">
          <div class="photo-request">
            <img src="<?php (get_field('image'))? the_field('image') : the_field('imagem_padrao',$menu); ?>" width="75" height="75" alt="">
          </div>
          <div class="content">
            <div class="title-request">
              <h2 class="title subt-2"><?php the_title(); ?></h2>
            </div>
            <div class="description-request">
              <p class="description desc-1">
              <?php echo mb_strimwidth(get_field('description'), 0, 30, "..."); ?>
              </p>
            </div>
            <div class="price-people">
              <div class="price">
                <span>R$<?php the_field('price'); ?></span>
              </div>
              <div class="people">
                <p class="people"><?php the_field('amount').'P' ?></p>
              </div>
            </div>
          </div>
        </a>
      </li>
      <?php endif;?>
      <?php endwhile; else: ?>
        <p><?php _e('Desculpe, nenhum produto corresponde aos seus critérios de busca.'); ?></p>
      <?php endif; ?>
    </ul>
  </div>
</section>
  <?php get_footer();?>