<html>
<head>
<title>哈哈指令團物品產生器</title>
<script>
function alert(title,button_text,alert_content)
{
    var ALERT_TITLE;
    var ALERT_BUTTON_TEXT;
    ALERT_TITLE = title;
    ALERT_BUTTON_TEXT = button_text;
    
    function createCustomAlert(txt) 
    {
        d = document;
    
        if(d.getElementById("modalContainer")) return;
    
        mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
        mObj.id = "modalContainer";
        mObj.style.height = d.documentElement.scrollHeight + "px";
        
        alertObj = mObj.appendChild(d.createElement("div"));
        alertObj.id = "alertBox";
        if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
        alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";
        alertObj.style.visiblity="visible";
    
        h1 = alertObj.appendChild(d.createElement("h1"));
        h1.appendChild(d.createTextNode(ALERT_TITLE));
    
        msg = alertObj.appendChild(d.createElement("p"));
        //msg.appendChild(d.createTextNode(txt));
        msg.innerHTML = txt;
    
        btn = alertObj.appendChild(d.createElement("a"));
        btn.id = "closeBtn";
        btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
        btn.href = "#";
        btn.focus();
        btn.onclick = function() { removeCustomAlert();return false; }
        
    }

    function removeCustomAlert() 
    {
        document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
    }
    createCustomAlert(alert_content)
}
</script>
<script>
var new_combobox = 0;
var version = "version_0_0_0_1_beta0002_itemcreater";
var version_all = ["beta_version_0_0_0_0_itemcreater","version_0_0_0_1_beta0001_itemcreater"];
function loadFile()
{
  reader = new FileReader();
  var inputFile = document.getElementById('filetoload').files[0];
  reader.readAsText(inputFile);
  var input_file_data;
  reader.onload = function () 
  {
        input_file_data = reader.result;
        input_file_data = input_file_data.split('\n');
        if (input_file_data[0] == version || version_all.includes(input_file_data[0]))
        { 
            import_data = JSON.parse(input_file_data[2])
            import_data2 = input_file_data[3]
            var temp_obj = document.getElementById("item_id");
            temp_obj.value = import_data.ItemID__;
            
            var temp_obj = document.getElementById("custom_name");
            temp_obj.value = import_data.ItemName__;
            
            var temp_obj = document.getElementById("custom_lore");
            temp_str = ""
            for (var temp_int=0;temp_int <= import_data.ItemLore__.length-1;temp_int++)
            {
                if (temp_str == 0) 
                {
                    temp_str = import_data.ItemLore__[temp_int]
                }
                else
                {
                    temp_str = temp_str+"\n"+import_data.ItemLore__[temp_int]
                }
            }
            temp_obj.value = temp_str;
            
            var temp_obj = document.getElementById("ub");
            if (import_data.Unbreaking_bool__) 
            {
                temp_obj.checked = true;
            }
            else
            {
                temp_obj.checked = false;
            }
            
            var temp_int = import_data.HideFlags__
            var temp_obj = document.getElementById("hf1");
            if (temp_int%2 != 0)
            {
                temp_obj.checked = true;
                temp_int -= 1;
                temp_int /= 2;
            }
            else
            {
                temp_int /= 2;
            }
            var temp_obj = document.getElementById("hf2");
            if (temp_int%2 != 0)
            {
                temp_obj.checked = true;
                temp_int -= 1;
                temp_int /= 2;
            }
            else
            {
                temp_int /= 2;
            }
            var temp_obj = document.getElementById("hf4");
            if (temp_int%2 != 0)
            {
                temp_obj.checked = true;
                temp_int -= 1;
                temp_int /= 2;
            }
            else
            {
                temp_int /= 2;
            }
            var temp_obj = document.getElementById("hf8");
            if (temp_int%2 != 0)
            {
                temp_obj.checked = true;
                temp_int -= 1;
                temp_int /= 2;
            }
            else
            {
                temp_int /= 2;
            }
            var temp_obj = document.getElementById("hf16");
            if (temp_int%2 != 0)
            {
                temp_obj.checked = true;
                temp_int -= 1;
                temp_int /= 2;
            }
            else
            {
                temp_int /= 2;
            }
            var temp_obj = document.getElementById("hf32");
            if (temp_int%2 != 0)
            {
                temp_obj.checked = true;
                temp_int -= 1;
                temp_int /= 2;
            }
            else
            {
                temp_int /= 2;
            }
            for (var temp_int = 0;temp_int<=new_combobox-1;temp_int++)
            {
                var temp_obj = document.getElementById("wait_for_delete");
                if (temp_obj != null)
                {
                    temp_obj.remove();
                }
            }
            new_combobox = 0
            var temp_obj = document.getElementById("addEnch");
            for (var temp_int = 0;temp_int <= import_data.Enchantments.length-1;temp_int++)
            {
                addNew();
            }
            for (var temp_int = 0;temp_int <= import_data.Enchantments.length-1;temp_int++)
            {
                var temp_obj = document.getElementById("ench_type_" + (temp_int+1));
                var temp_str = JSON.parse(import_data.Enchantments[temp_int]).id;
                temp_obj.value = temp_str;
                var temp_str = JSON.parse(import_data.Enchantments[temp_int]).lvl;
                var temp_obj = document.getElementById("ench_lv_input_" + (temp_int+1));
                temp_obj.value = temp_str;
            }
            var temp_obj = document.getElementById("repaircost");
            temp_obj.value = import_data.RepairCost__;
            for (var temp_int = 0;temp_int <= import_data.AttributeModifiers__.length-1;temp_int++)
            {
                temp_json = JSON.parse(import_data.AttributeModifiers__[temp_int]);
                if (temp_json.AttributeName != "generic.knockback_resistance") 
                {
                    var temp_obj = document.getElementById(temp_json.AttributeName+"__position");
                    console.log(temp_json.Slot)
                    temp_obj.value = temp_json.Slot;
                    
                    console.log(temp_json.Amount)
                    if (temp_json.Amount >= 0) 
                    {
                        console.log("a")
                        var temp_obj = document.getElementById(temp_json.AttributeName+"__add_or_less");
                        temp_obj.value = "+";
                    }
                    else
                    {
                        console.log("b")
                        console.log(temp_obj)
                        var temp_obj = document.getElementById(temp_json.AttributeName+"__add_or_less");
                        temp_obj.value = "-";
                    }
                    var temp_obj = document.getElementById(temp_json.AttributeName+"__amount");
                    temp_obj.value = Math.abs(temp_json.Amount);
                }
                else
                {
                    var temp_obj = document.getElementById(temp_json.AttributeName+"__position");
                    temp_obj.value = temp_json.Slot;
                    
                    var temp_obj = document.getElementById(temp_json.AttributeName+"__amount");
                    temp_obj.value = temp_json.Amount*10;
                }
            }
            var temp_str = ""
            for (var temp_int = 0;temp_int<=import_data.CanPlaceOn__.length-1;temp_int++)
            {
                if (temp_int == 0) 
                {
                    temp_str = import_data.CanPlaceOn__[temp_int];
                }
                else
                {
                    temp_str = temp_str + "\n" + import_data.CanPlaceOn__[temp_int];
                }
            }
            var temp_obj = document.getElementById("can_place_on");
            temp_obj.value = temp_str;
            
            var temp_str = ""
            for (var temp_int = 0;temp_int<=import_data.CanDestroy__.length-1;temp_int++)
            {
                if (temp_int == 0) 
                {
                    temp_str = import_data.CanDestroy__[temp_int];
                }
                else
                {
                    temp_str = temp_str + "\n" + import_data.CanDestroy__[temp_int];
                }
            }
            var temp_obj = document.getElementById("can_destroy");
            temp_obj.value = temp_str;
            
            var temp_str = ""
            for (var temp_int = 0;temp_int<=import_data.CanPlaceOn__.length-1;temp_int++)
            {
                if (temp_int == 0) 
                {
                    temp_str = import_data.CanPlaceOn__[temp_int];
                }
                else
                {
                    temp_str = temp_str + "\n" + import_data.CanPlaceOn__[temp_int];
                }
            }
            var temp_obj = document.getElementById("another_nbt");
            temp_obj.value = temp_str;
            
            var temp_str = ""
            for (var temp_int = 0;temp_int<=import_data.AnotherNBT__.length-1;temp_int++)
            {
                if (temp_int == 0) 
                {
                    temp_str = import_data.AnotherNBT__[temp_int];
                }
                else
                {
                    temp_str = temp_str + "\n" + import_data.AnotherNBT__[temp_int];
                }
            }
            
            if (import_data2 != "") 
            {
            
                var temp_obj = document.getElementById("another_nbt");
                temp_obj.value = temp_str;
                
                var temp_str = ""
                temp_str = "/give @p minecraft:player_head{SkullOwner:{"+import_data2+" 1"
                var temp_obj = document.getElementById("another");
                temp_obj.value = temp_str
            }
        }
        else
        {
           alert('匯入資料版本錯誤','確定','您匯入的資料是在不支援的產生器版本儲存，所以無法在本版本的產生器匯入<br>ERR_DATA_VERSION_NOT_SUPPORT');  
        }
  }
}
function download(filename, text) 
{
  var element = document.createElement('a');
  text = version+"\n"+"PLEASE READ THIS FILE IN UTF-8 MODE ; 不要隨意更改本檔案，否則可能造成之後網頁無法讀取檔案或是指令產生錯誤。\n"+text
  element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
  element.setAttribute('download', filename);

  element.style.visibility = 'hidden';
  document.body.appendChild(element);

  element.click();

  document.body.removeChild(element);
}
function before_send_data()
{
            if (document.getElementById("item_id").value == "") {
                alert("指令產生錯誤","確定","未填寫物品id");
                return false;
            }
// There is the check code below
            if (document.getElementById("custom_name").value.includes("\\") || document.getElementById("custom_lore").value.includes("\\") || document.getElementById("can_place_on").value.includes("\\") || document.getElementById("can_destroy").value.includes("\\"))
            {
                alert("指令產生錯誤","確定","你在自定義物品名稱 或是 物品敘述 或是 可放置在 或是 可破壞欄位輸入了不被允許的\\字元");
                return false;
            }
            for (var temp_int in document.getElementById("generic.max_health__amount").value)
            {
                if (! "1234567890".includes(document.getElementById("generic.max_health__amount").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在最大血量欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (var temp_int in document.getElementById("generic.attack_damage__amount").value)
            {
                if (! "1234567890".includes(document.getElementById("generic.attack_damage__amount").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在最大攻擊傷害欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (var temp_int in document.getElementById("generic.armor__amount").value)
            {
                if (! "1234567890".includes(document.getElementById("generic.armor__amount").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在最大盔甲值欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (var temp_int in document.getElementById("generic.armor_toughness__amount").value)
            {
                if (! "1234567890".includes(document.getElementById("generic.armor_toughness__amount").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在盔甲韌性欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (var temp_int in document.getElementById("generic.attack_speed__amount").value)
            {
                if (! "1234567890".includes(document.getElementById("generic.attack_speed__amount").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在攻擊速度欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (var temp_int in document.getElementById("generic.movement_speed__amount").value)
            {
                if (! "1234567890".includes(document.getElementById("generic.movement_speed__amount").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在移動速度欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (var temp_int in document.getElementById("generic.knockback_resistance__amount").value)
            {
                if (! "1234567890".includes(document.getElementById("generic.knockback_resistance__amount").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在擊退抗性欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (var temp_int in document.getElementById("repaircost").value)
            {
                if (! "1234567890".includes(document.getElementById("repaircost").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在修復等級欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (cont = 1; cont < new_combobox+1; cont++)
            {
                if (document.getElementById("ench_type_"+cont) !== null) 
                {
                    for (var temp_str in document.getElementById("ench_lv_input_"+cont).value)
                    {
                        if (! "1234567890".includes(document.getElementById("ench_lv_input_"+cont).value[temp_str]))
                        {
                            alert("指令產生錯誤","確定","你在附魔等級欄位填寫的不是整數");
                            return false;
                        }
                    }
                }   
            }
            
            // There is the save file code after form check below
            // There are some namespace meaning below
            // RPCST = RepairCost
            // CPO = CanPlaceOn
            // CD = CanDestroy
            // ANBT = another_nbt
            // SPOD = SkullProcessOriginalData
            // get form no special process data code below
            var HideFlags = 0;
            var ItemId = document.getElementById("item_id").value;
            var ItemName = document.getElementById("custom_name").value;
            var ItemLore = document.getElementById("custom_lore").value.split("\n");
            var RPCST = document.getElementById("repaircost").value;
            var Unbreaking_bool = document.getElementById("ub").checked;
            var CPO = document.getElementById("can_place_on").value.split("\n");
            var CD = document.getElementById("can_destroy").value.split("\n");
            var ANBT = document.getElementById("another_nbt").value.split("\n");
            var SPOD = document.getElementById("another").value;
            if (SPOD !== "") {SPOD = SPOD.split("SkullOwner:{")[1].split(" 1")[0].substr(0,SPOD.length-2);}
            // get hideflags and unbreaking check box data below
            if (document.getElementById("hf1").checked) 
            {
                HideFlags += 1;
            }
            if (document.getElementById("hf2").checked) 
            {
                HideFlags += 2;
            }
            if (document.getElementById("hf4").checked) 
            {
                HideFlags += 4;
            }
            if (document.getElementById("hf8").checked) 
            {
                HideFlags += 8;
            }
            if (document.getElementById("hf16").checked) 
            {
                HideFlags += 16;
            }
            if (document.getElementById("hf32").checked) 
            {
                HideFlags += 32;
            }
            // get attributemodifiers area data code below
            var AttributeModifiers = [];
            var json_1 = {};
            var json_2 = {};
            var json_3 = {};
            var json_4 = {};
            var json_5 = {};
            var json_6 = {};
            var json_7 = {};
            
            if (document.getElementById("generic.max_health__position").value !== "")
            {
                if (document.getElementById("generic.max_health__amount").value == "")
                {
                    alert("指令產生錯誤","確定","最大血量已選擇但未填寫數值");
                    return false;
                }
                json_1["Slot"]  = document.getElementById("generic.max_health__position").value;
                json_1["AttributeName"] = "generic.max_health";
                json_1["Name"] = "generic.max_health";
                if (document.getElementById("generic.max_health__add_or_less").value=="+")
                {
                    json_1["Amount"] = document.getElementById("generic.max_health__amount").value;
                }
                else 
                {
                    json_1["Amount"] = -1*document.getElementById("generic.max_health__amount").value;
                }
                json_1["Operation"] = 0;
                json_1["UUID"] = "[I;0,1,0,1]";
                AttributeModifiers[AttributeModifiers.length]=JSON.stringify(json_1);
            }
            if (document.getElementById("generic.attack_damage__position").value !== "")
            {
                if (document.getElementById("generic.attack_damage__amount").value == "")
                {
                    alert("指令產生錯誤","確定","攻擊傷害已選擇但未填寫數值");
                    return false;
                }
                json_2["Slot"]  = document.getElementById("generic.attack_damage__position").value;
                json_2["AttributeName"] = "generic.attack_damage";
                json_2["Name"] = "generic.attack_damage";
                if (document.getElementById("generic.attack_damage__add_or_less").value=="+")
                {
                    json_2["Amount"] = document.getElementById("generic.attack_damage__amount").value;
                }
                else 
                {
                    json_2["Amount"] = -1*document.getElementById("generic.attack_damage__amount").value;
                }
                json_2["Operation"] = 0;
                json_2["UUID"] = "[I;0,1,0,1]";
                AttributeModifiers[AttributeModifiers.length]=JSON.stringify(json_2);
            }
            if (document.getElementById("generic.armor__position").value !== "")
            {
                if (document.getElementById("generic.armor__amount").value == "")
                {
                    alert("指令產生錯誤","確定","盔甲值已選擇但未填寫數值");
                    return false;
                }
                json_3["Slot"]  = document.getElementById("generic.armor__position").value;
                json_3["AttributeName"] = "generic.armor";
                json_3["Name"] = "generic.armor";
                if (document.getElementById("generic.armor__add_or_less").value=="+")
                {
                    json_3["Amount"] = document.getElementById("generic.armor__amount").value;
                }
                else 
                {
                    json_3["Amount"] = -1*document.getElementById("generic.armor__amount").value;
                }
                json_3["Operation"] = 0;
                json_3["UUID"] = "[I;0,1,0,1]";
                AttributeModifiers[AttributeModifiers.length]=JSON.stringify(json_3);
            }
            if (document.getElementById("generic.armor_toughness__position").value !== "")
            {
                if (document.getElementById("generic.armor_toughness__amount").value == "")
                {
                    alert("指令產生錯誤","確定","盔甲軔性已選擇但未填寫數值");
                    return false;
                }
                json_4["Slot"]  = document.getElementById("generic.armor_toughness__position").value;
                json_4["AttributeName"] = "generic.armor_toughness";
                json_4["Name"] = "generic.armor_toughness";
                if (document.getElementById("generic.armor_toughness__add_or_less").value=="+")
                {
                    json_4["Amount"] = document.getElementById("generic.armor_toughness__amount").value;
                }
                else 
                {
                    json_4["Amount"] = -1*document.getElementById("generic.armor_toughness__amount").value;
                }
                json_4["Operation"] = 0;
                json_4["UUID"] = "[I;0,1,0,1]";
                AttributeModifiers[AttributeModifiers.length]=JSON.stringify(json_4);
            }
            if (document.getElementById("generic.attack_speed__position").value !== "")
            {
                if (document.getElementById("generic.attack_speed__amount").value == "")
                {
                    alert("指令產生錯誤","確定","攻擊速度已選擇但未填寫數值");
                    return false;
                }
                json_5["Slot"]  = document.getElementById("generic.attack_speed__position").value;
                json_5["AttributeName"] = "generic.attack_speed";
                json_5["Name"] = "generic.attack_speed";
                if (document.getElementById("generic.attack_speed__add_or_less").value=="+")
                {
                    json_5["Amount"] = document.getElementById("generic.attack_speed__amount").value;
                }
                else 
                {
                    json_5["Amount"] = -1*document.getElementById("generic.attack_speed__amount").value;
                }
                json_5["Operation"] = 0;
                json_5["UUID"] = "[I;0,1,0,1]";
                AttributeModifiers[AttributeModifiers.length]=JSON.stringify(json_5);
            }
            if (document.getElementById("generic.movement_speed__position").value !== "")
            {
                if (document.getElementById("generic.movement_speed__amount").value == "")
                {
                    alert("指令產生錯誤","確定","移動速度已選擇但未填寫數值");
                    return false;
                }
                json_6["Slot"]  = document.getElementById("generic.movement_speed__position").value;
                json_6["AttributeName"] = "generic.movement_speed";
                json_6["Name"] = "generic.movement_speed";
                if (document.getElementById("generic.movement_speed__add_or_less").value=="+")
                {
                    json_6["Amount"] = document.getElementById("generic.movement_speed__amount").value;
                }
                else 
                {
                    json_6["Amount"] = -1*document.getElementById("generic.movement_speed__amount").value;
                }
                json_6["Operation"] = 0;
                json_6["UUID"] = "[I;0,1,0,1]";
                AttributeModifiers[AttributeModifiers.length]=JSON.stringify(json_6);
            }
            if (document.getElementById("generic.knockback_resistance__position").value !== "")
            {
                if (document.getElementById("generic.knockback_resistance__amount").value == "")
                {
                    alert("指令產生錯誤","確定","擊退抗性已選擇但未填寫數值");
                    return false;
                }
                json_7["Slot"]  = document.getElementById("generic.knockback_resistance__position").value;
                json_7["AttributeName"] = "generic.knockback_resistance";
                json_7["Name"] = "generic.knockback_resistance";
                json_7["Amount"] = 0.01*document.getElementById("generic.knockback_resistance__amount").value;
                json_7["Operation"] = 0;
                json_7["UUID"] = "[I;0,1,0,1]";
                AttributeModifiers[AttributeModifiers.length]=JSON.stringify(json_7);
            }
            // get ench data code below
            var cont;
            var ench_array = [];
            for (cont = 1; cont < new_combobox+1; cont++)
            {
                if (document.getElementById("ench_type_"+cont) !== null) 
                {
                    if (document.getElementById("ench_lv_input_"+cont).value == "")
                    {
                        alert("指令產生錯誤","確定","附魔已選擇但未填寫數值");
                        return false;
                    }
                    var json_8 = {}
                    json_8["id"] = document.getElementById("ench_type_"+cont).value;
                    json_8["lvl"] = document.getElementById("ench_lv_input_"+cont).value;
                    ench_array[ench_array.length] = JSON.stringify(json_8);
                }   
            }
            var temp_obj = document.getElementById("data_integration");
            temp_obj.value = JSON.stringify({ItemID__:ItemId,ItemName__:ItemName,ItemLore__:ItemLore,Unbreaking_bool__:Unbreaking_bool,HideFlags__:HideFlags,AttributeModifiers__:AttributeModifiers,Enchantments:ench_array,RepairCost__:RPCST,CanPlaceOn__:CPO,CanDestroy__:CD,AnotherNBT__:ANBT})+'[RipCcjOkMTXZQy5yNv6X]'+SPOD;
            var temp_obj = document.getElementById("send_data");
            temp_obj.click();
}
function saveFile() 
{
            // There is the check code below
            if (document.getElementById("custom_name").value.includes("\\") || document.getElementById("custom_lore").value.includes("\\") || document.getElementById("can_place_on").value.includes("\\") || document.getElementById("can_destroy").value.includes("\\"))
            {
                alert("指令產生錯誤","確定","你在自定義物品名稱 或是 物品敘述 或是 可放置在 或是 可破壞欄位輸入了不被允許的\\字元");
                return false;
            }
            for (var temp_int in document.getElementById("generic.max_health__amount").value)
            {
                if (! "1234567890".includes(document.getElementById("generic.max_health__amount").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在最大血量欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (var temp_int in document.getElementById("generic.attack_damage__amount").value)
            {
                if (! "1234567890".includes(document.getElementById("generic.attack_damage__amount").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在=攻擊力欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (var temp_int in document.getElementById("generic.armor__amount").value)
            {
                if (! "1234567890".includes(document.getElementById("generic.armor__amount").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在盔甲值欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (var temp_int in document.getElementById("generic.armor_toughness__amount").value)
            {
                if (! "1234567890".includes(document.getElementById("generic.armor_toughness__amount").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在盔甲韌性欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (var temp_int in document.getElementById("generic.attack_speed__amount").value)
            {
                if (! "1234567890".includes(document.getElementById("generic.attack_speed__amount").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在攻擊速度欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (var temp_int in document.getElementById("generic.movement_speed__amount").value)
            {
                if (! "1234567890".includes(document.getElementById("generic.movement_speed__amount").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在移動速度欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (var temp_int in document.getElementById("generic.knockback_resistance__amount").value)
            {
                if (! "1234567890".includes(document.getElementById("generic.knockback_resistance__amount").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在擊退抗性欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (var temp_int in document.getElementById("repaircost").value)
            {
                if (! "1234567890".includes(document.getElementById("repaircost").value[temp_int]))
                {
                    alert("指令產生錯誤","確定","你在修復等級欄位填寫的不是整數");
                    return false;
                }
                
            }
            for (cont = 1; cont < new_combobox+1; cont++)
            {
                if (document.getElementById("ench_type_"+cont) !== null) 
                {
                    for (var temp_str in document.getElementById("ench_lv_input_"+cont).value)
                    {
                        if (! "1234567890".includes(document.getElementById("ench_lv_input_"+cont).value[temp_str]))
                        {
                            alert("指令產生錯誤","確定","你在附魔等級欄位填寫的不是整數");
                            return false;
                        }
                    }
                    
                }   
            }
            
            // There is the save file code after form check below
            // There are some namespace meaning below
            // RPCST = RepairCost
            // CPO = CanPlaceOn
            // CD = CanDestroy
            // ANBT = another_nbt
            // SPOD = SkullProcessOriginalData
            // get form no special process data code below
            var HideFlags = 0;
            var ItemId = document.getElementById("item_id").value;
            var ItemName = document.getElementById("custom_name").value;
            var ItemLore = document.getElementById("custom_lore").value.split("\n");
            var RPCST = document.getElementById("repaircost").value;
            var Unbreaking_bool = document.getElementById("ub").checked;
            var CPO = document.getElementById("can_place_on").value.split("\n");
            var CD = document.getElementById("can_destroy").value.split("\n");
            var ANBT = document.getElementById("another_nbt").value.split("\n");
            var SPOD = document.getElementById("another").value;
            if (SPOD !== "") {SPOD = SPOD.split("SkullOwner:{")[1].split(" 1")[0].substr(0,SPOD.length-2);}
            // get hideflags and unbreaking check box data below
            if (document.getElementById("hf1").checked) 
            {
                HideFlags += 1;
            }
            if (document.getElementById("hf2").checked) 
            {
                HideFlags += 2;
            }
            if (document.getElementById("hf4").checked) 
            {
                HideFlags += 4;
            }
            if (document.getElementById("hf8").checked) 
            {
                HideFlags += 8;
            }
            if (document.getElementById("hf16").checked) 
            {
                HideFlags += 16;
            }
            if (document.getElementById("hf32").checked) 
            {
                HideFlags += 32;
            }
            // get attributemodifiers area data code below
            var AttributeModifiers = [];
            var json_1 = {};
            var json_2 = {};
            var json_3 = {};
            var json_4 = {};
            var json_5 = {};
            var json_6 = {};
            var json_7 = {};
            
            if (document.getElementById("generic.max_health__position").value !== "")
            {
                if (document.getElementById("generic.max_health__amount").value == "")
                {
                    alert("指令產生錯誤","確定","最大血量已選擇但未填寫數值");
                    return false;
                }
                json_1["Slot"]  = document.getElementById("generic.max_health__position").value;
                json_1["AttributeName"] = "generic.max_health";
                json_1["Name"] = "generic.max_health";
                if (document.getElementById("generic.max_health__add_or_less").value=="+")
                {
                    json_1["Amount"] = document.getElementById("generic.max_health__amount").value;
                }
                else 
                {
                    json_1["Amount"] = -1*document.getElementById("generic.max_health__amount").value;
                }
                json_1["Operation"] = 0;
                json_1["UUID"] = "[I;0,1,0,1]";
                AttributeModifiers[AttributeModifiers.length]=JSON.stringify(json_1);
            }
            if (document.getElementById("generic.attack_damage__position").value !== "")
            {
                if (document.getElementById("generic.attack_damage__amount").value == "")
                {
                    alert("指令產生錯誤","確定","攻擊傷害已選擇但未填寫數值");
                    return false;
                }
                json_2["Slot"]  = document.getElementById("generic.attack_damage__position").value;
                json_2["AttributeName"] = "generic.attack_damage";
                json_2["Name"] = "generic.attack_damage";
                if (document.getElementById("generic.attack_damage__add_or_less").value=="+")
                {
                    json_2["Amount"] = document.getElementById("generic.attack_damage__amount").value;
                }
                else 
                {
                    json_2["Amount"] = -1*document.getElementById("generic.attack_damage__amount").value;
                }
                json_2["Operation"] = 0;
                json_2["UUID"] = "[I;0,1,0,1]";
                AttributeModifiers[AttributeModifiers.length]=JSON.stringify(json_2);
            }
            if (document.getElementById("generic.armor__position").value !== "")
            {
                if (document.getElementById("generic.armor__amount").value == "")
                {
                    alert("指令產生錯誤","確定","盔甲值已選擇但未填寫數值");
                    return false;
                }
                json_3["Slot"]  = document.getElementById("generic.armor__position").value;
                json_3["AttributeName"] = "generic.armor";
                json_3["Name"] = "generic.armor";
                if (document.getElementById("generic.armor__add_or_less").value=="+")
                {
                    json_3["Amount"] = document.getElementById("generic.armor__amount").value;
                }
                else 
                {
                    json_3["Amount"] = -1*document.getElementById("generic.armor__amount").value;
                }
                json_3["Operation"] = 0;
                json_3["UUID"] = "[I;0,1,0,1]";
                AttributeModifiers[AttributeModifiers.length]=JSON.stringify(json_3);
            }
            if (document.getElementById("generic.armor_toughness__position").value !== "")
            {
                if (document.getElementById("generic.armor_toughness__amount").value == "")
                {
                    alert("指令產生錯誤","確定","盔甲軔性已選擇但未填寫數值");
                    return false;
                }
                json_4["Slot"]  = document.getElementById("generic.armor_toughness__position").value;
                json_4["AttributeName"] = "generic.armor_toughness";
                json_4["Name"] = "generic.armor_toughness";
                if (document.getElementById("generic.armor_toughness__add_or_less").value=="+")
                {
                    json_4["Amount"] = document.getElementById("generic.armor_toughness__amount").value;
                }
                else 
                {
                    json_4["Amount"] = -1*document.getElementById("generic.armor_toughness__amount").value;
                }
                json_4["Operation"] = 0;
                json_4["UUID"] = "[I;0,1,0,1]";
                AttributeModifiers[AttributeModifiers.length]=JSON.stringify(json_4);
            }
            if (document.getElementById("generic.attack_speed__position").value !== "")
            {
                if (document.getElementById("generic.attack_speed__amount").value == "")
                {
                    alert("指令產生錯誤","確定","攻擊速度已選擇但未填寫數值");
                    return false;
                }
                json_5["Slot"]  = document.getElementById("generic.attack_speed__position").value;
                json_5["AttributeName"] = "generic.attack_speed";
                json_5["Name"] = "generic.attack_speed";
                if (document.getElementById("generic.attack_speed__add_or_less").value=="+")
                {
                    json_5["Amount"] = document.getElementById("generic.attack_speed__amount").value;
                }
                else 
                {
                    json_5["Amount"] = -1*document.getElementById("generic.attack_speed__amount").value;
                }
                json_5["Operation"] = 0;
                json_5["UUID"] = "[I;0,1,0,1]";
                AttributeModifiers[AttributeModifiers.length]=JSON.stringify(json_5);
            }
            if (document.getElementById("generic.movement_speed__position").value !== "")
            {
                if (document.getElementById("generic.movement_speed__amount").value == "")
                {
                    alert("指令產生錯誤","確定","移動速度已選擇但未填寫數值");
                    return false;
                }
                json_6["Slot"]  = document.getElementById("generic.movement_speed__position").value;
                json_6["AttributeName"] = "generic.movement_speed";
                json_6["Name"] = "generic.movement_speed";
                if (document.getElementById("generic.movement_speed__add_or_less").value=="+")
                {
                    json_6["Amount"] = document.getElementById("generic.movement_speed__amount").value;
                }
                else 
                {
                    json_6["Amount"] = -1*document.getElementById("generic.movement_speed__amount").value;
                }
                json_6["Operation"] = 0;
                json_6["UUID"] = "[I;0,1,0,1]";
                AttributeModifiers[AttributeModifiers.length]=JSON.stringify(json_6);
            }
            if (document.getElementById("generic.knockback_resistance__position").value !== "")
            {
                if (document.getElementById("generic.knockback_resistance__amount").value == "")
                {
                    alert("指令產生錯誤","確定","擊退抗性已選擇但未填寫數值");
                    return false;
                }
                json_7["Slot"]  = document.getElementById("generic.knockback_resistance__position").value;
                json_7["AttributeName"] = "generic.knockback_resistance";
                json_7["Name"] = "generic.knockback_resistance";
                json_7["Amount"] = 0.01*document.getElementById("generic.knockback_resistance__amount").value;
                json_7["Operation"] = 0;
                json_7["UUID"] = "[I;0,1,0,1]";
                AttributeModifiers[AttributeModifiers.length]=JSON.stringify(json_7);
            }
            // get ench data code below
            var cont;
            var ench_array = [];
            for (cont = 1; cont < new_combobox+1; cont++)
            {
                if (document.getElementById("ench_type_"+cont) !== null) 
                {
                    if (document.getElementById("ench_lv_input_"+cont).value == "")
                    {
                        alert("指令產生錯誤","確定","附魔已選擇但未填寫數值");
                        return false;
                    }
                    var json_8 = {}
                    json_8["id"] = document.getElementById("ench_type_"+cont).value;
                    json_8["lvl"] = document.getElementById("ench_lv_input_"+cont).value;
                    ench_array[ench_array.length] = JSON.stringify(json_8);
                }   
            }
            
            // integration data and output
            download("我的指令.HHCG_DATA",JSON.stringify({ItemID__:ItemId,ItemName__:ItemName,ItemLore__:ItemLore,Unbreaking_bool__:Unbreaking_bool,HideFlags__:HideFlags,AttributeModifiers__:AttributeModifiers,Enchantments:ench_array,RepairCost__:RPCST,CanPlaceOn__:CPO,CanDestroy__:CD,AnotherNBT__:ANBT})+'\n'+SPOD);
            
            

}
function addNew() {
            new_combobox++;

            var mainContainer = document.getElementById('mainContainer');
            var newDiv = document.createElement('div');
            var enchs_name = ["親水性","節肢剋星","綁定詛咒","爆炸保護","喚雷","深海漫遊","效率","輕盈","燃燒","火焰保護","火焰","幸運","冰霜行者","魚叉","無限","擊退","掠奪","忠誠","海洋的祝福","魚餌","修補","分裂箭矢","貫穿","強力","投射物保護","保護","衝擊","快速上弦","水中呼吸","波濤","鋒利","絲綢之觸","不死剋星","靈魂疾走","橫掃之刃","尖刺","耐久","消失詛咒"];
            var enchs_value = ["minecraft:aqua_affinity","minecraft:bane_of_arthropods","minecraft:binding_curse","minecraft:blast_protection","minecraft:channeling","minecraft:depth_strider","minecraft:efficiency","minecraft:feather_falling","minecraft:fire_aspect","minecraft:fire_protection","minecraft:flame","minecraft:fortune","minecraft:frost_walker","minecraft:impaling","minecraft:infinity","minecraft:knockback","minecraft:looting","minecraft:loyalty","minecraft:luck_of_the_sea","minecraft:lure","minecraft:mending","minecraft:multishot","minecraft:piercing","minecraft:power","minecraft:projectile_protection","minecraft:protection","minecraft:punch","minecraft:quick_charge","minecraft:respiration","minecraft:riptide","minecraft:sharpness","minecraft:silk_touch","minecraft:smite","minecraft:soul_speed","minecraft:sweeping","minecraft:thorns","minecraft:unbreaking","minecraft:vanishing_curse"];
            
            var newLevelInput = document.createElement('input');
            newLevelInput.type = "text";
            newLevelInput.size = 10
            newLevelInput.placeholder = "請輸入附魔等級";
            newLevelInput.id = "ench_lv_input_" + new_combobox;
            
            
            var newDropdown = document.createElement('select');
            newDropdown.id = "ench_type_" + new_combobox;
            
            for(var num = 1;num <= 38;num = num+1)
            {
            newDropdownOption = document.createElement("option");
            newDropdownOption.value = enchs_value[num-1];
            newDropdownOption.text = enchs_name[num-1];

            newDropdown.add(newDropdownOption);
            }
            

            var newDelButton = document.createElement('input');
            newDelButton.type = "button";
            newDelButton.value = " 刪除此欄附魔 ";
            
            newDiv.id = "wait_for_delete"
            
            newDiv.appendChild(newDropdown);
            
            newDiv.appendChild(newLevelInput);
            
            newDiv.appendChild(newDelButton);

            mainContainer.appendChild(newDiv);

            newDelButton.onclick = function()
            {
            mainContainer.removeChild(newDiv);
            };
        }
</script>
<link rel="Shortcut Icon" type="image/x-icon" href="favicon.ico" />
</head>
<body>
<p><img style="float: left;" src="https://drive.google.com/uc?export=view&amp;id=1wxRWupm6qH-QvlM-YSKnCzklu7JloIHg" alt="" /> <img style="float: right;" src="https://drive.google.com/uc?export=view&amp;id=12AgwWf-cEj-AiTUAx6kvC30up2d64idq" alt="" /><br><br><br><hr><p>需產生的內容，可以加上文字格式碼，讓文字變得不一樣<br />例如: &sect;6歡迎來到&sect;aCity of Universe&sect;6伺服器<br />會產生出: <span style="color: #ff9900;">歡迎來到</span><span style="color: #00ff00;">City of Universe</span><span style="color: #ff9900;">伺服器</span></p></p><p>



<p style="float: left;">以下是可以使用的文字格式碼&nbsp; &nbsp;</p>
<p style="float: right;">以下是產生器</p><br><br><br><br>

<table style="border-collapse: collapse; width: 33.0026%; height: 502px;float:left" border="1">
  <tbody>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">文字格式碼</td>
      <td style="width: 60.0671%; height: 18px;">顏色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;0</td>
      <td style="width: 60.0671%; height: 18px;">黑色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;1</td>
      <td style="width: 60.0671%; height: 18px;">深藍色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;2</td>
      <td style="width: 60.0671%; height: 18px;">深綠色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;3</td>
      <td style="width: 60.0671%; height: 18px;">湖藍色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;4</td>
      <td style="width: 60.0671%; height: 18px;">深紅色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;5</td>
      <td style="width: 60.0671%; height: 18px;">紫色</td>
    </tr>
    <tr style="height: 10px;">
      <td style="width: 39.9329%; height: 10px;">&sect;6</td>
      <td style="width: 60.0671%; height: 10px;">橘色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;7</td>
      <td style="width: 60.0671%; height: 18px;">灰色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;8</td>
      <td style="width: 60.0671%; height: 18px;">深灰色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;9</td>
      <td style="width: 60.0671%; height: 18px;">藍色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;a</td>
      <td style="width: 60.0671%; height: 18px;">綠色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;b</td>
      <td style="width: 60.0671%; height: 18px;">天藍色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;c</td>
      <td style="width: 60.0671%; height: 18px;">紅色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;d</td>
      <td style="width: 60.0671%; height: 18px;">粉紅色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;e</td>
      <td style="width: 60.0671%; height: 18px;">黃色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;f</td>
      <td style="width: 60.0671%; height: 18px;">白色</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;k</td>
      <td style="width: 60.0671%; height: 18px;">隨機字元</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;l</td>
      <td style="width: 60.0671%; height: 18px;">粗體</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;m</td>
      <td style="width: 60.0671%; height: 18px;">刪除線</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;n</td>
      <td style="width: 60.0671%; height: 18px;">底線</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;o</td>
      <td style="width: 60.0671%; height: 18px;">斜體</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 39.9329%; height: 18px;">&sect;r</td>
      <td style="width: 60.0671%; height: 18px;">重置文字樣式</td>
    </tr>
  </tbody>
</table>

<div id="generator" style="float:right">
<br><br>
※在所有數字欄位，填寫的值必須是-2147483647~2147483647的整數<br>否則產生過程或是指令使用過程會出錯!
<h3>物品種類及名稱專區</h3>

<select id="item_id">
<option value="">請選擇要產生的物品</option>
<option value="minecraft:acacia_boat">minecraft:acacia_boat</option>
<option value="minecraft:acacia_button">minecraft:acacia_button</option>
<option value="minecraft:acacia_door">minecraft:acacia_door</option>
<option value="minecraft:acacia_fence">minecraft:acacia_fence</option>
<option value="minecraft:acacia_fence_gate">minecraft:acacia_fence_gate</option>
<option value="minecraft:acacia_leaves">minecraft:acacia_leaves</option>
<option value="minecraft:acacia_log">minecraft:acacia_log</option>
<option value="minecraft:acacia_planks">minecraft:acacia_planks</option>
<option value="minecraft:acacia_pressure_plate">minecraft:acacia_pressure_plate</option>
<option value="minecraft:acacia_sapling">minecraft:acacia_sapling</option>
<option value="minecraft:acacia_sign">minecraft:acacia_sign</option>
<option value="minecraft:acacia_slab">minecraft:acacia_slab</option>
<option value="minecraft:acacia_stairs">minecraft:acacia_stairs</option>
<option value="minecraft:acacia_trapdoor">minecraft:acacia_trapdoor</option>
<option value="minecraft:acacia_wood">minecraft:acacia_wood</option>
<option value="minecraft:activator_rail">minecraft:activator_rail</option>
<option value="minecraft:allium">minecraft:allium</option>
<option value="minecraft:ancient_debris">minecraft:ancient_debris</option>
<option value="minecraft:andesite">minecraft:andesite</option>
<option value="minecraft:andesite_slab">minecraft:andesite_slab</option>
<option value="minecraft:andesite_stairs">minecraft:andesite_stairs</option>
<option value="minecraft:andesite_wall">minecraft:andesite_wall</option>
<option value="minecraft:anvil">minecraft:anvil</option>
<option value="minecraft:apple">minecraft:apple</option>
<option value="minecraft:armor_stand">minecraft:armor_stand</option>
<option value="minecraft:arrow">minecraft:arrow</option>
<option value="minecraft:azure_bluet">minecraft:azure_bluet</option>
<option value="minecraft:baked_potato">minecraft:baked_potato</option>
<option value="minecraft:bamboo">minecraft:bamboo</option>
<option value="minecraft:barrel">minecraft:barrel</option>
<option value="minecraft:barrier">minecraft:barrier</option>
<option value="minecraft:basalt">minecraft:basalt</option>
<option value="minecraft:bat_spawn_egg">minecraft:bat_spawn_egg</option>
<option value="minecraft:beacon">minecraft:beacon</option>
<option value="minecraft:bedrock">minecraft:bedrock</option>
<option value="minecraft:bee_nest">minecraft:bee_nest</option>
<option value="minecraft:bee_spawn_egg">minecraft:bee_spawn_egg</option>
<option value="minecraft:beef">minecraft:beef</option>
<option value="minecraft:beehive">minecraft:beehive</option>
<option value="minecraft:beetroot">minecraft:beetroot</option>
<option value="minecraft:beetroot_seeds">minecraft:beetroot_seeds</option>
<option value="minecraft:beetroot_soup">minecraft:beetroot_soup</option>
<option value="minecraft:bell">minecraft:bell</option>
<option value="minecraft:birch_boat">minecraft:birch_boat</option>
<option value="minecraft:birch_button">minecraft:birch_button</option>
<option value="minecraft:birch_door">minecraft:birch_door</option>
<option value="minecraft:birch_fence">minecraft:birch_fence</option>
<option value="minecraft:birch_fence_gate">minecraft:birch_fence_gate</option>
<option value="minecraft:birch_leaves">minecraft:birch_leaves</option>
<option value="minecraft:birch_log">minecraft:birch_log</option>
<option value="minecraft:birch_planks">minecraft:birch_planks</option>
<option value="minecraft:birch_pressure_plate">minecraft:birch_pressure_plate</option>
<option value="minecraft:birch_sapling">minecraft:birch_sapling</option>
<option value="minecraft:birch_sign">minecraft:birch_sign</option>
<option value="minecraft:birch_slab">minecraft:birch_slab</option>
<option value="minecraft:birch_stairs">minecraft:birch_stairs</option>
<option value="minecraft:birch_trapdoor">minecraft:birch_trapdoor</option>
<option value="minecraft:birch_wood">minecraft:birch_wood</option>
<option value="minecraft:black_banner">minecraft:black_banner</option>
<option value="minecraft:black_bed">minecraft:black_bed</option>
<option value="minecraft:black_carpet">minecraft:black_carpet</option>
<option value="minecraft:black_concrete">minecraft:black_concrete</option>
<option value="minecraft:black_concrete_powder">minecraft:black_concrete_powder</option>
<option value="minecraft:black_dye">minecraft:black_dye</option>
<option value="minecraft:black_glazed_terracotta">minecraft:black_glazed_terracotta</option>
<option value="minecraft:black_shulker_box">minecraft:black_shulker_box</option>
<option value="minecraft:black_stained_glass">minecraft:black_stained_glass</option>
<option value="minecraft:black_stained_glass_pane">minecraft:black_stained_glass_pane</option>
<option value="minecraft:black_terracotta">minecraft:black_terracotta</option>
<option value="minecraft:black_wool">minecraft:black_wool</option>
<option value="minecraft:blackstone">minecraft:blackstone</option>
<option value="minecraft:blackstone_slab">minecraft:blackstone_slab</option>
<option value="minecraft:blackstone_stairs">minecraft:blackstone_stairs</option>
<option value="minecraft:blackstone_wall">minecraft:blackstone_wall</option>
<option value="minecraft:blast_furnace">minecraft:blast_furnace</option>
<option value="minecraft:blaze_powder">minecraft:blaze_powder</option>
<option value="minecraft:blaze_rod">minecraft:blaze_rod</option>
<option value="minecraft:blaze_spawn_egg">minecraft:blaze_spawn_egg</option>
<option value="minecraft:blue_banner">minecraft:blue_banner</option>
<option value="minecraft:blue_bed">minecraft:blue_bed</option>
<option value="minecraft:blue_carpet">minecraft:blue_carpet</option>
<option value="minecraft:blue_concrete">minecraft:blue_concrete</option>
<option value="minecraft:blue_concrete_powder">minecraft:blue_concrete_powder</option>
<option value="minecraft:blue_dye">minecraft:blue_dye</option>
<option value="minecraft:blue_glazed_terracotta">minecraft:blue_glazed_terracotta</option>
<option value="minecraft:blue_ice">minecraft:blue_ice</option>
<option value="minecraft:blue_orchid">minecraft:blue_orchid</option>
<option value="minecraft:blue_shulker_box">minecraft:blue_shulker_box</option>
<option value="minecraft:blue_stained_glass">minecraft:blue_stained_glass</option>
<option value="minecraft:blue_stained_glass_pane">minecraft:blue_stained_glass_pane</option>
<option value="minecraft:blue_terracotta">minecraft:blue_terracotta</option>
<option value="minecraft:blue_wool">minecraft:blue_wool</option>
<option value="minecraft:bone">minecraft:bone</option>
<option value="minecraft:bone_block">minecraft:bone_block</option>
<option value="minecraft:bone_meal">minecraft:bone_meal</option>
<option value="minecraft:book">minecraft:book</option>
<option value="minecraft:bookshelf">minecraft:bookshelf</option>
<option value="minecraft:bow">minecraft:bow</option>
<option value="minecraft:bowl">minecraft:bowl</option>
<option value="minecraft:brain_coral">minecraft:brain_coral</option>
<option value="minecraft:brain_coral_block">minecraft:brain_coral_block</option>
<option value="minecraft:brain_coral_fan">minecraft:brain_coral_fan</option>
<option value="minecraft:bread">minecraft:bread</option>
<option value="minecraft:brewing_stand">minecraft:brewing_stand</option>
<option value="minecraft:brick">minecraft:brick</option>
<option value="minecraft:brick_slab">minecraft:brick_slab</option>
<option value="minecraft:brick_stairs">minecraft:brick_stairs</option>
<option value="minecraft:brick_wall">minecraft:brick_wall</option>
<option value="minecraft:bricks">minecraft:bricks</option>
<option value="minecraft:brown_banner">minecraft:brown_banner</option>
<option value="minecraft:brown_bed">minecraft:brown_bed</option>
<option value="minecraft:brown_carpet">minecraft:brown_carpet</option>
<option value="minecraft:brown_concrete">minecraft:brown_concrete</option>
<option value="minecraft:brown_concrete_powder">minecraft:brown_concrete_powder</option>
<option value="minecraft:brown_dye">minecraft:brown_dye</option>
<option value="minecraft:brown_glazed_terracotta">minecraft:brown_glazed_terracotta</option>
<option value="minecraft:brown_mushroom">minecraft:brown_mushroom</option>
<option value="minecraft:brown_mushroom_block">minecraft:brown_mushroom_block</option>
<option value="minecraft:brown_shulker_box">minecraft:brown_shulker_box</option>
<option value="minecraft:brown_stained_glass">minecraft:brown_stained_glass</option>
<option value="minecraft:brown_stained_glass_pane">minecraft:brown_stained_glass_pane</option>
<option value="minecraft:brown_terracotta">minecraft:brown_terracotta</option>
<option value="minecraft:brown_wool">minecraft:brown_wool</option>
<option value="minecraft:bubble_coral">minecraft:bubble_coral</option>
<option value="minecraft:bubble_coral_block">minecraft:bubble_coral_block</option>
<option value="minecraft:bubble_coral_fan">minecraft:bubble_coral_fan</option>
<option value="minecraft:bucket">minecraft:bucket</option>
<option value="minecraft:cactus">minecraft:cactus</option>
<option value="minecraft:cake">minecraft:cake</option>
<option value="minecraft:campfire">minecraft:campfire</option>
<option value="minecraft:carrot">minecraft:carrot</option>
<option value="minecraft:carrot_on_a_stick">minecraft:carrot_on_a_stick</option>
<option value="minecraft:cartography_table">minecraft:cartography_table</option>
<option value="minecraft:carved_pumpkin">minecraft:carved_pumpkin</option>
<option value="minecraft:cat_spawn_egg">minecraft:cat_spawn_egg</option>
<option value="minecraft:cauldron">minecraft:cauldron</option>
<option value="minecraft:cave_spider_spawn_egg">minecraft:cave_spider_spawn_egg</option>
<option value="minecraft:chain">minecraft:chain</option>
<option value="minecraft:chain_command_block">minecraft:chain_command_block</option>
<option value="minecraft:chainmail_boots">minecraft:chainmail_boots</option>
<option value="minecraft:chainmail_chestplate">minecraft:chainmail_chestplate</option>
<option value="minecraft:chainmail_helmet">minecraft:chainmail_helmet</option>
<option value="minecraft:chainmail_leggings">minecraft:chainmail_leggings</option>
<option value="minecraft:charcoal">minecraft:charcoal</option>
<option value="minecraft:chest">minecraft:chest</option>
<option value="minecraft:chest_minecart">minecraft:chest_minecart</option>
<option value="minecraft:chicken">minecraft:chicken</option>
<option value="minecraft:chicken_spawn_egg">minecraft:chicken_spawn_egg</option>
<option value="minecraft:chipped_anvil">minecraft:chipped_anvil</option>
<option value="minecraft:chiseled_nether_bricks">minecraft:chiseled_nether_bricks</option>
<option value="minecraft:chiseled_polished_blackstone">minecraft:chiseled_polished_blackstone</option>
<option value="minecraft:chiseled_quartz_block">minecraft:chiseled_quartz_block</option>
<option value="minecraft:chiseled_red_sandstone">minecraft:chiseled_red_sandstone</option>
<option value="minecraft:chiseled_sandstone">minecraft:chiseled_sandstone</option>
<option value="minecraft:chiseled_stone_bricks">minecraft:chiseled_stone_bricks</option>
<option value="minecraft:chorus_flower">minecraft:chorus_flower</option>
<option value="minecraft:chorus_fruit">minecraft:chorus_fruit</option>
<option value="minecraft:chorus_plant">minecraft:chorus_plant</option>
<option value="minecraft:clay">minecraft:clay</option>
<option value="minecraft:clay_ball">minecraft:clay_ball</option>
<option value="minecraft:clock">minecraft:clock</option>
<option value="minecraft:coal">minecraft:coal</option>
<option value="minecraft:coal_block">minecraft:coal_block</option>
<option value="minecraft:coal_ore">minecraft:coal_ore</option>
<option value="minecraft:coarse_dirt">minecraft:coarse_dirt</option>
<option value="minecraft:cobblestone">minecraft:cobblestone</option>
<option value="minecraft:cobblestone_slab">minecraft:cobblestone_slab</option>
<option value="minecraft:cobblestone_stairs">minecraft:cobblestone_stairs</option>
<option value="minecraft:cobblestone_wall">minecraft:cobblestone_wall</option>
<option value="minecraft:cobweb">minecraft:cobweb</option>
<option value="minecraft:cocoa_beans">minecraft:cocoa_beans</option>
<option value="minecraft:cod">minecraft:cod</option>
<option value="minecraft:cod_bucket">minecraft:cod_bucket</option>
<option value="minecraft:cod_spawn_egg">minecraft:cod_spawn_egg</option>
<option value="minecraft:command_block">minecraft:command_block</option>
<option value="minecraft:command_block_minecart">minecraft:command_block_minecart</option>
<option value="minecraft:comparator">minecraft:comparator</option>
<option value="minecraft:compass">minecraft:compass</option>
<option value="minecraft:composter">minecraft:composter</option>
<option value="minecraft:conduit">minecraft:conduit</option>
<option value="minecraft:cooked_beef">minecraft:cooked_beef</option>
<option value="minecraft:cooked_chicken">minecraft:cooked_chicken</option>
<option value="minecraft:cooked_cod">minecraft:cooked_cod</option>
<option value="minecraft:cooked_mutton">minecraft:cooked_mutton</option>
<option value="minecraft:cooked_porkchop">minecraft:cooked_porkchop</option>
<option value="minecraft:cooked_rabbit">minecraft:cooked_rabbit</option>
<option value="minecraft:cooked_salmon">minecraft:cooked_salmon</option>
<option value="minecraft:cookie">minecraft:cookie</option>
<option value="minecraft:cornflower">minecraft:cornflower</option>
<option value="minecraft:cow_spawn_egg">minecraft:cow_spawn_egg</option>
<option value="minecraft:cracked_nether_bricks">minecraft:cracked_nether_bricks</option>
<option value="minecraft:cracked_polished_blackstone_bricks">minecraft:cracked_polished_blackstone_bricks</option>
<option value="minecraft:cracked_stone_bricks">minecraft:cracked_stone_bricks</option>
<option value="minecraft:crafting_table">minecraft:crafting_table</option>
<option value="minecraft:creeper_banner_pattern">minecraft:creeper_banner_pattern</option>
<option value="minecraft:creeper_head">minecraft:creeper_head</option>
<option value="minecraft:creeper_spawn_egg">minecraft:creeper_spawn_egg</option>
<option value="minecraft:crimson_button">minecraft:crimson_button</option>
<option value="minecraft:crimson_door">minecraft:crimson_door</option>
<option value="minecraft:crimson_fence">minecraft:crimson_fence</option>
<option value="minecraft:crimson_fence_gate">minecraft:crimson_fence_gate</option>
<option value="minecraft:crimson_fungus">minecraft:crimson_fungus</option>
<option value="minecraft:crimson_hyphae">minecraft:crimson_hyphae</option>
<option value="minecraft:crimson_nylium">minecraft:crimson_nylium</option>
<option value="minecraft:crimson_planks">minecraft:crimson_planks</option>
<option value="minecraft:crimson_pressure_plate">minecraft:crimson_pressure_plate</option>
<option value="minecraft:crimson_roots">minecraft:crimson_roots</option>
<option value="minecraft:crimson_sign">minecraft:crimson_sign</option>
<option value="minecraft:crimson_slab">minecraft:crimson_slab</option>
<option value="minecraft:crimson_stairs">minecraft:crimson_stairs</option>
<option value="minecraft:crimson_stem">minecraft:crimson_stem</option>
<option value="minecraft:crimson_trapdoor">minecraft:crimson_trapdoor</option>
<option value="minecraft:crossbow">minecraft:crossbow</option>
<option value="minecraft:crying_obsidian">minecraft:crying_obsidian</option>
<option value="minecraft:cut_red_sandstone">minecraft:cut_red_sandstone</option>
<option value="minecraft:cut_red_sandstone_slab">minecraft:cut_red_sandstone_slab</option>
<option value="minecraft:cut_sandstone">minecraft:cut_sandstone</option>
<option value="minecraft:cut_sandstone_slab">minecraft:cut_sandstone_slab</option>
<option value="minecraft:cyan_banner">minecraft:cyan_banner</option>
<option value="minecraft:cyan_bed">minecraft:cyan_bed</option>
<option value="minecraft:cyan_carpet">minecraft:cyan_carpet</option>
<option value="minecraft:cyan_concrete">minecraft:cyan_concrete</option>
<option value="minecraft:cyan_concrete_powder">minecraft:cyan_concrete_powder</option>
<option value="minecraft:cyan_dye">minecraft:cyan_dye</option>
<option value="minecraft:cyan_glazed_terracotta">minecraft:cyan_glazed_terracotta</option>
<option value="minecraft:cyan_shulker_box">minecraft:cyan_shulker_box</option>
<option value="minecraft:cyan_stained_glass">minecraft:cyan_stained_glass</option>
<option value="minecraft:cyan_stained_glass_pane">minecraft:cyan_stained_glass_pane</option>
<option value="minecraft:cyan_terracotta">minecraft:cyan_terracotta</option>
<option value="minecraft:cyan_wool">minecraft:cyan_wool</option>
<option value="minecraft:damaged_anvil">minecraft:damaged_anvil</option>
<option value="minecraft:dandelion">minecraft:dandelion</option>
<option value="minecraft:dark_oak_boat">minecraft:dark_oak_boat</option>
<option value="minecraft:dark_oak_button">minecraft:dark_oak_button</option>
<option value="minecraft:dark_oak_door">minecraft:dark_oak_door</option>
<option value="minecraft:dark_oak_fence">minecraft:dark_oak_fence</option>
<option value="minecraft:dark_oak_fence_gate">minecraft:dark_oak_fence_gate</option>
<option value="minecraft:dark_oak_leaves">minecraft:dark_oak_leaves</option>
<option value="minecraft:dark_oak_log">minecraft:dark_oak_log</option>
<option value="minecraft:dark_oak_planks">minecraft:dark_oak_planks</option>
<option value="minecraft:dark_oak_pressure_plate">minecraft:dark_oak_pressure_plate</option>
<option value="minecraft:dark_oak_sapling">minecraft:dark_oak_sapling</option>
<option value="minecraft:dark_oak_sign">minecraft:dark_oak_sign</option>
<option value="minecraft:dark_oak_slab">minecraft:dark_oak_slab</option>
<option value="minecraft:dark_oak_stairs">minecraft:dark_oak_stairs</option>
<option value="minecraft:dark_oak_trapdoor">minecraft:dark_oak_trapdoor</option>
<option value="minecraft:dark_oak_wood">minecraft:dark_oak_wood</option>
<option value="minecraft:dark_prismarine">minecraft:dark_prismarine</option>
<option value="minecraft:dark_prismarine_slab">minecraft:dark_prismarine_slab</option>
<option value="minecraft:dark_prismarine_stairs">minecraft:dark_prismarine_stairs</option>
<option value="minecraft:daylight_detector">minecraft:daylight_detector</option>
<option value="minecraft:dead_brain_coral">minecraft:dead_brain_coral</option>
<option value="minecraft:dead_brain_coral_block">minecraft:dead_brain_coral_block</option>
<option value="minecraft:dead_brain_coral_fan">minecraft:dead_brain_coral_fan</option>
<option value="minecraft:dead_bubble_coral">minecraft:dead_bubble_coral</option>
<option value="minecraft:dead_bubble_coral_block">minecraft:dead_bubble_coral_block</option>
<option value="minecraft:dead_bubble_coral_fan">minecraft:dead_bubble_coral_fan</option>
<option value="minecraft:dead_bush">minecraft:dead_bush</option>
<option value="minecraft:dead_fire_coral">minecraft:dead_fire_coral</option>
<option value="minecraft:dead_fire_coral_block">minecraft:dead_fire_coral_block</option>
<option value="minecraft:dead_fire_coral_fan">minecraft:dead_fire_coral_fan</option>
<option value="minecraft:dead_horn_coral">minecraft:dead_horn_coral</option>
<option value="minecraft:dead_horn_coral_block">minecraft:dead_horn_coral_block</option>
<option value="minecraft:dead_horn_coral_fan">minecraft:dead_horn_coral_fan</option>
<option value="minecraft:dead_tube_coral">minecraft:dead_tube_coral</option>
<option value="minecraft:dead_tube_coral_block">minecraft:dead_tube_coral_block</option>
<option value="minecraft:dead_tube_coral_fan">minecraft:dead_tube_coral_fan</option>
<option value="minecraft:debug_stick">minecraft:debug_stick</option>
<option value="minecraft:detector_rail">minecraft:detector_rail</option>
<option value="minecraft:diamond">minecraft:diamond</option>
<option value="minecraft:diamond_axe">minecraft:diamond_axe</option>
<option value="minecraft:diamond_block">minecraft:diamond_block</option>
<option value="minecraft:diamond_boots">minecraft:diamond_boots</option>
<option value="minecraft:diamond_chestplate">minecraft:diamond_chestplate</option>
<option value="minecraft:diamond_helmet">minecraft:diamond_helmet</option>
<option value="minecraft:diamond_hoe">minecraft:diamond_hoe</option>
<option value="minecraft:diamond_horse_armor">minecraft:diamond_horse_armor</option>
<option value="minecraft:diamond_leggings">minecraft:diamond_leggings</option>
<option value="minecraft:diamond_ore">minecraft:diamond_ore</option>
<option value="minecraft:diamond_pickaxe">minecraft:diamond_pickaxe</option>
<option value="minecraft:diamond_shovel">minecraft:diamond_shovel</option>
<option value="minecraft:diamond_sword">minecraft:diamond_sword</option>
<option value="minecraft:diorite">minecraft:diorite</option>
<option value="minecraft:diorite_slab">minecraft:diorite_slab</option>
<option value="minecraft:diorite_stairs">minecraft:diorite_stairs</option>
<option value="minecraft:diorite_wall">minecraft:diorite_wall</option>
<option value="minecraft:dirt">minecraft:dirt</option>
<option value="minecraft:dispenser">minecraft:dispenser</option>
<option value="minecraft:dolphin_spawn_egg">minecraft:dolphin_spawn_egg</option>
<option value="minecraft:donkey_spawn_egg">minecraft:donkey_spawn_egg</option>
<option value="minecraft:dragon_breath">minecraft:dragon_breath</option>
<option value="minecraft:dragon_egg">minecraft:dragon_egg</option>
<option value="minecraft:dragon_head">minecraft:dragon_head</option>
<option value="minecraft:dried_kelp">minecraft:dried_kelp</option>
<option value="minecraft:dried_kelp_block">minecraft:dried_kelp_block</option>
<option value="minecraft:dropper">minecraft:dropper</option>
<option value="minecraft:drowned_spawn_egg">minecraft:drowned_spawn_egg</option>
<option value="minecraft:egg">minecraft:egg</option>
<option value="minecraft:elder_guardian_spawn_egg">minecraft:elder_guardian_spawn_egg</option>
<option value="minecraft:elytra">minecraft:elytra</option>
<option value="minecraft:emerald">minecraft:emerald</option>
<option value="minecraft:emerald_block">minecraft:emerald_block</option>
<option value="minecraft:emerald_ore">minecraft:emerald_ore</option>
<option value="minecraft:enchanted_book">minecraft:enchanted_book</option>
<option value="minecraft:enchanted_golden_apple">minecraft:enchanted_golden_apple</option>
<option value="minecraft:enchanting_table">minecraft:enchanting_table</option>
<option value="minecraft:end_crystal">minecraft:end_crystal</option>
<option value="minecraft:end_portal_frame">minecraft:end_portal_frame</option>
<option value="minecraft:end_rod">minecraft:end_rod</option>
<option value="minecraft:end_stone">minecraft:end_stone</option>
<option value="minecraft:end_stone_brick_slab">minecraft:end_stone_brick_slab</option>
<option value="minecraft:end_stone_brick_stairs">minecraft:end_stone_brick_stairs</option>
<option value="minecraft:end_stone_brick_wall">minecraft:end_stone_brick_wall</option>
<option value="minecraft:end_stone_bricks">minecraft:end_stone_bricks</option>
<option value="minecraft:ender_chest">minecraft:ender_chest</option>
<option value="minecraft:ender_eye">minecraft:ender_eye</option>
<option value="minecraft:ender_pearl">minecraft:ender_pearl</option>
<option value="minecraft:enderman_spawn_egg">minecraft:enderman_spawn_egg</option>
<option value="minecraft:endermite_spawn_egg">minecraft:endermite_spawn_egg</option>
<option value="minecraft:evoker_spawn_egg">minecraft:evoker_spawn_egg</option>
<option value="minecraft:experience_bottle">minecraft:experience_bottle</option>
<option value="minecraft:farmland">minecraft:farmland</option>
<option value="minecraft:feather">minecraft:feather</option>
<option value="minecraft:fermented_spider_eye">minecraft:fermented_spider_eye</option>
<option value="minecraft:fern">minecraft:fern</option>
<option value="minecraft:filled_map">minecraft:filled_map</option>
<option value="minecraft:fire_charge">minecraft:fire_charge</option>
<option value="minecraft:fire_coral">minecraft:fire_coral</option>
<option value="minecraft:fire_coral_block">minecraft:fire_coral_block</option>
<option value="minecraft:fire_coral_fan">minecraft:fire_coral_fan</option>
<option value="minecraft:firework_rocket">minecraft:firework_rocket</option>
<option value="minecraft:firework_star">minecraft:firework_star</option>
<option value="minecraft:fishing_rod">minecraft:fishing_rod</option>
<option value="minecraft:fletching_table">minecraft:fletching_table</option>
<option value="minecraft:flint">minecraft:flint</option>
<option value="minecraft:flint_and_steel">minecraft:flint_and_steel</option>
<option value="minecraft:flower_banner_pattern">minecraft:flower_banner_pattern</option>
<option value="minecraft:flower_pot">minecraft:flower_pot</option>
<option value="minecraft:fox_spawn_egg">minecraft:fox_spawn_egg</option>
<option value="minecraft:furnace">minecraft:furnace</option>
<option value="minecraft:furnace_minecart">minecraft:furnace_minecart</option>
<option value="minecraft:ghast_spawn_egg">minecraft:ghast_spawn_egg</option>
<option value="minecraft:ghast_tear">minecraft:ghast_tear</option>
<option value="minecraft:gilded_blackstone">minecraft:gilded_blackstone</option>
<option value="minecraft:glass">minecraft:glass</option>
<option value="minecraft:glass_bottle">minecraft:glass_bottle</option>
<option value="minecraft:glass_pane">minecraft:glass_pane</option>
<option value="minecraft:glistering_melon_slice">minecraft:glistering_melon_slice</option>
<option value="minecraft:globe_banner_pattern">minecraft:globe_banner_pattern</option>
<option value="minecraft:glowstone">minecraft:glowstone</option>
<option value="minecraft:glowstone_dust">minecraft:glowstone_dust</option>
<option value="minecraft:gold_block">minecraft:gold_block</option>
<option value="minecraft:gold_ingot">minecraft:gold_ingot</option>
<option value="minecraft:gold_nugget">minecraft:gold_nugget</option>
<option value="minecraft:gold_ore">minecraft:gold_ore</option>
<option value="minecraft:golden_apple">minecraft:golden_apple</option>
<option value="minecraft:golden_axe">minecraft:golden_axe</option>
<option value="minecraft:golden_boots">minecraft:golden_boots</option>
<option value="minecraft:golden_carrot">minecraft:golden_carrot</option>
<option value="minecraft:golden_chestplate">minecraft:golden_chestplate</option>
<option value="minecraft:golden_helmet">minecraft:golden_helmet</option>
<option value="minecraft:golden_hoe">minecraft:golden_hoe</option>
<option value="minecraft:golden_horse_armor">minecraft:golden_horse_armor</option>
<option value="minecraft:golden_leggings">minecraft:golden_leggings</option>
<option value="minecraft:golden_pickaxe">minecraft:golden_pickaxe</option>
<option value="minecraft:golden_shovel">minecraft:golden_shovel</option>
<option value="minecraft:golden_sword">minecraft:golden_sword</option>
<option value="minecraft:granite">minecraft:granite</option>
<option value="minecraft:granite_slab">minecraft:granite_slab</option>
<option value="minecraft:granite_stairs">minecraft:granite_stairs</option>
<option value="minecraft:granite_wall">minecraft:granite_wall</option>
<option value="minecraft:grass">minecraft:grass</option>
<option value="minecraft:grass_block">minecraft:grass_block</option>
<option value="minecraft:grass_path">minecraft:grass_path</option>
<option value="minecraft:gravel">minecraft:gravel</option>
<option value="minecraft:gray_banner">minecraft:gray_banner</option>
<option value="minecraft:gray_bed">minecraft:gray_bed</option>
<option value="minecraft:gray_carpet">minecraft:gray_carpet</option>
<option value="minecraft:gray_concrete">minecraft:gray_concrete</option>
<option value="minecraft:gray_concrete_powder">minecraft:gray_concrete_powder</option>
<option value="minecraft:gray_dye">minecraft:gray_dye</option>
<option value="minecraft:gray_glazed_terracotta">minecraft:gray_glazed_terracotta</option>
<option value="minecraft:gray_shulker_box">minecraft:gray_shulker_box</option>
<option value="minecraft:gray_stained_glass">minecraft:gray_stained_glass</option>
<option value="minecraft:gray_stained_glass_pane">minecraft:gray_stained_glass_pane</option>
<option value="minecraft:gray_terracotta">minecraft:gray_terracotta</option>
<option value="minecraft:gray_wool">minecraft:gray_wool</option>
<option value="minecraft:green_banner">minecraft:green_banner</option>
<option value="minecraft:green_bed">minecraft:green_bed</option>
<option value="minecraft:green_carpet">minecraft:green_carpet</option>
<option value="minecraft:green_concrete">minecraft:green_concrete</option>
<option value="minecraft:green_concrete_powder">minecraft:green_concrete_powder</option>
<option value="minecraft:green_dye">minecraft:green_dye</option>
<option value="minecraft:green_glazed_terracotta">minecraft:green_glazed_terracotta</option>
<option value="minecraft:green_shulker_box">minecraft:green_shulker_box</option>
<option value="minecraft:green_stained_glass">minecraft:green_stained_glass</option>
<option value="minecraft:green_stained_glass_pane">minecraft:green_stained_glass_pane</option>
<option value="minecraft:green_terracotta">minecraft:green_terracotta</option>
<option value="minecraft:green_wool">minecraft:green_wool</option>
<option value="minecraft:grindstone">minecraft:grindstone</option>
<option value="minecraft:guardian_spawn_egg">minecraft:guardian_spawn_egg</option>
<option value="minecraft:gunpowder">minecraft:gunpowder</option>
<option value="minecraft:hay_block">minecraft:hay_block</option>
<option value="minecraft:heart_of_the_sea">minecraft:heart_of_the_sea</option>
<option value="minecraft:heavy_weighted_pressure_plate">minecraft:heavy_weighted_pressure_plate</option>
<option value="minecraft:hoglin_spawn_egg">minecraft:hoglin_spawn_egg</option>
<option value="minecraft:honey_block">minecraft:honey_block</option>
<option value="minecraft:honey_bottle">minecraft:honey_bottle</option>
<option value="minecraft:honeycomb">minecraft:honeycomb</option>
<option value="minecraft:honeycomb_block">minecraft:honeycomb_block</option>
<option value="minecraft:hopper">minecraft:hopper</option>
<option value="minecraft:hopper_minecart">minecraft:hopper_minecart</option>
<option value="minecraft:horn_coral">minecraft:horn_coral</option>
<option value="minecraft:horn_coral_block">minecraft:horn_coral_block</option>
<option value="minecraft:horn_coral_fan">minecraft:horn_coral_fan</option>
<option value="minecraft:horse_spawn_egg">minecraft:horse_spawn_egg</option>
<option value="minecraft:husk_spawn_egg">minecraft:husk_spawn_egg</option>
<option value="minecraft:ice">minecraft:ice</option>
<option value="minecraft:infested_chiseled_stone_bricks">minecraft:infested_chiseled_stone_bricks</option>
<option value="minecraft:infested_cobblestone">minecraft:infested_cobblestone</option>
<option value="minecraft:infested_cracked_stone_bricks">minecraft:infested_cracked_stone_bricks</option>
<option value="minecraft:infested_mossy_stone_bricks">minecraft:infested_mossy_stone_bricks</option>
<option value="minecraft:infested_stone">minecraft:infested_stone</option>
<option value="minecraft:infested_stone_bricks">minecraft:infested_stone_bricks</option>
<option value="minecraft:ink_sac">minecraft:ink_sac</option>
<option value="minecraft:iron_axe">minecraft:iron_axe</option>
<option value="minecraft:iron_bars">minecraft:iron_bars</option>
<option value="minecraft:iron_block">minecraft:iron_block</option>
<option value="minecraft:iron_boots">minecraft:iron_boots</option>
<option value="minecraft:iron_chestplate">minecraft:iron_chestplate</option>
<option value="minecraft:iron_door">minecraft:iron_door</option>
<option value="minecraft:iron_helmet">minecraft:iron_helmet</option>
<option value="minecraft:iron_hoe">minecraft:iron_hoe</option>
<option value="minecraft:iron_horse_armor">minecraft:iron_horse_armor</option>
<option value="minecraft:iron_ingot">minecraft:iron_ingot</option>
<option value="minecraft:iron_leggings">minecraft:iron_leggings</option>
<option value="minecraft:iron_nugget">minecraft:iron_nugget</option>
<option value="minecraft:iron_ore">minecraft:iron_ore</option>
<option value="minecraft:iron_pickaxe">minecraft:iron_pickaxe</option>
<option value="minecraft:iron_shovel">minecraft:iron_shovel</option>
<option value="minecraft:iron_sword">minecraft:iron_sword</option>
<option value="minecraft:iron_trapdoor">minecraft:iron_trapdoor</option>
<option value="minecraft:item_frame">minecraft:item_frame</option>
<option value="minecraft:jack_o_lantern">minecraft:jack_o_lantern</option>
<option value="minecraft:jigsaw">minecraft:jigsaw</option>
<option value="minecraft:jukebox">minecraft:jukebox</option>
<option value="minecraft:jungle_boat">minecraft:jungle_boat</option>
<option value="minecraft:jungle_button">minecraft:jungle_button</option>
<option value="minecraft:jungle_door">minecraft:jungle_door</option>
<option value="minecraft:jungle_fence">minecraft:jungle_fence</option>
<option value="minecraft:jungle_fence_gate">minecraft:jungle_fence_gate</option>
<option value="minecraft:jungle_leaves">minecraft:jungle_leaves</option>
<option value="minecraft:jungle_log">minecraft:jungle_log</option>
<option value="minecraft:jungle_planks">minecraft:jungle_planks</option>
<option value="minecraft:jungle_pressure_plate">minecraft:jungle_pressure_plate</option>
<option value="minecraft:jungle_sapling">minecraft:jungle_sapling</option>
<option value="minecraft:jungle_sign">minecraft:jungle_sign</option>
<option value="minecraft:jungle_slab">minecraft:jungle_slab</option>
<option value="minecraft:jungle_stairs">minecraft:jungle_stairs</option>
<option value="minecraft:jungle_trapdoor">minecraft:jungle_trapdoor</option>
<option value="minecraft:jungle_wood">minecraft:jungle_wood</option>
<option value="minecraft:knowledge_book">minecraft:knowledge_book</option>
<option value="minecraft:ladder">minecraft:ladder</option>
<option value="minecraft:lantern">minecraft:lantern</option>
<option value="minecraft:lapis_block">minecraft:lapis_block</option>
<option value="minecraft:lapis_lazuli">minecraft:lapis_lazuli</option>
<option value="minecraft:lapis_ore">minecraft:lapis_ore</option>
<option value="minecraft:large_fern">minecraft:large_fern</option>
<option value="minecraft:lava_bucket">minecraft:lava_bucket</option>
<option value="minecraft:lead">minecraft:lead</option>
<option value="minecraft:leather">minecraft:leather</option>
<option value="minecraft:leather_boots">minecraft:leather_boots</option>
<option value="minecraft:leather_chestplate">minecraft:leather_chestplate</option>
<option value="minecraft:leather_helmet">minecraft:leather_helmet</option>
<option value="minecraft:leather_horse_armor">minecraft:leather_horse_armor</option>
<option value="minecraft:leather_leggings">minecraft:leather_leggings</option>
<option value="minecraft:lectern">minecraft:lectern</option>
<option value="minecraft:lever">minecraft:lever</option>
<option value="minecraft:light_blue_banner">minecraft:light_blue_banner</option>
<option value="minecraft:light_blue_bed">minecraft:light_blue_bed</option>
<option value="minecraft:light_blue_carpet">minecraft:light_blue_carpet</option>
<option value="minecraft:light_blue_concrete">minecraft:light_blue_concrete</option>
<option value="minecraft:light_blue_concrete_powder">minecraft:light_blue_concrete_powder</option>
<option value="minecraft:light_blue_dye">minecraft:light_blue_dye</option>
<option value="minecraft:light_blue_glazed_terracotta">minecraft:light_blue_glazed_terracotta</option>
<option value="minecraft:light_blue_shulker_box">minecraft:light_blue_shulker_box</option>
<option value="minecraft:light_blue_stained_glass">minecraft:light_blue_stained_glass</option>
<option value="minecraft:light_blue_stained_glass_pane">minecraft:light_blue_stained_glass_pane</option>
<option value="minecraft:light_blue_terracotta">minecraft:light_blue_terracotta</option>
<option value="minecraft:light_blue_wool">minecraft:light_blue_wool</option>
<option value="minecraft:light_gray_banner">minecraft:light_gray_banner</option>
<option value="minecraft:light_gray_bed">minecraft:light_gray_bed</option>
<option value="minecraft:light_gray_carpet">minecraft:light_gray_carpet</option>
<option value="minecraft:light_gray_concrete">minecraft:light_gray_concrete</option>
<option value="minecraft:light_gray_concrete_powder">minecraft:light_gray_concrete_powder</option>
<option value="minecraft:light_gray_dye">minecraft:light_gray_dye</option>
<option value="minecraft:light_gray_glazed_terracotta">minecraft:light_gray_glazed_terracotta</option>
<option value="minecraft:light_gray_shulker_box">minecraft:light_gray_shulker_box</option>
<option value="minecraft:light_gray_stained_glass">minecraft:light_gray_stained_glass</option>
<option value="minecraft:light_gray_stained_glass_pane">minecraft:light_gray_stained_glass_pane</option>
<option value="minecraft:light_gray_terracotta">minecraft:light_gray_terracotta</option>
<option value="minecraft:light_gray_wool">minecraft:light_gray_wool</option>
<option value="minecraft:light_weighted_pressure_plate">minecraft:light_weighted_pressure_plate</option>
<option value="minecraft:lilac">minecraft:lilac</option>
<option value="minecraft:lily_of_the_valley">minecraft:lily_of_the_valley</option>
<option value="minecraft:lily_pad">minecraft:lily_pad</option>
<option value="minecraft:lime_banner">minecraft:lime_banner</option>
<option value="minecraft:lime_bed">minecraft:lime_bed</option>
<option value="minecraft:lime_carpet">minecraft:lime_carpet</option>
<option value="minecraft:lime_concrete">minecraft:lime_concrete</option>
<option value="minecraft:lime_concrete_powder">minecraft:lime_concrete_powder</option>
<option value="minecraft:lime_dye">minecraft:lime_dye</option>
<option value="minecraft:lime_glazed_terracotta">minecraft:lime_glazed_terracotta</option>
<option value="minecraft:lime_shulker_box">minecraft:lime_shulker_box</option>
<option value="minecraft:lime_stained_glass">minecraft:lime_stained_glass</option>
<option value="minecraft:lime_stained_glass_pane">minecraft:lime_stained_glass_pane</option>
<option value="minecraft:lime_terracotta">minecraft:lime_terracotta</option>
<option value="minecraft:lime_wool">minecraft:lime_wool</option>
<option value="minecraft:lingering_potion">minecraft:lingering_potion</option>
<option value="minecraft:llama_spawn_egg">minecraft:llama_spawn_egg</option>
<option value="minecraft:lodestone">minecraft:lodestone</option>
<option value="minecraft:loom">minecraft:loom</option>
<option value="minecraft:magenta_banner">minecraft:magenta_banner</option>
<option value="minecraft:magenta_bed">minecraft:magenta_bed</option>
<option value="minecraft:magenta_carpet">minecraft:magenta_carpet</option>
<option value="minecraft:magenta_concrete">minecraft:magenta_concrete</option>
<option value="minecraft:magenta_concrete_powder">minecraft:magenta_concrete_powder</option>
<option value="minecraft:magenta_dye">minecraft:magenta_dye</option>
<option value="minecraft:magenta_glazed_terracotta">minecraft:magenta_glazed_terracotta</option>
<option value="minecraft:magenta_shulker_box">minecraft:magenta_shulker_box</option>
<option value="minecraft:magenta_stained_glass">minecraft:magenta_stained_glass</option>
<option value="minecraft:magenta_stained_glass_pane">minecraft:magenta_stained_glass_pane</option>
<option value="minecraft:magenta_terracotta">minecraft:magenta_terracotta</option>
<option value="minecraft:magenta_wool">minecraft:magenta_wool</option>
<option value="minecraft:magma_block">minecraft:magma_block</option>
<option value="minecraft:magma_cream">minecraft:magma_cream</option>
<option value="minecraft:magma_cube_spawn_egg">minecraft:magma_cube_spawn_egg</option>
<option value="minecraft:map">minecraft:map</option>
<option value="minecraft:melon">minecraft:melon</option>
<option value="minecraft:melon_seeds">minecraft:melon_seeds</option>
<option value="minecraft:melon_slice">minecraft:melon_slice</option>
<option value="minecraft:milk_bucket">minecraft:milk_bucket</option>
<option value="minecraft:minecart">minecraft:minecart</option>
<option value="minecraft:mojang_banner_pattern">minecraft:mojang_banner_pattern</option>
<option value="minecraft:mooshroom_spawn_egg">minecraft:mooshroom_spawn_egg</option>
<option value="minecraft:mossy_cobblestone">minecraft:mossy_cobblestone</option>
<option value="minecraft:mossy_cobblestone_slab">minecraft:mossy_cobblestone_slab</option>
<option value="minecraft:mossy_cobblestone_stairs">minecraft:mossy_cobblestone_stairs</option>
<option value="minecraft:mossy_cobblestone_wall">minecraft:mossy_cobblestone_wall</option>
<option value="minecraft:mossy_stone_brick_slab">minecraft:mossy_stone_brick_slab</option>
<option value="minecraft:mossy_stone_brick_stairs">minecraft:mossy_stone_brick_stairs</option>
<option value="minecraft:mossy_stone_brick_wall">minecraft:mossy_stone_brick_wall</option>
<option value="minecraft:mossy_stone_bricks">minecraft:mossy_stone_bricks</option>
<option value="minecraft:mule_spawn_egg">minecraft:mule_spawn_egg</option>
<option value="minecraft:mushroom_stem">minecraft:mushroom_stem</option>
<option value="minecraft:mushroom_stew">minecraft:mushroom_stew</option>
<option value="minecraft:music_disc_11">minecraft:music_disc_11</option>
<option value="minecraft:music_disc_13">minecraft:music_disc_13</option>
<option value="minecraft:music_disc_blocks">minecraft:music_disc_blocks</option>
<option value="minecraft:music_disc_cat">minecraft:music_disc_cat</option>
<option value="minecraft:music_disc_chirp">minecraft:music_disc_chirp</option>
<option value="minecraft:music_disc_far">minecraft:music_disc_far</option>
<option value="minecraft:music_disc_mall">minecraft:music_disc_mall</option>
<option value="minecraft:music_disc_mellohi">minecraft:music_disc_mellohi</option>
<option value="minecraft:music_disc_pigstep">minecraft:music_disc_pigstep</option>
<option value="minecraft:music_disc_stal">minecraft:music_disc_stal</option>
<option value="minecraft:music_disc_strad">minecraft:music_disc_strad</option>
<option value="minecraft:music_disc_wait">minecraft:music_disc_wait</option>
<option value="minecraft:music_disc_ward">minecraft:music_disc_ward</option>
<option value="minecraft:mutton">minecraft:mutton</option>
<option value="minecraft:mycelium">minecraft:mycelium</option>
<option value="minecraft:name_tag">minecraft:name_tag</option>
<option value="minecraft:nautilus_shell">minecraft:nautilus_shell</option>
<option value="minecraft:nether_brick">minecraft:nether_brick</option>
<option value="minecraft:nether_brick_fence">minecraft:nether_brick_fence</option>
<option value="minecraft:nether_brick_slab">minecraft:nether_brick_slab</option>
<option value="minecraft:nether_brick_stairs">minecraft:nether_brick_stairs</option>
<option value="minecraft:nether_brick_wall">minecraft:nether_brick_wall</option>
<option value="minecraft:nether_bricks">minecraft:nether_bricks</option>
<option value="minecraft:nether_gold_ore">minecraft:nether_gold_ore</option>
<option value="minecraft:nether_quartz_ore">minecraft:nether_quartz_ore</option>
<option value="minecraft:nether_sprouts">minecraft:nether_sprouts</option>
<option value="minecraft:nether_star">minecraft:nether_star</option>
<option value="minecraft:nether_wart">minecraft:nether_wart</option>
<option value="minecraft:nether_wart_block">minecraft:nether_wart_block</option>
<option value="minecraft:netherite_axe">minecraft:netherite_axe</option>
<option value="minecraft:netherite_block">minecraft:netherite_block</option>
<option value="minecraft:netherite_boots">minecraft:netherite_boots</option>
<option value="minecraft:netherite_chestplate">minecraft:netherite_chestplate</option>
<option value="minecraft:netherite_helmet">minecraft:netherite_helmet</option>
<option value="minecraft:netherite_hoe">minecraft:netherite_hoe</option>
<option value="minecraft:netherite_ingot">minecraft:netherite_ingot</option>
<option value="minecraft:netherite_leggings">minecraft:netherite_leggings</option>
<option value="minecraft:netherite_pickaxe">minecraft:netherite_pickaxe</option>
<option value="minecraft:netherite_scrap">minecraft:netherite_scrap</option>
<option value="minecraft:netherite_shovel">minecraft:netherite_shovel</option>
<option value="minecraft:netherite_sword">minecraft:netherite_sword</option>
<option value="minecraft:netherrack">minecraft:netherrack</option>
<option value="minecraft:note_block">minecraft:note_block</option>
<option value="minecraft:oak_boat">minecraft:oak_boat</option>
<option value="minecraft:oak_button">minecraft:oak_button</option>
<option value="minecraft:oak_door">minecraft:oak_door</option>
<option value="minecraft:oak_fence">minecraft:oak_fence</option>
<option value="minecraft:oak_fence_gate">minecraft:oak_fence_gate</option>
<option value="minecraft:oak_leaves">minecraft:oak_leaves</option>
<option value="minecraft:oak_log">minecraft:oak_log</option>
<option value="minecraft:oak_planks">minecraft:oak_planks</option>
<option value="minecraft:oak_pressure_plate">minecraft:oak_pressure_plate</option>
<option value="minecraft:oak_sapling">minecraft:oak_sapling</option>
<option value="minecraft:oak_sign">minecraft:oak_sign</option>
<option value="minecraft:oak_slab">minecraft:oak_slab</option>
<option value="minecraft:oak_stairs">minecraft:oak_stairs</option>
<option value="minecraft:oak_trapdoor">minecraft:oak_trapdoor</option>
<option value="minecraft:oak_wood">minecraft:oak_wood</option>
<option value="minecraft:observer">minecraft:observer</option>
<option value="minecraft:obsidian">minecraft:obsidian</option>
<option value="minecraft:ocelot_spawn_egg">minecraft:ocelot_spawn_egg</option>
<option value="minecraft:orange_banner">minecraft:orange_banner</option>
<option value="minecraft:orange_bed">minecraft:orange_bed</option>
<option value="minecraft:orange_carpet">minecraft:orange_carpet</option>
<option value="minecraft:orange_concrete">minecraft:orange_concrete</option>
<option value="minecraft:orange_concrete_powder">minecraft:orange_concrete_powder</option>
<option value="minecraft:orange_dye">minecraft:orange_dye</option>
<option value="minecraft:orange_glazed_terracotta">minecraft:orange_glazed_terracotta</option>
<option value="minecraft:orange_shulker_box">minecraft:orange_shulker_box</option>
<option value="minecraft:orange_stained_glass">minecraft:orange_stained_glass</option>
<option value="minecraft:orange_stained_glass_pane">minecraft:orange_stained_glass_pane</option>
<option value="minecraft:orange_terracotta">minecraft:orange_terracotta</option>
<option value="minecraft:orange_tulip">minecraft:orange_tulip</option>
<option value="minecraft:orange_wool">minecraft:orange_wool</option>
<option value="minecraft:oxeye_daisy">minecraft:oxeye_daisy</option>
<option value="minecraft:packed_ice">minecraft:packed_ice</option>
<option value="minecraft:painting">minecraft:painting</option>
<option value="minecraft:panda_spawn_egg">minecraft:panda_spawn_egg</option>
<option value="minecraft:paper">minecraft:paper</option>
<option value="minecraft:parrot_spawn_egg">minecraft:parrot_spawn_egg</option>
<option value="minecraft:peony">minecraft:peony</option>
<option value="minecraft:petrified_oak_slab">minecraft:petrified_oak_slab</option>
<option value="minecraft:phantom_membrane">minecraft:phantom_membrane</option>
<option value="minecraft:phantom_spawn_egg">minecraft:phantom_spawn_egg</option>
<option value="minecraft:pig_spawn_egg">minecraft:pig_spawn_egg</option>
<option value="minecraft:piglin_banner_pattern">minecraft:piglin_banner_pattern</option>
<option value="minecraft:piglin_spawn_egg">minecraft:piglin_spawn_egg</option>
<option value="minecraft:pillager_spawn_egg">minecraft:pillager_spawn_egg</option>
<option value="minecraft:pink_banner">minecraft:pink_banner</option>
<option value="minecraft:pink_bed">minecraft:pink_bed</option>
<option value="minecraft:pink_carpet">minecraft:pink_carpet</option>
<option value="minecraft:pink_concrete">minecraft:pink_concrete</option>
<option value="minecraft:pink_concrete_powder">minecraft:pink_concrete_powder</option>
<option value="minecraft:pink_dye">minecraft:pink_dye</option>
<option value="minecraft:pink_glazed_terracotta">minecraft:pink_glazed_terracotta</option>
<option value="minecraft:pink_shulker_box">minecraft:pink_shulker_box</option>
<option value="minecraft:pink_stained_glass">minecraft:pink_stained_glass</option>
<option value="minecraft:pink_stained_glass_pane">minecraft:pink_stained_glass_pane</option>
<option value="minecraft:pink_terracotta">minecraft:pink_terracotta</option>
<option value="minecraft:pink_tulip">minecraft:pink_tulip</option>
<option value="minecraft:pink_wool">minecraft:pink_wool</option>
<option value="minecraft:piston">minecraft:piston</option>
<option value="minecraft:player_head">minecraft:player_head</option>
<option value="minecraft:podzol">minecraft:podzol</option>
<option value="minecraft:poisonous_potato">minecraft:poisonous_potato</option>
<option value="minecraft:polar_bear_spawn_egg">minecraft:polar_bear_spawn_egg</option>
<option value="minecraft:polished_andesite">minecraft:polished_andesite</option>
<option value="minecraft:polished_andesite_slab">minecraft:polished_andesite_slab</option>
<option value="minecraft:polished_andesite_stairs">minecraft:polished_andesite_stairs</option>
<option value="minecraft:polished_basalt">minecraft:polished_basalt</option>
<option value="minecraft:polished_blackstone">minecraft:polished_blackstone</option>
<option value="minecraft:polished_blackstone_brick_slab">minecraft:polished_blackstone_brick_slab</option>
<option value="minecraft:polished_blackstone_brick_stairs">minecraft:polished_blackstone_brick_stairs</option>
<option value="minecraft:polished_blackstone_brick_wall">minecraft:polished_blackstone_brick_wall</option>
<option value="minecraft:polished_blackstone_bricks">minecraft:polished_blackstone_bricks</option>
<option value="minecraft:polished_blackstone_button">minecraft:polished_blackstone_button</option>
<option value="minecraft:polished_blackstone_pressure_plate">minecraft:polished_blackstone_pressure_plate</option>
<option value="minecraft:polished_blackstone_slab">minecraft:polished_blackstone_slab</option>
<option value="minecraft:polished_blackstone_stairs">minecraft:polished_blackstone_stairs</option>
<option value="minecraft:polished_blackstone_wall">minecraft:polished_blackstone_wall</option>
<option value="minecraft:polished_diorite">minecraft:polished_diorite</option>
<option value="minecraft:polished_diorite_slab">minecraft:polished_diorite_slab</option>
<option value="minecraft:polished_diorite_stairs">minecraft:polished_diorite_stairs</option>
<option value="minecraft:polished_granite">minecraft:polished_granite</option>
<option value="minecraft:polished_granite_slab">minecraft:polished_granite_slab</option>
<option value="minecraft:polished_granite_stairs">minecraft:polished_granite_stairs</option>
<option value="minecraft:popped_chorus_fruit">minecraft:popped_chorus_fruit</option>
<option value="minecraft:poppy">minecraft:poppy</option>
<option value="minecraft:porkchop">minecraft:porkchop</option>
<option value="minecraft:potato">minecraft:potato</option>
<option value="minecraft:potion">minecraft:potion</option>
<option value="minecraft:powered_rail">minecraft:powered_rail</option>
<option value="minecraft:prismarine">minecraft:prismarine</option>
<option value="minecraft:prismarine_brick_slab">minecraft:prismarine_brick_slab</option>
<option value="minecraft:prismarine_brick_stairs">minecraft:prismarine_brick_stairs</option>
<option value="minecraft:prismarine_bricks">minecraft:prismarine_bricks</option>
<option value="minecraft:prismarine_crystals">minecraft:prismarine_crystals</option>
<option value="minecraft:prismarine_shard">minecraft:prismarine_shard</option>
<option value="minecraft:prismarine_slab">minecraft:prismarine_slab</option>
<option value="minecraft:prismarine_stairs">minecraft:prismarine_stairs</option>
<option value="minecraft:prismarine_wall">minecraft:prismarine_wall</option>
<option value="minecraft:pufferfish">minecraft:pufferfish</option>
<option value="minecraft:pufferfish_bucket">minecraft:pufferfish_bucket</option>
<option value="minecraft:pufferfish_spawn_egg">minecraft:pufferfish_spawn_egg</option>
<option value="minecraft:pumpkin">minecraft:pumpkin</option>
<option value="minecraft:pumpkin_pie">minecraft:pumpkin_pie</option>
<option value="minecraft:pumpkin_seeds">minecraft:pumpkin_seeds</option>
<option value="minecraft:purple_banner">minecraft:purple_banner</option>
<option value="minecraft:purple_bed">minecraft:purple_bed</option>
<option value="minecraft:purple_carpet">minecraft:purple_carpet</option>
<option value="minecraft:purple_concrete">minecraft:purple_concrete</option>
<option value="minecraft:purple_concrete_powder">minecraft:purple_concrete_powder</option>
<option value="minecraft:purple_dye">minecraft:purple_dye</option>
<option value="minecraft:purple_glazed_terracotta">minecraft:purple_glazed_terracotta</option>
<option value="minecraft:purple_shulker_box">minecraft:purple_shulker_box</option>
<option value="minecraft:purple_stained_glass">minecraft:purple_stained_glass</option>
<option value="minecraft:purple_stained_glass_pane">minecraft:purple_stained_glass_pane</option>
<option value="minecraft:purple_terracotta">minecraft:purple_terracotta</option>
<option value="minecraft:purple_wool">minecraft:purple_wool</option>
<option value="minecraft:purpur_block">minecraft:purpur_block</option>
<option value="minecraft:purpur_pillar">minecraft:purpur_pillar</option>
<option value="minecraft:purpur_slab">minecraft:purpur_slab</option>
<option value="minecraft:purpur_stairs">minecraft:purpur_stairs</option>
<option value="minecraft:quartz">minecraft:quartz</option>
<option value="minecraft:quartz_block">minecraft:quartz_block</option>
<option value="minecraft:quartz_bricks">minecraft:quartz_bricks</option>
<option value="minecraft:quartz_pillar">minecraft:quartz_pillar</option>
<option value="minecraft:quartz_slab">minecraft:quartz_slab</option>
<option value="minecraft:quartz_stairs">minecraft:quartz_stairs</option>
<option value="minecraft:rabbit">minecraft:rabbit</option>
<option value="minecraft:rabbit_foot">minecraft:rabbit_foot</option>
<option value="minecraft:rabbit_hide">minecraft:rabbit_hide</option>
<option value="minecraft:rabbit_spawn_egg">minecraft:rabbit_spawn_egg</option>
<option value="minecraft:rabbit_stew">minecraft:rabbit_stew</option>
<option value="minecraft:rail">minecraft:rail</option>
<option value="minecraft:ravager_spawn_egg">minecraft:ravager_spawn_egg</option>
<option value="minecraft:red_banner">minecraft:red_banner</option>
<option value="minecraft:red_bed">minecraft:red_bed</option>
<option value="minecraft:red_carpet">minecraft:red_carpet</option>
<option value="minecraft:red_concrete">minecraft:red_concrete</option>
<option value="minecraft:red_concrete_powder">minecraft:red_concrete_powder</option>
<option value="minecraft:red_dye">minecraft:red_dye</option>
<option value="minecraft:red_glazed_terracotta">minecraft:red_glazed_terracotta</option>
<option value="minecraft:red_mushroom">minecraft:red_mushroom</option>
<option value="minecraft:red_mushroom_block">minecraft:red_mushroom_block</option>
<option value="minecraft:red_nether_brick_slab">minecraft:red_nether_brick_slab</option>
<option value="minecraft:red_nether_brick_stairs">minecraft:red_nether_brick_stairs</option>
<option value="minecraft:red_nether_brick_wall">minecraft:red_nether_brick_wall</option>
<option value="minecraft:red_nether_bricks">minecraft:red_nether_bricks</option>
<option value="minecraft:red_sand">minecraft:red_sand</option>
<option value="minecraft:red_sandstone">minecraft:red_sandstone</option>
<option value="minecraft:red_sandstone_slab">minecraft:red_sandstone_slab</option>
<option value="minecraft:red_sandstone_stairs">minecraft:red_sandstone_stairs</option>
<option value="minecraft:red_sandstone_wall">minecraft:red_sandstone_wall</option>
<option value="minecraft:red_shulker_box">minecraft:red_shulker_box</option>
<option value="minecraft:red_stained_glass">minecraft:red_stained_glass</option>
<option value="minecraft:red_stained_glass_pane">minecraft:red_stained_glass_pane</option>
<option value="minecraft:red_terracotta">minecraft:red_terracotta</option>
<option value="minecraft:red_tulip">minecraft:red_tulip</option>
<option value="minecraft:red_wool">minecraft:red_wool</option>
<option value="minecraft:redstone">minecraft:redstone</option>
<option value="minecraft:redstone_block">minecraft:redstone_block</option>
<option value="minecraft:redstone_lamp">minecraft:redstone_lamp</option>
<option value="minecraft:redstone_ore">minecraft:redstone_ore</option>
<option value="minecraft:redstone_torch">minecraft:redstone_torch</option>
<option value="minecraft:repeater">minecraft:repeater</option>
<option value="minecraft:repeating_command_block">minecraft:repeating_command_block</option>
<option value="minecraft:respawn_anchor">minecraft:respawn_anchor</option>
<option value="minecraft:rose_bush">minecraft:rose_bush</option>
<option value="minecraft:rotten_flesh">minecraft:rotten_flesh</option>
<option value="minecraft:saddle">minecraft:saddle</option>
<option value="minecraft:salmon">minecraft:salmon</option>
<option value="minecraft:salmon_bucket">minecraft:salmon_bucket</option>
<option value="minecraft:salmon_spawn_egg">minecraft:salmon_spawn_egg</option>
<option value="minecraft:sand">minecraft:sand</option>
<option value="minecraft:sandstone">minecraft:sandstone</option>
<option value="minecraft:sandstone_slab">minecraft:sandstone_slab</option>
<option value="minecraft:sandstone_stairs">minecraft:sandstone_stairs</option>
<option value="minecraft:sandstone_wall">minecraft:sandstone_wall</option>
<option value="minecraft:scaffolding">minecraft:scaffolding</option>
<option value="minecraft:scute">minecraft:scute</option>
<option value="minecraft:sea_grass">minecraft:sea_grass</option>
<option value="minecraft:sea_lantern">minecraft:sea_lantern</option>
<option value="minecraft:sea_pickle">minecraft:sea_pickle</option>
<option value="minecraft:seagrass">minecraft:seagrass</option>
<option value="minecraft:seagrass">minecraft:seagrass</option>
<option value="minecraft:shears">minecraft:shears</option>
<option value="minecraft:sheep_spawn_egg">minecraft:sheep_spawn_egg</option>
<option value="minecraft:shield">minecraft:shield</option>
<option value="minecraft:shroomlight">minecraft:shroomlight</option>
<option value="minecraft:shulker_box">minecraft:shulker_box</option>
<option value="minecraft:shulker_shell">minecraft:shulker_shell</option>
<option value="minecraft:shulker_spawn_egg">minecraft:shulker_spawn_egg</option>
<option value="minecraft:silverfish_spawn_egg">minecraft:silverfish_spawn_egg</option>
<option value="minecraft:skeleton_horse_spawn_egg">minecraft:skeleton_horse_spawn_egg</option>
<option value="minecraft:skeleton_skull">minecraft:skeleton_skull</option>
<option value="minecraft:skeleton_spawn_egg">minecraft:skeleton_spawn_egg</option>
<option value="minecraft:skull_banner_pattern">minecraft:skull_banner_pattern</option>
<option value="minecraft:slime_ball">minecraft:slime_ball</option>
<option value="minecraft:slime_block">minecraft:slime_block</option>
<option value="minecraft:slime_spawn_egg">minecraft:slime_spawn_egg</option>
<option value="minecraft:smithing_table">minecraft:smithing_table</option>
<option value="minecraft:smoker">minecraft:smoker</option>
<option value="minecraft:smooth_quartz">minecraft:smooth_quartz</option>
<option value="minecraft:smooth_quartz_slab">minecraft:smooth_quartz_slab</option>
<option value="minecraft:smooth_quartz_stairs">minecraft:smooth_quartz_stairs</option>
<option value="minecraft:smooth_red_sandstone">minecraft:smooth_red_sandstone</option>
<option value="minecraft:smooth_red_sandstone_slab">minecraft:smooth_red_sandstone_slab</option>
<option value="minecraft:smooth_red_sandstone_stairs">minecraft:smooth_red_sandstone_stairs</option>
<option value="minecraft:smooth_sandstone">minecraft:smooth_sandstone</option>
<option value="minecraft:smooth_sandstone_slab">minecraft:smooth_sandstone_slab</option>
<option value="minecraft:smooth_sandstone_stairs">minecraft:smooth_sandstone_stairs</option>
<option value="minecraft:smooth_stone">minecraft:smooth_stone</option>
<option value="minecraft:smooth_stone_slab">minecraft:smooth_stone_slab</option>
<option value="minecraft:snow">minecraft:snow</option>
<option value="minecraft:snow_block">minecraft:snow_block</option>
<option value="minecraft:snowball">minecraft:snowball</option>
<option value="minecraft:soul_campfire">minecraft:soul_campfire</option>
<option value="minecraft:soul_lantern">minecraft:soul_lantern</option>
<option value="minecraft:soul_sand">minecraft:soul_sand</option>
<option value="minecraft:soul_soil">minecraft:soul_soil</option>
<option value="minecraft:soul_torch">minecraft:soul_torch</option>
<option value="minecraft:spawner">minecraft:spawner</option>
<option value="minecraft:spectral_arrow">minecraft:spectral_arrow</option>
<option value="minecraft:spider_eye">minecraft:spider_eye</option>
<option value="minecraft:spider_spawn_egg">minecraft:spider_spawn_egg</option>
<option value="minecraft:splash_potion">minecraft:splash_potion</option>
<option value="minecraft:sponge">minecraft:sponge</option>
<option value="minecraft:spruce_boat">minecraft:spruce_boat</option>
<option value="minecraft:spruce_button">minecraft:spruce_button</option>
<option value="minecraft:spruce_door">minecraft:spruce_door</option>
<option value="minecraft:spruce_fence">minecraft:spruce_fence</option>
<option value="minecraft:spruce_fence_gate">minecraft:spruce_fence_gate</option>
<option value="minecraft:spruce_leaves">minecraft:spruce_leaves</option>
<option value="minecraft:spruce_log">minecraft:spruce_log</option>
<option value="minecraft:spruce_planks">minecraft:spruce_planks</option>
<option value="minecraft:spruce_pressure_plate">minecraft:spruce_pressure_plate</option>
<option value="minecraft:spruce_sapling">minecraft:spruce_sapling</option>
<option value="minecraft:spruce_sign">minecraft:spruce_sign</option>
<option value="minecraft:spruce_slab">minecraft:spruce_slab</option>
<option value="minecraft:spruce_stairs">minecraft:spruce_stairs</option>
<option value="minecraft:spruce_trapdoor">minecraft:spruce_trapdoor</option>
<option value="minecraft:spruce_wood">minecraft:spruce_wood</option>
<option value="minecraft:squid_spawn_egg">minecraft:squid_spawn_egg</option>
<option value="minecraft:stick">minecraft:stick</option>
<option value="minecraft:sticky_piston">minecraft:sticky_piston</option>
<option value="minecraft:stone">minecraft:stone</option>
<option value="minecraft:stone_axe">minecraft:stone_axe</option>
<option value="minecraft:stone_brick_slab">minecraft:stone_brick_slab</option>
<option value="minecraft:stone_brick_stairs">minecraft:stone_brick_stairs</option>
<option value="minecraft:stone_brick_wall">minecraft:stone_brick_wall</option>
<option value="minecraft:stone_bricks">minecraft:stone_bricks</option>
<option value="minecraft:stone_button">minecraft:stone_button</option>
<option value="minecraft:stone_hoe">minecraft:stone_hoe</option>
<option value="minecraft:stone_pickaxe">minecraft:stone_pickaxe</option>
<option value="minecraft:stone_pressure_plate">minecraft:stone_pressure_plate</option>
<option value="minecraft:stone_shovel">minecraft:stone_shovel</option>
<option value="minecraft:stone_slab">minecraft:stone_slab</option>
<option value="minecraft:stone_stairs">minecraft:stone_stairs</option>
<option value="minecraft:stone_sword">minecraft:stone_sword</option>
<option value="minecraft:stonecutter">minecraft:stonecutter</option>
<option value="minecraft:stray_spawn_egg">minecraft:stray_spawn_egg</option>
<option value="minecraft:strider_spawn_egg">minecraft:strider_spawn_egg</option>
<option value="minecraft:string">minecraft:string</option>
<option value="minecraft:stripped_acacia_log">minecraft:stripped_acacia_log</option>
<option value="minecraft:stripped_acacia_wood">minecraft:stripped_acacia_wood</option>
<option value="minecraft:stripped_birch_log">minecraft:stripped_birch_log</option>
<option value="minecraft:stripped_birch_wood">minecraft:stripped_birch_wood</option>
<option value="minecraft:stripped_crimson_hyphae">minecraft:stripped_crimson_hyphae</option>
<option value="minecraft:stripped_crimson_stem">minecraft:stripped_crimson_stem</option>
<option value="minecraft:stripped_dark_oak_log">minecraft:stripped_dark_oak_log</option>
<option value="minecraft:stripped_dark_oak_wood">minecraft:stripped_dark_oak_wood</option>
<option value="minecraft:stripped_jungle_log">minecraft:stripped_jungle_log</option>
<option value="minecraft:stripped_jungle_wood">minecraft:stripped_jungle_wood</option>
<option value="minecraft:stripped_oak_log">minecraft:stripped_oak_log</option>
<option value="minecraft:stripped_oak_wood">minecraft:stripped_oak_wood</option>
<option value="minecraft:stripped_spruce_log">minecraft:stripped_spruce_log</option>
<option value="minecraft:stripped_spruce_wood">minecraft:stripped_spruce_wood</option>
<option value="minecraft:stripped_warped_hyphae">minecraft:stripped_warped_hyphae</option>
<option value="minecraft:stripped_warped_stem">minecraft:stripped_warped_stem</option>
<option value="minecraft:structure_block">minecraft:structure_block</option>
<option value="minecraft:structure_void">minecraft:structure_void</option>
<option value="minecraft:sugar">minecraft:sugar</option>
<option value="minecraft:sugar_cane">minecraft:sugar_cane</option>
<option value="minecraft:sunflower">minecraft:sunflower</option>
<option value="minecraft:suspicious_stew">minecraft:suspicious_stew</option>
<option value="minecraft:sweet_berries">minecraft:sweet_berries</option>
<option value="minecraft:tall_grass">minecraft:tall_grass</option>
<option value="minecraft:target">minecraft:target</option>
<option value="minecraft:terracotta">minecraft:terracotta</option>
<option value="minecraft:tipped_arrow">minecraft:tipped_arrow</option>
<option value="minecraft:tnt">minecraft:tnt</option>
<option value="minecraft:tnt_minecart">minecraft:tnt_minecart</option>
<option value="minecraft:torch">minecraft:torch</option>
<option value="minecraft:totem_of_undying">minecraft:totem_of_undying</option>
<option value="minecraft:trader_llama_spawn_egg">minecraft:trader_llama_spawn_egg</option>
<option value="minecraft:trapped_chest">minecraft:trapped_chest</option>
<option value="minecraft:trident">minecraft:trident</option>
<option value="minecraft:tripwire_hook">minecraft:tripwire_hook</option>
<option value="minecraft:tropical_fish">minecraft:tropical_fish</option>
<option value="minecraft:tropical_fish_bucket">minecraft:tropical_fish_bucket</option>
<option value="minecraft:tropical_fish_spawn_egg">minecraft:tropical_fish_spawn_egg</option>
<option value="minecraft:tube_coral">minecraft:tube_coral</option>
<option value="minecraft:tube_coral_block">minecraft:tube_coral_block</option>
<option value="minecraft:tube_coral_fan">minecraft:tube_coral_fan</option>
<option value="minecraft:turtle_egg">minecraft:turtle_egg</option>
<option value="minecraft:turtle_helmet">minecraft:turtle_helmet</option>
<option value="minecraft:turtle_spawn_egg">minecraft:turtle_spawn_egg</option>
<option value="minecraft:twisting_vines">minecraft:twisting_vines</option>
<option value="minecraft:vex_spawn_egg">minecraft:vex_spawn_egg</option>
<option value="minecraft:villager_spawn_egg">minecraft:villager_spawn_egg</option>
<option value="minecraft:vindication_spawn_egg">minecraft:vindication_spawn_egg</option>
<option value="minecraft:vine">minecraft:vine</option>
<option value="minecraft:wandering_trader_spawn_egg">minecraft:wandering_trader_spawn_egg</option>
<option value="minecraft:warped_button">minecraft:warped_button</option>
<option value="minecraft:warped_door">minecraft:warped_door</option>
<option value="minecraft:warped_fence">minecraft:warped_fence</option>
<option value="minecraft:warped_fence_gate">minecraft:warped_fence_gate</option>
<option value="minecraft:warped_fungus">minecraft:warped_fungus</option>
<option value="minecraft:warped_fungus_on_a_stick">minecraft:warped_fungus_on_a_stick</option>
<option value="minecraft:warped_hyphae">minecraft:warped_hyphae</option>
<option value="minecraft:warped_nylium">minecraft:warped_nylium</option>
<option value="minecraft:warped_planks">minecraft:warped_planks</option>
<option value="minecraft:warped_pressure_plate">minecraft:warped_pressure_plate</option>
<option value="minecraft:warped_roots">minecraft:warped_roots</option>
<option value="minecraft:warped_sign">minecraft:warped_sign</option>
<option value="minecraft:warped_slab">minecraft:warped_slab</option>
<option value="minecraft:warped_stairs">minecraft:warped_stairs</option>
<option value="minecraft:warped_stem">minecraft:warped_stem</option>
<option value="minecraft:warped_trapdoor">minecraft:warped_trapdoor</option>
<option value="minecraft:warped_wart_block">minecraft:warped_wart_block</option>
<option value="minecraft:water_bucket">minecraft:water_bucket</option>
<option value="minecraft:weeping_vines">minecraft:weeping_vines</option>
<option value="minecraft:wet_sponge">minecraft:wet_sponge</option>
<option value="minecraft:wheat">minecraft:wheat</option>
<option value="minecraft:wheat_seeds">minecraft:wheat_seeds</option>
<option value="minecraft:white_banner">minecraft:white_banner</option>
<option value="minecraft:white_bed">minecraft:white_bed</option>
<option value="minecraft:white_carpet">minecraft:white_carpet</option>
<option value="minecraft:white_concrete">minecraft:white_concrete</option>
<option value="minecraft:white_concrete_powder">minecraft:white_concrete_powder</option>
<option value="minecraft:white_dye">minecraft:white_dye</option>
<option value="minecraft:white_glazed_terracotta">minecraft:white_glazed_terracotta</option>
<option value="minecraft:white_shulker_box">minecraft:white_shulker_box</option>
<option value="minecraft:white_stained_glass">minecraft:white_stained_glass</option>
<option value="minecraft:white_stained_glass_pane">minecraft:white_stained_glass_pane</option>
<option value="minecraft:white_terracotta">minecraft:white_terracotta</option>
<option value="minecraft:white_tulip">minecraft:white_tulip</option>
<option value="minecraft:white_wool">minecraft:white_wool</option>
<option value="minecraft:witch_spawn_egg">minecraft:witch_spawn_egg</option>
<option value="minecraft:wither_rose">minecraft:wither_rose</option>
<option value="minecraft:wither_skeleton_skull">minecraft:wither_skeleton_skull</option>
<option value="minecraft:wither_skeleton_spawn_egg">minecraft:wither_skeleton_spawn_egg</option>
<option value="minecraft:wolf_spawn_egg">minecraft:wolf_spawn_egg</option>
<option value="minecraft:wooden_axe">minecraft:wooden_axe</option>
<option value="minecraft:wooden_hoe">minecraft:wooden_hoe</option>
<option value="minecraft:wooden_pickaxe">minecraft:wooden_pickaxe</option>
<option value="minecraft:wooden_shovel">minecraft:wooden_shovel</option>
<option value="minecraft:wooden_sword">minecraft:wooden_sword</option>
<option value="minecraft:writable_book">minecraft:writable_book</option>
<option value="minecraft:written_book">minecraft:written_book</option>
<option value="minecraft:yellow_banner">minecraft:yellow_banner</option>
<option value="minecraft:yellow_bed">minecraft:yellow_bed</option>
<option value="minecraft:yellow_carpet">minecraft:yellow_carpet</option>
<option value="minecraft:yellow_concrete">minecraft:yellow_concrete</option>
<option value="minecraft:yellow_concrete_powder">minecraft:yellow_concrete_powder</option>
<option value="minecraft:yellow_dye">minecraft:yellow_dye</option>
<option value="minecraft:yellow_glazed_terracotta">minecraft:yellow_glazed_terracotta</option>
<option value="minecraft:yellow_shulker_box">minecraft:yellow_shulker_box</option>
<option value="minecraft:yellow_stained_glass">minecraft:yellow_stained_glass</option>
<option value="minecraft:yellow_stained_glass_pane">minecraft:yellow_stained_glass_pane</option>
<option value="minecraft:yellow_terracotta">minecraft:yellow_terracotta</option>
<option value="minecraft:yellow_wool">minecraft:yellow_wool</option>
<option value="minecraft:zoglin_spawn_egg">minecraft:zoglin_spawn_egg</option>
<option value="minecraft:zombie_head">minecraft:zombie_head</option>
<option value="minecraft:zombie_horse_spawn_egg">minecraft:zombie_horse_spawn_egg</option>
<option value="minecraft:zombie_spawn_egg">minecraft:zombie_spawn_egg</option>
<option value="minecraft:zombie_villager_spawn_egg">minecraft:zombie_villager_spawn_egg</option>
<option value="minecraft:zombified_piglin_spawn_egg">minecraft:zombified_piglin_spawn_egg</option>
</select>
<input id="custom_name" type="text" placeholder="自定義物品名稱(選填)"><br>
<hr style="width:490px;float:left"><h3>物品敘述專區</h3>
<textarea style="::placeholder{color: #ffffff} font-size:15px; color:#777777; width:487px; height:160px;resize : none;border-radius:6px" placeholder="物品敘述,1行1個(選填)" id="custom_lore"></textarea><br><br>
<hr style="width:490px;float:left"><h3>標籤隱藏及無限耐久專區</h3>
<input type="checkbox" id="ub"> 無限耐久 |
<input type="checkbox" id="hf1">隱藏附魔標籤 |
<input type="checkbox" id="hf2">隱藏屬性標籤 |
<input type="checkbox" id="hf4">隱藏無限耐久標籤
<br>
<input type="checkbox" id="hf8">隱藏可破壞標籤 |
<input type="checkbox" id="hf16">隱藏可放置標籤 |
<input type="checkbox" id="hf32">隱藏其他標籤
<br>
<hr style="width:490px;float:left"><h3>附魔專區</h3>
<div id="mainContainer">
    <input type="button" id="addEnch" value="新增附魔" onClick="addNew();">
</div>
<hr style="width:490px;float:left">
<h3>使用物品時玩家屬性更改專區</h3>
最大血量值:
<select id="generic.max_health__position">
<option value="">裝備位置</option>
<option value="mainhand">主手</option>
<option value="offhand">副手</option>
<option value="head">頭上</option>
<option value="chest">身上</option>
<option value="legs">腿上</option>
<option value="feet">腳上</option>
</select>
<select id="generic.max_health__add_or_less">
<option value="+">+</option>
<option value="-">-</option> 
</select>
<input id="generic.max_health__amount" type="text" size=3 placeholder="數值">
<br>
攻擊力:
<select id="generic.attack_damage__position">
<option value="">裝備位置</option>
<option value="mainhand">主手</option>
<option value="offhand">副手</option>
<option value="head">頭上</option>
<option value="chest">身上</option>
<option value="legs">腿上</option>
<option value="feet">腳上</option>
</select>
<select id="generic.attack_damage__add_or_less">
<option value="+">+</option>
<option value="-">-</option> 
</select>
<input id="generic.attack_damage__amount" type="text" size=3 placeholder="數值">
<br>
盔甲值(盔甲防禦點數):
<select id="generic.armor__position">
<option value="">裝備位置</option>
<option value="mainhand">主手</option>
<option value="offhand">副手</option>
<option value="head">頭上</option>
<option value="chest">身上</option>
<option value="legs">腿上</option>
<option value="feet">腳上</option>
</select>
<select id="generic.armor__add_or_less">
<option value="+">+</option>
<option value="-">-</option> 
</select>
<input id="generic.armor__amount" type="text" size=3 placeholder="數值">
<br>
盔甲韌性(盔甲強度):
<select id="generic.armor_toughness__position">
<option value="">裝備位置</option>
<option value="mainhand">主手</option>
<option value="offhand">副手</option>
<option value="head">頭上</option>
<option value="chest">身上</option>
<option value="legs">腿上</option>
<option value="feet">腳上</option>
</select>
<select id="generic.armor_toughness__add_or_less">
<option value="+">+</option>
<option value="-">-</option> 
</select>
<input id="generic.armor_toughness__amount" type="text" size=3 placeholder="數值">
<br>
攻擊速度(手速):
<select id="generic.attack_speed__position">
<option value="">裝備位置</option>
<option value="mainhand">主手</option>
<option value="offhand">副手</option>
<option value="head">頭上</option>
<option value="chest">身上</option>
<option value="legs">腿上</option>
<option value="feet">腳上</option>
</select>
<select id="generic.attack_speed__add_or_less">
<option value="+">+</option>
<option value="-">-</option> 
</select>
<input id="generic.attack_speed__amount" type="text" size=3 placeholder="數值">
<br>
移動速度(腳速):
<select id="generic.movement_speed__position">
<option value="">裝備位置</option>
<option value="mainhand">主手</option>
<option value="offhand">副手</option>
<option value="head">頭上</option>
<option value="chest">身上</option>
<option value="legs">腿上</option>
<option value="feet">腳上</option>
</select>
<select id="generic.movement_speed__add_or_less">
<option value="+">+</option>
<option value="-">-</option> 
</select>
<input id="generic.movement_speed__amount" type="text" size=3 placeholder="數值">
<br>
擊退抗性(站穩度):
<select id="generic.knockback_resistance__position">
<option value="">裝備位置</option>
<option value="mainhand">主手</option>
<option value="offhand">副手</option>
<option value="head">頭上</option>
<option value="chest">身上</option>
<option value="legs">腿上</option>
<option value="feet">腳上</option>
</select>
<input id="generic.knockback_resistance__amount" type="text" size=3 placeholder="%">
<br>
<hr style="width:490px;float:left"><h3>物品置於鐵砧上屬性專區</h3>
修復此工具需花的等級:
<input id="repaircost" type="text" size=3>
<br>
<hr style="width:490px;float:left"><h3>冒險者模式專區</h3>
<textarea style="::placeholder{color: #ffffff} font-size:15px; color:#777777; width:487px; height:160px;resize : none;border-radius:6px" placeholder="可放置在,1行1個(選填),例如:&#10;minecraft:sand&#10;&#10;⚠️由於本產生器無法驗證你輸入的方塊id是否正確，所以輸入之後可能導致指令無法成功於遊戲執行或是正常運作!" id="can_place_on"></textarea><br>
<textarea style="::placeholder{color: #ffffff} font-size:15px; color:#777777; width:487px; height:160px;resize : none;border-radius:6px" placeholder="可破壞,1行1個(選填),例如:&#10;minecraft:sand&#10;&#10;⚠️由於本產生器無法驗證你輸入的方塊id是否正確，所以輸入之後可能導致指令無法成功於遊戲執行或是正常運作!" id="can_destroy"></textarea><br>
<hr style="width:490px;float:left">
<h3>詳細nbt更改專區</h3>
<textarea style="::placeholder{color: #ffffff} font-size:15px; color:#777777; width:487px; height:160px;resize : none;border-radius:6px" placeholder="更多nbt,1行1個(選填),例如:&#10;generation:3&#10;&#10;⚠️由於本產生器無法驗證你輸入的nbt標籤是否正確，所以輸入之後可能導致指令無法成功於遊戲執行或是正常運作!&#10;⚠️不支援有\符號的nbt標籤，如果輸入之後很高機率導致指令無法成功於遊戲執行或是正常運作!" id="another_nbt"></textarea><br>
<textarea style="::placeholder{color: #ffffff} font-size:15px; color:#777777; width:487px; height:160px;resize : none;border-radius:6px" placeholder="自定義頭顱懶人區&#10;說明:從https://minecraft-heads.com/ 裡面拿到的指令&#10;⚠️本產生器僅支援https://minecraft-head.com/ 內提供的1.16頭顱give指令，輸入其他指令可能會在指令產生或應用過程中出錯!&#10;&#10;正確輸入資料範例 : /give @p minecraft:player_head{display:{Name:&quot;{\&quot;text\&quot;:\&quot;Taiwan Beer\&quot;}&quot;},SkullOwner:{Id:[I;-565260798,333073629,-2054497079,-536837274],Properties:{textures:[{Value:&quot;eyJ0ZXh0dXJlcyI6eyJTS0lOIjp7InVybCI6Imh0dHA6Ly90ZXh0dXJlcy5taW5lY3JhZnQubmV0L3RleHR1cmUvN2NiOWRhOWY1ODE1NGU1MmQ4ZDg5ODE5YzYxNzI4MTY1OWRjN2E2ODIyMjBjMWQ2ZTJjNTFlZTg5ZTk3Y2EifX19&quot;}]}}} 1" id="another"></textarea><br><p><a href="https://minecraft-heads.com/">https://minecraft-heads.com/</a></p>
<hr style="width:490px;float:left"><br><h3>資料送出、儲存、匯入專區</h3>
<input type="button" value="將目前表單填寫資料儲存至本機" onClick="saveFile();">
<input type="file" name="file" id="filetoload" style="width:200px; visibility:hidden;" onchange = "loadFile()"/>
<br>
<input type="button" value="將資料送至遠端產生指令" onClick="before_send_data()"><br>
<input type="button" value="從本機匯入檔案" onclick="filetoload.click();" />
<form action="generator.php" method="post">
<input type="text" style="visibility:hidden;" name="Data" id="data_integration">
<input name="Submit" type="submit" style="visibility:hidden;"  id="send_data"></form>
<br><br><br><br><br>
</div>
<style>
#generator {
    border: thin solid black;
    border-radius:10px;
}

#modalContainer {
	background-color:rgba(0, 0, 0, 0.3);
	position:absolute;
	width:100%;
	height:100%;
	top:0px;
	left:0px;
	z-index:10000;
}

#alertBox {
	position:relative;
	width:300px;
	min-height:100px;
	margin-top:50px;
	border:1px solid #666;
	background-color:#fff;
	background-repeat:no-repeat;
	background-position:20px 30px;
}

#modalContainer > #alertBox {
	position:fixed;
}

#alertBox h1 {
	margin:0;
	font:bold 0.9em verdana,arial;
	background-color:#3073BB;
	color:#FFF;
	border-bottom:1px solid #000;
	padding:2px 0 2px 5px;
}

#alertBox p {
	font:0.7em verdana,arial;
	height:50px;
	padding-left:5px;
	margin-left:55px;
}

#alertBox #closeBtn {
	position:relative;
	margin:5px auto;
	padding:7px;
	border:0 none;
	width:70px;
	font:0.7em verdana,arial;
	text-transform:uppercase;
	text-align:center;
	color:#FFF;
	background-color:#357EBD;
	border-radius: 3px;
	text-decoration:none;
}

/* unrelated styles */

#mContainer {
	position:relative;
	width:600px;
	margin:auto;
	padding:5px;
	border-top:2px solid #000;
	border-bottom:2px solid #000;
	font:0.7em verdana,arial;
}

h1,h2 {
	margin:0;
	padding:4px;
	font:bold 1.5em verdana;
	border-bottom:1px solid #000;
}

code {
	font-size:1.2em;
	color:#069;
}

#credits {
	position:relative;
	margin:25px auto 0px auto;
	width:350px; 
	font:0.7em verdana;
	border-top:1px solid #000;
	border-bottom:1px solid #000;
	height:90px;
	padding-top:4px;
}

#credits img {
	float:left;
	margin:5px 10px 5px 0px;
	border:1px solid #000000;
	width:80px;
	height:79px;
}

.important {
	background-color:#F5FCC8;
	padding:2px;
}

code span {
	color:green;
}
</style>
</body>
</html>
