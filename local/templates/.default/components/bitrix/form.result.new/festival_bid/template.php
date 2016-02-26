<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>


<table class="form-table data-table"> 
  <tbody> 
    <tr> <td colspan="2"> 
        <h3>1. Информация о коллективе</h3>
       </td> </tr>
   
    <tr> <td width="30%"> Область<font color="red"><span class="form-required starrequired">*</span></font></td> <td><input type="text" class="inputtext" name="form_text_1" value="" size="0" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat no-repeat;" /></td> </tr>
   
    <tr> <td width="30%"> Город<font color="red"><span class="form-required starrequired">*</span></font></td> <td><input type="text" class="inputtext" name="form_text_2" value="" size="0" /></td> </tr>
   
    <tr> <td width="30%"> Полное название коллектива </td> <td><input type="text" class="inputtext" name="form_text_3" value="" size="0" /></td> </tr>
   
    <tr> <td width="30%"> Почтовый адрес </td> <td><input type="text" class="inputtext" name="form_text_4" value="" size="0" /></td> </tr>
   
    <tr class="tr-shown-tel current"> <td width="30%"> Телефон коллектива </td> <td><input type="text" class="inputtext" name="form_text_5" value="" size="0" /><span class="add"></span></td> </tr>
   
    <tr class="tr-hidden-tel"> <td width="30%"> Телефон коллектива 2 </td> <td><input type="text" class="inputtext" name="form_text_18" value="" size="0" /> <span class="add"></span> <span class="min"></span></td> </tr>
   
    <tr class="tr-hidden-tel"> <td width="30%"> Телефон коллектива 3 </td> <td><input type="text" class="inputtext" name="form_text_19" value="" size="0" /> <span class="min"></span></td> </tr>
   
    <tr> <td width="30%"> E-mail коллектива </td> <td><input type="text" class="inputtext" name="form_email_6" value="" size="0" /></td> </tr>
   
    <tr> <td width="30%"> ФИО руководителя, точная должность и регалии<font color="red"><span class="form-required starrequired">*</span></font></td> <td><textarea name="form_textarea_7" cols="40" rows="5" class="inputtextarea"></textarea></td> </tr>
   
    <tr> <td width="30%"> ФИО, должность организатора поездки<font color="red"><span class="form-required starrequired">*</span></font></td> <td><textarea name="form_textarea_8" cols="40" rows="5" class="inputtextarea"></textarea></td> </tr>
   
    <tr class="tr-shown-tel-2 current"> <td width="30%"> Телефон организатора<font color="red"><span class="form-required starrequired">*</span></font></td> <td><input type="text" class="inputtext" name="form_text_9" value="" size="0" /> <span class="add2"></span></td> </tr>
   
    <tr class="tr-hidden-tel-2"> <td width="30%"> Телефон организатора 2 </td> <td><input type="text" class="inputtext" name="form_text_20" value="" size="0" /> <span class="add2"></span> <span class="min2"></span></td> </tr>
   
    <tr class="tr-hidden-tel-2 "> <td width="30%"> Телефон организатора 3 </td> <td><input type="text" class="inputtext" name="form_text_21" value="" size="0" /> <span class="min2"></span> </td> </tr>
   
    <tr> <td width="30%"> E-mail организатора<font color="red"><span class="form-required starrequired">*</span></font> </td> <td><input type="text" class="inputtext" name="form_email_10" value="" size="0" /></td> </tr>
   
    <tr> <td colspan="2"> 
        <h3>2. Участие в фестивале</h3>
       </td> </tr>
   
    <tr> <td width="30%"> Страна<font color="red"><span class="form-required starrequired">*</span></font> </td> <td><input type="text" class="inputtext" name="form_text_11" value="<?=$GLOBALS['place']?>" size="0" /></td> </tr>
   
    <tr> <td width="30%"> Фестиваль</td> <td><input type="text" class="inputtext" name="form_text_12" value='<?=$_REQUEST["name"]?>' size="0" /></td> </tr>
   
    <tr> <td width="30%"> Количество участников </td> <td><input type="text" class="inputtext" name="form_text_13" value="" size="0" /></td> </tr>
   
    <tr> <td width="30%"> Требуемые технические средства </td> <td><textarea name="form_textarea_14" cols="40" rows="5" class="inputtextarea"></textarea></td> </tr>
   
    <tr> <td colspan="2"> 
        <h3>3. Приглашение и ходатайства</h3>
       </td> </tr>
   
    <tr class="tr-shown-tel-3 current"> <td width="30%"> Приглашение на имя, должность, электронная почта, факс, телефон </td> <td><textarea name="form_textarea_15" cols="40" rows="5" class="inputtextarea"></textarea> <span class="add3"></span></td> </tr>
   
    <tr class="tr-hidden-tel-3"> <td width="30%"> 2 Приглашение на имя, должность, электронная почта, факс, телефон </td> <td><textarea name="form_textarea_22" cols="40" rows="5" class="inputtextarea"></textarea> <span class="add3"></span> <span class="min3"></span></td> </tr>
   
    <tr class="tr-hidden-tel-3"> <td width="30%"> 3 Приглашение на имя, должность, электронная почта, факс, телефон </td> <td><textarea name="form_textarea_23" cols="40" rows="5" class="inputtextarea"></textarea><span class="min3"></span></td> </tr>
   
    <tr> <td width="30%"> Ходатайство на имя, должность, электронная почта, факс, телефон </td> <td><textarea name="form_textarea_16" cols="40" rows="5" class="inputtextarea"></textarea> </td> </tr>
   
    <tr> <td colspan="2"> 
        <h3>4. Дополнительная информация и комментарии</h3>
       </td> </tr>
   
    <tr> <td width="30%"> Дополнительная информация и комментарии </td> <td><textarea name="form_textarea_17" cols="40" rows="5" class="inputtextarea"></textarea></td> </tr>
  
  		<? if($arResult["isUseCaptcha"] == "Y")
{
?>
		<tr>
			<td colspan="2"><h3 ><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?></h3>
            </td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" />
            <div align="center"><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" /></div>
            </td>
		</tr>
		<tr>
			<td><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?></td>
			<td><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" /></td>
		</tr>
<?
} // isUseCaptcha
?>
   </tbody>
 <tfoot> 
    <tr> <td colspan="2"><input type="submit" name="web_form_submit" value="Отправить заявку" /></td> </tr>
   </tfoot> </table>


<p>
<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
</p>
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>