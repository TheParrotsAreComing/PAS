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
  <?= $this->Html->css('components.css'); ?>
  <?= $this->Html->css('paws-administrative-system.css'); ?>
  <?= $this->Html->script('modernizr.js'); ?>
  <?= $this->Html->script('moment.js'); ?>
  <?= $this->Html->css('paws-custom.css'); ?>
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
      width: 10px;
    }
    .scroll1::-webkit-scrollbar-track {
      background: #fff;
    }
    .scroll1::-webkit-scrollbar-thumb {
      background: #5d5d5d
    }
    .star-rating {
      font-family: 'FontAwesome';
    }
    .star-rating > fieldset {
      border: none;
    }
    .star-rating > fieldset:not(:checked) > input {
      position: absolute;
      clip: rect(0, 0, 0, 0);
    }
    .star-rating > fieldset:not(:checked) > label {
      float: right;
      overflow: hidden;
      white-space: nowrap;
      cursor: pointer;
      color: #0172FF;
    }
    .star-rating > fieldset:not(:checked) > label:before {
      content: '\f006  ';
    }
    .star-rating > fieldset:not(:checked) > label:hover,
    .star-rating > fieldset:not(:checked) > label:hover ~ label {
      color: #0172FF;
      text-shadow: 0 0 3px #0172FF;
    }
    .star-rating > fieldset:not(:checked) > label:hover:before,
    .star-rating > fieldset:not(:checked) > label:hover ~ label:before {
      content: '\f005  ';
    }
    .star-rating > fieldset > input:checked ~ label:before {
      content: '\f005  ';
    }
    .star-rating > fieldset > label:active {
      position: relative;
      }
    label {
      padding-top: 5px;
      padding-bottom: 5px;
      margin-bottom: 0;
    }
      a {
      -webkit-tap-highlight-color: rgba(0,0,0,0);
      }
  </style>
</head>
<body class="page">
    <div class="navbar-cont w-nav" data-animation="over-left" data-collapse="medium" data-duration="400" data-no-scroll="1">
    <?php $srcset = $this->Url->image("settings-p-500x500.png").' 500w, '.$this->Url->image("settings.png").', 512w'; ?>
    <div class="navbar w-container"><?= $this->Html->image("settings.png", ["class"=>"navbar-settings", "width"=>"32", "sizes"=>"(max-width: 991px) 100vw, 30px", "srcset"=>$srcset]); ?>
      <div class="navbar-search-cont w-form" data-ix="search-bar-mobile-hide">
        <form data-name="Email Form" id="email-form" name="email-form">
          <input class="navbar-search w-input" data-name="Name 5" id="name-5" maxlength="256" name="name-5" placeholder="Search" type="text">
        </form>
        <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while submitting the form</div>
        </div>
      </div>
      <div class="navbar-hamburger w-nav-button">
        <div class="navbar-hamburger-text"></div>
      </div>

      <div class="navbar-search-icon-desktop w-hidden-medium w-hidden-small w-hidden-tiny">#</div>
      <div class="navbar-search-icon-mobile" data-ix="search-mobile">#</div>

      <a class="brand-cont w-clearfix w-inline-block" href="/"><?= $this->Html->image('paws-logo-blue-diamond.png', ['class'=>'brand']); ?>
      </a>
      <nav class="navbar-menu w-nav-menu" role="navigation">
        <?= $this->Html->link('Home', ['controller'=>'pages', 'action'=>'display','home'], ['class'=>'sidebar-link w-nav-link']); ?>
        <?= $this->Html->link('Cats', ['controller'=>'cats', 'action'=>'index'], ['class'=>'sidebar-link w-nav-link']); ?>
        <?= $this->Html->link('Litters', ['controller'=>'litters', 'action'=>'index'], ['class'=>'sidebar-link w-nav-link']); ?>
        <?= $this->Html->link('Adopters', ['controller'=>'adopters', 'action'=>'index'], ['class'=>'sidebar-link w-nav-link']); ?>
        <?= $this->Html->link('Foster Homes', ['controller'=>'fosters', 'action'=>'index'], ['class'=>'sidebar-link w-nav-link']); ?>
        <?= $this->Html->link('Volunteers', ['controller'=>'volunteers', 'action'=>'index'], ['class'=>'sidebar-link w-nav-link']); ?>
        <?= $this->Html->link('Settings', ['controller'=>'cats', 'action'=>'index'], ['class'=>'sidebar-link w-nav-link']); ?>
      </nav>
      <div class="navbar-search-exit" data-ix="search-bar-exit"></div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
  <div class="flash-div"><?= $this->Flash->render() ?></div>
  <?= $this->fetch('content') ?>
  <?= $this->Html->script('paws-administrative-system.js'); ?>
  <?= $this->Html->script('webflow-custom.js'); ?>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>