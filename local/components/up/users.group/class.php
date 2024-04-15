<?php


if (!defined('B_PROLOG_INCLUDED') || !B_PROLOG_INCLUDED) {
    die();
}

use Bitrix\Iblock\Component\Tools;

class UpUsersGroupComponent extends CBitrixComponent
{
    /**
     * @var array|string[]
     * @var array $arParams
     */
    protected array $arComponentVariables = [
        'ELEMENT_ID',
    ];

    public function executeComponent(): void
    {
        if ($this->arParams['SEF_MODE'] === 'Y') {
            $componentPage = $this->sefMode();
        } else {
            $componentPage = $this->noSefMode();
        }

        if (!$componentPage) {
            Tools::process404(
                $this->arParams['MESSAGE_404'],
                ($this->arParams['SET_STATUS_404'] === 'Y'),
                ($this->arParams['SET_STATUS_404'] === 'Y'),
                ($this->arParams['SHOW_404'] === 'Y'),
                $this->arParams['FILE_404']
            );
        }

        $this->IncludeComponentTemplate($componentPage);
    }

    protected function sefMode(): string
    {
        //Значение алиасов по умолчанию.
        $arDefaultVariableAliases404 = [];

        $arDefaultUrlTemplates404 = [
            "detail" => "#ELEMENT_ID#/",
        ];

        $arVariables = [];

        $arUrlTemplates = CComponentEngine::makeComponentUrlTemplates(
            $arDefaultUrlTemplates404,
            $this->arParams['SEF_URL_TEMPLATES']
        );

        $arVariableAliases = CComponentEngine::makeComponentVariableAliases(
            $arDefaultVariableAliases404,
            $this->arParams['VARIABLE_ALIASES']
        );

        $engine = new CComponentEngine($this);

        $engine->addGreedyPart('#SECTION_CODE_PATH#');
        $engine->setResolveCallback([
            'CIBlockFindTools',
            'resolveComponentEngine',
        ]);

        $componentPage = $engine->guessComponentPath(
            $this->arParams['SEF_FOLDER'],
            $arUrlTemplates,
            $arVariables
        );

        $b404 = false;

        if (!$componentPage) {
            $componentPage = 'list';

            $b404 = true;
        }

        if ($b404) {
            $folder404 = str_replace(
                '\\',
                '/',
                $this->arParams['SEF_FOLDER']);

            if ($folder404 !== '/') {
                $folder404 = '/' . trim($folder404, '/ \t\n\r\0\x0B') . '/';
            }

            if (mb_substr($folder404, -1) === '/') {
                $folder404 .= 'index.php';
            }

            $cMain = new CMain();

            if ($folder404 !== $cMain->GetCurPage(true)) {
                Tools::process404(
                    '',
                    ($this->arParams['SET_STATUS_404'] === 'Y'),
                    ($this->arParams['SET_STATUS_404'] === 'Y'),
                    ($this->arParams['SHOW_404'] === 'Y'),
                    $this->arParams['FILE_404']
                );
            }
        }

        CComponentEngine::initComponentVariables(
            $componentPage,
            $this->arComponentVariables,
            $arVariableAliases,
            $arVariables
        );

        $this->arResult = [
            'FOLDER' => $this->arParams['SEF_FOLDER'],
            'URL_TEMPLATES' => $arUrlTemplates,
            'VARIABLES' => $arVariables,
            'ALIASES' => $arVariableAliases,
        ];
        return $componentPage;
    }

    protected function noSefMode(): string
    {
        $arDefaultVariableAliases = [];
        $arVariables = [];

        $arVariableAliases = CComponentEngine::makeComponentVariableAliases($arDefaultVariableAliases, $this->arParams['VARIABLE_ALIASES']);
        CComponentEngine::initComponentVariables(false, $this->arComponentVariables, $arVariableAliases, $this->arVariables);

        $componentPage = '';

        if (isset($arVariables["ELEMENT_ID"]) && intval($arVariables["ELEMENT_ID"]) > 0)
            $componentPage = "detail";
        elseif (isset($arVariables["ELEMENT_CODE"]) && $arVariables["ELEMENT_CODE"] <> "")
            $componentPage = "detail";
        else
            $componentPage = "list";


        $cMain = new CMain();

        $this->arResult = [
            "FOLDER" => "/group",
            "URL_TEMPLATES" => array(
                "list" => htmlspecialcharsbx($cMain->GetCurPage()),
                "detail" => htmlspecialcharsbx($cMain->GetCurPage() . "#ELEMENT_ID#" . "/"),
            ),
            "VARIABLES" => $this->arVariables,
            "ALIASES" => $arVariableAliases,
            "TITLE" => $this->arParams["TITLE"],
        ];

        return $componentPage;
    }
}
