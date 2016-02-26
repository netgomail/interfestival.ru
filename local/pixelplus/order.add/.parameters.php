<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
$arFieldsList = Array(
	"NAME"=>getMessage('PX_OF_NAME'),
	"PHONE"=>getMessage('PX_OF_PHONE'),
	"PHONE"=>getMessage('PX_OF_EMAIL'),
	"COMMENTS"=>getMessage('PX_OF_COMMENTS'),
);

$arFilter = Array("TYPE_ID" => "PIXELPLUS_ORDER", "ACTIVE" => "Y");
$arEvent = Array();
$dbType = CEventMessage::GetList($by="ID", $order="DESC", $arFilter);
while($arType = $dbType->GetNext())
	$arEvent[$arType["ID"]] = "[".$arType["ID"]."] ".$arType["SUBJECT"];


$arComponentParameters = array(
   "GROUPS" => array(
      "MYSETTINGS" => array(
         "NAME" => getMessage('MYSETTINGS')
      ),
	  "FIELDS_LIST_GROUP" => array(
         "NAME" => getMessage('FIELDS_LIST_GROUP')
      )
   ),
   "PARAMETERS" => array(
	  "FIELDS_LIST" => array(
         "PARENT" => "FIELDS_LIST_GROUP",
         "NAME" => getMessage('FIELDS_LIST'),
         "TYPE" => "LIST",
         "VALUES" => $arFieldsList,
		 "REFRESH" => "Y",
		 "MULTIPLE"=>"Y",
		 "ADDITIONAL_VALUES"=>"Y",
      ),
	  "FIELDS_PREFIX" => array(
         "PARENT" => "MYSETTINGS",
         "NAME" => getMessage('FIELDS_PREFIX'),
         "TYPE" => "STRING",
      ),
	   "USE_CAPTCHA" => array(
         "PARENT" => "MYSETTINGS",
         "NAME" => getMessage('USE_CAPTCHA'),
         "TYPE" => "CHECKBOX",
      ),
	  "EVENT_MESSAGE_ID" => Array(
			"NAME" => GetMessage("MFP_EMAIL_TEMPLATES"),
			"TYPE"=>"LIST",
			"VALUES" => $arEvent,
			"DEFAULT"=>"",
			"MULTIPLE"=>"Y",
			"COLS"=>25,
			"PARENT" => "BASE",
		),
	  "CACHE_TIME"=>Array()
   )
);

if ($arCurrentValues['FIELDS_LIST']) {

	foreach ($arCurrentValues['FIELDS_LIST'] as $value) {
		if (trim($value) != "") {
			if ($arFieldsList[$value]) {
				$arReqFieldsList[$value] = $arFieldsList[$value];
			} else {
				$arReqFieldsList[$value] = $value;
			}
		}
	}

	$arComponentParameters['PARAMETERS']["FIELDS_LIST_REQUIRED"] = array(
		"PARENT" => "FIELDS_LIST_GROUP",
		"NAME" => getMessage('FIELDS_LIST_REQUIRED'),
		"TYPE" => "LIST",
		"VALUES" => $arReqFieldsList,
		"REFRESH" => "Y",
		"ADDITIONAL_VALUES"=>"Y",
		"MULTIPLE"=>"Y"
	);
}

if(CModule::IncludeModule("iblock")) {
	$rsIBlock = CIBlock::GetList(Array("sort" => "asc"), Array("ACTIVE"=>"Y"));
	while($arr=$rsIBlock->Fetch())
		$arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];

	$arComponentParameters['PARAMETERS']["ADDDATA_IN_INFOBLOCK"] = array(
		"PARENT" => "MYSETTINGS",
		"NAME" => getMessage('ADDDATA_IN_INFOBLOCK'),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "N",
		"REFRESH" => "Y"
	);
	if ($arCurrentValues['ADDDATA_IN_INFOBLOCK'] == "Y") {
		$arComponentParameters['PARAMETERS']["IBLOCK_ID"] = array(
			"PARENT" => "MYSETTINGS",
			"NAME" => getMessage('IBLOCK_ID'),
			"TYPE" => "LIST",
			"VALUES" => $arIBlock,
			"REFRESH" => "Y"
		);
		$arComponentParameters['PARAMETERS']["ADDDATA_IN_INFOBLOCK_NAME"] = array(
			"PARENT" => "MYSETTINGS",
			"NAME" => getMessage('ADDDATA_IN_INFOBLOCK_NAME'),
			"TYPE" => "STRING"
		);
	}
}

?>