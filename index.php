<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/** @var CMain $APPLICATION */
$APPLICATION->SetTitle("3 этап");
$APPLICATION->IncludeComponent(
    "modular:modular",
    "",
    [
        "TITLE" => "1",
    ]
);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");

