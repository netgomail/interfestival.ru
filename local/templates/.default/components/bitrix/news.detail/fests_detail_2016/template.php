<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();	

global $place;
$place = $arResult['PROPERTIES']['PLACE']['PXVALUE'][0]['NAME'];
$period = iconv("UTF-8", "WINDOWS-1251", $_COOKIE['FEST_PERIOD']); 

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

	<? if($arResult["PROPERTIES"]["NAME_EN"]["VALUE"]):?>
			<h1 style="margin-bottom:5px"><?=$arResult["NAME"]?></h1>
			<div class="title_en"> <?=$arResult["PROPERTIES"]["NAME_EN"]["VALUE"];?> </div>
	<? else:?>
			<h1><?=$arResult["NAME"]?></h1>
	<? endif;?>
<div class="place_period">	
	 <? if($arResult["PROPERTIES"]["PLACE"]["VALUE"]):?>
 
  <div class="place">
    <? foreach ($arResult['PROPERTIES']['PLACE']['PXVALUE'] as $key => $arElem):?>
    <? $file = CFile::ResizeImageGet($arElem["PREVIEW_PICTURE"], array('width'=>31, 'height'=>24), BX_RESIZE_IMAGE_EXACT, true);?>
    <div class="coutry"> 
      <table style="vertical-align:middle;">
        <tbody>
          <tr>
            <td>
							<a href="/festivaly/?festFilter_pf[PLACE]=<?=$arElem["ID"]?>&set_filter=Y"/><img src="<?=$file['src'];?>" width="<?=$file['width'];?>" height="<?=$file['height'];?>" alt="<?=$arElem['NAME']?>"  /></a>
						</td>
            <td>
							<span class="country_name">
								<a href="/festivaly/?festFilter_pf[PLACE]=<?=$arElem["ID"]?>&set_filter=Y"/> <?=$arElem['NAME']?></a>
							</span>
						</td>
          </tr>
        </tbody>
      </table>
    </div>
    <? endforeach?>
		<? if($arResult["DISPLAY_PROPERTIES"]["MAP"]):?>
	<div class="on_map">
		<table style="vertical-align:middle;">
			<tbody>
				<tr>
					<td>
						<a class="fancybox fancy_but " rel="group" data-fancybox-type="ajax" href="/ajax/map.php?ID=<?=$arResult['ID']?>">
							<img src = "/img/on_map.png" width="31" height="24">
						</a>
					</td>
					<td>
						<span class="country_name">
							<a class="fancybox fancy_but " rel="group" data-fancybox-type="ajax" href="/ajax/map.php?ID=<?=$arResult['ID']?>"><?=GetMessage("ON_MAP")?></a>							
						</span>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
  <? endif;?>
    <div class="clear"></div>
  </div><!--place-->
	
	 
    	<div class="period">
    		<p><?=$period;?></p>
      </div><!--period-->
    <div class="clear"></div>
   
  <? endif;?>
</div>
  <div class="prev_wrap">
 
   <? if($arResult["DETAIL_PICTURE"]["SRC"]):?>
	 <img class="fest_img" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="300"  alt="<?=$arResult["NAME"]?>" /> 
	 <? else:?>	
   <img style="background: url(/img/no_photo.png) no-repeat 50% 50%" class="fest_img"  src=" " width="300" height="230" alt="<?=$arResult["NAME"]?>" /> 
   <? endif;?>	 
	 <? if($arResult["DETAIL_TEXT"] ==""):?>
	 <?=$arResult["PREVIEW_TEXT"]?>
  <? else:?>
	 <?=$arResult["DETAIL_TEXT"]?>
	<? endif;?>
   <div style="margin-top: 10px; margin-bottom:20px;" class="clear"></div>
 
 
<div class="first_fest">
 
 <table>
        <tbody>
 
 <? foreach($arResult['DATES'] as $key => $arTime):?>
  
		<? $start = strtotime($arTime['FULL_START']);?>	
		<? $string = FormatDate("Q", MakeTimeStamp($arTime["FULL_START"]));
		$arCounter = explode(" ", $string);?>

	  <? if($start < $arResult['TIME_NOW_U']):?>
            <? continue;?>
            <? endif;?>
            <tr>
                <td width="295" align="center"><?=$arResult['NAME']?><br/><span style="text-transform:lowercase"><b>(<?=$arTime["START"]?> - <?=$arTime["END"]?>)</b></span></td>
                <td width="75" align="center"><span class="days_counter"><?=abs($arCounter[0]);?></span></td>
                <td width="125" align="center"> <span class="days"><?=$arCounter[1];?> до начала <br> фестиваля </span> </td>
                <td> <a style="display:block" href="/zayavka_online/?name=<?=$arResult['NAME']?>&place=<? echo($GLOBALS['place']);?>" target="_blank"><div class="application_1"></div></a></td>
            </tr>
  
 <?
 break;
  endforeach;?>
   			</tbody>
    </table>
    <div class="clear"></div>
