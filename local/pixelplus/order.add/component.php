<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
global $APPLICATION;

if ($arParams['ADDDATA_IN_INFOBLOCK'] == "Y") {
	$arParams["IBLOCK_ID"] = (int) $arParams["IBLOCK_ID"];
	if ($arParams["IBLOCK_ID"] <= 0) {
		$arParams['ADDDATA_IN_INFOBLOCK'] = "N";
		unset($arParams["IBLOCK_ID"]);
		unset($arParams["ADDDATA_IN_INFOBLOCK_NAME"]);
	} else {
		if (!$arParams["ADDDATA_IN_INFOBLOCK_NAME"]) {
			$arParams["ADDDATA_IN_INFOBLOCK_NAME"] = ConvertTimeStamp();
		}
	}
}
$arResult['INFO_TEXT'] = '';

__IncludeLang($_SERVER["DOCUMENT_ROOT"].$this->GetPath()."/lang/".LANGUAGE_ID."/.parameters.php");

$arParams["EVENT_NAME"] = trim($arParams["EVENT_NAME"]);
if(strlen($arParams["EVENT_NAME"]) <= 0)
	$arParams["EVENT_NAME"] = "PIXELPLUS_ORDER";

if ($this->InitComponentTemplate($templatePage)) {
	$template = &$this->GetTemplate();
	$templateFolder = $template->GetFolder();
	__IncludeLang($_SERVER["DOCUMENT_ROOT"].$templateFolder."/lang/".LANGUAGE_ID."/template.php");
}

$arParams['FIELDS_PREFIX'] = strtoupper($arParams['FIELDS_PREFIX']);

include($_SERVER['DOCUMENT_ROOT'].$this->GetPath()."/pxparams.php");

foreach ($arParams['FIELDS_LIST'] as $key=>$field) {
	$field = trim($field);
	if (strlen($field) > 0) {
		$fieldname = $arParams['FIELDS_PREFIX']."_".$field;
		// Начальные параметры
		$arResult['VIRTUAL_FIELDS'][$fieldname] = Array(
			"NAME"=>getMessage("PX_OF_".$field),
			"IS_REQUIRED"=>"N",
			"WITHOUT_PREFIX"=>$field,
			"PARAMS"=>Array(
				"TYPE"=>"STRING",
				"MULTIPLY"=>false
			)
		);
		
		//Обязательность полей
		if (in_array($field,$arParams['FIELDS_LIST_REQUIRED'])) {
			$arResult['VIRTUAL_FIELDS'][$fieldname]['IS_REQUIRED'] = "Y";
		}
		
		//Кодировка в случае AJAX запроса
		if ($_REQUEST['pxajax'] == "Y" && !defined('BX_UTF')) {
			if (!is_array($_REQUEST[$fieldname])) {
				$_REQUEST[$fieldname] = $GLOBALS['APPLICATION']->ConvertCharset($_REQUEST[$fieldname], 'UTF-8', SITE_CHARSET);
			} else {
				foreach ($_REQUEST[$fieldname] as $reqk=>$reqf) {
					$_REQUEST[$fieldname][$reqk] = $GLOBALS['APPLICATION']->ConvertCharset($reqf, 'UTF-8', SITE_CHARSET);
				}
			}
		}
		//Параметры из конфигурационного файла
		$bisfile = false; $bismulty = false;
		if (array_key_exists($field,$arResult['FIELD_PARAMS'])) {
			$bisfile = $arResult['FIELD_PARAMS'][$field]['TYPE'] === "FILE";
			$bismulty = $arResult['FIELD_PARAMS'][$field]['MULTIPLY'] === true;
			
			$arResult['VIRTUAL_FIELDS'][$fieldname]['PARAMS'] = $arResult['FIELD_PARAMS'][$field];
		}
		
		//Для корректной работы cusel (должен быть укзан параметр)
		if ($arResult['VIRTUAL_FIELDS'][$fieldname]['PARAMS']['TYPE'] == "SELECT") {
			if ($bismulty === false) {
				if ($_REQUEST[$fieldname] == "-") unset($_REQUEST[$fieldname]);
			} else {
				foreach ($_REQUEST[$fieldname] as $key=>$value) {
					if ($value == "-") unset($_REQUEST[$fieldname][$key]);
				}
				if (count($_REQUEST[$fieldname]) === 0) unset($_REQUEST[$fieldname]);
			}
		}
		
		
		if ($bisfile === false) {
			//Значения, переданные в запросе
			if ($bismulty === false) {
				if (strlen($_REQUEST[$fieldname]) > 0) {
					$arResult['VIRTUAL_FIELDS'][$fieldname]['VALUE'] = htmlspecialcharsEx($_REQUEST[$fieldname]);
					$arResult['VIRTUAL_FIELDS'][$fieldname]['~VALUE'] = $_REQUEST[$fieldname];
				}
			} else {
				foreach ($_REQUEST[$fieldname] as $key=>$value) {
					if (strlen($value) > 0) {
						$arResult['VIRTUAL_FIELDS'][$fieldname]['VALUE'][] = htmlspecialcharsEx($value);
						$arResult['VIRTUAL_FIELDS'][$fieldname]['~VALUE'][] = $value;
					}
				}
			}
		} else {
		
			//Расширения для файлов задавать обязательно, иначе небезопасно
			if (!$arResult['VIRTUAL_FIELDS'][$fieldname]['PARAMS']['EXTENSIONS']) {
				$arResult['VIRTUAL_FIELDS'][$fieldname]['PARAMS']['EXTENSIONS'] = "jpg,pgn,gif";
			}	
			
			if ($bismulty === false) {
				if (strlen($_FILES[$fieldname]['name']) > 0) {					
					$_FILES[$fieldname]['name_formatted'] = htmlSpecialCharsEx($_FILES[$fieldname]['name']);
					$arResult['VIRTUAL_FIELDS'][$fieldname]['VALUE'] = $_FILES[$fieldname];
				}
			} else {
				foreach ($_FILES[$fieldname]['name'] as $key=>$value) {
					if (strlen($value) > 0) {
						$arResult['VIRTUAL_FIELDS'][$fieldname]['VALUE'][] = Array(
							"name" => $value,
							"size" => $_FILES[$fieldname]['size'][$key],
							"tmp_name" => $_FILES[$fieldname]['tmp_name'][$key],
							"type" => $_FILES[$fieldname]['type'][$key],
							"error" => $_FILES[$fieldname]['error'][$key],
							"name_formatted" => htmlSpecialCharsEx($value)
						);
					}
				}
			}
		}
	}
}

