<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="filter_wrap" style="margin-bottom:40px;">
<span class="filter_title">Виберите фестиваль</span>
<form id="filter" action="/festivaly/index.php" method="POST">
<? foreach($arResult["DATES"] as $key => $arDate):?>
<? $arr1[] = $arDate['START_DATE'];?>
<? $arr2[] = $arDate['N_START_DATE'];?>
<? endforeach;?>
<? $arrDate=array_merge($arr1, $arr2);?>
<? $arrDate=array_unique($arrDate); ?>
<? sort($arrDate); ?>

<div class="select_wrap">
<select name="place" class="select">
    <option>Выберите страну</option>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<option <? if($arParams["DETAIL_URL"] == $arItem["ID"]):?>selected="selected" <? endif;?> value="<?=$arItem["ID"]?>"><?=$arItem["NAME"]?></option>
<?endforeach;?>
</select>
</div>

<div class="select_wrap">
<select name="date" class="select">
	<option>Выберите месяц</option>
<? foreach($arrDate as $key => $arItem):?>
	<option value="<?=$arItem?>" <? if($arParams["PAGER_TITLE"] == $arItem):?>selected="selected" <? endif;?> >
	<?=FormatDate("f", MakeTimeStamp($arItem))?>
    </option>
<?endforeach;?>
</select>  
</div>
<input type="submit" class="filter_search" value=" ">
</form>

</div>



