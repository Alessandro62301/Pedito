<?php 
    //template Name: Login
?>
<?php get_header(); ?>

<body>
  <div id="login" class="screen-height">

    <!--Header-->
    <header class="header">
      <div class="container container-default">
        <div class="logo">
          <h1 class="sr-only">Pedito login</h1>
          <a href="<?php print home_url(); ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon/logo.svg" width="160" height="50" alt="Logo">
          </a>
        </div>
      </div>
    </header>

    <!--Login-->
    <main class="login">
      <div class="container container-default">
        <div class="wrapper">
          <div class="open">
            <div class="title-login">
              <div class="title subt-3">
                <h2>Login</h2>
              </div>
            </div>
            <form class="form-code">
              <label for="email"></label>
              <input type="email" id="email" name="code" placeholder="Email" required>
              <label for="password"></label>
              <input type="password" id="password" name="code" placeholder="Senha" required>
              <button type="submit" class="button-code">Acessar</button>
            </form>
          </div>
        </div>
      </div>
    </main>

    <!--Footer-->
    <footer class="footer">
      <div class="container">
        <div class="copy">
          <p>FALE CONOSCO</p>
        </div>
      </div>
    </footer>
  </div>
  <?php get_footer(); ?>
