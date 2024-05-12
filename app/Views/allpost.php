            <h2 class="text-center mt-5"><?= esc($title) ?></h2  >

            <?php if ($post_list !== null): ?>

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

            <nav aria-label="...">
            <ul class="pagination">
                
                <?php
                    if ($current == 1)
                        echo '<li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>';
                    else
                        echo '<li class="page-item">
                        <a class="page-link" href="/newpost/'. $page-1 .'" tabindex="-1">Previous</a>
                        </li>';

                    for($page = 1; $page<= $number_of_page; $page++) {  
                        if ($page == $current)
                            echo '<li class="page-item active">
                            <a class="page-link" href="#">'. $page .' <span class="sr-only">(current)</span></a>
                            </li>';
                        else
                            echo '<li class="page-item"><a class="page-link" href="newpost/'. $page .'">' . $page . '</a></li>';
                    } 

                    if ($current == $number_of_page)
                        echo '<li class="page-item disabled">
                        <a class="page-link" href="#">Next</a>
                        </li>';
                    else
                        echo '<li class="page-item">
                        <a class="page-link" href="/newpost/'. $page+1 .'" tabindex="-1">Previous</a>
                        </li>';
                ?> 
            </ul>
            </nav>
            
            <?php else: ?>

            <h3>No Posts now</h3>

            <p>Create one yourself?</p>

            <?php endif ?>
