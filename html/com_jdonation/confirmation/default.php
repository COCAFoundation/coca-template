<?php
/**
 * @version		3.0
 * @package		Joomla
 * @subpackage	Joom Donation
 * @author  Tuan Pham Ngoc
 * @copyright	Copyright (C) 2010 Ossolution Team
 * @license		GNU/GPL, see LICENSE.php
 */
// no direct access
defined( '_JEXEC' ) or die ;   
if ($this->config->use_https) {
    $url = JRoute::_('index.php?option=com_jdonation&Itemid='.$this->Itemid, false, true);
} else {
    $url = JRoute::_('index.php?option=com_jdonation&Itemid='.$this->Itemid, false);
}
?>
<h1 class="title"><?php echo JText::_('JD_CONFIRMATION'); ?></h1>

<?php if ($this->config->confirmation_message) { ?>
	<p><?php echo $this->config->confirmation_message;?></p>
<?php }	?>	
    
<form method="post" name="jd_form" role="form" id="jd_form" class="form-horizontal" action="<?php echo $url ; ?>">
	
<fieldset>
<legend><?php echo JText::_('JD_DONOR_INFO') ; ?></legend>

	<?php if ($this->config->use_campaign) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo JText::_('JD_CAMPAIGN');?></label>
            <div class="col-xs-4">
				<?php echo $this->campaign; ?>
            </div>
        </div>    
	<?php }?>



	<?php if ($this->username) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo JText::_('JD_USERNAME'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->username; ?>
            </div>
        </div>  
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo JText::_('JD_PASSWORD'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->showedPassword ; ?>
            </div>
        </div>          
 		<div class="form-group">
	<?php }?>
    
 

		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_FIRST_NAME') ?></label>
            <div class="col-xs-4">
				<?php echo $this->firstName; ?>
            </div>
        </div>    
    
    
	<?php if ($this->config->s_lastname) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_LAST_NAME') ?></label>
            <div class="col-xs-4">
				<?php echo $this->lastName; ?>
            </div>
        </div>    
	<?php }?>    
    
 
 
	<?php if ($this->config->s_organization) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_ORGANIZATION'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->organization; ?>
            </div>
        </div>    
	<?php }?>  
    
    
	<?php if ($this->config->s_address) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_ADDRESS'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->address; ?>
            </div>
        </div>    
	<?php }?>   
    
    
	<?php if ($this->config->s_address2) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_ADDRESS2'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->address2; ?>
            </div>
        </div>    
	<?php }?>        
    
    
	<?php if ($this->config->s_city) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_CITY'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->city; ?>
            </div>
        </div>    
	<?php }?>      
    
    
	<?php if ($this->config->s_state) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_STATE'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->state; ?>
            </div>
        </div>    
	<?php }?>      
    
    
	<?php if ($this->config->s_zip) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_ZIP'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->zip; ?>
            </div>
        </div>    
	<?php }?> 
    
    
	<?php if ($this->config->s_country) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_COUNTRY'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->country; ?>
            </div>
        </div>    
	<?php }?>     
     
    
	<?php if ($this->config->s_phone) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_PHONE'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->phone; ?>
            </div>
        </div>    
	<?php }?> 
     
    
	<?php if ($this->config->s_fax) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_FAX'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->fax; ?>
            </div>
        </div>    
	<?php }?>     
     
    
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_EMAIL'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->email; ?>
            </div>
        </div>       
           
    
	<?php if ($this->config->enable_hide_donor) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_HIDE_DONOR'); ?></label>
            <div class="col-xs-4">
				<?php echo ($this->hideMe ? JText::_('JD_YES') : JText::_('JD_NO'));?>
            </div>
        </div>    
	<?php }?> 
     
    
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo JText::_('JD_DONATION_AMOUNT'); ?></label>
            <div class="col-xs-4">
				<?php
					if ($this->config->convenience_fee && ($this->payPaymentGatewayFee != 0)) {
						echo $this->config->currency_symbol.number_format($this->showedAmount + $this->showedAmount*$this->config->convenience_fee/100, 2).JText::sprintf('JD_COMMISION_FEE', $this->config->convenience_fee);
					} else {
						echo $this->config->currency_symbol.number_format($this->showedAmount, 2);
					}
				?>
            </div>
        </div> 
             
 		
        <div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_PAYMEMNT_METHOD'); ?></label>
            <div class="col-xs-4">
				<?php echo JText::_($this->method->getTitle()); ?>
            </div>
        </div> 
        
 	<?php $method = $this->method; ?>
            
    
	<?php if ($method->getCreditCard()) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('AUTH_CARD_NUMBER'); ?></label>
            <div class="col-xs-4">
				<?php
					$len = strlen($this->x_card_num) ;
					$remaining =  substr($this->x_card_num, $len - 4 , 4) ;
					echo str_pad($remaining, $len, '*', STR_PAD_LEFT) ;
				?>	
            </div>
        </div> 
        
          
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('AUTH_CARD_EXPIRY_DATE'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->expMonth .'/'.$this->expYear ; ?>	
            </div>
        </div>
        
                 
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('AUTH_CVV_CODE'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->x_card_code ; ?>	
            </div>
        </div>          
        
                   
        <?php if ($method->getCardType()){?>
            <div class="form-group">
                <label class="control-label col-sm-3"><?php echo JText::_('JD_CARD_TYPE'); ?></label>
                <div class="col-xs-4">
                    <?php echo $this->cardType ; ?>
                </div>
            </div>          
        <?php }?>
         
	<?php }?>    
           
    
	<?php if ($method->getCardHolderName()) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_CARD_HOLDER_NAME'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->cardHolderName;?>
            </div>
        </div>    
	<?php }?>     
           
    
	<?php if ($this->paymentMethod == 'os_echeck') {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_BANK_ROUTING_NUMBER'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->x_bank_aba_code;?>
            </div>
        </div>    
	
    
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_BANK_ACCOUNT_NUMBER'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->x_bank_acct_num;?>
            </div>
        </div> 
        

		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_BANK_ACCOUNT_TYPE'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->x_bank_acct_type;?>
            </div>
        </div>  
        

		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_BANK_NAME'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->x_bank_name;?>
            </div>
        </div> 
        

		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_ACCOUNT_HOLDER_NAME'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->x_bank_acct_name;?>
            </div>
        </div>
                                   
	<?php }?>     
    
 
	<?php echo ($this->customField ? $this->confirmation : ''); ?>			
           
    
	<?php if ($this->config->s_comment) {?>
		<div class="form-group">
            <label class="control-label col-sm-3"><?php echo  JText::_('JD_COMMENT'); ?></label>
            <div class="col-xs-4">
				<?php echo $this->comment; ?>
            </div>
        </div>    
	<?php }?>   
            
    
	<?php if ($this->config->enable_captcha) {?>
		<div class="form-group">
            <label for="security_code" required="required" class="control-label col-sm-3"><?php echo JText::_('JD_CAPTCHA'); ?></label>
            <div class="col-xs-4">
                <input type="text" id="security_code" class="inputbox" value="" size="8" name="security_code" />
                <img src="<?php echo JRoute::_('index.php?option=com_jdonation&task=show_captcha_image'); ?>" title="<?php echo JText::_('JD_CAPTCHA_GUIDE'); ?>" align="middle" id="captcha_image" />
                <a href="javascript:reloadCaptcha();"><strong><?php echo JText::_('JD_RELOAD'); ?></strong></a>
                <?php if ($this->captchaInvalid) {?>
                	<span class="error"><?php echo JText::_('JD_INVALID_CAPTCHA_ENTERED'); ?></span>
                <?php }?>	
            </div>
        </div>    
	<?php }?>  
	<input type="button" class="btn" name="btnBack" value="<?php echo  JText::_('JD_BACK') ;?>" onclick="goBack();" />
	<input type="button" class="btn" name="btnSubmit" value="<?php echo  JText::_('JD_PROCESS_DONATION') ;?>" onclick="processDonation();" />
    
    
    <input type="hidden" name="Itemid" value="<?php echo $this->Itemid; ?>" />
	<input type="hidden" name="option" value="com_jdonation" />
	<input type="hidden" name="view" value="" />
	<input type="hidden" name="task" value="process_donation" />
	<input type="hidden" name="donation_type" value="onetime" />
	<input type="hidden" name="layout" value="default">
	<input type="hidden" name="id" value="<?php echo JRequest::getInt('article_id'); ?>" />          
