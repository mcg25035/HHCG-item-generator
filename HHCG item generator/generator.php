<?php
$Data=$_POST['Data'];
$Data=explode('[RipCcjOkMTXZQy5yNv6X]',$Data);
$obj = json_decode($Data[0]);
$ItemID = $obj->ItemID__;
$ItemName = $obj->ItemName__;
$temp_str = "";
for ($i=0;$i<=count($obj->ItemLore__)-1;$i++)
{
    if ($i == 0)
    {
        $temp_str = '"[{\\"text\\":\\"'.$obj->ItemLore__[$i].'\\",\\"italic\\":\\"false\\",\\"bold\\":\\"false\\"}]"';
    }
    else
    {
    $temp_str = $temp_str.','.'"[{\\"text\\":\\"'.$obj->ItemLore__[$i].'\\",\\"italic\\":\\"false\\",\\"bold\\":\\"false\\"}]"';
    }
}
$Lore = $temp_str;
$UnBreaking = $obj->Unbreaking_bool__;
$HideFlags = $obj->HideFlags__;
$temp_str = "";
for ($i=0;$i<=count($obj->AttributeModifiers__)-1;$i++)
{  
    if ($i == 0)
    {
        $temp_str = '[{Slot:"'.json_decode($obj->AttributeModifiers__[$i])->Slot.'",AttributeName:"'.json_decode($obj->AttributeModifiers__[$i])->AttributeName.'",Name:"'.json_decode($obj->AttributeModifiers__[$i])->Name.'",Amount:'.json_decode($obj->AttributeModifiers__[$i])->Amount.',Operation:0,UUID:[I;0,1,0,1]}';
    }
    else
    {
        $temp_str = $temp_str.','.'{Slot:"'.json_decode($obj->AttributeModifiers__[$i])->Slot.'",AttributeName:"'.json_decode($obj->AttributeModifiers__[$i])->AttributeName.'",Name:"'.json_decode($obj->AttributeModifiers__[$i])->Name.'",Amount:'.json_decode($obj->AttributeModifiers__[$i])->Amount.',Operation:0,UUID:[I;0,1,0,1]}';
    }
}
$AttributeModifiers = $temp_str."]";
$Enchantments = "[".implode(",",$obj->Enchantments)."]";
$RepairCost = $obj->RepairCost__;
$CanPlaceOn = '["'.implode('","',$obj->CanPlaceOn__).'"]';
$CanDestroy = '["'.implode('","',$obj->CanDestroy__).'"]';
$AnotherNBT = implode(',',$obj->AnotherNBT__);
$SkullNBT = "SkullOwner:{".substr($Data[1],0,-2)."}";

$temp_str = "/give @p ".$ItemID.'{';
if ($ItemName != "" || count($obj->ItemLore__) != 1 || $obj->ItemLore__[0] != "")
{
    $temp_str = $temp_str."display:{";
    if ($ItemName != "")
    {
        $temp_str = $temp_str.'Name:"[{\\"text\\":\\"'.$ItemName.'\\",\\"italic\\":\\"false\\"}]",';
    }
    if (count($obj->ItemLore__) != 1 || $obj->ItemLore__[0] != "")
    {
        $temp_str = $temp_str."Lore:[".$Lore."]";
    }
    $temp_str = $temp_str."},";
}
if (count($obj->AttributeModifiers__) != 0)
{
    $temp_str = $temp_str."AttributeModifiers:".$AttributeModifiers.",";
}
if (count($obj->Enchantments) != 0)
{
    $temp_str = $temp_str."Enchantments:".$Enchantments.",";
}
if (count($obj->CanDestroy__) != 1  || $obj->CanDestroy__[0] != "")
{
    $temp_str = $temp_str."CanDestroy:".$CanDestroy.",";
}
if (count($obj->CanPlaceOn__) != 1 || $obj->CanPlaceOn__[0] != "")
{
    $temp_str = $temp_str."CanPlaceOn:".$CanPlaceOn.",";
}
if ($RepairCost != "")
{
    $temp_str = $temp_str."RepairCost:".$RepairCost.",";
}
if (count($obj->AnotherNBT__) != 1 || $obj->AnotherNBT__[0] != "")
{
    $temp_str = $temp_str.$AnotherNBT.",";
}
if ($Data[1] != "")
{
    $temp_str = $temp_str.$SkullNBT.",";
}
$temp_str = $temp_str."Unbreakable:".strval(0+$UnBreaking).",";
$temp_str = $temp_str."HideFlags:".$HideFlags.",";
$temp_str = $temp_str.'Generator:"THIS_COMMAND_GENERATOR_BY_HHCG_ITEM_GENERATOR"'."} 1";
$temp_str = str_replace('§','\\\\u00a7',$temp_str);


echo '<link rel="Shortcut Icon" type="image/x-icon" href="favicon.ico" />
</head>
<body>
<p><img style="float: left;" src="https://drive.google.com/uc?export=view&amp;id=1wxRWupm6qH-QvlM-YSKnCzklu7JloIHg" alt="" /> <img style="float: right;" src="https://drive.google.com/uc?export=view&amp;id=12AgwWf-cEj-AiTUAx6kvC30up2d64idq" alt="" /><br><br><br><hr></p><br><br>以下是產生出來的指令<br>';
echo '<textarea style="resize:none;width:600px;height:200px;">'.$temp_str.'</textarea><br><a href="index.php">點我回到產生頁面</a>';
?>