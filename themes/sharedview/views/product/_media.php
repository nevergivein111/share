<ul class="underlinemenu" id="mediaMenu">
    <li data-scroll="video" class="active">
      <a href="#video"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/ico_video.png" alt="Video" /> Video </a>
    </li>
    <li data-scroll="tour">
    	<a href="#tour"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/ico_compass.png" alt="Tour" /> Tour </a>
    </li>
    <li data-scroll="image">
    	<a href="#image"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/ico_image_gallery.png" alt="Image Gallery" /> Image </a>
    </li>
    <li data-scroll="cnet">
    	<a href="#cnet"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/ico_cnet.png" alt="CNET Review" /> CNET Review </a>
    </li>
</ul>

<div class="contentContainer">
    <div id="video" class="mediaBlock" data-anchor="video">
        <h1>Video</h1>
        
        <iframe width="725" height="400" src="http://www.youtube.com/embed/HP6fILMHbCs?rel=0" frameborder="0" allowfullscreen></iframe>
    
    </div>
    
    <div id="tour" class="mediaBlock" data-anchor="tour">
    
        <h1> Tour</h1>
        <div class="mediaImg">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/tour1.jpg" alt="tour" />
        </div>
        
        <div class="mediaImg">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/tour2.jpg" alt="tour" />
        </div>
        
        <div class="mediaImg">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/tour3.jpg" alt="tour" />
        </div>
        
        <div class="mediaImg">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/tour4.jpg" alt="tour" />
        </div>
        
        <div class="mediaImg">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/tour5.jpg" alt="tour" />
        </div>
    </div>
    
    <div id="image" class="mediaBlock" data-anchor="image">
        <h1>Gallery</h1>
        <div class="mediaImg">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/image1.jpg" alt="Image" />
        </div>
        
    </div>
    
    <div id="cnet" class="mediaBlock" data-anchor="cnet">
        <h1>CNET Review</h1>
        
        <iframe width="725" height="400" src="http://www.youtube.com/embed/yRNWC3lE6Vs?rel=0" frameborder="0" allowfullscreen></iframe>
        <div id="mediaContent">
            <p><span class="mediaProTitle">The good</span> : The <span class="blackhightlight">Acer Aspire S7</span> has the same great design we loved last year,but the S7-392-6411 has a more battery-friendly Intel Haswell CPU.</p>
            
            <p><span class="mediaProTitle">The bad</span> : The touch pad and keyboard still don't rate for a $1,400-and-up laptop,and other highend ultrabooks cost less.</p>
            
            <p><span class="mediaProTitle">The bottom line</span> : The Acer Aspire S7, a Window 8 laumch favourite that holds up nicely, gets a needed update to the latest CPUs for better battery life.</p>
            
            <a href="javascript:void(0);">Go to full review</a>
        </div>
    </div>
</div>