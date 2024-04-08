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
        "TITLE" => [
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_DESC_PAGE_TITLE"),
            "TYPE" => "STRING",
        ],
        "SEF_MODE" => [
            "detail" => [
                "NAME" => GetMessage("T_IBLOCK_SEF_PAGE_USERS_DETAIL"),
                "DEFAULT" => "#ELEMENT_ID#/",
                "VARIABLES" => ["ELEMENT_ID", "SECTION_ID"],
            ],
        ],
        "VARIABLE_ALIASES" => [
            "SECTION_ID" => ["NAME" => GetMessage("BN_P_SECTION_ID_DESC")],
            "ELEMENT_ID" => ["NAME" => GetMessage("USERS_GROUP_ID_DESC")],
        ],
    ],
];
