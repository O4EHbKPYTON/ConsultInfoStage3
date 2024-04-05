<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/** @var CMain $APPLICATION */
$APPLICATION->SetTitle("3 этап");
$APPLICATION->IncludeComponent(
    "up:users.group",
    "",
    [
        "SEF_FOLDER" => "/groups/",
        "SEF_URL_TEMPLATES" => array(
            "detail" => "#ELEMENT_ID#/",
        ),
        "TITLE" => "Группа пользователей"
    ]
);
$APPLICATION->IncludeComponent(
    "up:users.group.list",
    "",
    [
        "CASH_TIME" => "3600",
        "TITLE" => "Группа пользователей"
    ]
);
$APPLICATION->IncludeComponent(
    "up:users.group.detail",
    "",
    [
        "ID" => "1",
    ]
);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");

