<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	$start = $arResult["DISPLAY_PROPERTIES"]["START_DATE"]["VALUE"];
	
	$end =  $arResult["DISPLAY_PROPERTIES"]["END_DATE"]["VALUE"]; 
	
	$string = FormatDate("Q", MakeTimeStamp($start));
	$pattern = "/\-/";
	$replacement = "";   
	$counter = preg_replace($pattern, $replacement, $string);
	$arCounter = explode(" ", $counter);
	
	$string2 = FormatDate("Q", MakeTimeStamp($arResult["DISPLAY_PROPERTIES"]["N_START_DATE"]["VALUE"]));
	$pattern2 = "/\-/";
	$replacement2 = "";
	$counter2 = preg_replace($pattern2, $replacement2, $string2);
	$arCounter2 = explode(" ", $counter2);
	
?>

<? global $place;
$place = $arResult['PROPERTIES']['PLACE']['PXVALUE'][0]['NAME'];

?>

<? $id=$arResult['ID'];?>
<? if($arParams['ADD_SECTIONS_CHAIN'] && !empty($arResult['NAME']))
{ 
   $arResult['SECTION']['PATH'][] = array(
   'NAME' => $arResult['NAME'], 
   'PATH' => ' '); 
   $component = $this->__component; 
   $component->arResult = $arResult; 
}?>


<div class="fest">
  
  <? if($arResult["DISPLAY_PROPERTIES"]["PDF"]["FILE_VALUE"]["SRC"]):?>
  	<div class="pdf_icon"><a href="<?=$arResult["DISPLAY_PROPERTIES"]["PDF"]["FILE_VALUE"]["SRC"]?>"></a></div>
  <? endif;?>
 
  <div class="printer_icon"><a rel="nofollow" href="#" onclick="window.print()"></a></div>
  
  <? if($arResult["DISPLAY_PROPERTIES"]["PRICE"]["FILE_VALUE"]["SRC"]):?>
  	<div class="price_icon"> <a href="<?=$arResult["DISPLAY_PROPERTIES"]["PRICE"]["FILE_VALUE"]["SRC"]?>"><?=GetMessage("PRICE")?></a> </div>
  <? endif;?>
 
  <? if($arResult["DISPLAY_PROPERTIES"]["MAP"]):?>
  <a class="fancybox fancy_but map_icon" rel="group" data-fancybox-type="ajax" href="/ajax/map.php?ID=<?=$arResult['ID']?>">
	   <div><?=GetMessage("ON_MAP")?></div>
	</a>
  <?endif;?>
  <h1>
    <?=$arResult["NAME"]?>
  </h1>
  
  
  
  <div class="prev_wrap">
 
   <? if($arResult["DETAIL_PICTURE"]["SRC"]):?>
   <img class="fest_img" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="300" height="230" alt="<?=$arResult["NAME"]?>" /> 
   <? else:?>	
   <img style="background: url(/img/no_photo.png) no-repeat 50% 50%" class="fest_img"  src=" " width="300" height="230" alt="<?=$arResult["NAME"]?>" /> 
   <? endif;?>	 
    
     <? if($arResult["PROPERTIES"]["START_DATE"]["VALUE"]):?>
    <div class="place_period">
    	<div class="period">
    <p>
      <?=FormatDate("j F",MakeTimeStamp($start))?>
		<? if($arResult["PROPERTIES"]["END_DATE"]["VALUE"]):?>
        - <?=FormatDate("j F",MakeTimeStamp($end))?>
        <? endif;?>	
    </p>
  </div><!--period-->
   	 <? endif;?>	
   <? if($arResult["PROPERTIES"]["PLACE"]["VALUE"]):?>
  <div class="place">
    <? foreach ($arResult['PROPERTIES']['PLACE']['PXVALUE'] as $key => $arElem):?>
    <? $file = CFile::ResizeImageGet($arElem["PREVIEW_PICTURE"], array('width'=>31, 'height'=>24), BX_RESIZE_IMAGE_EXACT, true);?>
   
    <div class="coutry">
      <table style="vertical-align:middle;">
        <tbody>
          <tr>
            <td><img src="<?=$file['src'];?>" width="<?=$file['width'];?>" height="<?=$file['height'];?>" alt="<?=$arElem['NAME']?>"  /></td>
            <td><span class="country_name">
              <?=$arElem['NAME']?>
              </span></td>
          </tr>
        </tbody>
      </table>
    </div>
    <?endforeach?>
    <div class="clear"></div>
  </div><!--place-->
  <? endif;?>
  
    <div class="clear"></div>
   </div>
   <?=$arResult["PREVIEW_TEXT"]?>
  
   <div style="margin-top: 10px; margin-bottom:20px;" class="clear"></div>
