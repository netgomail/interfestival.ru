
 <? if($dir !="/"):?>
   </div> <!--??right_col-->
	 <div class="clear"></div>  
	 </div><!--content-->
 <? endif;?>
 <div class="clear"></div>

</div>
<!--main_wrap-->
        
        
<div class="footer_push"></div>   
<div class="footer_wrap">  
  <div class="footer"> 
  	<div class="footer_logo">
        <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        ".default",
        Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/inc/footer_logo.php",
        "EDIT_TEMPLATE" => ""
        )
        );?>
    </div>
    <div class="footer_contacts">
        <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        ".default",
        Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/inc/footer_contacts.php",
        "EDIT_TEMPLATE" => ""
        )
        );?>
    </div>  
  <div class="bottom_menu_countries">
  <? $APPLICATION->IncludeComponent("bitrix:news.list", "bottom_menu_countries", array(
	"IBLOCK_TYPE" => "-",
	"IBLOCK_ID" => "6",
	"NEWS_COUNT" => "20",
	"SORT_BY1" => "NAME",
	"SORT_ORDER1" => "ASC",
	"SORT_BY2" => "",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "N",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"INCLUDE_SUBSECTIONS" => "Y",
	"PAGER_TEMPLATE" => ".default",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
  </div><!--bottom_menu_countries-->
  <div class="bottom_company_menu">
    <? $APPLICATION->IncludeComponent(
    "bitrix:menu",
    "bottom_company",
    Array(
    "ROOT_MENU_TYPE" => "left",
    "MAX_LEVEL" => "1",
    "CHILD_MENU_TYPE" => "left",
    "USE_EXT" => "N",
    "DELAY" => "N",
    "ALLOW_MULTI_SELECT" => "N",
    "MENU_CACHE_TYPE" => "N",
    "MENU_CACHE_TIME" => "3600",
    "MENU_CACHE_USE_GROUPS" => "Y",
    "MENU_CACHE_GET_VARS" => ""
    )
    );?>
  </div>
  
  <div class="bottom_add_menu">
   
    <? $APPLICATION->IncludeComponent(
    "bitrix:menu",
    "bottom_add",
    Array(
    "ROOT_MENU_TYPE" => "top",
    "MENU_CACHE_TYPE" => "N",
    "MENU_CACHE_TIME" => "3600",
    "MENU_CACHE_USE_GROUPS" => "Y",
    "MENU_CACHE_GET_VARS" => "",
    "MAX_LEVEL" => "1",
    "CHILD_MENU_TYPE" => "top",
    "USE_EXT" => "N",
    "DELAY" => "N",
    "ALLOW_MULTI_SELECT" => "N"
    )
    );?> 
 
  </div>
  
  <div class="foorer_del">
  	<img src="/img/footer_del.png" width="811" height="53" alt="Логотип" />
  </div>
  </div>
  <!--footer--> 
  <div class="footer_bottom_line"></div>
</div>
<!--footer_wrap-->
</body>  
</html>









