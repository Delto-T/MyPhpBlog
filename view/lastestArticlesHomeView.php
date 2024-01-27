
<div class="row mt-4 h-100">
	<?php while($article = $requeteGetThreeLastestArticles->fetch()) {

		require('displayCardArticleView.php');
		
	} ?>
</div>
