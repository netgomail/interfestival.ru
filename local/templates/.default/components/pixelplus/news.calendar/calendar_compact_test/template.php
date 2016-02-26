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
<div class="news-calendar-compact">
    <div class="month">
        <table cellpadding="3" cellspacing="0" border="0" width="100%">
            <tr>
                <td align="right">
                    <?$current_M = (int)(date("m"));?>
                    <a class="prev_month"  id="prev_mounth_ajax" title="<?=$arResult["PREV_MONTH_URL_TITLE"]?>"></a>
                </td>
                <td align="center" >
                    <span><?=$arResult["TITLE"] = preg_replace ("/[^a-zA-ZР-пр-џ\s]/","",$arResult["TITLE"])?></span><span class="blue_dot"></span><span class="year"><?=$arResult["currentYear"]?></span>
                </td>
                <td align="left">
                    <a class="next_month" id="next_mounth_ajax" title="<?=$arResult["NEXT_MONTH_URL_TITLE"]?>"></a>
                </td>
            </tr>
        </table>
    </div>

    <table border='0' cellspacing='0' class='NewsCalTable'>
        <tr>
            <?$class = " pre_day"?>
            <?$pre_day = true;?>
            <?foreach($arResult["WEEK_DAYS"] as $arWeekDays):?>
                <td class="NewsCalHeader"><?=$arWeekDays["SHORT"]?></td>
            <?endforeach;?>
        </tr>
        <?foreach($arResult["MONTH"] as $arWeek):?>
            <tr>
                <?foreach($arWeek as $key=>$arDay):?>
                    <?
                    if ($arDay["events"][0]["url"]) {
                        $arDay["events"][0]["url"] .= "&".$arParams['MONTH_VAR_NAME']."=".$arResult["currentMonth"]."&".$arParams["YEAR_VAR_NAME"]."=".$arResult["currentYear"];
                    }
                    if($arDay["td_class"] == "NewsCalToday"): $class=" "; $pre_day = false; endif;
                    if($arResult["currentMonth"] > (int)(date("m")) || $arResult["currentYear"] > (int)(date("Y"))): $class=" "; $pre_day=false; endif;
					if($arResult["currentYear"] < (int)(date("Y"))): $class = " pre_day"; $pre_day = true; endif;

?>

                    <td align="right" valign="middle" class='<?=$arDay["td_class"]?><?=$class?>' width="14%">
                        <div style="position:relative;">
                            <?if ($arDay["td_class"]!=NewsCalOtherMonth) {?>
                                <?if(count($arDay["events"])>0 && !$pre_day):?>

                                    <a href="<?=$arDay["events"][0]["url"]?>" class="<?=$arDay["day_class"]?>" onMouseOver="popup_show('<?=$arDay["events"][0]["id_event"]?>');" onMouseOut="popup_hide('<?=$arDay["events"][0]["id_event"]?>');"><?=$arDay["day"]?></a>
									<div class="calendar_popup" id="popup_<?=$arDay["events"][0]["id_event"]?>" onMouseOver="popup_show('<?=$arDay["events"][0]["id_event"]?>');" onMouseOut="popup_hide('<?=$arDay["events"][0]["id_event"]?>');">
									<?foreach($arDay["events"] as $arEvents):?>

                                    <div style="margin-bottom: 5px">
                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                            <tr>
                                                <? /*<td width="70" valign="middle">
                                                    <img src="<?=$arDay["events"][0]["preview_picture"]["SRC"]?>" width="50" height="50" />
                                                </td>*/?>
                                                <td valign="middle">
													<b><a href="<?=$arEvents["url"]?>"><?=$arEvents["title"]?></a></b> <br /><br />
                                                    <?=$arEvents["preview_text"]?>
									
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
									<?endforeach;?>
									</div>
                                <?else:?>
                                    <span class="<?=$arDay["day_class"]?>"><?=$arDay["day"]?></span>
                                <?endif;?>
                            <?}?>
                        </div>
                    </td>
                <?endforeach?>
            </tr >
        <?endforeach?>
    </table>
</div>
<?
// Dates next & prev key
$dates = Array();
$_tmp = explode("?", $arResult["NEXT_MONTH_URL"]);

##------------------------------------------##
$_tmp = explode("?", $arResult["PREV_MONTH_URL"]);
$_tmp = explode('&amp;', $_tmp[1]);

$_dates = explode("=", $_tmp[0]);

if((count($_dates)>1) && isset($_dates[1]) && (strlen($_dates[1])>1)){
    $dates["PREV"] = "/ajax/calendar.php?month=".$_dates[1];

    $_dates = explode("=", $_tmp[1]);
    $dates["PREV"] .= "&year=".$_dates[1];
}
##------------------------------------------##
##------------------------------------------##
$_tmp = explode("?", $arResult["NEXT_MONTH_URL"]);
$_tmp = explode('&amp;', $_tmp[1]);

$_dates = explode("=", $_tmp[0]);

if((count($_dates)>1) && isset($_dates[1]) && (strlen($_dates[1])>1)){
    $dates["NEXT"] = "/ajax/calendar.php?month=".$_dates[1];

    $_dates = explode("=", $_tmp[1]);
    $dates["NEXT"] .= "&year=".$_dates[1];
}
##------------------------------------------##
unset($_tmp, $_dates);
// @copy m1zhory 2014


?>
<script>
    jQuery(document).ready(function(e){
        jQuery("#prev_mounth_ajax").on("click", function(event){
            jQuery.ajax({
                type:"GET",
                url:"<?=@$dates["PREV"]?>",
                success: function(ret){jQuery("#calendar").html(ret);}
            });
            event.preventDefault();
        });
        jQuery("#next_mounth_ajax").on("click", function(event){
            jQuery.ajax({
                type:"GET",
                url:"<?=@$dates["NEXT"]?>",
                success: function(ret){jQuery("#calendar").html(ret);}
            });
            event.preventDefault();
        });
    });
</script>


<style>
    .pre_day { /*display: none;*/ }
</style>
