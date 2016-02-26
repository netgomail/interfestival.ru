<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? if(empty($arResult["ITEMS"])):?>
<span style="color:red; font-size:16px;">К сожалению, по Вашему запросу фестивалей не найдено.<br />
Попробуйте выбрать другую страну или месяц.
</span>
<?endif?>



<?if(is_numeric($_REQUEST["place"]))
	$GLOBALS['FILTERED'] = array(
	'PLACE' => $_REQUEST["place"]
	);
	global $arrFilter;
	$arrFilter = $GLOBALS['FILTERED'];
?>  

<? foreach($arResult["ITEMS"]as $key => $arItem):?>

<? $start = $arItem["DISPLAY_PROPERTIES"]["START_DATE"]["VALUE"];
    $end =  $arItem["DISPLAY_PROPERTIES"]["END_DATE"]["VALUE"]; 
	$string = FormatDate("Q", MakeTimeStamp($arItem["DISPLAY_PROPERTIES"]["START_DATE"]["VALUE"]));
	$pattern = "/\-/";
	$replacement = "";
	$counter = preg_replace($pattern, $replacement, $string);
	$arCounter = explode(" ", $counter);

	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>

<div class="fest_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
  <div class="fest_photo"> <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
    <? if($arItem["PREVIEW_PICTURE"]["SRC"]!=""):?>
    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="150" height="130" alt="<?=$arItem["NAME"]?>" />
    <? else:?>
    <img src="/img/no_photo.png" width="150" height="130" alt="<?=$arItem["NAME"]?>" />
    <? endif;?>
    </a> </div>
  <div class="fest_info">
    <div class="fest_name"> <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><span class="title">
      <?=$arItem["NAME"]?>
      </span></a></div>
    <div class="fest_time_place">
      <div class="place_period">
       
       
        <div class="place">
            <table >
                <tr>
                <? foreach ($arItem['PROPERTIES']['PLACE']['PXVALUE'] as $key => $arElem):?>
                <? $file = CFile::ResizeImageGet($arElem["PREVIEW_PICTURE"], array('width'=>31, 'height'=>24), BX_RESIZE_IMAGE_EXACT, true);?>
                <td >
                <img src="<?=$file['src'];?>" width="<?=$file['width'];?>" height="<?=$file['height'];?>" alt="<?=$arElem['NAME']?>" /> 
                </td>  
                <td>
                <span class="country_name"><?=$arElem['NAME']?></span>
               </td>
                
				
				<? endforeach?>
                </tr>   
            </table>
        </div>
        <? if($arItem["DISPLAY_PROPERTIES"]["START_DATE"]["VALUE"]!=""):?>
            <div class="period">
                <p><?=FormatDate("j F",MakeTimeStamp($start))?> 
                 <? if($arItem["DISPLAY_PROPERTIES"]["END_DATE"]["VALUE"]!=""):?>
                - <?=FormatDate("j F",MakeTimeStamp($end))?></p>
                 <? endif;?>
            </div>
        <? endif;?>
      	<div class="clear"></div>
      </div>
    </div>
    <div class="fest_preview">
      <?=$arItem["PREVIEW_TEXT"]?>
      </div>
  <a class="detail" href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a> 
  </div>
  <? if($arItem["DISPLAY_PROPERTIES"]["START_DATE"]["VALUE"]!=""):?>
   <?
            $date_now = strtotime(date("d.m.Y H:i:s"));
            $fdate_now = strtotime($arItem["DISPLAY_PROPERTIES"]["START_DATE"]["VALUE"]);
            if($date_now >= $fdate_now){
                $date_passed = true;
            } else {
                $date_passed = false;
            }
            ?>
            <?if($date_passed == false):?>
            <div class="fest_time_left">
                <p class="days_counter">
                    <?=$arCounter[0];?>
                </p>
                <div class="days">
                    <?=$arCounter[1];?>
                    <br>
                    до начала <br>
                    фестиаля </div>
            </div>
            <?elseif($date_passed == true):?>
                <div class="fest_time_left"><div class="days" style="font-size:18px">Фестиваль<br>закончен</div></div>
            <?endif;?>
  <?endif;?>
	
        <div class="clear"></div> 
</div>
<!--fest_info-->

<? endforeach;?>
</div>
<!--fest_item-->

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<br />
<?=$arResult["NAV_STRING"]?>
<?endif;?>





