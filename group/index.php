<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("users");

?>

<? $APPLICATION->IncludeComponent(
    "up:users.group",
    "",
    array(
        "CASH_TIME" => "3600",
        "SEF_FOLDER" => "/group/",
        "SEF_MODE" => "Y",
        "TITLE" => "Группы пользователей",
        "SEF_URL_TEMPLATES" => array(
            "detail" => "#ELEMENT_ID#/",
        )
    ),
    false
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>