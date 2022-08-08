<?php get_header(); ?>
<?php $menu = get_page_by_title('Menu')->ID;
?>
<body>
  <div id="app" class="internal-screen">
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
              <a href="/localizacao" class=".button-localization">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon/localization-red.png" width="20" height="20" alt="Enviar Localização">
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!--Category Selected-->
    <section class="category-selected">
      <div class="container">
        <div class="wrapper">
          <div class="arrow-back">
            <button class="arrow-back-button">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon/arrow-back.png" alt="voltar">
            </button>
          </div>
          <div class="title-category-selected">
            <div class="title subt-2">
              <?php   
                $qCategory = $_GET['c'];
                if(isset($qCategory)):
                  $category_detail=get_the_category_by_ID($qCategory);?>
              <h2><?php echo $category_detail; ?></h2>
              <?php else: ?>
                  <h2>Produtos</h2>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    <!--List of Requests-->
    <main class="list-of-requests internal-screen screen-height">
      <div class="container container-default">
        <ul class="row-content">
          <?php 
            $qTitle = get_search_query($escaped = true);
            if($qCategory != '') {
              $args = array(
                'post_type' => 'produto',
                'cat' => $qCategory,
                );
            } else {
              $args = array(
                'post_type' => 'produto',
                'post_title_like' => $qTitle,
                );
            }
            $query = new WP_Query( $args );
          ?>
        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();?>
          <li class="row">
            <a href="<?php the_permalink();?>">  
              <div class="photo-request">
                <img src="<?php (get_field('image'))? the_field('image') : the_field('imagem_padrao',$menu); ?>" width="75" height="75" alt="">
              </div>
              <div class="content">
                <div class="title-request">
                  <h2 class="title subt-2"><?php the_title();?></h2>
                </div>
                <div class="description-request">
                  <p class="description desc-1"><?php echo mb_strimwidth(get_field('description'), 0, 50, "...");?></p>
                </div>
                <div class="price-people">
                  <div class="price">
                    <span>R$<?php the_field('price');?></span>
                  </div>
                  <div class="people">
                    <p class="people"><?php echo get_field('amount').'P'; ?></p>
                  </div>
                </div>
              </div>
            </a>
          </li>
          <?php   endwhile; else: ?>
            <p><?php _e('Desculpe, nenhum produto corresponde aos seus critérios de busca.'); ?></p>
          <?php endif; ?>
        </ul>
      </div>
    </main>

<?php get_footer();?>



<?php get_footer(); ?>