<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
    die();
}
/** @var array $arParams */
$APPLICATION->IncludeComponent(
    "up:users.group.list",
    "",
    [
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "TITLE" => $arResult['TITLE'],
        "CACHE_TIME" => $arResult['CACHE_TIME']
    ],
    $component,
);
