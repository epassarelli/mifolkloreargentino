
<div class="panel panel-default">
  <div class="panel-body">
	<div class="text-right">

	<?php
		$search  	= array(':', '/', 'C', 'D', 'E');
		$replace 	= array('%3A', '%2F', 'D', 'E', 'F');
		$share 		= str_replace($search, $replace, current_url());
		$title 		= $title;
	?>

	<b>Compartir en: </b>
	
	<a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $share;?>" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-facebook']);this.href, 'weeklywin', 'left=50,top=50,width=600,height=360,toolbar=0'); return false; ">
	<span class="fa fa-facebook"></span></a>

	<a class="btn btn-social-icon btn-google" href="http://plus.google.com/share?url=<?php echo $share;?>" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-google']);this.href, 'weeklywin', 'left=50,top=50,width=600,height=360,toolbar=0'); return false; "><span class="fa fa-google"></span></a>
	
	<a class="btn btn-social-icon btn-instagram" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-instagram']); this.href, 'weeklywin', 'left=50,top=50,width=600,height=360,toolbar=0'); return false; ">
	<span class="fa fa-instagram"></span></a>
	
	<a class="btn btn-social-icon btn-twitter" href="https://twitter.com/intent/tweet?text=<?php echo $title;?>&amp;url=<?php echo $share;?>" onclick="window.open(_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-twitter']);this.href, 'weeklywin', 'left=50,top=50,width=600,height=360,toolbar=0'); return false; ">
	<span class="fa fa-twitter"></span></a>

	</div>

	</div>
</div>

