<?
$mrx=array();

while ($arItems = $dbBasketItems->Fetch())
{
    $arBasketItems = $arItems;

$arfFilter = Array("IBLOCK_ID"=>2, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","NAME"=>$arBasketItems["NAME"],);
$res = CIBlockElement::GetList(Array(), $arfFilter, false, Array("nPageSize"=>50), $arfSelect);
while($ob = $res->Fetch())
		{
		array_push($mrx,$ob["IBLOCK_SECTION_ID"]);
		}
}
$mdx=array_unique($mrx);

?>
