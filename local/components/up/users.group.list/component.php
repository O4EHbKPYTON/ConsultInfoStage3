<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var CMain $APPLICATION
 * @var CUser $USER
 */
// взял сложное кеишрование из https://dev.1c-bitrix.ru/learning/course/?COURSE_ID=43&LESSON_ID=3053
use Bitrix\Main\Data\Cache;

// Проверка и инициализация входных параметров

$arParams['CACHE_TIME'] = intval($arParams['CACHE_TIME']);


$cacheId = implode('|', [
    SITE_ID,
    $APPLICATION->GetCurPage(),
    $USER->GetGroups()
]);
// Кеш зависит только от подготовленных параметров без "~"
foreach ($this->arParams as $k => $v) {
    if (strncmp('~', $k, 1)) {
        $cacheId .= ',' . $k . '=' . $v;
    }
}

$cacheDir = '/' . SITE_ID . $this->GetRelativePath();

$cache = Cache::createInstance();

if ($cache->startDataCache($arParams['CACHE_TIME'], $cacheId, $cacheDir)) {

    $rsGroups = CGroup::GetList();
// групп много поэтому в цикле
    if((int)$rsGroups->SelectedRowsCount() > 0)
    {
        while($arGroups = $rsGroups->Fetch())
        {
            $arUsersGroups[] = $arGroups;
        }
    }

    // Создаем итоговый массив
    $arResult = [
        'TITLE' => $arParams['TITLE'],
        'GROUPS' => $arUsersGroups,
    ];

    // Подключение шаблона компонента
    $this->IncludeComponentTemplate();

    $templateCachedData = $this->GetTemplateCachedData();

    $cache->endDataCache([
        'arResult' => $arResult,
        'templateCachedData' => $templateCachedData,
    ]);
} else {
    extract($cache->GetVars());
    $this->SetTemplateCachedData($templateCachedData);
}



