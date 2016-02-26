<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? $id=$arResult['ID'];?>



<div class="fest">
  
  <? if($arResult["DISPLAY_PROPERTIES"]["PDF"]["FILE_VALUE"]["SRC"]):?>
  	<div class="pdf_icon"><a href="<?=$arResult["DISPLAY_PROPERTIES"]["PDF"]["FILE_VALUE"]["SRC"]?>"></a></div>
  <? endif;?>
 
  <div class="printer_icon"><a rel="nofollow" href="#" onclick="window.print()"></a></div>
 
  <h1>
    <?=$arResult["NAME"]?>
  </h1>  
  
 
  <div class="fest_img">
   <? if($arResult["DETAIL_PICTURE"]["SRC"]):?>
   <img  src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" /> 
   <? else:?>	
   <img  src="/img/no_photo.png" width="176" height="120" alt="Нет изображения"/> 
   <? endif;?>	 
    <? if($arResult["DISPLAY_PROPERTIES"]["MAP"]):?>
  <div class="map_icon">
	<a class="fancybox fancy_but" rel="group" data-fancybox-type="ajax" href="/ajax/map_countries.php?ID=<?=$arResult['ID']?>">
	<img style="margin-bottom:15px" src="/img/map.png" alt="map"><br />
	<?=GetMessage("MAP")?>
	</a></div>
  <?endif;?>
  </div><!--fest_img-->  
	<? if($arResult['DETAIL_TEXT']):?>
	   <div class="detailText">
		 <?=$arResult['DETAIL_TEXT'];?>
		 </div>
	<? endif;?>
	
	
  
  <div id="tabs">
  <ul>
    <? $i=1;
		$arTabProps = array("VISA", "REMIND", "DESC", "EXCURSIONS");
		foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
		
    <? //if(($arProperty["CODE"] != "FESTS") && ($arProperty["CODE"] != "COUNTRY_NAME") && ($arProperty["CODE"] != "START_DATE") && ($arProperty["CODE"] != "END_DATE") && ($arProperty["CODE"] != "N_END_DATE") && ($arProperty["CODE"] != "N_START_DATE") && ($arProperty["CODE"] != "PDF") && ($arProperty["CODE"] != "GALLERY") && ($arProperty["CODE"] != "PRICE") && ($arProperty["CODE"] != "MAP") && ($arProperty["CODE"] != "MAP_SCALE")):?>
    
		<? if(in_array($arProperty["CODE"], $arTabProps)):?>
		
		<? if($arProperty["DISPLAY_VALUE"]!=""):?>
    <li><a href="#tabs-<?=$i?>">
      <?=$arProperty["NAME"]?>
      </a></li>
    <? $i++?>
    <?endif;?>
    <?endif;?>
    <?endforeach;?>
  </ul>
  <? $a=1;?>
  <? foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
 		
		<? if(in_array($arProperty["CODE"], $arTabProps)):?>
  <? //if( (($arProperty["CODE"] != "FESTS") && ($arProperty["CODE"] != "COUNTRY_NAME") && $arProperty["CODE"] != "START_DATE") && ($arProperty["CODE"] != "END_DATE") && ($arProperty["CODE"] != "N_END_DATE") && ($arProperty["CODE"] != "N_START_DATE") && ($arProperty["CODE"] != "PDF") && ($arProperty["CODE"] != "GALLERY") && ($arProperty["CODE"] != "PRICE") && ($arProperty["CODE"] != "MAP")&&($arProperty["CODE"] != "MAP_SCALE")):?>
	
	
  <? if($arProperty["DISPLAY_VALUE"]!=""):?>
  <div id="tabs-<?=$a?>">
    <?=$arProperty["DISPLAY_VALUE"]?>
    <? $a++?>
  </div>
  <?endif;?>
  <?endif;?>
  <? endforeach;?>
