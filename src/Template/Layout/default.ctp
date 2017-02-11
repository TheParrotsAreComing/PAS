<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Fri Feb 10 2017 03:10:17 GMT+0000 (UTC)  -->
<html data-wf-page="58267cb4b29856df44e502fe" data-wf-site="58267cb4b29856df44e502fd">
<head>
  <meta charset="utf-8">
  <title>PAWS Administrative System</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <?= $this->Html->css('normalize.css'); ?>
  <?= $this->Html->css('webflow.css'); ?>
  <?= $this->Html->css('paws-administrative-system.webflow.css'); ?>
  <?= $this->Html->script('modernizr.js'); ?>
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
  <style>
    .scroll {
      width: 20px;
      height: 200px;
      overflow: auto;
      float: left;
      margin: 0 10px;
    }
    .scroll1::-webkit-scrollbar {
      width: 5px;
    }
    .scroll1::-webkit-scrollbar-track {
      background: #fff;
    }
    .scroll1::-webkit-scrollbar-thumb {
      background: #5d5d5d
    }
  </style>
</head>
<body class="page">
  <div class="navbar-cont w-nav" data-animation="over-left" data-collapse="medium" data-duration="400" data-no-scroll="1">
    <div class="navbar w-container"><img class="navbar-settings" sizes="(max-width: 991px) 100vw, 32px" src="img/settings.png" srcset="img/settings-p-500x500.png 500w, img/settings.png 512w" width="32"><img class="navbar-search-exit" data-ix="search-bar-exit" src="img/x.png" width="30">
      <div class="navbar-search-cont w-form" data-ix="search-bar-mobile-hide">
        <form data-name="Email Form" id="email-form" name="email-form">
          <input class="navbar-search w-input" data-name="Name 2" id="name-2" maxlength="256" name="name-2" placeholder="Search" type="text">
        </form>
        <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while submitting the form</div>
        </div>
      </div>
      <div class="login-screen navbar-hamburger w-nav-button"><img src="img/menu.png" width="36">
      </div>
      <a class="brand-cont w-clearfix w-inline-block" href="pas-home.html"><img class="brand" height="50" src="img/paws-logo-blue-diamond.png">
      </a>
      <nav class="navbar-menu w-nav-menu" role="navigation"><a class="sidebar-link w-nav-link" href="pas-home.html">Home</a><a class="sidebar-link w-nav-link" href="cats-list.html">Cats</a><a class="sidebar-link w-nav-link" href="litter-list.html">Litters</a><a class="sidebar-link w-nav-link" href="#">Adopters</a><a class="sidebar-link w-nav-link" href="#">Foster Homes</a><a class="sidebar-link w-nav-link" href="#">Volunteers</a><a class="sidebar-settings w-nav-link" href="#">Settings</a>
      </nav>
    </div>
  </div>
	<?= $this->fetch('content') ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
  <?= $this->Html->script('webflow.js'); ?>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
