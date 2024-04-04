<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = [
    "PARAMETERS" => [
        "CACHE_TIME" => [
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_DESC_CACHE_TIME"),
            "TYPE" => "STRING",
            "DEFAULT" => 3600,
        ],
        "PAGE_TITLE" => [
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_DESC_PAGE_TITLE"),
            "TYPE" => "STRING",
            "DEFAULT" => "Группы пользователей",
        ],
    ],
];
