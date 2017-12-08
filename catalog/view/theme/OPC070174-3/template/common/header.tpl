<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content= "<?php echo $keywords; ?>" />
<?php } ?>

<script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />

<link href="https://fonts.googleapis.com/css?family=Istok+Web:400,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:400,700" rel="stylesheet" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700,500' rel='stylesheet' type='text/css' />
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

<link href="catalog/view/theme/<?php echo $mytemplate; ?>/stylesheet/stylesheet.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $mytemplate; ?>/stylesheet/megnor/carousel.css" />
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $mytemplate; ?>/stylesheet/megnor/custom.css" />
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $mytemplate; ?>/stylesheet/megnor/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $mytemplate; ?>/stylesheet/megnor/lightbox.css" />

<?php if($direction=='rtl'){ ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $mytemplate; ?>/stylesheet/megnor/rtl.css">
<?php } ?>

<?php foreach ($styles as $style) { ?>
<link href="<?php echo $style['href']; ?>" type="text/css" rel="<?php echo $style['rel']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
<script type="text/javascript" src="catalog/view/javascript/megnor/jquery.custom.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/megnor/custom.js"></script>
<script type="text/javascript" src="catalog/view/javascript/megnor/jstree.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/megnor/carousel.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/megnor/megnor.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/megnor/jquery.custom.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/megnor/jquery.formalize.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/megnor/tabs.js"></script>
<script type="text/javascript" src="catalog/view/javascript/lightbox/lightbox-2.6.min.js"></script>
<script src="catalog/view/javascript/jquery/datetimepicker/moment.js" type="text/javascript"></script>
<script src="catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

<script src="catalog/view/javascript/common.js" type="text/javascript"></script>
	<?php foreach ($links as $link) { ?>
	<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
	<?php } ?>

<?php foreach ($scripts as $script) { ?>
<script src="<?php echo $script; ?>" type="text/javascript"></script>
<?php } ?>
<?php foreach ($analytics as $analytic) { ?>
	<?php echo $analytic; ?>
	<?php } ?>



</head>

<?php if ($column_left && $column_right) { ?>
<?php $layoutclass = 'layout-3'; ?>
<?php } elseif ($column_left || $column_right) { ?>
<?php if ($column_left){ ?>
<?php $layoutclass = 'layout-2 left-col'; ?>
<?php } elseif ($column_right) { ?>
<?php $layoutclass = 'layout-2 right-col'; ?>
<?php } ?>
<?php } else { ?>
<?php $layoutclass = 'layout-1'; ?>
<?php } ?>

<body class="<?php echo $class;echo " " ;echo $layoutclass; ?>">

<header>
    <div class="header container">
        <div class="header-logo">
            <?php if ($logo) { ?>
                <a href="<?php echo $home; ?>" class="brand">
                    <img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive" />
                </a>
            <?php } else { ?>
                <h1><a href="<?php echo $home; ?>"><?php echo $name; ?></a></h1>
            <?php } ?>

            <?php if ($second_logo) { ?>
                <a href="<?php echo $home; ?>" class="brand">
                    <img src="<?php echo $second_logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive" />
                </a>
            <?php } ?>
        </div>

        <div class="header-right">
            <div class="content_headercms_top"><?php echo $headertop; ?> </div>
            <div class="header-cart"><?php echo $cart; ?></div>
        </div>

        <div class="header-search"><?php echo $search; ?></div>
    </div>
</header>

<div class="nav-inner-cms">
    <div class="header-bottom">
        <div class="main-menu container" id="cms-menu">
            <ul class="main-navigation">
                <?php foreach ($main_navigation as $nav): ?>
                <li><a href="<?php echo $nav['url'] ?>"><?php echo $nav['label'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<div class="content_headercms_bottom"><?php echo $headerbottom; ?> </div>

<nav class="nav-container" role="navigation">
<div class="nav-inner">
<!-- ======= Menu Code START ========= -->
<?php if ($categories) { ?>
<!-- Opencart 3 level Category Menu-->
<div class="container">
<div id="menu" class="main-menu">

<div class="nav-responsive"><span>Меню</span><div class="expandable"></div></div>
  <ul class="main-navigation">
    <?php foreach ($categories as $category) { ?>
    <li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
      <?php if ($category['children']) { ?>

        <?php for ($i = 0; $i < count($category['children']);) { ?>
        <ul>
          <?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
         <?php for (; $i < count($category['children']); $i++) { ?>
          <?php if (isset($category['children'][$i])) { ?>
				<li>
				<?php if(count($category['children'][$i]['children_level2'])>0){ ?>
					<a href="<?php echo $category['children'][$i]['href']; ?>" class="activSub" ><?php echo $category['children'][$i]['name'];?></a>
				<?php } else { ?>
					<a href="<?php echo $category['children'][$i]['href']; ?>" ><?php echo $category['children'][$i]['name']; ?></a>
				<?php } ?>
				<?php if ($category['children'][$i]['children_level2']) { ?>
				<ul class="col<?php echo $j; ?>">
				<?php for ($wi = 0; $wi < count($category['children'][$i]['children_level2']); $wi++) { ?>
					<li><a href="<?php echo $category['children'][$i]['children_level2'][$wi]['href']; ?>"  ><?php echo $category['children'][$i]['children_level2'][$wi]['name']; ?></a></li>
				 <?php } ?>

				</ul>
			  <?php } ?>
			</li>
          <?php } ?>
          <?php } ?>
        </ul>
        <?php } ?>
      <?php } ?>
    </li>
    <?php } ?>
	<li class="first level0"><a href="/delivery.html">Доставка</a></li>

					<li class="level0"><a href="/oplata.html">Способы оплаты</a></li>

					<li class="level0"><a href="/sertifikaty.html">Сертификаты</a></li>

					<li class="level0"><a href="http://anex-sport.ru/remont-anex.html">Сервис</a></li>

					<li class="level0"><a href="/show-room.html">Шоу-рум</a></li>

					<li class="last level0"><a href="/contacts.html">Контакты</a></li>
  </ul>
</div>
<?php } ?>
<!-- ======= Menu Code END ========= -->
</div>
</div>
</nav>
