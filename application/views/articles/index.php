<h1> ARTICLES </h1>
<?php echo $this->pagination->create_links(); ?>
<?php foreach ($news as $article_item): ?>


    <div id="article"> 
        <h2><?php echo $article_item['title'] ?></h2>
        <div id="main">
            <?php echo $article_item['text'] ?>
        </div>
        <p><a href="<?php echo base_url(), "index.php/frontend/article/articles/", $article_item['slug'] ?>">View article</a></p>
    </div>



<?php endforeach ?>
