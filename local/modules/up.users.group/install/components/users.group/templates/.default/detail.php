<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
    die();
}
/** @var array $arResult */
$APPLICATION->IncludeComponent(
    "up:users.group.detail",
    "",
    [
        "ID" => $arResult["VARIABLES"]["ELEMENT_ID"]
    ],
    $component,
);
?>


