<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<div class="menu">
        <ul>
<?foreach($arResult as $arItem):?>

	<?if ($arItem["PERMISSION"] > "D"):?>
		<li <? if($arItem["SELECTED"]):?>class="selected" <? endif;?> ><a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a></li>
	<?endif?>

<?endforeach?>

	</ul>
</div><!--menu-->
<?endif?>



