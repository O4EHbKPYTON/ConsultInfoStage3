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
        )
    ]
);
$APPLICATION->IncludeComponent(
    "up:users.group.list",
    "",
    [
        "SEF_FOLDER" => "/groups/",
        "SEF_URL_TEMPLATES" => array(
            "detail" => "#ELEMENT_ID#/",
        )
    ]
);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");

