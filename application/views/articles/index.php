<?php foreach ($news as $article_item): ?>

    <h2><?php echo $article_item['title'] ?></h2>
    <div id="main">
        <?php echo $article_item['text'] ?>
    </div>
    <p><a href="<?php echo base_url(),"index.php/frontend/article/articles/", $article_item['slug'] ?>">View article</a></p>
    
    


<?php endforeach ?>
<?=$this->pagination->create_links();?>