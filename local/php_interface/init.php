<?php

\Bitrix\Main\Loader::includeModule('up.users.group');

function debug($data)
{
    echo '<pre style="color: #000000;">' . print_r($data,1) . '</pre>';
}
