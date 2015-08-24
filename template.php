<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);
$i=0;
$j=0;
$str="";
?>

<script>
function onoff(t){
	p=document.getElementById(t);
	if(p.style.display=="none"){
		p.style.display="block";}
	else{
		p.style.display="none";}
}
</script>
<div class="top-order">
	<?
	foreach($arResult["SECTIONS"] as $arSection)
	{	
		$count = $arParams["COUNT_ELEMENTS"] && $arSection["ELEMENT_CNT"] ? " (".$arSection["ELEMENT_CNT"].")" : "";
			$link = $arSection["NAME"].$count;
		echo "\n";
		$str=$arSection['ID'];
		?>

	<li id="<?=$this->GetEditAreaId($arSection['ID']);?>"><a href="javascript:onoff(<?=$str?>);"><?=$link?></a>
	<ul>
		<div id="<?=$str?>" style="display: none;">
<? for ($i=1,$j; $i <=$arSection["NEW_ELEMENT_CNT"];$i++,$j++)
		{?>
		<li>
		<a href="<?=$arResult["ELEMENTS"][$j]["DETAIL_PAGE_URL"]?>">
		<?print_r($arResult["ELEMENTS"][$j]["NAME"]);?>
			</a></li>
		<?}?>
	 </div></ul></li>
<?
	}
	?>
</div>