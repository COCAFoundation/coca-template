<?php
/**
 * @version		3.0
 * @package		Joomla
 * @subpackage	Joom Donation
 * @author  Tuan Pham Ngoc
 * @copyright	Copyright (C) 2010 Ossolution Team
 * @license		GNU/GPL, see LICENSE.php
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die ;    
if ($this->config->use_https) {
    $url = JRoute::_('index.php?option=com_jdonation&Itemid='.$this->Itemid, false, true);
} else {
    $url = JRoute::_('index.php?option=com_jdonation&Itemid='.$this->Itemid, false);
}        	
?>
<h1 class="title"><?php echo JText::_('JD_DONATION'); ?></h1>
<?php echo (strlen($this->config->donation_form_msg)? '<p>'.$this->config->donation_form_msg.'</p>' : '');?>    
      
<form method="post" role="form" name="os_form" id="os_form" class="form-horizontal col-md-12" action="<?php echo $url ; ?>" autocomplete="off">

<fieldset>
	<legend><?php echo JText::_('JD_DONOR_INFO'); ?></legend>

	<?php if ($this->config->use_campaign) { ?>
		<div class="form-group">
            <label Class="col-sm-3 control-label" for="campaign_id" required><?php echo JText::_('JD_CAMPAIGN');?></label>
            <div class="col-sm-9">
			<?php if (!$this->fromMenu) { ?>
                <?php echo $this->lists['campaign_id'] ;?>
            <?php } else { ?>  
                <span><?php echo $this->campaignTitle; ?></span>   
            <?php }	?>	
            </div>
        </div>	
	<?php }	?>	
    	
    
        
    <!--Registration integration, from version 1.4 -->
	<?php if ($this->config->registration_integration && !$this->userId) {?>
    	<div class="form-group">
			<label for="username" Class="col-sm-3 control-label" <?php echo ($this->config->registration_integration == 2? ' required ': '')?>><?php echo JText::_('JD_USERNAME'); ?></label>
			<div class="col-xs-3">
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $this->username; ?>" size="20" <?php echo ($this->config->registration_integration == 2? ' required ': '')?>>
            </div>
		</div>
        <div class="form-group">
            <label Class="col-sm-3 control-label" for="password" <?php echo ($this->config->registration_integration == 2? ' required ': '')?>><?php echo JText::_('JD_PASSWORD'); ?></label>
			<div class="col-xs-3">
            	<input type="text" class="form-control" id="username" name="username" value="<?php echo $this->username; ?>" size="20" <?php echo ($this->config->registration_integration == 2? ' required ': '')?> />
            </div>
        </div>
        <div class="form-group">
        	<label for="password2" Class="col-sm-3 control-label" <?php echo ($this->config->registration_integration == 2? ' required ': '')?>><?php echo JText::_('JD_CONFIRM_PASSWORD'); ?></label>   
        	<div class="col-xs-4">
            	<input type="password" class="form-control" id="password2" name="password2" value="<?php echo $this->password; ?>" size="20" <?php echo ($this->config->registration_integration == 2? ' required ': '')?> />
        	</div>
        </div>  
    <?php }?>	
    
       
       
        <div class="form-group"> 
        	<label for="first_name" class="col-sm-3 control-label" required><?php echo  JText::_('JD_FIRST_NAME') ?></label>         		
        	<div class="col-xs-3">   
            	<input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $this->firstName;?>" size="25" required />
           </div>
        </div>
        
        
 	<?php if ($this->config->s_lastname) {?>           
		<div class="form-group"> 
 			<label for="last_name" Class="col-sm-3 control-label" <?php echo ($this->config->r_lastname ? ' required ': '')?>><?php echo  JText::_('JD_LAST_NAME') ?></label>
            <div class="col-xs-4">
            	<input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $this->lastName; ?>" size="25" <?php echo ($this->config->r_lastname ? ' required ': '')?> />
            </div>
        </div>
    <?php }?>
 
 
 
	<?php if ($this->config->s_organization) {?> 
 		<div class="form-group"> 
        	<label for="organization" Class="col-sm-3 control-label" <?php echo ($this->config->r_organization ? ' required ': '')?>><?php echo  JText::_('JD_ORGANIZATION'); ?></label>
             <div class="col-xs-5">
             	<input type="text" class="form-control" id="organization" name="organization" value="<?php echo $this->organization; ?>" size="30" <?php echo ($this->config->r_organization ? ' required ': '')?> />
            </div>
        </div>
    <?php }?>
	
    
    
	<?php if ($this->config->s_address) {?>   
    	<div class="form-group"> 
    		<label for="address" Class="col-sm-3 control-label" <?php echo ($this->config->r_address ? ' required ': '')?>><?php echo  JText::_('JD_ADDRESS'); ?></label>
            <div class="col-xs-5">
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $this->address; ?>" size="50" <?php echo ($this->config->r_address ? ' required ': '')?> />
            </div>
    	</div>
   <?php }?>
    
    
    
	<?php if ($this->config->s_address2) {?>    
   		<div class="form-group"> 
        	<label for="address2" Class="col-sm-3 control-label" <?php echo ($this->config->address2 ? ' required ': '')?>><?php echo  JText::_('JD_ADDRESS2'); ?></label>
             <div class="col-xs-5">
             	<input type="text" class="form-control" id="address2" name="address2" value="<?php echo $this->address2; ?>" size="50" <?php echo ($this->config->address2 ? ' required ': '')?> />
             </div>
        </div>
   <?php }?>
   
   
   
   <?php if ($this->config->s_city) {?>
       <div class="form-group">
            <label for="city" Class="col-sm-3 control-label" <?php echo ($this->config->r_city ? ' required ': '')?>><?php echo  JText::_('JD_CITY'); ?></label>
            <div class="col-xs-4">
                <input type="text" class="form-control" id="city" name="city" value="<?php echo $this->city; ?>" size="15" <?php echo ($this->config->r_city ? ' required ': '')?> />
            </div>
       </div>
   <?php }?>
            
            
            
	<?php if ($this->config->s_country) {?>
        <div class="form-group">
            <label for="country" Class="col-sm-3 control-label" <?php echo ($this->config->r_country ? ' required ': '')?>><?php echo  JText::_('JD_COUNTRY'); ?></label>				
            <div class="col-sm-9">
            	<?php echo $this->lists['country_list']; ?>
            </div>
        </div>
    <?php }?>      
            
              
	<?php if ($this->config->s_state) {?>
        <div class="form-group"> 
        	<label for="state" Class="col-sm-3 control-label" <?php echo ($this->config->r_state ? ' required ': '')?>><?php echo  JText::_('JD_STATE'); ?></label>  
			<div class="col-sm-9">
				<?php if ($this->config->state_dropdown) {?>
                	<?php echo $this->lists['state'] ; ?>
                <?php }else{?>
                	<input type="text" class="form-control" id="state" name="state" value="<?php echo $this->state; ?>" size="15" <?php echo ($this->config->r_state ? ' required ': '')?> />
                <?php }?>
            </div>
        </div>
    <?php }?>
            
                            
                
	<?php if ($this->config->s_zip) {?>
    	<div class="form-group">
        	<label for="zip" Class="col-sm-3 control-label" <?php echo ($this->config->r_zip ? ' required ': '')?>><?php echo  JText::_('JD_ZIP'); ?></label>
            <div class="col-xs-2">
            	<input type="text" class="form-control" id="zip" name="zip" value="<?php echo $this->zip; ?>" size="15" <?php echo ($this->config->r_zip ? ' required ': '')?> />
            </div>
        </div>
    <?php }?>               
                   
  
  
	<?php if ($this->config->s_phone) {?> 
    	<div class="form-group"> 
        	<label for="phone" Class="col-sm-3 control-label" <?php echo ($this->config->r_phone ? ' required ': '')?>><?php echo  JText::_('JD_PHONE'); ?></label>
            <div class="col-xs-3">
            	<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $this->phone; ?>" size="15" <?php echo ($this->config->r_phone ? ' required ': '')?> />
            </div>
        </div>
    <?php }?>
   
   
   
	<?php if ($this->config->s_fax) {?>
    	<div class="form-group">
        	<label for="fax" Class="col-sm-3 control-label" <?php echo ($this->config->r_fax ? ' required ': '')?>><?php echo  JText::_('JD_FAX'); ?></label>
            <div class="col-xs-3">
            	<input type="text" class="form-control" id="fax" name="fax" value="<?php echo $this->fax; ?>" size="15" <?php echo ($this->config->r_fax ? ' required ': '')?> />
            </div>
        </div>    
    <?php }?>   
   
   
   
        <div class="form-group">
            <label for="email" Class="col-sm-3 control-label" required><?php echo  JText::_('JD_EMAIL'); ?></label>
            <div class="col-xs-4">
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $this->email; ?>" size="40" required />
            </div>
        </div>     
   
    
	
	<?php if ($this->config->pay_payment_gateway_fee) {?>
    	<div class="form-group">
        	<label for="payment_gateway_fee" Class="col-sm-3 control-label"><?php echo  JText::_('JD_PAY_PAYMENT_GATEWAY_FEE'); ?></label>
            <div class="col-sm-9">
            	<?php echo $this->lists['pay_payment_gateway_fee'] ; ?>
            </div>
        </div>    
    <?php }?>       
    
    
    
	<?php if ($this->config->enable_hide_donor) {?>
    	<div class="form-group">
        	<label for="hide_me" Class="col-sm-3 control-label"><?php echo  JText::_('JD_HIDE_DONOR'); ?></label>
            <div class="col-sm-9">
            	<input type="checkbox" class="form-control" id="hide_me" name="hide_me" value="1" size="40" <?php if ($this->hideMe) echo ' checked="checked"' ; ?> />
            </div>
        </div>    
    <?php }?> 
</fieldset>
<fieldset>
	<legend><?php echo JText::_('JD_DONATION_INFORMATION'); ?></legend>

	<!-- Recurring Donation Logic-->
	<?php if ($this->recurring) {	?>			
		<?php
            if ($this->campaignId) {
				$db = & JFactory::getDBO() ;
				$sql = 'SELECT enable_recurring FROM #__jd_campaigns WHERE id='.$this->campaignId ;
				$db->setQuery($sql) ;
				$enableRecurring = $db->loadResult();
				if ($enableRecurring && $this->method->getEnableRecurring())
					$style = '';
				else 
					$style = ' style="display:none;"' ;					
			} else {
				if ($this->method->getEnableRecurring())
					$style = '';
				else 
					$style = ' style="display:none;"' ;	
			}
		?>
        
        
        <div class="form-group donation_type">
            <label for="donation_type" Class="col-sm-3 control-label" required><?php echo JText::_('JD_DONATION_TYPE'); ?></label>
            <div class="col-sm-9">
                <?php echo $this->lists['donation_type']; ?>
            </div>
        </div>             
        
        
        <?php $style = ($this->donationType == 'onetime' || !$this->method->getEnableRecurring()? ' style="display:none" ' : '');?>
        
        
        
        <div class="form-group" <?php echo $style; ?>>
            <label for="frequency" Class="col-sm-3 control-label" required><?php echo JText::_('JD_FREQUENCY') ; ?></label>
            <div class="col-sm-9">
            	<?php echo $this->lists['r_frequency'];?>
            </div>
        </div> 
        
        
        
		<?php if ($this->config->show_r_times) {?> 
            <div class="form-group" <?php echo $style; ?>>
                <label for="r_times" Class="col-sm-3 control-label" <?php echo JText::_('JD_OCCURENCIES') ; ?>></label>
                <div class="col-sm-9">
                    <input type="text" id="r_times" name="r_times" value="<?php echo @$this->rTimes; ?>" class="form-control" size="5" />
                </div>
            </div>        
        <?php }?>       
                  
	<?php }?>



    <div class="" style="">
        <label for="amount" Class="col-sm-3 control-label"><?php echo JText::_('JD_DONATION_AMOUNT'); ?></label>
            <div class="col-xs-4">
            <?php					
                if ($this->config->donation_amounts) {
                    $explanations = explode("\r\n", $this->config->donation_amounts_explanation) ;						
                    $amounts = explode("\r\n", $this->config->donation_amounts);																											
                    if ($this->config->amounts_format == 1) {
                        for ($i = 0 , $n = count($amounts) ; $i < $n ; $i++) {
                            $amount = (float)$amounts[$i] ;
                            if ($amount == $this->rdAmount) {
                                $checked = ' checked="checked" ' ;
                            } else {
                                $checked = '' ;
                            }
                        ?>
                         <div class="radio" style="">
                                <label>
                         	      <input type="radio" id="rd_amount" name="rd_amount" class="" value="<?php echo $amount; ?>" <?php echo $checked ; ?> onclick="clearTextbox();" />
							      <?php echo ' '.$this->config->currency_symbol.number_format($amount, 2) ;?>
                                </label>
                        </div> 
							      <?php
                                if (isset($explanations[$i]) && $explanations[$i])
                                    echo '   <span class="amount_explaination">[ '.$explanations[$i].' ]</span>  ' ;
                                ?>
                            
                            <br />
                        <?php		
                        }
                    } else {
                        $options = array() ;
                        $options[] = JHTML::_('select.option', 0, JText::_('JD_DONATE_AMOUNT')) ;
                        for ($i = 0 , $n = count($amounts) ; $i < $n ; $i++) {
                            $amount = (float)$amounts[$i] ;								
                            if (isset($explanations[$i]) && $explanations[$i]) {
                                $options[] = JHTML::_('select.option', $amount, number_format($amount, 2)." [$explanations[$i]]") ;
                            } else {
                                $options[] = JHTML::_('select.option', $amount, number_format($amount, 2)) ;
                            }								
                        }	
                        echo  $this->config->currency_symbol.'  '.JHTML::_('select.genericlist', $options, 'rd_amount', ' class="form-control" onchange="clearTextbox();" ', 'value', 'text', $this->rdAmount).'<br /><br />';	
                    }																		
                }				
                if ($this->config->display_amount_textbox) {?>
				<div class="input-group">
                    <span class="input-group-addon"><?php echo $this->config->currency_symbol; ?></span>
                    <input type="text" id="prependedInput" class="form-control" id="amount" name="amount" value="<?php echo $this->amount;?>" onchange="deSelectRadio();" size="10" />
                </div>
         	<?php }?>	
        </div>
    </div> 



	<?php if ($this->config->currency_selection) {?> 
            <div class="form-group" <?php echo $style; ?>>
                <label for="currency_code" Class="col-sm-3 control-label"><?php echo JText::_('JD_CHOOSE_CURRENCY'); ?></label>
                <div class="col-sm-9">
                    <?php echo $this->lists['currency_code']; ?>
                </div>
            </div>        
    <?php }?> 

    <div class="form-group" <?php echo $style; ?>>
            <div class="col-sm-9">
                  &nbsp;
            </div>
    </div> 


	<?php if (count($this->methods) > 1) {?> 
            <div class="form-group">
                <label for="currency_code" Class="col-sm-3 control-label" required><?php echo JText::_('JD_PAYMENT_OPTION'); ?></label>
                <div class="col-xs-4">
						<?php $method = null;?>
                        <?php
							for ($i = 0 , $n = count($this->methods); $i < $n; $i++) {
								$paymentMethod = $this->methods[$i];
								if ($paymentMethod->getName() == $this->paymentMethod) {
									$checked = ' checked="checked" ';
									$method = $paymentMethod ;
								}										
								else 
									$checked = '';	
						?>
								<input onclick="changePaymentMethod();" type="radio" id="payment_method" name="payment_method" value="<?php echo $paymentMethod->getName(); ?>" <?php echo $checked; ?> /><?php echo JText::_($paymentMethod->getTitle()); ?> <br />
						<?php }?>
                </div>
            </div>        
    <?php }else {?> 
    	<?php $method = $this->methods[0] ;?>
            <div class="form-group">
                <label for="payment_option" Class="col-sm-3 control-label" required><?php echo JText::_('JD_PAYMENT_OPTION'); ?></label>
                <div class="col-sm-9">
					<?php echo JText::_($method->getTitle()); ?>
                </div>
            </div>     
    <?php }?>

	<?php $style = ($method->getCreditCard()? '' : ' style="display:none" ');?>

    <div class="form-group" <?php echo $style; ?>>
        <label for="x_card_num" Class="col-sm-3 control-label" required><?php echo  JText::_('AUTH_CARD_NUMBER'); ?></label>
        <div class="col-xs-4">
            <input type="text" id="x_card_num" name="x_card_num" class="form-control" onkeyup="checkNumber(this)" value="<?php echo $this->x_card_num; ?>" size="20" required />
        </div>
    </div>  



    <div class="form-group" <?php echo $style; ?>>
        <label for="exp_month" Class="col-sm-3 control-label" required><?php echo  JText::_('AUTH_CARD_EXPIRY_DATE'); ?></label>
        <div class="col-sm-9">
            <?php echo $this->lists['exp_month'] .'  /  '.$this->lists['exp_year'] ; ?>
        </div>
    </div>  

    <div class="form-group" <?php echo $style; ?>>
        <label for="x_card_code" Class="col-sm-3 control-label" required><?php echo  JText::_('AUTH_CVV_CODE'); ?></label>
        <div class="col-xs-2">
            <input type="text" id="x_card_code" class="form-control" name="x_card_code" class="form-control" onKeyUp="checkNumber(this)" value="<?php echo $this->x_card_code; ?>" MAXLENGTH="4" required />
        </div>
    </div>     
    
    
	<?php $style = ($method->getCardType()? '' : ' style="display:none" ');?>
   
   
    <div class="form-group" <?php echo $style; ?>>
        <label for="card_type" Class="col-sm-3 control-label" required><?php echo JText::_('JD_CARD_TYPE'); ?></label>
        <div class="col-sm-9">
            <?php echo $this->lists['card_type'] ; ?>
        </div>
    </div>       
   
   
    <?php $style = ($method->getCardHolderName()? '' : ' style="display:none" ');?>
    <div class="form-group" <?php echo $style; ?>>
        <label for="card_holder_name" Class="col-sm-3 control-label" required><?php echo JText::_('JD_CARD_HOLDER_NAME'); ?></label>
        <div class="col-sm-9">
            <input type="text" id="card_holder_name" name="card_holder_name" class="form-control"  value="<?php echo $this->cardHolderName; ?>" size="40" required />
        </div>
    </div>   
    
    
    <?php $style = ($method->getName() == 'os_echeck'? '' : ' style="display:none" ');?>
     <div class="form-group" <?php echo $style; ?>>
        <label for="x_bank_aba_code" Class="col-sm-3 control-label" required><?php echo JText::_('JD_BANK_ROUTING_NUMBER'); ?></label>
        <div class="col-sm-9">
            <input type="text" id="x_bank_aba_code" name="x_bank_aba_code" class="form-control"  value="<?php echo $this->x_bank_aba_code; ?>" size="40" onKeyUp="checkNumber(this);" required />
        </div>
    </div>  
    
    <div class="form-group" <?php echo $style; ?>>
        <label for="x_bank_acct_num" Class="col-sm-3 control-label" required><?php echo JText::_('JD_BANK_ACCOUNT_NUMBER'); ?></label>
        <div class="col-sm-9">
            <input type="text" id="x_bank_acct_num" name="x_bank_acct_num" class="form-control"  value="<?php echo $this->x_bank_acct_num; ?>" size="40" onKeyUp="checkNumber(this);" required />
        </div>
    </div>     
    
    <div class="form-group" <?php echo $style; ?>>
        <label for="x_bank_acct_type" Class="col-sm-3 control-label" required><?php echo JText::_('JD_BANK_ACCOUNT_TYPE'); ?></label>
        <div class="col-sm-9">
            <?php echo $this->lists['x_bank_acct_type']; ?>
        </div>
    </div>  
    
    <div class="form-group" <?php echo $style; ?>>
        <label for="x_bank_name" Class="col-sm-3 control-label" required><?php echo JText::_('JD_BANK_NAME'); ?></label>
        <div class="col-sm-9">
            <input type="text" id="x_bank_name" name="x_bank_name" class="form-control"  value="<?php echo $this->x_bank_name; ?>" size="40" required />
        </div>
    </div>     
    
    <div class="form-group" <?php echo $style; ?>>
        <label for="x_bank_act_name" Class="col-sm-3 control-label" required><?php echo JText::_('JD_ACCOUNT_HOLDER_NAME'); ?></label>
        <div class="col-sm-9">
            <input type="text" id="x_bank_act_name" name="x_bank_acct_name" class="form-control"  value="<?php echo $this->x_bank_acct_name; ?>" size="40" required />
        </div>
    </div> 
    
    
 	<?php echo ($this->customField? $this->fields : '');?>	              
    
    
	<?php if ($this->config->s_comment) { ?>    
        <div class="form-group" <?php echo $style; ?>>
            <label for="comment" Class="col-sm-3 control-label" <?php echo ($this->config->r_comment ? ' required ': '')?>><?php echo JText::_('JD_COMMENT'); ?></label>
            <div class="col-sm-9">
                <textarea rows="7" cols="50" id="comment" name="comment" class="form-control" <?php echo ($this->config->r_comment ? ' required ': '')?>><?php echo $this->comment;?></textarea>
            </div>
        </div> 
    <?php }?>    
    
    
    
	<?php if ($this->config->accept_term ==1) { ?>    
        <div class="form-group" <?php echo $style; ?>>
            <label for="accept_term" Class="col-sm-3 control-label" <?php echo ($this->config->r_comment ? ' required ': '')?>>
				<?php echo JText::_('JD_COMMENT'); ?>
                <input type="checkbox" id="accept_term" name="accept_term" value="1" class="form-control" />
                <strong><?php echo JText::_('JD_ACCEPT'); ?>&nbsp;<a href="index.php?option=com_content&view=article&id=<?php echo $this->config->article_id; ?>" target="_blank" <?php echo ($this->config->r_comment ? ' required ': '')?>><?php echo JText::_('JD_TERM_AND_CONDITION'); ?></a></strong>
            </label>
        </div> 
    <?php }?>       
    
    <input type="button" class="btn" id="btnSubmit" name="btnSubmit" onclick="checkData();" value="<?php echo  JText::_('JD_NEXT') ;?>">
    
<fieldset> 
   
 	<?php if (count($this->methods) == 1) {?>
		<input type="hidden" id="payment_method" name="payment_method" value="<?php echo $this->methods[0]->getName(); ?>" />
	<?php }	?>
    <?php if ($this->fromMenu) {?>
		<input type="hidden" id="campaign_id" name="campaign_id" value="<?php echo $this->campaignId; ?>" />
	<?php }?>		
	<?php if (!$this->recurring) {?>
		<input type="hidden" id="donation_type" name="donation_type" value="onetime" />
	<?php }?>
    	
	<input type="hidden" id="receive_user_id" name="receive_user_id" value="<?php echo $this->receiveUserId; ?>" />
	<input type="hidden" id="Itemid" name="Itemid" value="<?php echo $this->Itemid; ?>" />
	<input type="hidden" id="option" name="option" value="com_jdonation" />
	<input type="hidden" id="view" name="view" value="confirmation" />
	<input type="hidden" id="layout" name="layout" value="default" />	
	<input type="hidden" id="task" name="task" value="">
	
	<?php echo JHTML::_( 'form.token' ); ?>	   
    

	<script type="text/javascript">
		<?php 
			echo $this->recurringString ;
			if ($this->config->state_dropdown) {
				echo $this->countryIdsString ;
				echo $this->countryNamesString ;
				echo $this->stateString ;
			} 			
			if ($this->config->field_campaign)
				echo $this->fieldJs;
			echo os_payments::writeJavascriptObjects() ;	
		?>
		var currentCampaign = <?php echo $this->campaignId; ?> ;
		function checkData() {
			var form = document.os_form;			
			<?php
				$minimumAmount =  (int) $this->config->minimum_donation_amount;
				$maximumAmount = (int) $this->config->maximum_donation_amount ;
			?>
			var minimumAmount = <?php echo $minimumAmount; ?> ;
			var maximumAmount = <?php echo $maximumAmount; ?> ;
			<?php
				if ($this->config->use_campaign && !$this->campaignId) {
				?>
					if (form.campaign_id.value == 0) {
						alert('<?php echo JText::_('JD_REQUIRE_CAMPAIGN'); ?>');
						form.campaign_id.focus();
						return ;
					}		
				<?php	
				}
				if (!$this->userId) {
					if ($this->config->registration_integration == 2) {
					?>
						if (form.username.value == '') {							
							alert("<?php echo JText::_('JD_USERNAME_REQUIRED') ; ?>");
							form.username.focus();
							return ;
						}
						if (form.password.value == '') {
							alert("<?php echo JText::_('JD_PASSWORD_REQUIRED') ; ?>");
							form.password.focus();
							return ;
						}
						if (form.password.value != form.password2.value) {
							alert("<?php echo JText::_('JD_PASSWORD_NOT_MATCH') ; ?>");
							form.password.focus();
							return ;
						}						
					<?php	
					} elseif ($this->config->registration_integration == 1) {
					?>
						if (form.username.value != '' || form.password.value != '' || form.password2.value != '') {
							if (form.username.value == '') {							
								alert("<?php echo JText::_('JD_USERNAME_REQUIRED_OPTIONAL') ; ?>");
								form.username.focus();
								return ;
							}
							if (form.password.value == '') {
								alert("<?php echo JText::_('JD_PASSWORD_REQUIRED_OPTIONAL') ; ?>");
								form.password.focus();
								return ;
							}
							if (form.password.value != form.password2.value) {
								alert("<?php echo JText::_('JD_PASSWORD_NOT_MATCH_OPTIONAL') ; ?>");
								form.password.focus();
								return ;
							}			
						}
					<?php	
					}
				}
			?>			
			if (form.first_name.value == '') {
				alert("<?php echo JText::_('JD_REQUIRE_FIRST_NAME'); ?>");
				form.first_name.focus();
				return ;
			}						
			<?php
				if ($this->config->s_lastname && $this->config->r_lastname) {
				?>
					if (form.last_name.value=="") {
						alert("<?php echo JText::_('JD_REQUIRE_LAST_NAME'); ?>");
						form.last_name.focus();
						return;
					}						
				<?php		
				}
				if ($this->config->s_organization && $this->config->r_organization) {
				?>
					if (form.organization.value=="") {
						alert("<?php echo JText::_('JD_REQUIRE_ORGANIZATION'); ?>");
						form.organization.focus();
						return;
					}						
				<?php		
				}
				if ($this->config->s_address && $this->config->r_address) {
				?>
					if (form.address.value=="") {
						alert("<?php echo JText::_('JD_REQUIRE_ADDRESS'); ?>");
						form.address.focus();
						return;	
					}						
				<?php		
				}
				if ($this->config->s_city && $this->config->r_city) {
				?>
					if (form.city.value == "") {
						alert("<?php echo JText::_('JD_REQUIRE_CITY'); ?>");
						form.city.focus();
						return;	
					}						
				<?php		
				}				
				if ($this->config->s_state && $this->config->r_state) {
					if ($this->config->state_dropdown) {
					?>
					if (form.state.length > 1) {
						if (form.state.value =="") {
							alert("<?php echo JText::_('JD_REQUIRE_STATE'); ?>");
							form.state.focus();
							return;	
						}
					}															
					<?php	
					} else {
					?>					
						if (form.state.value =="") {
							alert("<?php echo JText::_('JD_REQUIRE_STATE'); ?>");
							form.state.focus();
							return;	
						}						
					<?php		
					}					
				}
				if ($this->config->s_zip && $this->config->r_zip) {
				?>
					if (form.zip.value == "") {
						alert("<?php echo JText::_('JD_REQUIRE_ZIP'); ?>");
						form.zip.focus();
						return;
					}						
				<?php		
				}
				if ($this->config->s_country && $this->config->r_country) {
				?>
					if (form.country.value == "") {
						alert("<?php echo JText::_('JD_REQUIRE_COUNTRY'); ?>");
						form.country.focus();
						return;	
					}				
				<?php		
				}
				if ($this->config->s_phone && $this->config->r_phone) {
				?>
					if (form.phone.value == "") {
						alert("<?php echo JText::_('JD_REQUIRE_PHONE'); ?>");
						form.phone.focus();
						return;
					}						
				<?php		
				}																				
			?>				
			if (form.email.value == '') {
				alert("<?php echo JText::_('JD_REQUIRE_EMAIL'); ?>");
				form.email.focus();
				return;
			}
						
			var emailFilter = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
			var ret = emailFilter.test(form.email.value);
			if (!ret) {
				alert("<?php echo  JText::_('JD_VALID_EMAIL'); ?>");
				form.email.focus();
				return;
			}									
			var amountValid = false ;
			var amount = 0 ;
			if (form.rd_amount) {
				<?php
					if ($this->config->amounts_format ==1) {
					?>
						if (form.rd_amount.length) {
							for (var i = 0 ; i < form.rd_amount.length ; i++) {
								if(form.rd_amount[i].checked == true) {
									amountValid = true ;
									amount = form.rd_amount[i].value ;
								}	
							}	
						} else if (form.rd_amount.checked == true) {
							amountValid = true ;
							amount = form.rd_amount.value ;
						}
					<?php	
					}
					else {
					?>
						if (form.rd_amount.value > 0) {
							amountValid = true ;
							amount = form.rd_amount.value ; 	
						}	
					<?php	
					}					
				?>								
			}

			<?php
				if ($this->config->display_amount_textbox) {
				?>
					if (!amountValid) {							
						if (parseFloat(form.amount.value)) {
							amountValid = true;
							amount = form.amount.value ;	
						}				
					}		
				<?php	
				}
			?>
				
												
			if (!amountValid) {
				var msg;
				<?php
					if ($this->config->donation_amounts) {
					?>
						msg = "<?php echo JText::_('JD_REQUIRE_CHOOSE_AMOUNT'); ?>";
					<?php	
					} else {
					?>
						msg = "<?php echo JText::_('JD_REQUIRE_AMOUNT'); ?>";
					<?php	
					}	
				?>
				alert(msg);
				return;	
			}			


			if (parseFloat(amount) < minimumAmount) {
				alert("<?php echo JText::_('JD_MINIMUM_AMOUNT_ALLOWED'); ?> : <?php echo $this->config->currency_symbol; ?>" + minimumAmount);
				<?php
					if ($this->config->display_amount_textbox) {
					?>
						form.amount.focus();
					<?php	
					}
				?>
				form.amount.focus();
				return ;
			}

			if ((maximumAmount >0) && (parseFloat(amount) > maximumAmount)) {
				alert("<?php echo JText::_('JD_MAXIMUM_AMOUNT_ALLOWED'); ?> : <?php echo $this->config->currency_symbol; ?>" + maximumAmount);
				<?php
						if ($this->config->display_amount_textbox) {
						?>
							form.amount.focus();
						<?php	
						}
					?>
				return ;
			}

			
			<?php
				if ($this->recurring) {
				?>
					if (form.donation_type[1].checked == true) {
						if (form.r_frequency.value =='') {
							msg = "<?php echo JText::_('JD_CHOOSE_DONATION_FREQUENCY');?>";
							alert(msg);
							return ;	
						}												
					}
					//Check to see whether
					<?php
						if ($this->config->show_r_times) {
						?>
							if (form.r_times.value != '') {
								if (!parseInt(form.r_times.value)) {
									alert("<?php echo JText::_('JD_ENTER_VALID_OCCURENCIES') ?>") ;
									form.r_times.focus();
									return ;
								}
								if (parseInt(form.r_times.value) < 2) {
									alert("<?php echo JText::_('JD_ENTER_VALID_OCCURENCIES') ?>") ;
									form.r_times.focus();
									return ;
								}
							}
						<?php	
						}
					?>					
				<?php	
				}
			?>							
			var paymentMethod = "";
			<?php				
				if (count($this->methods) > 1) {
				?>
					var paymentValid = false;
					for (var i = 0 ; i < form.payment_method.length; i++) {
						if (form.payment_method[i].checked == true) {
							paymentValid = true;
							paymentMethod = form.payment_method[i].value;
							break;
						}
					}
					
					if (!paymentValid) {
						alert("<?php echo JText::_('EB_REQUIRE_PAYMENT_OPTION'); ?>");
						return;
					}		
				<?php	
				} else {
				?>
					paymentMethod = "<?php echo $this->methods[0]->getName(); ?>";
				<?php	
				}												
				if ($this->customField)
					echo $this->validations ;												
			?>				
			method = methods.Find(paymentMethod);				
			//Check payment method page
			if (method.getCreditCard()) {
				if (form.x_card_num.value == "") {
					alert("<?php echo  JText::_('JD_ENTER_CARD_NUMBER'); ?>");
					form.x_card_num.focus();
					return;					
				}					
				if (form.x_card_code.value == "") {
					alert("<?php echo JText::_('JD_ENTER_CARD_CODE'); ?>");
					form.x_card_code.focus();
					return ;
				}
			}
			if (method.getCardHolderName()) {
				if (form.card_holder_name.value == '') {
					alert("<?php echo JText::_('JE_ENTER_CARD_HOLDER_NAME') ; ?>");
					form.card_holde_name.focus();
					return ;
				}
			}			
			/**This check is only used for echeck payment gateway**/			
			if (paymentMethod == 'os_echeck') {
				if (form.x_bank_aba_code.value == '') {
					alert("<?php echo JText::_('JD_BANK_ROUTING_NUMBER_REQUIRE') ?>");
					form.x_bank_aba_code.focus();
					return ;
				}				
				if (form.x_bank_acct_num.value == '') {
					alert("<?php echo JText::_('JD_BANK_ACCOUNT_NUMBER_REQUIRE') ?>");
					form.x_bank_aba_code.focus();
					return ;
				}				
				if (form.x_bank_name.value == '') {
					alert("<?php echo JText::_('JD_BANK_NAME_REQUIRE') ?>");
					form.x_bank_name.focus();
					return ;		
				}				
				if (form.x_bank_acct_name.value == '') {
					alert("<?php echo JText::_('JD_BANK_ACCOUNT_HOLDER_NAME_REQUIRE') ?>");
					form.x_bank_acct_name.focus();
					return ;
				}				
			}				
			//Term and condition
			<?php
				if ($this->config->s_comment && $this->config->r_comment) {
				?>
					if (form.comment.value == "") {
						alert("<?php echo JText::_('JD_REQUIRE_COMMENT'); ?>");
						form.comment.focus();
						return;
					}						
				<?php	
				}
				if ($this->config->accept_term) {
				?>
					if (form.accept_term.checked == false) {
						alert("<?php echo JText::_('JD_ACCEPT_TERM') ; ?>");
						form.accept_term.focus();
						return ;
					}
				<?php	
				} 		
				if ($this->config->bypass_confirmation_page) {
					if ($this->recurring) {
					?>
						if (form.donation_type[1].checked == true) 
							form.task.value = "process_recurring_donation" ;
						else 
							form.task.value = "process_donation" ;
					<?php	
					} else {
					?>
						form.task.value = "process_donation" ;
					<?php	
					}		
				} else {
					if ($this->recurring) {
					?>
						if (form.donation_type[1].checked == true) 
							form.layout.value = "recurring" ;	
					<?php	
					}					
				}								
				if (!$this->userId) {
					if ($this->config->registration_integration == 2) {
					?>
						var username = form.username.value ;
						var email = form.email.value ;
						url = 'index.php?option=com_jdonation&task=check_registration&username=' + username + '&email=' + email ;			
						jx.load(url ,function(data){				
							if (data == 1) {
								alert("<?php echo JText::_('JD_USERNAME_USED');  ?>");
								form.username.focus();
								return ;															
							} else if (data == 2) {
								alert("<?php echo JText::_('JD_EMAIL_USED');  ?>");
								form.username.focus();
								return ;
							} else {
								form.submit();
							}
						});						
					<?php	
					} elseif ($this->config->registration_integration == 1) {
					?>
						if (form.username.value != '') {							
							var username = form.username.value ;
							var email = form.email.value ;
							url = 'index.php?option=com_jdonation&task=check_registration&username=' + username + '&email=' + email ;			
							jx.load(url ,function(data){				
								if (data == 1) {
									alert("<?php echo JText::_('JD_USERNAME_USED');  ?>");
									form.username.focus();
									return ;															
								} else if (data == 2) {
									alert("<?php echo JText::_('JD_EMAIL_USED');  ?>");
									form.username.focus();
									return ;
								} else {
									form.submit();
								}
							});		
						} else {
							form.submit();
						}
					<?php	
					} else {
					?>
						form.submit();
					<?php
					}
				} else {
				?>
					form.submit();
				<?php	
				}
			?>																					
		}												
		function checkNumber(txtName)
		{			
			var num = txtName.value			
			if(isNaN(num))			
			{			
				alert("<?php echo JText::_('JD_ONLY_NUMBER'); ?>");			
				txtName.value = "";			
				txtName.focus();			
			}			
		}

		
		function changeDonationType() {
			var form = document.os_form ;
			var trFrequecy = document.getElementById('tr_frequency');
			var trNumberDonatons = document.getElementById('tr_number_donations');								
			if (form.donation_type[0].checked == true) {
				trFrequecy.style.display = 'none' ;
				if (trNumberDonatons)
					trNumberDonatons.style.display = 'none' ;
			} else {
				trFrequecy.style.display = '' ;
				if (trNumberDonatons)
					trNumberDonatons.style.display = '' ;
			}	
		}	
		
		function deSelectRadio() {
			var form = document.os_form ;
			form.amount.value = form.amount.value.replace(',', '') ;
			if (parseFloat(form.amount.value)) {
				if(form.rd_amount) {
					<?php
						if ($this->config->amounts_format ==1) {
						?>
							if (form.rd_amount.length) {
								for(var i =0 ; i < form.rd_amount.length ; i++) {
									form.rd_amount[i].checked = false ;
								}
							} else {
								form.rd_amount.checked = false ;
							}	
						<?php	
						} else {
						?>
							form.rd_amount.selectedIndex = 0 ;
						<?php	
						}
					?>						
				}	
			} else {
				form.amount.value = '';
			}
		}

		function clearTextbox() {
			var form = document.os_form ;
			if (form.amount)
				form.amount.value = '';	
		}		
				
		function displayRecurring(show) {	
			var form = document.os_form ;		
			var trDonationType = document.getElementById('donation_type') ;
			if (!trDonationType)  
				return ;			
			var trFrequency = document.getElementById('tr_frequency');
			var trNumberDonations = document.getElementById('tr_number_donations') ;
			if (show) {
				trDonationType.style.display = '';
				if (form.donation_type[1].checked) {
					trFrequency.style.display = '';
					if (trNumberDonations) {
						trNumberDonations.style.display = '';
					}
				}				
			} else {
				trDonationType.style.display = 'none';
				trFrequency.style.display = 'none';
				if (trNumberDonations) {
					trNumberDonations.style.display = 'none';
				}
			}			
		}

		
		function checkCampaignRecurring() {					
			var form = document.os_form ;
			var show = 1 ;
			var paymentMethod = "";
			<?php				
				if (count($this->methods) > 1) {
				?>
					var paymentValid = false;
					for (var i = 0 ; i < form.payment_method.length; i++) {
						if (form.payment_method[i].checked == true) {
							paymentValid = true;
							paymentMethod = form.payment_method[i].value;
							break;
						}
					}
					
					if (!paymentValid) {
						alert("<?php echo JText::_('EB_REQUIRE_PAYMENT_OPTION'); ?>");
						return;
					}		
				<?php	
				} else {
				?>
					paymentMethod = "<?php echo $this->methods[0]->getName(); ?>";
				<?php	
				}
			?>	
			method = methods.Find(paymentMethod);
			if (!method.getEnableRecurring()) {
				show = 0 ;
			} else {
				if (form.campaign_id.value > 0)
					show = recurrings [form.campaign_id.value] ;
			}							
			displayRecurring(show);
		}
					
		function updateAmount() {
			var form = document.os_form ;
			var campaignId = form.campaign_id.value ;

			//Check to enable and disable recurring
			var show = 1 ;
			if (campaignId)
				show = recurrings [campaignId] ;		
			displayRecurring(show);						
			<?php
				if ($this->config->amount_by_campaign) {
				?>
					if (campaignId) {
						var divId = 'campaign_' + campaignId ;
						var div = document.getElementById(divId);
						var amountContainer =  document.getElementById('amount_container') ;
						amountContainer.innerHTML = div.innerHTML ;								
					}	
				<?php	
				}			
				if ($this->config->field_campaign) {
				?>
					var allFields = fields[0] ;
					if (allFields) {
						for (var i = 0 ; i < allFields.length ; i++) {						
							if (allFields[i]) {
								var trId = allFields[i] + '_' + '0' ;													
								document.getElementById(trId).style.display = '';
							}													
						}							
					}	
					if(currentCampaign) {
						var oldFields = fields[currentCampaign];
						//Hide the old fields					
						if (oldFields) {
							for (var i = 0 ; i < oldFields.length ; i++) {						
								if (oldFields[i]) {
									var trId = oldFields[i] + '_' + currentCampaign ;												
									document.getElementById(trId).style.display = 'none';
								}													
							}		
						}	
					}																		
					var newFields = fields[campaignId];
					if (newFields) {
						for (var i = 0 ; i < newFields.length ; i++) {						
							if (newFields[i]) {
								var trId = newFields[i] + '_' + campaignId ;												
								document.getElementById(trId).style.display = '';
							}								
						}
					}													
					currentCampaign = campaignId ;
				<?php	  	
				}
			?>			
		}
		function updateStateList() {
			var form = document.os_form ;
			//First of all, we need to empty the state dropdown
			var list = form.state ;

			// empty the list
			for (i = 1 ; i < list.options.length ; i++) {
				list.options[i] = null;
			}
			list.length = 1 ;
			var i = 0;
			//Get the country index
			var country = form.country.value ;			
			if (country != '') {
				//Find index of the country
				for (var i = 0 ; i < countryNames.length ; i++) {
					if (countryNames[i] == country) {						
						break ;
					}
				}
				//We will find the states
				var countryId = countryIds[i] ;				
				var stateNames = stateList[countryId]; ;
				if (stateNames) {
					var arrStates = stateNames.split(',');
					i = 1 ;
					var state = '';
					var stateName = '' ;
					for (var j = 0 ; j < arrStates.length ; j++) {
						state = arrStates[j] ;
						stateName = state.split(':');
						opt = new Option();
						opt.value = stateName[0];
						opt.text = stateName[1];
						list.options[i++] = opt;
					}
					list.lenght = i ;
				}								
			}					
		}
		
	</script>	
