<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script type="text/javaScript">
function popup_show(popup_id) {
	jQuery("#popup_"+popup_id).show();
}
function popup_hide(popup_id) {
	jQuery("#popup_"+popup_id).hide();
}
function popup_div_show(popup_id) {
	jQuery("#popup_"+popup_id).show();
}
function popup_div_hide(popup_id) {
	jQuery("#popup_"+popup_id).hide();
}
</script>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td align="right" width="33%">
<?if($arResult["PREV_MONTH_URL"]):?>
<a href="<?=$arResult["PREV_MONTH_URL"]?>" title="<?=$arResult["PREV_MONTH_URL_TITLE"]?>"><img src="/img/calendar_pre_month.png" width="23" height="8" alt="<?=$arResult["PREV_MONTH_URL_TITLE"]?>" /></a>
<?endif?>
</td>
<td align="center" width="33%">
<span style="font-family:FedraSansProNormalItalic; font-size:22px;"><?=$arResult["TITLE"]?></span>
</td>
<td align="left" width="33%">
<?if($arResult["NEXT_MONTH_URL"]):?>
<a href="<?=$arResult["NEXT_MONTH_URL"]?>" title="<?=$arResult["NEXT_MONTH_URL_TITLE"]?>"><img src="/img/calendar_next_month.png" width="23" height="8" alt="<?=$arResult["NEXT_MONTH_URL_TITLE"]?>" /></a>
<?endif?>
</td>
</tr>
</table>
<?/*?>
	<?if($arParams["SHOW_CURRENT_DATE"]):?>
		<p align="right" class="NewsCalMonthNav"><b><?=$arResult["TITLE"]?></b></p>
	<?endif?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td class="NewsCalMonthNav" align="left">
				<?if($arResult["PREV_MONTH_URL"]):?>
					<a href="<?=$arResult["PREV_MONTH_URL"]?>" title="<?=$arResult["PREV_MONTH_URL_TITLE"]?>"><?=GetMessage("IBL_NEWS_CAL_PR_M")?></a>
				<?endif?>
				<?if($arResult["PREV_MONTH_URL"] && $arResult["NEXT_MONTH_URL"] && !$arParams["SHOW_MONTH_LIST"]):?>
					&nbsp;&nbsp;|&nbsp;&nbsp;
				<?endif?>
				<?if($arResult["SHOW_MONTH_LIST"]):?>
					&nbsp;&nbsp;
					<select onChange="b_result()" name="MONTH_SELECT" id="month_sel">
						<?foreach($arResult["SHOW_MONTH_LIST"] as $month => $arOption):?>
							<option value="<?=$arOption["VALUE"]?>" <?if($arResult["currentMonth"] == $month) echo "selected";?>><?=$arOption["DISPLAY"]?></option>
						<?endforeach?>
					</select>
					&nbsp;&nbsp;
					<script language="JavaScript" type="text/javascript">
					<!--
					function b_result()
					{
						var idx=document.getElementById("month_sel").selectedIndex;
						<?if($arParams["AJAX_ID"]):?>
							jsAjaxUtil.InsertDataToNode(document.getElementById("month_sel").options[idx].value, 'comp_<?echo $arParams['AJAX_ID']?>', <?echo $arParams["AJAX_OPTION_SHADOW"]=="Y"? "true": "false"?>);
						<?else:?>
							window.document.location.href=document.getElementById("month_sel").options[idx].value;
						<?endif?>
					}
					-->
					</script>
				<?endif?>
				<?if($arResult["NEXT_MONTH_URL"]):?>
					<a href="<?=$arResult["NEXT_MONTH_URL"]?>" title="<?=$arResult["NEXT_MONTH_URL_TITLE"]?>"><?=GetMessage("IBL_NEWS_CAL_N_M")?></a>
				<?endif?>
			</td>
			<?if($arParams["SHOW_YEAR"]):?>
			<td class="NewsCalMonthNav" align="right">
				<?if($arResult["PREV_YEAR_URL"]):?>
					<a href="<?=$arResult["PREV_YEAR_URL"]?>" title="<?=$arResult["PREV_YEAR_URL_TITLE"]?>"><?=GetMessage("IBL_NEWS_CAL_PR_Y")?></a>
				<?endif?>
				<?if($arResult["PREV_YEAR_URL"] && $arResult["NEXT_YEAR_URL"]):?>
					&nbsp;&nbsp;|&nbsp;&nbsp;
				<?endif?>
				<?if($arResult["NEXT_YEAR_URL"]):?>
					<a href="<?=$arResult["NEXT_YEAR_URL"]?>" title="<?=$arResult["NEXT_YEAR_URL_TITLE"]?>"><?=GetMessage("IBL_NEWS_CAL_N_Y")?></a>
				<?endif?>
			</td>
			<?endif?>
		</tr>
	</table><?*/?>
	<br />
    
	<?foreach($arResult["WEEK_DAYS"] as $WDay):?>
		<div class="afisha_header"><?=$WDay["FULL"]?></div>
	<?endforeach?>
	<div style="clear:both;"></div>
	<?foreach($arResult["MONTH"] as $arWeek):?>
	
		<?foreach($arWeek as $arDay):?>
            
        <?if (count($arDay["events"])>0) {?>
        	<?if ($arDay["events"][0]["preview_picture"]["SRC"]) {?>
            <div class="days <?=$arDay["td_class"]?>">
            <div class="afisha_picture"><img src="<?=$arDay["events"][0]["preview_picture"]["SRC"]?>" width="74" height="74" /></div>
            <? if ($arDay['prev'] == "Y") { ?>
            <div class="afisha_black2"></div>
            <?}else{?>
            <div class="afisha_black"></div>
            <?}?>
            <div class="afisha_date"><a href="<?=$arDay["events"][0]["url"]?>" class="<?=$arDay["day_class"]?>" onMouseOver="popup_show('<?=$arDay["events"][0]["id_event"]?>');" onMouseOut="popup_hide('<?=$arDay["events"][0]["id_event"]?>');"><?=$arDay["day"]?></a></div>
            <div id="popup_<?=$arDay["events"][0]["id_event"]?>" class="calendar_popup" onMouseOver="popup_div_show(<?=$arDay["events"][0]["id_event"]?>)" onMouseOut="popup_div_hide(<?=$arDay["events"][0]["id_event"]?>)">
           <b><a href="<?=$arDay["events"][0]["url"]?>"><?=$arDay["events"][0]["title"]?></a></b> <br /><br />
           <?=$arDay["events"][0]["preview_text"]?>
           </div>
           </div>
			<?}else{?>
            <div class="days <?=$arDay["td_class"]?>" style="background:#ece1ca;">
            <a href="<?=$arDay["events"][0]["url"]?>" class="<?=$arDay["day_class"]?>" onMouseOver="popup_show('<?=$arDay["events"][0]["id_event"]?>');" onMouseOut="popup_hide('<?=$arDay["events"][0]["id_event"]?>');"><?=$arDay["day"]?></a>           
           <div id="popup_<?=$arDay["events"][0]["id_event"]?>" class="calendar_popup" onMouseOver="popup_div_show(<?=$arDay["events"][0]["id_event"]?>)" onMouseOut="popup_div_hide(<?=$arDay["events"][0]["id_event"]?>)">
           <b><a href="<?=$arDay["events"][0]["url"]?>"><?=$arDay["events"][0]["title"]?></a></b> <br /><br />
           <?=$arDay["events"][0]["preview_text"]?>
           </div>
           </div>
            <?}?>
        <?}else{?>
        <div class="days <?=$arDay["td_class"]?>">
        <? if ($arDay['prev'] == "Y") { ?>
            <div class="afisha_black2"></div>
            <?}?>
		<div class="afisha_date"><?=$arDay["day"]?></div>
        </div>
        <?}?>
		<?endforeach?>
	<?endforeach?>