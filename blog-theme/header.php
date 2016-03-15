<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body class="bg-body">
<header class="navbar navbar-static-top header-jp-blog">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-lr">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?php bloginfo('url'); ?>" class="logo-blog" title="Blog Jobplanet">Official Blog</a>
                </div>
                <ul class="navbar-blog collapse" id="main-nav">
                    <li class="main-nav"><a href="custom-page.html">Tentang Jobplanet</a></li>
                    <li class="main-nav"><a href="section.html">Info &amp; Tips</a></li>
                    <li class="main-nav"><a href="section.html">Press Release</a></li>
                    <li class="main-nav"><a href="contact.html">Kontak Kami</a></li>
                    <div class="search-toggle">
                        <button type="button"></button>
                    </div>
                    <div class="search-input">
                        <form class="form-horizontal" method="post" action="search-result.html">
                            <input type="text" class="form-control" placeholder="Enter keyword then hit Enter" />
                            <input type="submit" value="search" class="submit-disabled">
                        </form>
                    </div>
                </ul>

            </div>
        </div>
    </div>
</header>