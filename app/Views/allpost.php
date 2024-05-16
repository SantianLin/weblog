<h2 class="text-center mt-5"><?= esc($title) ?></h2  >

<?php if ($post_list !== null): ?>

<?php foreach ($post_list as $post_item): ?>
    
    <p class="font-weight-light">On <?= esc($post_item['created_at']) ?>, <?= esc($post_item['email']) ?> said </p>
    <?php  
        if (esc($post_item['image_path']) !== "")
            echo '<img src= "'.base_url(esc($post_item['image_path'])).'"width="400" height="300"><br />'
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

<nav aria-label="...">
<ul class="pagination">
    
    <?php
        if ($current == 1)
            echo '<li class="page-item disabled">
            <a class="page-link" href="" tabindex="-1">Previous</a>
            </li>';
        else
            echo '<li class="page-item">
            <a class="page-link" href="'. base_url("allpost/".$current-1) .'" tabindex="-1">Previous</a>
            </li>';

        for($page = 1; $page<= $number_of_page; $page++) {  
            if ($page == $current)
                echo '<li class="page-item active">
                <a class="page-link" href="">'. $page .' <span class="sr-only">(current)</span></a>
                </li>';
            else
                echo '<li class="page-item"><a class="page-link" href="'. base_url("allpost/".$page) .'">' . $page . '</a></li>';
        } 

        if ($current == $number_of_page)
            echo '<li class="page-item disabled">
            <a class="page-link" href="">Next</a>
            </li>';
        else
            echo '<li class="page-item">
            <a class="page-link" href="'. base_url("allpost/".$current+1) .'" tabindex="-1">Next</a>
            </li>';
    ?> 
</ul>
</nav>

<?php else: ?>

<h3>No Posts now</h3>

<p>Create one yourself?</p>

<?php endif ?>
