<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
//https://dev.1c-bitrix.ru/api_help/main/reference/cgroup/getbyid.php
$rsGroups = CGroup::GetByID($arParams["ID"],"");
//группа одна поэтому без цикла
$arGroup =$rsGroups->Fetch();

$arResult= [
    "TITLE" => $arParams["TITLE"],
    "GROUP" => $arGroup,
];

$this->IncludeComponentTemplate();