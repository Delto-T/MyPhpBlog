<div class="card col-lg-4 col-md-6 col-sm-12 p-3">
    <img src="<?=$article['imageLink']?>" alt="<?=$article['imageAlt']?>" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title"><?=$article['title']?></h5>
        <h6 class="card-subtitle text-muted"><?=$article['author']?></h6>
        <p class="card-text mt-3"><?=$article['summary']?></p>
    </div>

    <div class="card-footer">
        <a href="index.php?page=article&id=<?=$article['id']?>" class="card-link btn btn-outline-danger w-100">Article</a>
    </div>
</div>