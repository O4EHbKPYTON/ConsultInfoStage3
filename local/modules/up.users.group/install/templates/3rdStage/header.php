<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
/**
 * @var CMain $APPLICATION
 */ ?>
<?php
use Bitrix\Main\Page\Asset;

$ASSET = Asset::getInstance();

$ASSET->addString('<meta charset="utf-8">');
$ASSET->addString('<meta http-equiv="x-ua-compatible" content="ie=edge">');
$ASSET->addString('<meta class="js-meta-viewport" name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">');
// Adding Bootstrap CSS
$ASSET->addCss('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');

// Adding custom CSS
$ASSET->addCss(SITE_TEMPLATE_PATH . '/assets/style.css');


?>


<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID; ?>">

<head>
    <title><?php /** @var Cmain $APPLICATION */
        $APPLICATION->ShowTitle(); ?></title>
    <?php $APPLICATION->ShowHead(); ?>

</head>
<body>
<div id="panel"><?php $APPLICATION->ShowPanel(); ?></div>
<header>
</header>
<main class="website-workarea">