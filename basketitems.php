<?
$arID = array();

global $arBasketItems;
$arBasketItems = array();

$dbBasketItems = CSaleBasket::GetList(
     array(
                "NAME" => "ASC",
                "ID" => "ASC"
             ),
     array(
                "FUSER_ID" => CSaleBasket::GetBasketUserID(),
				"LID" => SITE_ID,
                "ORDER_ID" > 0,
				"ORDER_CANCELED"=>"N"
             ),
     false,
     false,
     array()
             );
while ($arItems = $dbBasketItems->Fetch())
{
     if ('' != $arItems['PRODUCT_PROVIDER_CLASS'] || '' != $arItems["CALLBACK_FUNC"])
     {
          CSaleBasket::UpdatePrice($arItems["ID"],
							   $arItems["NAME"],
                                 $arItems["CALLBACK_FUNC"],
                                 $arItems["MODULE"],
                                 $arItems["PRODUCT_ID"],
                                 "N"
                                 );
          $arID[] = $arItems["ID"];
     }
}
if (!empty($arID))
     {
     $dbBasketItems = CSaleBasket::GetList(
     array(
          "NAME" => "ASC",
          "ID" => "ASC"
          ),
     array(
        "ID" => $arID,
		"LID" => SITE_ID,
         "ORDER_ID" > 0,
		"ORDER_CANCELED"=>"N"
          ),
        false,
        false,
        array()
	 );}
?>