</form>

<?php	
	if ($this->config->amount_by_campaign) {		
		$rowCampaigns  = $this->rowCampaigns ;		
		for ($j = 0 , $m = count($rowCampaigns) ; $j < $m ; $j++) {
			$rowCampaign = $rowCampaigns[$j] ;
			?>
				<div id="campaign_<?php echo $rowCampaign->id; ?>" style="display: none;">
				<?php											
				$explanations = explode("\r\n", $rowCampaign->amounts_explanation) ;						
				$amounts = explode("\r\n", $rowCampaign->amounts);																											
				if ($this->config->amounts_format == 1) {
					for ($i = 0 , $n = count($amounts) ; $i < $n ; $i++) {
						$amount = (float)$amounts[$i] ;
						if ($amount == $this->rdAmount) {
							$checked = ' checked="checked" ' ;
						} else {
							$checked = '' ;
						}
					?>
						<input type="radio" id="rd_amount" name="rd_amount" class="form-control" value="<?php echo $amount; ?>" <?php echo $checked ; ?> onclick="clearTextbox();" /><?php echo ' '.$this->config->currency_symbol.number_format($amount, 2) ;?>
						<?php
							if (isset($explanations[$i]) && $explanations[$i])
								echo '   <span class="amount_explaination">[ '.$explanations[$i].' ]</span>  ' ;
						?>						
						<br />
					<?php		
					}
				} else {
					$options = array() ;
					$options[] = JHTML::_('select.option', 0, JText::_('Donation Amount')) ;
					for ($i = 0 , $n = count($amounts) ; $i < $n ; $i++) {
						$amount = (float)$amounts[$i] ;						
						if (isset($explanations[$i]) && $explanations[$i]) {
							$options[] = JHTML::_('select.option', $amount, number_format($amount, 2)." [$explanations[$i]]") ;
						} else {
							$options[] = JHTML::_('select.option', $amount, number_format($amount,2)) ;
						}								
					}	
					echo  $this->config->currency_symbol.'  '.JHTML::_('select.genericlist', $options, 'rd_amount', ' class="form-control" onchange="clearTextbox();" ', 'value', 'text', $this->rdAmount).'<br /><br />';	
				}																									
				if ($this->config->display_amount_textbox) {
					echo $this->config->currency_symbol.'  '; ?><input type="text" class="form-control" id="amount" name="amount" value="<?php echo $this->amount;?>" onchange="deSelectRadio();" size="10" />
				<?php		
				}
			?>
			</div>
			<?php										
		}
	}
?>
