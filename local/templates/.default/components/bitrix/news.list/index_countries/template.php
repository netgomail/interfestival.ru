<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="countries_menu">
<div class="h1">Весь мир</div>
  <? $i=0;
	$count = count($arResult);?>
  <table>
    <tbody>
      <tr>
        <? foreach($arResult["ITEMS"] as $arItem):?>
        
				<? if($i==6) {
					  $i = 0;
						echo "</tr><tr>";
				}?>
				
				<td>
					<div class="country">
					
					<div class="flag"> 
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<div class="shadow"></div>
								<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="36" height="24" alt="<?=$arItem["NAME"]?>" /> 
						</a>
					</div>
					
					<p class="country_name">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
					</p>
					
					<? if($arItem["PROPERTIES"]["FESTS"]["VALUE"]):?>
						<a href="/festivaly/?SECTION_ID=<?=$arItem["PROPERTIES"]["FESTS"]["VALUE"]?>">Фестивали</a>
					<? endif;?>
					
					<? if($arItem["PROPERTIES"]["GALLERY"]["VALUE"]):?>
						<a href="<?=$arItem["DISPLAY_PROPERTIES"]["GALLERY"]["LINK_SECTION_VALUE"][$arItem["PROPERTIES"]["GALLERY"]["VALUE"]]["SECTION_PAGE_URL"]?>">Галерея</a>
					<? endif;?>
					
					<div class="clear"></div>
					
					</div><!--country-->
				</td>
     
      <? $i++;?>
      <? endforeach;?>
			</tr>
  </table>
  </tbody>
</div>
<!--countries_menu--> 

