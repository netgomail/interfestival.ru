<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="countries_menu_detail">
        <? foreach($arResult["ITEMS"] as $key => $arItem):?>
       <div class="country">
            <div class="flag"> 
             <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="30" height="24" alt=" <? /*=$arItem["NAME"]*/?>" /> </div></a>
            <p class="country_name">
              <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
            </p>
           	
            <?$fest_val=$arItem["PROPERTIES"]["FESTS"]["VALUE"]?>
            <?$galery_val=$arItem["PROPERTIES"]["GALLERY"]["VALUE"]?>
            
			<? if($arItem["PROPERTIES"]["FESTS"]["VALUE"]):?>
            <a href="/festivaly/?SECTION_ID=<?=$fest_val?>">Фестивали</a>
            <?endif;?>
            <? if($arItem["PROPERTIES"]["GALLERY"]["VALUE"]):?>
            <a href="<?=$arItem["DISPLAY_PROPERTIES"]["GALLERY"]["LINK_SECTION_VALUE"][$galery_val]["SECTION_PAGE_URL"]?>">Галерея</a>
            <?endif;?>
          
          </div><!--country-->
       

	  
	  <? endforeach;?>
  
</div>
<!--countries_menu--> 

