<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/strany/([0-9\\w\\s-+]+)(\$|\\?.*)#",
		"RULE" => "CODE=\$1",
		"ID" => "",
		"PATH" => "/strany/detail.php",
	),
);

?>