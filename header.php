<!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/navbar-fixed-top/ -->
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/favicon.ico">

  	<title><?php wp_title( '|', true, 'right' ); ?></title>
  	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  	<link rel="profile" href="http://gmpg.org/xfn/11" />
  	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body <?php body_class();?>>
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
      </div>
      <div class="navbar-collapse collapse">
        <?php wp_nav_menu( array(
          'container'     => '',
        	'menu_class' 		=> 'nav navbar-nav',
			    'items_wrap'		=> '<ul class="%2$s">%3$s</ul>',
          'walker'        => new wp_bootstrap_navwalker()
        ) ); ?>
        <!--ul class="nav navbar-nav navbar-right">
          <li><a href="http://getbootstrap.com/examples/navbar/">Default</a></li>
          <li><a href="http://getbootstrap.com/examples/navbar-static-top/">Static top</a></li>
          <li class="active"><a href="./Fixed Top Navbar Example for Bootstrap_files/Fixed Top Navbar Example for Bootstrap.html">Fixed top</a></li>
        </ul-->
	    </div><!--/.nav-collapse -->
    </div>