<? $fest_sec = $arResult['FEST_SECTION'];?>  
<? $APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"fesfs_start_date_for_bid",
	Array(
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "5",
		"SECTION_ID" => $fest_sec,
		"SECTION_CODE" => "",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"ELEMENT_SORT_FIELD" => "PROPERTY_START_DATE",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "arrFilter",
		"INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_ALL_WO_SECTION" => "N",
		"PAGE_ELEMENT_COUNT" => "30",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array(0=>"START_DATE",1=>"PLACE",),
		"OFFERS_LIMIT" => "5",
		"TEMPLATE_THEME" => "blue",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"SET_META_KEYWORDS" => "N",
		"META_KEYWORDS" => "-",
		"SET_META_DESCRIPTION" => "N",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"ADD_SECTIONS_CHAIN" => "N",
		"DISPLAY_COMPARE" => "N",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"CACHE_FILTER" => "N",
		"PRICE_CODE" => array(),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_PROPERTIES" => array(),
		"USE_PRODUCT_QUANTITY" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?> 
  
   </div>
  
   <div class="clear"></div>
  </div><!--fest--> 

<div id="tabs">
  <ul>
      
				 <? $i=1;?>
			 <? foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			 <? if( ($arProperty["CODE"] != "START_DATE") && ($arProperty["CODE"] != "END_DATE") && ($arProperty["CODE"] != "N_END_DATE") && ($arProperty["CODE"] != "N_START_DATE") && ($arProperty["CODE"] != "PDF") && ($arProperty["CODE"] != "GALLERY") && ($arProperty["CODE"] != "PRICE") && ($arProperty["CODE"] != "MAP")):?>
	 		
				
			<? if($arProperty["DISPLAY_VALUE"]!="" && $arProperty["MULTIPLE"]!="Y"):?>
					<li><a href="#tabs-<?=$i?>">
					<?=$arProperty["NAME"];?>
					</a></li>
			<? elseif($arProperty["MULTIPLE"]=="Y"):?>
					<? $a=0;?>
					<? foreach($arProperty["DISPLAY_VALUE"] as $num => $arNum):?>
							<li>
                                <a href="#tabs-<?=$i+$a?>">
                                    <? if($arProperty["DESCRIPTION"][$num]):?>
                                   	 <?=$arProperty["NAME"]?> <?=$num+1?> <?=$arProperty["DESCRIPTION"][$num]?>  
                                    <? else:?>
                                     <?=$arProperty["NAME"]?> <?=$num+1?>
                                    <? endif;?>
                                </a>  
                            </li>
						<? $a++?>
					<? endforeach;?>
		
			<? endif;?>
	
		<? 
		 
		  $i=$i+$a;
			$i++
		?>
		
		  <? endif;?>
		<? endforeach;?>
  </ul>  
  
	<? $c=1;?>
  <? foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
  <? if( ($arProperty["CODE"] != "START_DATE") && ($arProperty["CODE"] != "END_DATE") && ($arProperty["CODE"] != "N_END_DATE") && ($arProperty["CODE"] != "N_START_DATE") && ($arProperty["CODE"] != "PDF") && ($arProperty["CODE"] != "GALLERY") && ($arProperty["CODE"] != "PRICE") && ($arProperty["CODE"] != "MAP")):?>
		
		
		

		
		<? if($arProperty["DISPLAY_VALUE"]!="" && $arProperty["MULTIPLE"]!="Y"):?>
		 
				<div id="tabs-<?=$c?>">
					<?=$arProperty["DISPLAY_VALUE"]?>
				</div>

		<? elseif($arProperty["MULTIPLE"]=="Y"):?>
			<? $b=0;?>
			<? foreach($arProperty["DISPLAY_VALUE"] as $arNum):?>
					<div id="tabs-<?=$c+$b?>">
						<?=$arNum?>
					</div>
				<? $b++?>
			<? endforeach;?>
		<? endif;?>
		<? 
		$c=$c+$b;
		$c++?>
		
  <? endif;?>
	
  <? endforeach;?>
</div><!--tabs-->

  <? if($arResult["PROPERTIES"]["GALLERY"]["VALUE"]):?>
  <div class="gallery">
   <h3 class="h3" style="margin-bottom:30px;"><?=$arResult['PROPERTIES']['GALLERY']['NAME']?></h3>
    <? foreach ($arResult['PROPERTIES']['GALLERY']['PXVALUE_GAL'] as $key => $arElem):?>
    <? $file = CFile::ResizeImageGet($arElem["PREVIEW_PICTURE"], array('width'=>236, 'height'=>100), BX_RESIZE_IMAGE_EXACT, true);?>
    <div class="gallery_item">
        <img src="<?=$file['src'];?>" width="<?=$file['width'];?>" height="<?=$file['height'];?>" alt="<?=$arElem['NAME']?>" <? if(($key!=0) && ($key%3==0)):?>style="margin-right:0px;"<? endif;?> />
        <div class="clear"></div>
        <a href="<?=$arElem['DETAIL_PAGE_URL']?>"><?=$arElem['NAME']?></a>
    </div>
    <? endforeach;?>
    <div class="clear"></div>
  </div><!--gallery-->
  
  <? endif;?>

  <a class="back" href="/festivaly/"><?=GetMessage("BACK")?></a>

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

<?if($arResult['PROPERTIES']['RULE']['VALUE']['TEXT']):?>
    <h3 class="h3"><?=$arResult['PROPERTIES']['RULE']['NAME']?></h3>
    <?=$arResult['PROPERTIES']['RULE']['VALUE']['TEXT']?>
<?endif;?>

<?if($arResult['PROPERTIES']['PROG']['VALUE']['TEXT']):?>
    <h3 class="h3"><?=$arResult['PROPERTIES']['PROG']['NAME']?></h3>
    <?=$arResult['PROPERTIES']['PROG']['VALUE']['TEXT']?>
<?endif;?>

<?if($arResult['PROPERTIES']['PROG_2']['VALUE']['TEXT']):?>
    <h3 class="h3"><?=$arResult['PROPERTIES']['PROG_2']['NAME']?></h3>
    <?=$arResult['PROPERTIES']['PROG_2']['VALUE']['TEXT']?>
<?endif;?>

<?if($arResult['PROPERTIES']['PROG_3']['VALUE']['TEXT']):?>
    <h3 class="h3"><?=$arResult['PROPERTIES']['PROG_3']['NAME']?></h3>
    <?=$arResult['PROPERTIES']['PROG_3']['VALUE']['TEXT']?>
<?endif;?>

<?if($arResult['PROPERTIES']['EXC']['VALUE']['TEXT']):?>
    <h3 class="h3"><?=$arResult['PROPERTIES']['EXC']['NAME']?></h3>
    <?=$arResult['PROPERTIES']['EXC']['VALUE']['TEXT']?>
<?endif;?>

</div>
