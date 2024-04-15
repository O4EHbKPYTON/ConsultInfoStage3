<?php

use Bitrix\Main\Application;
use Bitrix\Main\DB\Connection;
use Bitrix\Main\Request;

function request(): Request
{
	return Application::getInstance()->getContext()->getRequest();
}

