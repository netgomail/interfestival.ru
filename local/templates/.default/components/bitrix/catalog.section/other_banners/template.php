<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="other_banners">
<? foreach($arResult["ITEMS"] as $arItem):?>

<? $file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width'=>200, 'height'=>250), BX_RESIZE_IMAGE_EXACT, true); ?>

<?if($arItem["PROPERTIES"]["LINK"]["VALUE"]):?>
<a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>">
<img src="<?=$file['src']?>" alt="<?=$arItem["NAME"]?>" width="<?=$file['width']?>" height="<?=$file['height']?>"/>
</a>
<?else:?>
<img src="<?=$file['src']?>" alt="<?=$arItem["NAME"]?>" width="<?=$file['width']?>" height="<?=$file['height']?>"/>
<?endif;?>
</div>
<? endforeach;?>
