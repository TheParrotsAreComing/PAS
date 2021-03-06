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
  <title>Mission Control</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">

  <?= $this->Html->css('normalize.css'); ?>
  <?= $this->Html->css('components.css'); ?>
  <?= $this->Html->css('paws-administrative-system.css'); ?>
  <?= $this->Html->css('paws-custom.css?8_12_017'); ?>
  <?= $this->Html->css('jquery-ui.css'); ?>
  <?= $this->Html->css('select2.min.css'); ?>

  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->

  <?= $this->Html->script('modernizr.js'); ?>
  <?= $this->Html->script('moment.js'); ?>

  <link href="<?= $this->Url->image('paws-favicon-01.png'); ?>" rel="shortcut icon" type="image/x-icon">
  <link href="<?= $this->Url->image('paws-favicon-01.png'); ?>" rel="apple-touch-icon">
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
      background: rgba(255, 255, 255, 0.4);
    }
    .scroll1::-webkit-scrollbar-thumb {
      background: rgba(93, 93, 93, 0.6);
      border-radius: 5px;
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
    <div class="navbar w-container">
      <div class="navbar-hamburger w-nav-button">
        <div class="navbar-hamburger-text"></div>
      </div>
      <a class="brand-cont w-clearfix w-inline-block" href="/">
        <?= $this->Html->image('missionmeow.png', ['class'=>'brand']); ?>
      </a>
      <nav class="navbar-menu w-nav-menu" role="navigation">
        <?= $this->Html->link('Home', ['controller'=>'pages', 'action'=>'display','home'], ['class'=>'sidebar-link w-nav-link']); ?>
        <?= $this->Html->link('Cats', ['controller'=>'cats', 'action'=>'index'], ['class'=>'sidebar-link w-nav-link']); ?>
        <?php if (!($session_user['role'] == 4)): ?>
          <?= $this->Html->link('Litters', ['controller'=>'litters', 'action'=>'index'], ['class'=>'sidebar-link w-nav-link']); ?>
          <?= $this->Html->link('Adopters', ['controller'=>'adopters', 'action'=>'index'], ['class'=>'sidebar-link w-nav-link']); ?>
          <?= $this->Html->link('Foster Homes', ['controller'=>'fosters', 'action'=>'index'], ['class'=>'sidebar-link w-nav-link']); ?>
        <?php endif; ?>
        <?= $this->Html->link('Volunteers', ['controller'=>'users', 'action'=>'index'], ['class'=>'sidebar-link w-nav-link']); ?>
        <?= $this->Html->link('Contacts', ['controller'=>'contacts', 'action'=>'index'], ['class'=>'sidebar-link w-nav-link']); ?>
        <?php if ($session_user['role'] == 1): ?>
          <?= $this->Html->link('Tags', ['controller'=>'tags', 'action'=>'index'], ['class'=>'sidebar-link w-nav-link']); ?>
        <?php endif; ?>
        <!-- No Settings Page Available Redirects Home-->
        <?php  // $this->Html->link('Settings', ['controller'=>'pages', 'action'=>'display', 'missing_controller'], ['class'=>'sidebar-link w-nav-link']); ?>
        <?= $this->Html->link('Files', ['controller'=>'files', 'action'=>'index'], ['class'=>'sidebar-link w-nav-link']); ?>
        <?php if (!empty($session_user['id'])): ?>
          <?= $this->Html->link('My Profile', ['controller'=>'users','action'=>'view',$session_user['id']],['class'=>'sidebar-link w-nav-link']); ?>
          <?= $this->Html->link('log out', ['controller'=>'users', 'action'=>'logout'], ['class'=>'sidebar-logout w-nav-link']); ?>
        <?php endif; ?>
      </nav>
      <div class="navbar-search-cont w-form" data-ix="search-bar-mobile-hide">
		    <?= $this->Form->create('MobileSearch',['type'=>'GET', 'class' => 'navbar-search-c']) ?>
          <div class="navbar-search-icon-desktop w-hidden-small w-hidden-tiny">#</div>
          <input class="navbar-search w-input" data-name="Name 5" id="name-5" maxlength="256" name="mobile-search" placeholder="Search" type="text">
		    <?= $this->Form->end() ?>
      </div>
      <div class="navbar-search-exit" data-ix="search-bar-exit"></div>
      <div class="navbar-search-icon-mobile" data-ix="search-mobile">#</div>
    </div>
  </div>
  <?= $this->Html->script('jquery.min.js'); ?>
  <?= $this->Html->script('jquery-ui.min.js'); ?>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <div class="flash-div"><?= $this->Flash->render() ?></div>
  <?= $this->Html->script('select2.min.js'); ?>
  <?= $this->fetch('content') ?>
  <?= $this->Html->script('paws-administrative-system.js'); ?>
  <?= $this->Html->script('webflow-custom.js'); ?>
  <?= $this->Html->script('global.js'); ?>
  <?= $this->Html->script('jquery.mask.js'); ?>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
