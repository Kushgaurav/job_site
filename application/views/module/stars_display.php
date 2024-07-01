<div class="dd_review_rating">  
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $rat; ?></p>               
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <ul>
    	<li><span <?php if($rat==1 || $rat>1 ) { ?> class="star active" <?php  } else { ?> class="star" <?php } ?>  ></span></li>
    	<li><span <?php if($rat==2 || $rat>2 ) { ?> class="star active" <?php  } else { ?> class="star" <?php } ?>></span></li>
    	<li><span <?php if($rat==3 || $rat>3 ) { ?> class="star active" <?php  } else { ?> class="star" <?php } ?>></span></li>
    	<li><span <?php if($rat==4 || $rat>4 ) { ?> class="star active" <?php  } else { ?> class="star" <?php } ?>></span></li>
    	<li><span <?php if($rat==5 || $rat>5 ) { ?> class="star active" <?php  } else { ?> class="star" <?php } ?>></span></li>
   </ul>
</div>