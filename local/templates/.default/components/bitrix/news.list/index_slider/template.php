<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="slider"> 
	<div class="connected-carousels">
            <div class="stage">
                <div class="carousel carousel-stage">
                    <ul>
                        <?foreach($arResult["ITEMS"] as $arItem):?>
                            <?
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                           
                           <? if($arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]!=""):?>
                            <li class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                               <a href="<?=$arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>"> <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" width="1228" height="352" alt=""></a>
                            </li>
                            <? else:?>
                            <li class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                                <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" width="1228" height="352" alt="">
                            </li>
                            <? endif;?>
                        <?endforeach;?>
                    </ul>
                </div><!--carousel carousel-stage--> 
                <a href="#" class="prev prev-stage"><span></span></a>
                <a href="#" class="next next-stage"><span></span></a>
            </div><!--stage--> 
        <div class="navigation">
            <div class="carousel carousel-navigation">
                <ul>
                <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                	<li style="background:url(<?=$arItem["DISPLAY_PROPERTIES"]["ICON"]["FILE_VALUE"]["SRC"]?>) no-repeat;"></li>
                <?endforeach;?>
                </ul>
            </div><!--carousel carousel-navigation--> 
        </div><!--navigation-->   
	</div><!--connected-carousels--> 
</div><!--slider--> 
    


