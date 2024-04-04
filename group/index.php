<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("users");
?>

<? $APPLICATION->IncludeComponent(
    "upr:users.group",
    ".default",
    array(
        "CASH_TIME" => "3600",
        "SEF_FOLDER" => "/group/",
        "SEF_MODE" => "Y",
        "TITLE" => "Группы пользователей",
        "COMPONENT_TEMPLATE" => ".default",
        "SEF_URL_TEMPLATES" => array(
            "detail" => "#ELEMENT_ID#/",
        )
    ),
    false
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>