if ($arParams['USE_CAPTCHA'] == "Y") {
	$arResult['CAPTCHA'] = Array(
		"NAME_WORD"=>$arParams['FIELDS_PREFIX']."_"."CAPTCHA_WORD",
		"NAME_SID"=>$arParams['FIELDS_PREFIX']."_"."CAPTCHA_SID",
	);
	$arResult['CAPTCHA']['VALUE_WORD'] = $_REQUEST[$arResult['CAPTCHA']['NAME_WORD']];
	$arResult['CAPTCHA']['VALUE_SID'] = $_REQUEST[$arResult['CAPTCHA']['NAME_SID']];
}

$arResult['SEND_BUTTON_NAME'] = $arParams['FIELDS_PREFIX']."_"."SEND_REVIEW";

$arResult['ERROR'] = false;

if ($_REQUEST[$arResult['SEND_BUTTON_NAME']] == "Y") {	
	foreach ($arResult['VIRTUAL_FIELDS'] as $key=>&$arValue) {		
		$bhasvalue = ($arValue['PARAMS']['TYPE'] === "FILE" && count($arValue['VALUE']) > 0) ||
			($arValue['PARAMS']['MULTIPLY'] === true && count($arValue['VALUE']) > 0) ||
			($arValue['PARAMS']['MULTIPLY'] !== true && strlen($arValue['VALUE']) > 0);
			
			
		if ($bhasvalue === true) {
			switch ($arValue['PARAMS']['TYPE']) {
				case "EMAIL":
					//TODO: no multiply check
					if (!check_email($arValue['VALUE'])) {
						$arValue['ERROR'] = "NC";
						$arResult['ERROR'] = true;
						$arResult['ERROR_TEXT_ARRAY'][] = getMessage('ERROR_FIELD_NC',Array("#FIELD#"=>$arValue['NAME']));
						continue;
					} else {
						$arValue['TEXT_VALUE'] = $arValue['VALUE'];
					}
				break;
				case "SELECT":
				case "CHECKBOX":					
					$berror = false;
					if ($arValue['PARAMS']['MULTIPLY'] === true) {
						foreach ($arValue['VALUE'] as $value) {
							if (array_key_exists($value,$arValue['PARAMS']['VALUES'])) {
								$arValue['PARAMS']['VALUES'][$value]['SELECTED'] = "Y";
								$arValue['TEXT_VALUE'][] = $arValue['PARAMS']['VALUES'][$value]['NAME'];							
								
							} else {
								$arResult['ERROR'] = true;
								$berror = true;
							}
						}						
					} else {
						if (array_key_exists($arValue['VALUE'],$arValue['PARAMS']['VALUES'])) {
							$arValue['PARAMS']['VALUES'][$arValue['VALUE']]['SELECTED'] = "Y";
							$arValue['TEXT_VALUE'] = $arValue['PARAMS']['VALUES'][$arValue['VALUE']]['NAME'];
						} else {							
							$arResult['ERROR'] = true;
							$berror = true;
						}
					}					
					
					if ($berror === true) {
						$arValue['ERROR'] = "NC";
						$arResult['ERROR_TEXT_ARRAY'][] = getMessage('ERROR_FIELD_NC',Array("#FIELD#"=>$arValue['NAME']));
						continue;
					}
				break;
				case "FILE":					
					$truefiles = 0;
					$bfileerror = false;
					$arValue['PARAMS']['MAX_SIZE_ONE'] = intval($arValue['PARAMS']['MAX_SIZE_ONE']);
					if ($arValue['PARAMS']['MULTIPLY'] === true) {
						foreach ($arValue['VALUE'] as $arFile) {							
							if ($arFile['error'] > 0) {
								$bfileerror = true;
								$arResult['ERROR'] = true;
								$arResult['ERROR_TEXT_ARRAY'][] = getMessage('ERROR_FILE_UPLOAD',Array("#FIELD#"=>$arFile['name_formatted']));
							} else {															
								$res = CFile::CheckFile($arFile, $arValue['PARAMS']['MAX_SIZE_ONE'], "", $arValue['PARAMS']['EXTENSIONS']);
								if (strlen($res) > 0) {
									$bfileerror = true;
									$arResult['ERROR'] = true;
									$arResult['ERROR_TEXT_ARRAY'][] = $arFile['name_formatted'].": ".$res;
								} else {									
									$truefiles++;
								}								
							}
						}
					} else {
						$arFile = $arValue['VALUE'];
						if ($arFile['error'] > 0) {
							$bfileerror = true;
							$arResult['ERROR'] = true;
							$arResult['ERROR_TEXT_ARRAY'][] = getMessage('ERROR_FILE_UPLOAD',Array("#FIELD#"=>$arFile['name_formatted']));
						} else {							
							$res = CFile::CheckFile($arFile, $arValue['PARAMS']['MAX_SIZE_ONE'], "", $arValue['PARAMS']['EXTENSIONS']);
							if (strlen($res) > 0) {
								$bfileerror = true;
								$arResult['ERROR'] = true;
								$arResult['ERROR_TEXT_ARRAY'][] = $arFile['name_formatted'].": ".$res;
							} else {									
								$truefiles++;
							}							
						}
					}
					if ($bfileerror === false) {
						if ($truefiles > 0) {
							if ($truefiles > $arValue['PARAMS']['MAX_CNT']) {
								$arResult['ERROR'] = true;
								$arResult['ERROR_TEXT_ARRAY'][] = getMessage('ERROR_FILE_COUNT',Array("#MAX_CNT#"=>$arValue['PARAMS']['MAX_CNT']));
							}
						} elseif ($arValue['IS_REQUIRED'] == "Y") {
							$arValue['ERROR'] = "NC";
							$arResult['ERROR'] = true;
							$arResult['ERROR_TEXT_ARRAY'][] = getMessage('ERROR_FIELD_NC',Array("#FIELD#"=>$arValue['NAME']));
						}
					} else {
						$arValue['ERROR'] = "NC";
					}
					break;
				default:
				if ($arValue['PARAMS']['MULTIPLY'] === true) {
					foreach ($arValue['VALUE'] as $value) {
						$arValue['TEXT_VALUE'][] = $value;
					}
				} else {
					$arValue['TEXT_VALUE'] = $arValue['VALUE'];
				}				
			}
			
			if (is_array($arValue['TEXT_VALUE'])) {
				$arValue['TEXT_VALUE'] = implode(", ",$arValue['TEXT_VALUE']);
			}			
		} else {
			if ($arValue['IS_REQUIRED'] == "Y") {				
				$arValue['ERROR'] = "R";
				$arResult['ERROR'] = true;
				$arResult['ERROR_TEXT_ARRAY'][] = getMessage('ERROR_FIELD_R',Array("#FIELD#"=>$arValue['NAME']));
			}
		}
	}
	unset($arValue);
	if ($arParams['USE_CAPTCHA'] == "Y") {
		if (!$APPLICATION->CaptchaCheckCode($arResult['CAPTCHA']['VALUE_WORD'],$arResult['CAPTCHA']['VALUE_SID'])) {
			$arResult['ERROR'] = true;
			$arResult['CAPTCHA']['ERROR'] = "C";
			$arResult['ERROR_TEXT_ARRAY'][] = getMessage('ERROR_FIELD_NC',Array("#CAPTCHA#"=>"CAPTCHA"));
		}
	}
	if (!$arResult['ERROR']) {
		/*
		if ($arParams['WEB_FORM_ID'] > 0 && CModule::IncludeModule('form')) {
			$arWBAdd = Array();
			if (CForm::GetDataByID(
			 $arParams['WEB_FORM_ID'],
			 $arForm,
			 $arQuestionsList,
			 $arAnswersList,
			 $dropdown,
			 $arMultiselect
			)) {
				foreach ($arAnswersList as $qcode=>$arAnswers) {
					$arInd = $arAnswers[0];
					$identefication = "form_".$arInd['FIELD_TYPE']."_".$arInd['ID'];
					if ($qcode != "FILE_LIST") {
						if ($arResult['POST_FIELDS'][$qcode]) {
							$arWBAdd[$identefication] = $arResult['POST_FIELDS'][$qcode];
						}
					} else {
						foreach ($arResult['FILE_LIST'] as $num => $arFile) {
							$arWBAdd["form_file_".$arAnswersList['FILE_LIST'][$num]['ID']] = $arFile;
						}
					}
				}
				$RESULT_ID = CFormResult::Add(
					$arParams['WEB_FORM_ID'],
					$arWBAdd		
				);
				if ($RESULT_ID) {
					CFormResult::Mail($RESULT_ID,false);
					$arResult['SUCCESS'] = "Y";
				} else {
					global $strError;
					$arResult['ERROR'] = true;
					$arResult['ERROR_TEXT_ARRAY'][] = $strError;
				}
			}
		} 
		*/
		
		$arFilesFields = Array();
		$arResult['POST_FIELDS']['INFO_TEXT'] = '';
		foreach ($arResult['VIRTUAL_FIELDS'] as $fieldname=>$arFieldParams) {
			if (!$arValue['ERROR']) {
				if ($arFieldParams['TEXT_VALUE']) {
					$arResult['POST_FIELDS'][$arFieldParams['WITHOUT_PREFIX']] = $arFieldParams['TEXT_VALUE'];
					$arResult['POST_FIELDS']['INFO_TEXT'] .= "<b>".$arFieldParams['NAME']."</b>:"." ".$arFieldParams['TEXT_VALUE']."<br>";
				} elseif ($arFieldParams['PARAMS']['TYPE'] == "FILE" && is_array($arFieldParams['VALUE'])) {
					$arFilesFields[$arFieldParams['WITHOUT_PREFIX']] = $arFieldParams['VALUE'];
				}
			}
		}
		
		if ($arParams['ADDDATA_IN_INFOBLOCK'] == "Y" && $arParams['IBLOCK_ID'] > 0 && CModule::IncludeModule('iblock')) {
			$arFields['IBLOCK_ID'] = $arParams['IBLOCK_ID']; 
			$arFields['ACTIVE'] = "N";
			/*$arFields['DETAIL_TEXT'] = $arResult['POST_FIELDS']['INFO_TEXT']; 
			$arFields['DETAIL_TEXT_TYPE'] = "html"; */
			$arFields['NAME'] = $arParams["ADDDATA_IN_INFOBLOCK_NAME"];
			foreach ($arResult['POST_FIELDS'] as $key=>$value) {
				$arFields['NAME'] = str_replace("#".$key."#",$value,$arFields['NAME']);
				$arFields['PROPERTY_VALUES'][$key] = $value;
				//text
			}
			if (count($arFilesFields) > 0) {
				foreach ($arFilesFields as $fkey=>$arFile) {
					$arFields['PROPERTY_VALUES'][$fkey] = $arFile;
				}
			}
							
			$arFields['NAME'] = str_replace(
				Array("#SHORT_TIME#","#FULL_TIME#"),
				Array(ConvertTimeStamp(false),ConvertTimeStamp(false,"FULL")),
				$arFields['NAME']
			);
			
			//only kirpichclub
			//$arFields['PREVIEW_PICTURE'] = $arFilesFields['AVATAR'];
			//unset($arFields['PROPERTY_VALUES']['AVATAR']);
			$arFields['DATE_ACTIVE_FROM'] = ConvertTimeStamp();
			$arFields['PREVIEW_TEXT'] = $arResult['POST_FIELDS']['COMMENTS'];
			$arFields['PREVIEW_TEXT_TYPE'] = "text";
			//$arFields['DETAIL_TEXT'] = $arResult['POST_FIELDS']['MESSAGE'];
			//$arFields['DETAIL_TEXT_TYPE'] = "html";
			//only kirpichclub
			
			$el = new CIBlockElement;				
			$ID = $el->Add($arFields,false,false,true);
			
			if ($ID > 0) {
				if (count($arFilesFields) > 0) {
					$arFilter = Array(
						"=IBLOCK_ID"=>$arFields['IBLOCK_ID'],
						"=ID"=>$ID
					);
					
					$res = $el->GetList(Array(),$arFilter);
					if ($arRes = $res->GetNextElement()) {
						$arElement = $arRes->GetFields();
						$arElement['PROPERTIES'] = $arRes->GetProperties();
					}
					
					//only kirpichclub
					/*if ($arElement['PREVIEW_PICTURE'] > 0) {
						$arFile = CFile::GetFileArray($arElement['PREVIEW_PICTURE']);
						$link = '<a href="http://'.SITE_SERVER_NAME.$arFile['SRC'].'">'.$arFile['ORIGINAL_NAME'].'</a>';
						$arResult['POST_FIELDS']['AVATAR'] = $link;
					}*/				
					//only kirpichclub
					
					
					foreach ($arElement['PROPERTIES'] as $arProp) {
						//TODO: multiply
						if (array_key_exists($arProp['CODE'],$arFilesFields) && $arProp['VALUE']) {
						
							if (!is_array($arProp['VALUE'])) {
								$arFile = CFile::GetFileArray($arProp['VALUE']);
								if (is_array($arFile)) {
									$arFieldParams = $arResult['VIRTUAL_FIELDS'][$arParams['FIELDS_PREFIX']."_".$arProp['CODE']];
									$link = '<a href="http://'.SITE_SERVER_NAME.$arFile['SRC'].'">'.$arFile['ORIGINAL_NAME'].'</a>';
									$arResult['POST_FIELDS'][$arProp['CODE']] = $link;
									//$arResult['POST_FIELDS']['INFO_TEXT'] .= "<b>".$arFieldParams['NAME']."</b>:"." ".$link."<br>";
								}
							} else {								
								$arResult['POST_FIELDS'][$arProp['CODE']] = Array();
								foreach ($arProp['VALUE'] as $key=>$fid) {
									$arFile = CFile::GetFileArray($fid);
									$arFieldParams = $arResult['VIRTUAL_FIELDS'][$arParams['FIELDS_PREFIX']."_".$arProp['CODE']];
									$link = '<a href="http://'.SITE_SERVER_NAME.$arFile['SRC'].'">'.$arFile['ORIGINAL_NAME'].'</a>';
									$arLinks[] = $link;
									$arResult['POST_FIELDS'][$arProp['CODE']][] = $link;									
								}
																
								//$arResult['POST_FIELDS']['INFO_TEXT'] .= "<b>".$arFieldParams['NAME']."</b>:"." ".implode("<br>",$arLinks)."<br>";
								$arResult['POST_FIELDS'][$arProp['CODE']] = implode("<br>",$arResult['POST_FIELDS'][$arProp['CODE']]);
							}
						}
					}
				}
			}
		  
		
			$event = new CEvent;
			if(!empty($arParams["EVENT_MESSAGE_ID"])) {
				foreach($arParams["EVENT_MESSAGE_ID"] as $v) {
					if(IntVal($v) > 0) {
						$event->Send("CALLBACK", SITE_ID, $arResult['POST_FIELDS'], "N", IntVal($v));
					}
				}
			} else {
					$event->Send("CALLBACK", SITE_ID, $arResult['POST_FIELDS']);
			}
			$arResult['SUCCESS'] = "Y";
		}
	}
}

//Если форма не отправлена или отправлена и возникла ошибка
if ($arParams['USE_CAPTCHA'] == "Y" && ($arResult['ERROR'] || $_REQUEST[$arResult['SEND_BUTTON_NAME']] != "Y")) {
	$arResult['CAPTCHA']['SID'] = $APPLICATION->CaptchaGetCode();
}

if ($_REQUEST['pxajax'] == "Y") {
	$APPLICATION->RestartBuffer();
	$this->ShowComponentTemplate();
	die();
}?>
<?$this->ShowComponentTemplate();?>