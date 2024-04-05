<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Iblock\Component\Tools;

/**
 * @var array $arParams
 * @var CMain $APPLICATION
 * @var CUser $USER
 */


$arDefaultUrlTemplates404 = [
    "detail" => "#ELEMENT_ID#/",
];

$arDefaultVariableAliases404 = [];

$arDefaultVariableAliases = [];

$arComponentVariables = [
    "ELEMENT_ID",
];


if($arParams["SEF_MODE"] == "Y")
{
    $arVariables = [];

    $arUrlTemplates = CComponentEngine::makeComponentUrlTemplates($arDefaultUrlTemplates404, $arParams["SEF_URL_TEMPLATES"]);
    $arVariableAliases = CComponentEngine::makeComponentVariableAliases($arDefaultVariableAliases404, $arParams["VARIABLE_ALIASES"]);

    $engine = new CComponentEngine($this);
    if (CModule::IncludeModule("iblock"))
    {
        $engine->addGreedyPart("#SECTION_CODE_PATH#");
        $engine->setResolveCallback(array("CIBlockFindTools", "resolveComponentEngine"));
    }

    $componentPage = $engine->guessComponentPath(
        $arParams["SEF_FOLDER"],
        $arUrlTemplates,
        $arVariables
    );

    $b404 = false;
    if(!$componentPage)
    {
        $componentPage = "list";
        $b404 = true;
    }

    if (str_contains($componentPage,"detail"))
        $componentPage = "detail";

    if($b404 && CModule::IncludeModule("iblock"))
    {
        $folder404 = str_replace("\\", "/", $arParams["SEF_FOLDER"]);
        if ($folder404 != "/")
            $folder404 = "/".trim($folder404, "/ \t\n\r\0\x0B")."/";
        if (mb_substr($folder404, -1) == "/")
            $folder404 .= "index.php";

        if ($folder404 != $APPLICATION->GetCurPage(true))
        {
            \Bitrix\Iblock\Component\Tools::process404(
                ""
                ,($arParams["SET_STATUS_404"] === "Y")
                ,($arParams["SET_STATUS_404"] === "Y")
                ,($arParams["SHOW_404"] === "Y")
                ,$arParams["FILE_404"]
            );
        }
    }

    CComponentEngine::initComponentVariables($componentPage, $arComponentVariables, $arVariableAliases, $arVariables);

    $arResult = array(
        "FOLDER" => $arParams["SEF_FOLDER"],
        "URL_TEMPLATES" => $arUrlTemplates,
        "VARIABLES" => $arVariables,
        "ALIASES" => $arVariableAliases,
    );
}
else
{
    $arVariableAliases = CComponentEngine::makeComponentVariableAliases($arDefaultVariableAliases, $arParams["VARIABLE_ALIASES"]);
    CComponentEngine::initComponentVariables(false, $arComponentVariables, $arVariableAliases, $arVariables);

    $componentPage = "";

    if(isset($arVariables["ELEMENT_ID"]) && intval($arVariables["ELEMENT_ID"]) > 0)
        $componentPage = "detail";
    elseif(isset($arVariables["ELEMENT_CODE"]) && $arVariables["ELEMENT_CODE"] <> "")
        $componentPage = "detail";
    else
        $componentPage = "list";

    $arResult = array(
        "FOLDER" => "/group",
        "URL_TEMPLATES" => array(
            "list" => htmlspecialcharsbx($APPLICATION->GetCurPage()),
            "detail" => htmlspecialcharsbx($APPLICATION->GetCurPage()."#ELEMENT_ID#"."/"),
        ),
        "VARIABLES" => $arVariables,
        "ALIASES" => $arVariableAliases
    );
}


$this->includeComponentTemplate($componentPage);





