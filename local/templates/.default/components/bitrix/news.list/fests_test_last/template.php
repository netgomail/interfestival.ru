<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? if(count($arResult["ITEMS"])==0):?>
<span style="color:red; font-size:16px;">К сожалению, по Вашему запросу фестивалей не найдено.<br />
Попробуйте выбрать другую страну или месяц.
</span>
<? endif;?>



<? foreach($arResult["ITEMS"] as $key => $arFests):?>

<div class="fest_item" id="<?=$this->GetEditAreaId($arResult['ID']);?>">
				<div class="name"><? echo $arFests['NAME']?></div>
	
        <div class="clear"></div> 
				
				<pre>
				<?// print_r($arFests)?>
</div>

<? endforeach;?>

<? /*
<? foreach($arResult["DATES"] as $key => $arFests):?>

<? 
	$start = FormatDate("j F",MakeTimeStamp($arFests['START_DATE']));
	$end =  FormatDate("j F",MakeTimeStamp($arFests['END_DATE']));
	$string = FormatDate("Q",MakeTimeStamp($arFests['START_DATE']));
	$pattern = "/\-/";
	$replacement = "";
	$counter = preg_replace($pattern, $replacement, $string);
	$arCounter = explode(" ", $counter);
	$date_now = strtotime(date("d.m.Y H:i:s"));
	$fdate_now = strtotime($arFests["START_DATE"]);
?>

<? if($date_now >= $fdate_now){
					$date_passed = true;
					continue;
			} else {
					$date_passed = false;
					
    }?>

	<div class="fest_item" id="<?=$this->GetEditAreaId($arResult['ITEMS'][$arFests['ID']]);?>">
  <div class="fest_photo"> <a href="<?=$arResult['ITEMS'][$arFests['ID']]["DETAIL_PAGE_URL"]?>">
    <? if($arResult['ITEMS'][$arFests['ID']]["PREVIEW_PICTURE"]["SRC"]!=""):?>
    <img src="<?=$arResult['ITEMS'][$arFests['ID']]["PREVIEW_PICTURE"]["SRC"]?>" width="150"  alt="<?=$arResult['ITEMS'][$arFests['ID']]["NAME"]?>" />
    <? else:?>
    <img src="/img/no_photo.png" width="150"  alt="<?=$arResult['ITEMS'][$arFests['ID']]["NAME"]?>" />
    <? endif;?>
    </a> </div>
  <div class="fest_info">
    <div class="fest_name"> <a href="<?=$arResult['ITEMS'][$arFests['ID']]["DETAIL_PAGE_URL"]?>"><span class="title">
      <?=$arResult['ITEMS'][$arFests['ID']]["NAME"]?>
      </span></a>

			<? if($arResult['ITEMS'][$arFests['ID']]['PROPERTIES']['NAME_EN']['VALUE']):?>
				<div class="title_en"> <?=$arResult['ITEMS'][$arFests['ID']]['PROPERTIES']['NAME_EN']['VALUE']?> </div>			
			<? endif;?>

	</div>

    <div class="fest_time_place">
      <div class="place_period"> 
        <div class="place">
					<table>
						<tbody> 
						<tr>
							<? foreach ($arResult['ITEMS'][$arFests['ID']]['PROPERTIES']['PLACE']['PXVALUE'] as $key => $arElem):
							?>
							
							
							<? $countCountries = count($arResult['ITEMS'][$arFests['ID']]['PROPERTIES']['PLACE']['PXVALUE']);
								 $file = CFile::ResizeImageGet($arElem["PREVIEW_PICTURE"], array('width'=>31, 'height'=>24), BX_RESIZE_IMAGE_EXACT, true);?>
		
							 <? if($key !=1 && $key%2 == 0):?></tr><tr> <? endif;?> 
							 <? if($countCountries ==$key):?></tr><? endif;?>
							
								<td >
									<img src="<?=$file['src'];?>" width="<?=$file['width'];?>" height="<?=$file['height'];?>" alt="<?=$arElem['NAME']?>" /> 
								</td>  
								<td>
									<span class="country_name"><?=$arElem['NAME']?></span>
								</td>
							<? endforeach;?>
						</tr> 
						</tbody>  
					</table>
        </div>
            <div class="period">
                <p><?=$start;?> 
                 <? if($end!=""):?>
                - <?=$end;?></p>
                 <? endif;?>
            </div>
       
      	<div class="clear"></div>
      </div>
    </div>
    <div class="fest_preview">
      <?=$arResult['ITEMS'][$arFests['ID']]["PREVIEW_TEXT"]?>
      </div>
  <a class="detail" href="<?=$arResult['ITEMS'][$arFests['ID']]["DETAIL_PAGE_URL"]?>">Подробнее</a> 
  </div>
  
   <?
            
            if($date_now >= $fdate_now){
                $date_passed = true;
            } else {
                $date_passed = false;
            }
            ?>
            <? if($date_passed == false):?>
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
            <? elseif($date_passed == true):?>
                <div class="fest_time_left"><div class="reg_end">Период подачи заявок на участие в фестивале завершен.</div></div>
            <? endif;?>
 
	
        <div class="clear"></div> 
</div>



<? endforeach;?>




<? 
// Вывод прошедших фестивалей

foreach($arResult["DATES"] as $key => $arFests):?>

<? 
	$start = FormatDate("j F",MakeTimeStamp($arFests['START_DATE']));
	$end =  FormatDate("j F",MakeTimeStamp($arFests['END_DATE']));
	$string = FormatDate("Q",MakeTimeStamp($arFests['START_DATE']));
	$pattern = "/\-/";
	$replacement = "";
	$counter = preg_replace($pattern, $replacement, $string);
	$arCounter = explode(" ", $counter);
	$date_now = strtotime(date("d.m.Y H:i:s"));
	$fdate_now = strtotime($arFests["START_DATE"]);
?>

<? if($date_now >= $fdate_now){
					$date_passed = true;
			} else {
					$date_passed = false;
					continue;
    }?>

	<div class="fest_item" id="<?=$this->GetEditAreaId($arResult['ITEMS'][$arFests['ID']]);?>">
  <div class="fest_photo"> <a href="<?=$arResult['ITEMS'][$arFests['ID']]["DETAIL_PAGE_URL"]?>">
    <? if($arResult['ITEMS'][$arFests['ID']]["PREVIEW_PICTURE"]["SRC"]!=""):?>
    <img src="<?=$arResult['ITEMS'][$arFests['ID']]["PREVIEW_PICTURE"]["SRC"]?>" width="150"  alt="<?=$arResult['ITEMS'][$arFests['ID']]["NAME"]?>" />
    <? else:?>
    <img src="/img/no_photo.png" width="150"  alt="<?=$arResult['ITEMS'][$arFests['ID']]["NAME"]?>" />
    <? endif;?>
    </a> </div>
  <div class="fest_info">
    <div class="fest_name"> <a href="<?=$arResult['ITEMS'][$arFests['ID']]["DETAIL_PAGE_URL"]?>"><span class="title">
      <?=$arResult['ITEMS'][$arFests['ID']]["NAME"]?>
      </span></a>

			<? if($arResult['ITEMS'][$arFests['ID']]['PROPERTIES']['NAME_EN']['VALUE']):?>
				<div class="title_en"> <?=$arResult['ITEMS'][$arFests['ID']]['PROPERTIES']['NAME_EN']['VALUE']?> </div>			
			<? endif;?>

	</div>

    <div class="fest_time_place">
      <div class="place_period"> 
        <div class="place">
					<table>
						<tbody> 
						<tr>
							<? foreach ($arResult['ITEMS'][$arFests['ID']]['PROPERTIES']['PLACE']['PXVALUE'] as $key => $arElem):
							?>
							
							
							<? $countCountries = count($arResult['ITEMS'][$arFests['ID']]['PROPERTIES']['PLACE']['PXVALUE']);
								 $file = CFile::ResizeImageGet($arElem["PREVIEW_PICTURE"], array('width'=>31, 'height'=>24), BX_RESIZE_IMAGE_EXACT, true);?>
		
							 <? if($key !=1 && $key%2 == 0):?></tr><tr> <? endif;?> 
							 <? if($countCountries ==$key):?></tr><? endif;?>
							
								<td >
									<img src="<?=$file['src'];?>" width="<?=$file['width'];?>" height="<?=$file['height'];?>" alt="<?=$arElem['NAME']?>" /> 
								</td>  
								<td>
									<span class="country_name"><?=$arElem['NAME']?></span>
								</td>
							<? endforeach;?>
						</tr> 
						</tbody>  
					</table>
        </div>
            <div class="period">
                <p><?=$start;?> 
                 <? if($end!=""):?>
                - <?=$end;?></p>
                 <? endif;?>
            </div>
       
      	<div class="clear"></div>
      </div>
    </div>
    <div class="fest_preview">
      <?=$arResult['ITEMS'][$arFests['ID']]["PREVIEW_TEXT"]?>
      </div>
  <a class="detail" href="<?=$arResult['ITEMS'][$arFests['ID']]["DETAIL_PAGE_URL"]?>">Подробнее</a> 
  </div>
  
   <?
            
            if($date_now >= $fdate_now){
                $date_passed = true;
            } else {
                $date_passed = false;
            }
            ?>
            <? if($date_passed == false):?>
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
            <? elseif($date_passed == true):?>
                <div class="fest_time_left"><div class="reg_end">Период подачи заявок на участие в фестивале завершен.</div></div>
            <? endif;?>
 
	
        <div class="clear"></div> 
</div>



<? endforeach;?>
*/
?>



<? if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<br />
<?=$arResult["NAV_STRING"]?>
<? endif;?>



