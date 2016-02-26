<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
if(isset($_REQUEST["it"])){
$ids=Array();
foreach($_REQUEST["it"] as $id=>$count){
$ids[]=IntVal($id);
}
CModule::IncludeModule('iblock');
$arSelect = Array("IBLOCK_ID", "ID", "NAME", "PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>IntVal($_REQUEST["IBLOCK_ID"]), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$ids);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>100500), $arSelect);
while($ob = $res->GetNextElement()){ 
 $arFields = $ob->GetFields();  
 $arFields["PROPERTIES"] = $ob->GetProperties();
$arFields["COUNT"]=intval($_REQUEST["it"][$arFields["ID"]]);
$arOrder[]=$arFields;
}};
?>

<div class="fbox_form">

<?if ($arResult['SUCCESS'] != "Y") {?>

<? if ($arResult['VIRTUAL_FIELDS']) { ?>



<h2>Обратный звонок</h2>
<div class="order_list">
<?if(count($arOrder)>0){?>
<table class="order_list_table">
<tbody>
<?
$sum_price=0;
foreach($arOrder as $arOrderItem):
$sum_price+=$arOrderItem["COUNT"]*$arOrderItem["PROPERTIES"]["PRICE"]["VALUE"];?>
<tr><td class="name"><?=$arOrderItem["NAME"]?></td><td><?=$arOrderItem["COUNT"]?> кор.</td></tr>
<?endforeach;?>
</tbody>
</table>
<table class="order_list_table_footer">
<tbody>
<tr>
<td>Итоговая сумма</td>
<td><?=$sum_price?> руб.</td>
</tr>
</tbody>
</tr>
</table>
<?};?>
</div>
<form method="post" action="<?=$GLOBALS['APPLICATION']->GetCurPageParam()?>"  id="feedback_form" <?/*enctype="multipart/form-data"*/?>>
<input type="hidden" name="IBLOCK_ID" value="<?=IntVal($_REQUEST["IBLOCK_ID"])?>"/>
<?

foreach($_REQUEST["it"] as $id=>$count){
echo '<input type="hidden" name="it['.$id.']" value="'.$count.'"/>';
};

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

<div class="row">
    <input type="checkbox" name="TRY" style="display: none;">
</div>


<div class="row">
<div class="required_fields"><span class="req">* </span>-  поля обязательные для заполнения</div>
</div>
<div class="row">

<input type="hidden" name="pxajax" value="Y">

<input type="hidden" name="<?=$arResult['SEND_BUTTON_NAME']?>" value="Y">

<input type="submit" value="Перезвоните мне">

</div>



</form>



<?}?>

<?} else {?>  

	<h3 style="text-align: center">Спасибо!<br/>Наш менеджер свяжется с Вами в ближайшее время.</h3>

<?}?>

</div>