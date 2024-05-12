
<h2 class="text-center mt-5"><?= esc($title) ?></h2  >

<?php if ($post_list !== []): ?>

<?php foreach ($post_list as $post_item): ?>

    <p class="font-weight-light">On <?= esc($post_item['created_at']) ?>, <?= esc($post_item['email']) ?> said </p>
    <?php  
        if (esc($post_item['image_path']) !== "")
            echo '<img src= "'.esc($post_item['image_path']).'"width="400" height="300"><br />'
    ?>
    <h3>
        <?= esc($post_item['content']) ?>
        
    </h3>
    <h4>
        <?php
            if ($post_item['tags'] !== "") {
                $tags = preg_split('/[\ \n\,]+/', $post_item['tags']);
                for($tag_index = 1; $tag_index <= count($tags); $tag_index++) { 
                    echo '<span class="badge badge-pill bg-secondary">#'.$tags[$tag_index-1].'</span>  ';
                } 
            }
        ?>
    </h4>
    <hr/>
<?php endforeach ?>

<?php else: ?>

<h3>No Posts now</h3>

<p>Create one yourself?</p>

<?php endif ?>
