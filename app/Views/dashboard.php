
            <h2 class="text-center mt-5"><?= esc($title) ?></h2  >

            <?php if ($post_list !== []): ?>

            <?php foreach ($post_list as $post_item): ?>

                <h3>On <?= esc($post_item['created_at']) ?>, <?= esc($post_item['email']) ?> said </h3>
                <?php  
                    if (esc($post_item['image_path']) !== "")
                        echo '<img src= "'.esc($post_item['image_path']).'"width="400" height="300"><br />'
                ?>
                <div class="main">
                    <?= esc($post_item['content']) ?>
                </div>

            <?php endforeach ?>

            <?php else: ?>

            <h3>No Posts now</h3>

            <p>Create one yourself?</p>

            <?php endif ?>
