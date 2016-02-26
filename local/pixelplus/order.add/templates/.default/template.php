<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<? /*if (count($arResult['ERROR_TEXT_ARRAY'])) {

	foreach ($arResult['ERROR_TEXT_ARRAY'] as $error) {

?>

<span style="color:red;"><?=$error;?></span><br>

<?

}

}*/ ?>

<div class="fbox_form">

<?if ($arResult['SUCCESS'] != "Y") {?>

<? if ($arResult['VIRTUAL_FIELDS']) { ?>



<div class="h1 f24">Оформить заказ</div>

<form method="post" action="<?=$GLOBALS['APPLICATION']->GetCurPageParam()?>"  id="order_form" <?/*enctype="multipart/form-data"*/?>>

<?

$fieldname = $arParams['FIELDS_PREFIX']."_"."NAME";

$arFieldParams = $arResult['VIRTUAL_FIELDS'][$fieldname];

?>

<div class="row">

<div class="input_name"><?=$arFieldParams['NAME']?><?if($arResult['VIRTUAL_FIELDS'][$fieldname]["IS_REQUIRED"]=="Y"):?><span class="req">*</span><?endif;?></div>

<input type="text" name="<?=$fieldname?>" value="<?=$arFieldParams['VALUE']?>"<? if ($arFieldParams['ERROR']) { ?> class="error" placeholder="Вы не ввели имя"<? } ?>>

</div>





<?

$fieldname = $arParams['FIELDS_PREFIX']."_"."PHONE";

$arFieldParams = $arResult['VIRTUAL_FIELDS'][$fieldname];

?>

<div class="row">
<div class="input_name"><?=$arFieldParams['NAME']?><?if($arResult['VIRTUAL_FIELDS'][$fieldname]["IS_REQUIRED"]=="Y"):?><span class="req">*</span><?endif;?></div>

<input type="text" name="<?=$fieldname?>" value="<?=$arFieldParams['VALUE']?>"<? if ($arFieldParams['ERROR']) { ?> class="error" placeholder="Вы не ввели номер телефона"<? } ?>>

</div>





<?

$fieldname = $arParams['FIELDS_PREFIX']."_"."EMAIL";

$arFieldParams = $arResult['VIRTUAL_FIELDS'][$fieldname];

?>

<div class="row">

<div class="input_name"><?=$arFieldParams['NAME']?><?if($arResult['VIRTUAL_FIELDS'][$fieldname]["IS_REQUIRED"]=="Y"):?><span class="req">*</span><?endif;?></div>

<input type="text" name="<?=$fieldname?>" value="<?=$arFieldParams['VALUE']?>"<? if ($arFieldParams['ERROR']) { ?> class="error" placeholder="Вы не ввели E-mail"<? } ?>>

</div>





<?

$fieldname = $arParams['FIELDS_PREFIX']."_"."COMMENTS";

$arFieldParams = $arResult['VIRTUAL_FIELDS'][$fieldname];

?>

<div class="row">

<div class="input_name"><?=$arFieldParams['NAME']?><?if($arResult['VIRTUAL_FIELDS'][$fieldname]["IS_REQUIRED"]=="Y"):?><span class="req">*</span><?endif;?></div>

<textarea name="<?=$fieldname?>"<? if ($arFieldParams['ERROR']) { ?> class="error" placeholder="Поле должно быть заполнено"<? } ?>><?=$arFieldParams['VALUE']?></textarea>

</div>




<div class="row">
<div class="required_fields"><span class="req">* -</span>  поля обязательные для заполнения</div>
</div>
<div class="row">

<input type="hidden" name="pxajax" value="Y">

<input type="hidden" name="<?=$arResult['SEND_BUTTON_NAME']?>" value="Y">

<input type="submit" value="Заказать">

</div>



</form>



<?}?>

<?} else {?>

	<div class="h1" style="font-size: 24px; margin-top: 16px;">Спасибо!<br/>Ваш заказ был оформлен.</div>

<?}?>

</div>