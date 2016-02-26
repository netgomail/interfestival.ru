<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
 <div class="subscribe_form" >
 <div class="form_border" >
<form id="subscription_form" action="<?=$arResult["FORM_ACTION"]?>" method="post">
 <table>
          <tbody>
            <tr>
              <td><input class="text" type="text" name="sf_EMAIL" value="<?=$arResult["EMAIL"]?>" title="<?=GetMessage("subscr_form_email_title")?>" maxlength="50" placeholder="Подписка на рассылку"></td>
              <td><input class="v-sign" name="s" type="submit" name="OK" value=" "></td>
            </tr>
          </tbody>
        </table>
</form>
</div>
</div>


