<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
		<title><?php echo CHtml::encode($this->pageTitle);?></title>
                
		<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl;?>/img/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/fonts/fonts.css" media="all">
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap.css" media="all">
                <!--<link rel="stylesheet" href="<?php //echo Yii::app()->theme->baseUrl;?>/css/overwrite.css" media="all">-->
		<!--<link rel="stylesheet" href="<?php //echo Yii::app()->theme->baseUrl;?>/css/style.css" media="all">-->
         
         <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/style_our.css" media="all"> 
         <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/plugin/css/jquery.rating.css" rel="stylesheet"> 
         <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/jquery.spellchecker.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/jquery-ui.css" rel="stylesheet">   
		
		<!--<link rel="stylesheet" href="<?php //echo Yii::app()->theme->baseUrl;?>/css/desktop.css" media="all">-->		
		<!--<link rel="stylesheet" href="<?php //echo Yii::app()->theme->baseUrl;?>/css/selectbox.css" media="all">-->        
		<!--<link rel="stylesheet" href="<?php //echo Yii::app()->theme->baseUrl;?>/css/profilePopup.css" rel="stylesheet">-->		
		<!--<link rel="stylesheet" href="<?php //echo Yii::app()->theme->baseUrl;?>/css/starrate.css" rel="stylesheet">-->
                <!--<link rel="stylesheet" href="<?php //echo Yii::app()->theme->baseUrl;?>/css/style_header.css" rel="stylesheet">-->
                
		<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
                <!--<script src="<?php //echo Yii::app()->theme->baseUrl;?>/js/jquery.js"></script>-->
                <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery-ui.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery-ui-1.8.14.custom.min.js"></script>
              
		<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap.js"></script>
                <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/plugins.js"></script>
                <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/slider.js"></script>
                <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/html5shiv-printshiv.js"></script>
                <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/html5shiv.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/custom_checkbox.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.selectbox-0.2.min.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/plugin/js/jquery.rating.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.slimscroll.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/script.js"></script>

		<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/review_comment.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/following.js"></script>
                
		
		<!--[if gte IE 9]>
		  <style type="text/css">
			.gradient {filter: none;}
		  </style>
		<![endif]-->
		<!--[if lte IE 8]>
		   <script src="js/html5.js"></script>
	   <![endif]-->
	</head>
	<script>
		$(document).ready(function(){
			$('.isGuest').live('click',function(){
				$('#register_model_holder').modal('show');
				$('#register_model_holder').data('modal').options.backdrop = true;
				
				$(".profileSummaryModal").css("top","20%");
				$("#register_holder").hide();
				$("#login_holder").show();
				$('#popup_holder_header').text('Log In with shareview.com');
				return false;
			});
			$('.reg_link').live('click',function(){
				$('#register_model_holder').modal('show');
				return false;
			});
		})
	</script>
	<body>
		<?php echo $this->renderPartial('//layouts/_header');?>
		<!--<div class="container contentArea fixContainer">--> <div class="" id="container">
			<?php $this->widget('application.components.widgets.notConfirmEmailMessage.Box');?>
			<div class="wrapper">
                            
				<?php echo $content;?>
                           
                            
			</div>
		</div>
              
		<?php if(Yii::app()->user->isGuest && Yii::app()->controller->id != 'reviewProduct'):?>
		<?php $this->renderPartial("//account/shared/register_popup", array("user" => new User, 'login' => new LoginForm)) ?>
		<?php endif;?>
	</body>
</html>
