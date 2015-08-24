<?
/*global $mzx;
global $msz;
global $mrx;
global $mdx;*/
$mzx=array();
$mrx=array();
$masxx=array();
while ($arItems = $dbBasketItems->Fetch())
{
    $arBasketItems = $arItems;
	//echo '<pre>';
	//print_r($arBasketItems["NAME"]);//корзина
	//echo '</pre>';
	//array_push($mdrb["NAME"],$arBasketItems["NAME"]);
	//$arfSelect = Array();//"ID", "NAME", "DATE_ACTIVE_FROM"
$arfFilter = Array("IBLOCK_ID"=>2, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","NAME"=>$arBasketItems["NAME"],);
$res = CIBlockElement::GetList(Array(), $arfFilter, false, Array("nPageSize"=>50), $arfSelect);
while($ob = $res->Fetch())
{
	$arfFields = $ob;
	//$masxx=$arfFields["ID"];
	//print_r($arfFields);
	//print_r($masxx);//ид товара
	//$res   =   CIBlockElement::GetByID($masxx);
	//$ar_res   =   $res->Fetch();
	//echo '<pre>';
	//print_r($arfFields/*["IBLOCK_SECTION_ID"]*/);//ид категории
	//echo '</pre>';
	array_push($masxx,$arfFields["ID"]);
	array_push($mrx,$arfFields["IBLOCK_SECTION_ID"]);
	$rsSections = CIBlockSection::GetList($arSort, $arrFilter=array("ID"=>$arfFields["IBLOCK_SECTION_ID"]), $arParams["COUNT_ELEMENTS"],$arSelect);
	while($arSection = $rsSections->GetNext())
		{
			array_push($mzx,$arSection["NAME"]);
			//print_r ($arSection["NAME"]);//имя категории
		}
}
	/*$arFilter = Array("SECTION_ID"=>$ar_res["IBLOCK_SECTION_ID"]);
	$rs=CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
	$obb = $rs->GetNextElement();
	$arrFields = $obb->GetFields();
	print_r($arrFields["NAME"],$arrFields["ID"]);
echo '</pre>';*/
	}
$msz=array_unique($mzx);
$mdx=array_unique($mrx);
//$mcx=array_unique($masxx);
?>