</div>
 

  
   </div>
  
   <div class="clear"></div>
  </div><!--fest--> 

<div id="tabs">
  <ul>
      
				 <? $i=1;
				 $arProperties = array("START_DATE","END_DATE", "N_END_DATE", "N_START_DATE", "PDF", "GALLERY", "PRICE", "MAP", "ZOOM", "NAME_EN", "PROGS");
				 ?>
			 <? foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			 <? // if( ($arProperty["CODE"] != "START_DATE") && ($arProperty["CODE"] != "END_DATE") && ($arProperty["CODE"] != "N_END_DATE") && ($arProperty["CODE"] != "N_START_DATE") && ($arProperty["CODE"] != "PDF") && ($arProperty["CODE"] != "GALLERY") && ($arProperty["CODE"] != "PRICE") && ($arProperty["CODE"] != "MAP") && ($arProperty["CODE"] != "ZOOM") && ($arProperty["CODE"] != "NAME_EN") && ($arProperty["CODE"] != "PROGS") ):?>
	 		
			<? if(!in_array($arProperty["CODE"],  $arProperties)):?>
			<? if($arProperty["DISPLAY_VALUE"]!="" && $arProperty["MULTIPLE"]!="Y"):?>
					<li><a href="#tabs-<?=$i?>">
						<? if($arProperty["DESCRIPTION"]):?>
                        	<?=$arProperty["DESCRIPTION"];?>
						<? else:?>
                       		<?=$arProperty["NAME"];?>
                        <? endif;?>
                    </a></li>
			<? elseif($arProperty["MULTIPLE"]=="Y"):?>
					<? if(!is_array($arProperty["DISPLAY_VALUE"])):?>
                        <li><a href="#tabs-<?=$i?>">
                        	<? if($arProperty["DESCRIPTION"][0]):?>
                        		<?=$arProperty["DESCRIPTION"][0];?>
                        	<? else:?>
                           		 <?=$arProperty["NAME"];?>
                            <? endif;?>
                        </a></li>
                    <? else:?>
                      <? $a=0;?>
					<? foreach($arProperty["DISPLAY_VALUE"] as $num => $arNum):?>
							<li>
                                <a href="#tabs-<?=$i+$a?>">
                                    <? if($arProperty["DESCRIPTION"][$num]):?>
                                   	 <? /*=$arProperty["NAME"]?> <?=$num+1*/?> <?=$arProperty["DESCRIPTION"][$num]?>  
                                    <? else:?>
                                     <?=$arProperty["NAME"]?> <?=$num+1?>
                                    <? endif;?>
                                </a>  
                            </li>
						<? $a++?>
					<? endforeach;?>
                    <? endif;?>
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
  <? // if( ($arProperty["CODE"] != "START_DATE") && ($arProperty["CODE"] != "END_DATE") && ($arProperty["CODE"] != "N_END_DATE") && ($arProperty["CODE"] != "N_START_DATE") && ($arProperty["CODE"] != "PDF") && ($arProperty["CODE"] != "GALLERY") && ($arProperty["CODE"] != "PRICE") && ($arProperty["CODE"] != "MAP")&& ($arProperty["CODE"] != "ZOOM")&& ($arProperty["CODE"] != "NAME_EN") && ($arProperty["CODE"] != "PROGS")):?>
		
		<? if(!in_array($arProperty["CODE"],  $arProperties)):?>
		<? if($arProperty["DISPLAY_VALUE"]!="" && $arProperty["MULTIPLE"]!="Y"):?>
		 
				<div id="tabs-<?=$c?>">
					<?=$arProperty["DISPLAY_VALUE"]?>
				</div>

		<? elseif($arProperty["MULTIPLE"]=="Y"):?>
			<? if(!is_array($arProperty["DISPLAY_VALUE"])):?>
				<div id="tabs-<?=$c?>">
					<?=$arProperty["DISPLAY_VALUE"]?>
				</div>
			<? else:?>
			<? $b=0;?>
			<? foreach($arProperty["DISPLAY_VALUE"] as $arNum):?>
					<div id="tabs-<?=$c+$b?>">
						<?=$arNum?>
					</div>
				<? $b++?>
			<? endforeach;?>
          <? endif;?>  
         
		<? endif;?>
		<? 
		$c=$c+$b;
		$c++?>
		
  <? endif;?>
	
  <? endforeach;?>
</div><!--tabs-->

  <? if($arResult["PROPERTIES"]["GALLERY"]["VALUE"]):?>
	 <h3 class="h3" style="margin-bottom:30px;"><?=$arResult['PROPERTIES']['GALLERY']['NAME']?></h3>
  <div class="gallery">
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
		
