<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Топ моих покупок');
?> 
<?$APPLICATION->IncludeComponent("my:catalog.section.list", "tree", Array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => 2,
	"SECTION_ID" => "",
	"SECTION_CODE" => "",
	"SECTION_URL" => "",
	"COUNT_ELEMENTS" => "Y",
	"TOP_DEPTH" => 2,
	"SECTION_FIELDS" => "}",
	"SECTION_USER_FIELDS" => "",
	"ADD_SECTIONS_CHAIN" => "",
	"CACHE_TYPE" => "",
	"CACHE_TIME" => 36000000,
	"CACHE_NOTES" => "",
	"CACHE_GROUPS" => "N",
	),
	false
);?> 
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>