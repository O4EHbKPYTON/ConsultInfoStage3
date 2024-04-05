<?php
/**
 * @var array $arParams
 */

if (!defined("B_PROLOG_INCLUDED") || !B_PROLOG_INCLUDED) {
    die();
}
?>

<div class="container">
    <div class="users-group-list rounded-corners">
        <?php if (!empty($arResult["GROUPS"])): ?>
            <h2><?=htmlspecialcharsbx($arResult["TITLE"])?></h2>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col"><?=GetMessage("USERS_GROUP_LIST_GROUP_ID");?></th>
                    <th scope="col"><?=GetMessage("USERS_GROUP_LIST_NAME");?></th>
                    <th scope="col"><?=GetMessage("USERS_GROUP_LIST_DESCRIPTION");?></th>
                    <th scope="col"><?=GetMessage("USERS_GROUP_LIST_DETAIL");?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($arResult["GROUPS"] as $group): ?>
                    <tr>
                        <td><?=htmlspecialcharsbx($group["ID"])?></td>
                        <td><?=htmlspecialcharsbx($group["NAME"])?></td>
                        <td><?=htmlspecialcharsbx($group["DESCRIPTION"])?></td>
                        <td><a href="<?=str_replace('#ELEMENT_ID#',(int)$group['ID'],$arParams['DETAIL_URL'])?>"><?=(int)$group['ID']?></a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Группы пользователей не найдены.</p>
        <?php endif; ?>
    </div>
</div>
