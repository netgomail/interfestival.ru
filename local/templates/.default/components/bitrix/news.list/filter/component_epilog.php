<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if(is_numeric($_REQUEST["place"]))
	$GLOBALS['FILTERED'] = array(
	array('LOGIC'=>"AND"), 
	array(
	'PROPERTY_PLACE' => $_REQUEST["place"],
	'>PROPERTY_START_DATE' => ConvertDateTime( $_REQUEST["date"],"YYYY-MM-DD HH-MI-SS"),
	));
	
  ?>              
                    
                    
<pre>
<? /*print_r($GLOBALS['FILTERED']);*/?>
</pre>