</div><!--tabs-->


  
    <div class="print_desc">
    <?if($arResult['PROPERTIES']['DESC']['VALUE']['TEXT']):?>
        <h3 class="h3"><?=$arResult['PROPERTIES']['DESC']['NAME']?></h3>
        <?=$arResult['PROPERTIES']['DESC']['VALUE']['TEXT']?>
    <?endif;?>
    <?if($arResult['PROPERTIES']['VISA']['VALUE']['TEXT']):?>
        <h3 class="h3"><?=$arResult['PROPERTIES']['VISA']['NAME']?></h3>
        <?=$arResult['PROPERTIES']['VISA']['VALUE']['TEXT']?>
    <?endif;?>
    <?if($arResult['PROPERTIES']['REMIND']['VALUE']['TEXT']):?>
        <h3 class="h3"><?=$arResult['PROPERTIES']['REMIND']['NAME']?></h3>
        <?=$arResult['PROPERTIES']['REMIND']['VALUE']['TEXT']?>
    <?endif;?>
    </div>
  

   
  </div><!--fest--> 
 <? if($arResult["PROPERTIES"]["FESTS"]["VALUE"]):?>
  <div class="clear"></div>
 
  <div class="festivals">
   <h3 class="h3" style="margin-bottom:30px;"><?=GetMessage("COMMING_SOON_FESTS")?></h3>
    <? foreach ($arResult['PROPERTIES']['FESTS']['PXVALUE_FESTS'] as $key => $arElem):
	if($key>3) break;?>
    <? $file = CFile::ResizeImageGet($arElem["PREVIEW_PICTURE"], array('width'=>150, 'height'=>130), BX_RESIZE_IMAGE_EXACT, true);?>
   
    <div class="fest_item">

		<? if($arElem["PREVIEW_PICTURE"]):?>
        <img src="<?=$file['src'];?>" width="<?=$file['width'];?>" height="<?=$file['height'];?>" alt="<?=$arElem['NAME']?>"  />
        <?else:?>
        <img  src="/img/no_photo.png" width="150" height="130" alt="Нет изображения"/> 
        <?endif;?>
       <? if($arElem["PROPERTY_START_DATE_VALUE"]):?>
        <div class="date">
		 <?=FormatDate("j F",MakeTimeStamp($arElem["PROPERTY_START_DATE_VALUE"]))?> - <?=FormatDate("j F Y",MakeTimeStamp($arElem["PROPERTY_END_DATE_VALUE"]))?>
        </div>
        <? endif;?>
        <a href="<?=$arElem['DETAIL_PAGE_URL']?>"><?=$arElem['NAME']?></a>
    </div>
    
    <? endforeach;?>
    <div class="clear"></div>
    <? $fest_val=$arResult["PROPERTIES"]["FESTS"]["VALUE"]?>
    <a class="all_fests"  href="/festivaly/?SECTION_ID=<?=$fest_val?>"> <?=GetMessage("ALL_FESTS")?> <? if($arResult["PROPERTIES"]["COUNTRY_NAME"]["VALUE"]):?><?=$arResult["PROPERTIES"]["COUNTRY_NAME"]["VALUE"]?><?else:?><?=$arResult['NAME']?><?endif;?> (+<?=count($arResult['PROPERTIES']['FESTS']['PXVALUE_FESTS'])?>)</a>
  </div><!--festivals-->
  <? endif;?>
  
  
  <? if($arResult["PROPERTIES"]["GALLERY"]["VALUE"]):?>
  <div class="clear"></div>
  <div class="gallery">
   <h3 class="h3" style="margin-bottom:30px;"><?=$arResult['PROPERTIES']['GALLERY']['NAME']?></h3>
    <? foreach ($arResult['PROPERTIES']['GALLERY']['PXVALUE_GAL'] as $key => $arElem):
	if($key>3) break;?>
    <? $file = CFile::ResizeImageGet($arElem["PREVIEW_PICTURE"], array('width'=>236, 'height'=>100), BX_RESIZE_IMAGE_EXACT, true);?>
    <div class="gallery_item">
        <img src="<?=$file['src'];?>" width="<?=$file['width'];?>" height="<?=$file['height'];?>" alt="<?=$arElem['NAME']?>" <? if(($key!=0) && ($key%3==0)):?>style="margin-right:0px;"<? endif;?> />
        <div class="clear"></div>
        <a href="<?=$arElem['DETAIL_PAGE_URL']?>"><?=$arElem['NAME']?></a>
    </div>
    <? endforeach?>
    <div class="clear"></div>
    <br /><br />
    <a href="/galereya/list.php?SECTION_ID=<? echo $arResult['PROPERTIES']['GALLERY']['VALUE']?>"> <?=GetMessage("ALL_GAL")?> <? if($arResult["PROPERTIES"]["COUNTRY_NAME"]["VALUE"]):?><?=$arResult["PROPERTIES"]["COUNTRY_NAME"]["VALUE"]?><?else:?><?=$arResult['NAME']?><?endif;?> (+<?=count($arResult['PROPERTIES']['GALLERY']['PXVALUE_GAL'])?>)</a>
  </div><!--gallery-->
  <? endif;?>



