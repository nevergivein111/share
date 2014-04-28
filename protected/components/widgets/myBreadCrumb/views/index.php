<?php

    $link_count = count($this->data);
    $k = 1;
    foreach($this->data as $label => $link){
            $class = ($k == $link_count)?'active_breadcrumb':'';
            if($k != $link_count){
                    echo CHtml::link($label,$link,array('class'=>$class));
                    echo $ampersand;
            }
            else{
                    echo '<span class="active_breadcrumb">'.$label.'</span>';
            }

            $k++;
    }

?>