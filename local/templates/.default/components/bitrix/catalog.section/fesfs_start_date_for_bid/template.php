<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="first_fest">
    <table>
        <tbody>
        <? foreach($arResult['ITEMS'] as $arElement):?>
			<? $start = strtotime($arElement["PROPERTIES"]["START_DATE"]["VALUE"]);?>
            <? $timeNow = strtotime(date("d.m.Y H:i:s"))?>
			<? $string = FormatDate("Q", MakeTimeStamp($arElement["PROPERTIES"]["START_DATE"]["VALUE"]));
		    $arCounter = explode(" ", $string);?>
            <? if($start < $arResult['TIME_NOW_U']):?>
            <? continue;?>
            <? endif;?>
            <tr>
                <td width="295" align="center"><?=$arElement['NAME']?></td>
                <td width="75" align="center"><span class="days_counter"><?=abs($arCounter[0]);?></span></td>
                <td width="125" align="center"> <span class="days"><?=$arCounter[1];?> до начала <br> фестиваля </span> </td>
                <td> <a style="display:block" href="/zayavka_online/?name=<?=$arElement['NAME']?>&place=<? echo($GLOBALS['place']);?>" target="_blank"><div class="application_1"></div></a></td>
            </tr>

        <? endforeach;?>
        </tbody>
    </table>
    <div class="clear"></div>
</div>






