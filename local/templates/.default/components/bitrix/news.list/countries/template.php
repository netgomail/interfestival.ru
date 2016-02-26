<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="coutries-list">

<?foreach($arResult["ITEMS"] as $arItem):?>
	
	<?// if($arItem['LINK_FESTS_COUNT']){continue;}?>
	
	
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="country" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	<? $file = CFile::ResizeImageGet($arItem['DETAIL_PICTURE']['ID'], array('width'=>180, 'height'=>120), BX_RESIZE_IMAGE_EXACT, true); ?>
    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">  
    <img class="preview_picture" src="<?=$file['src']?>" width="<?=$file['width']?>" height="<?=$file['height']?>" alt="<?=$arItem["PREVIEW_PICTURE"]["NAME"]?>"/>
    				
	<div class="name"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"> <?echo $arItem["NAME"]?></a> </div>
	<?echo $arItem["PREVIEW_TEXT"];?>
	<div class="clear"></div>	

<? if($arItem['PROPERTIES']['FESTS']['VALUE']):?>
<? $fest=$arItem['PROPERTIES']['FESTS']['VALUE']?>	


<div class="fests_soon"><?=GetMessage("FESTS_SOON")?> <? if($arItem['PROPERTIES']['COUNTRY_NAME']['VALUE']):?><?=$arItem['PROPERTIES']['COUNTRY_NAME']['VALUE']?> <?else:?> <?echo $arItem["NAME"]?><?endif;?></div>		
		<div class="fests_wrap">  
        <? $APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"country_fests",
		Array(
		"IBLOCK_TYPE" => "-",
		"IBLOCK_ID" => "5",
		"NEWS_COUNT" => "4",
		"SORT_BY1" => "START_DATE",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"PROPERTY_CODE" => array(0=>"START_DATE",1=>"END_DATE",2=>"",),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => $fest,
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?>
   </div><!--fests_wrap-->
<? endif;?>
    

		
	<div class="clear"></div>	
	</div><!--country-->
    
<? endforeach;?>


<div class="clear"></div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div><!--coutries-list-->


