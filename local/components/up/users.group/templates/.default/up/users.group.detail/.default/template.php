<?php
/**
 * @var array $arResult
 */

if (!defined("B_PROLOG_INCLUDED") || !B_PROLOG_INCLUDED) {
    die();
}
?>
<div class="container">
    <div class="users-group-list rounded-corners">
        <h2><?=$arResult["TITLE"];?></h2>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col"><?=GetMessage("GROUP_DETAIL_ID");?></th>
                    <th scope="col"><?=GetMessage("GROUP_DETAIL_NAME");?></th>
                    <th scope="col"><?=GetMessage("GROUP_DETAIL_DESCRIPTION");?></th>
                </tr>
                </thead>
                <tbody>
                <?php $group = $arResult["GROUP"]  ?>
                    <tr>
                        <td><?= $group["ID"] ?></td>
                        <td><?= htmlspecialcharsbx($group["NAME"]) ?></td>
                        <td><?= htmlspecialcharsbx($group["DESCRIPTION"]) ?></td>
                    </tr>
                </tbody>
            </table>
    </div>
</div>