</fieldset>
																				

	<script type="text/javascript">
		function goBack() {
			var form = document.jd_form;
			if (form.id.value > 0) {
				form.option.value = 'com_content' ;
				form.view.value = 'article' ;								
			} else {
				form.task.value = '';
				form.id.value = 0 ;
				form.view.value = 'donation';				
			}					
			form.submit();
		}
		function processDonation() {
			var form = document.jd_form;
			<?php
				if ($this->config->enable_captcha) {
				?>	
					if (form.security_code.value == '') {
						alert("<?php echo JText::_("JD_ENTER_CAPTCHA"); ?>");
						form.security_code.focus() ;
						return ;	
					}
				<?php
				}
			?>
			form.id.value = 0 ;
			form.submit();
		}		
		function reloadCaptcha() {									
			document.getElementById('captcha_image').src = 'index.php?option=com_jdonation&task=show_captcha_image&ran=' + Math.random();			
		}
	</script>	
	<!--  Hidden fields -->		
	<input type="hidden" name="username" value="<?php echo $this->username; ?>" />
	<input type="hidden" name="password" value="<?php echo $this->password; ?>" />
	<input type="hidden" name="password2" value="<?php echo $this->password; ?>" />
	<input type="hidden" name="first_name" value="<?php echo $this->firstName; ?>" />
	<input type="hidden" name="last_name" value="<?php echo $this->lastName; ?>" />
	<input type="hidden" name="organization" value="<?php echo $this->organization; ?>" />
	<input type="hidden" name="address" value="<?php echo $this->address; ?>" />
	<input type="hidden" name="address2" value="<?php echo $this->address2; ?>" />
	<input type="hidden" name="city" value="<?php echo $this->city; ?>" />
	<input type="hidden" name="state" value="<?php echo $this->state; ?>" />
	<input type="hidden" name="zip" value="<?php echo $this->zip; ?>" />
	<input type="hidden" name="country" value="<?php echo $this->country; ?>" />	
	<input type="hidden" name="phone" value="<?php echo $this->phone; ?>" />	
	<input type="hidden" name="fax" value="<?php echo $this->fax; ?>" />	
	<input type="hidden" name="email" value="<?php echo $this->email; ?>" />
	<input type="hidden" name="hide_me" value="<?php echo $this->hideMe; ?>" />	
	<input type="hidden" name="comment" value="<?php echo $this->comment; ?>" />
	<input type="hidden" name="amount" value="<?php echo $this->amount; ?>" />	
	<input type="hidden" name="rd_amount" value="<?php echo $this->rdAmount; ?>" />	
	<input type="hidden" name="payment_method" value="<?php echo $this->paymentMethod; ?>" />
	<input type="hidden" name="x_card_num" value="<?php echo $this->x_card_num; ?>" />		
	<input type="hidden" name="x_exp_date" value="<?php echo $this->x_exp_date; ?>" />		
	<input type="hidden" name="x_card_code" value="<?php echo $this->x_card_code; ?>" />	
	<input type="hidden" name="receive_user_id" value="<?php echo $this->receiveUserId; ?>" />
	<input type="hidden" name="exp_month" value="<?php echo $this->expMonth; ?>" />	
	<input type="hidden" name="exp_year" value="<?php echo $this->expYear; ?>" />
	<input type="hidden" name="card_type" value="<?php echo $this->cardType ; ?>" />
	<input type="hidden" name="currency_code" value="<?php echo $this->currencyCode; ?>" />
	<input type="hidden" name="pay_payment_gateway_fee" value="<?php echo $this->payPaymentGatewayFee; ?>" />
	<input type="hidden" name="r_times" value="<?php echo $this->rTimes; ?>" />
	<input type="hidden" name="card_holder_name" value="<?php echo $this->cardHolderName; ?>" />
	
	<input type="hidden" name="x_bank_aba_code" value="<?php echo $this->x_bank_aba_code;  ?>" />	
	<input type="hidden" name="x_bank_acct_num" value="<?php echo $this->x_bank_acct_num;  ?>" />	
	<input type="hidden" name="x_bank_acct_type" value="<?php echo $this->x_bank_acct_type;  ?>" />	
	<input type="hidden" name="x_bank_name" value="<?php echo $this->x_bank_name;  ?>" />	
	<input type="hidden" name="x_bank_acct_name" value="<?php echo $this->x_bank_acct_name;  ?>" />	
		
	<?php if ($this->config->use_campaign) {?>
			<input type="hidden" name="campaign_id" value="<?php echo $this->campaignId; ?>" />
	<?php }?>
    
    <?php if ($this->customField) { echo $this->hidden ;}?>	
    
	<?php echo JHTML::_( 'form.token' ); ?>	
</form>