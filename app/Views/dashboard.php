<?=$this->extend("layout")?>
  
<?=$this->section("content")?>
  
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Dashboard</a>
                    <div class="d-flex">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="<?php echo base_url('/logout'); ?>">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <h2 class="text-center mt-5"><?= esc($title) ?></h2  >

            <?php if ($post_list !== []): ?>

            <?php foreach ($post_list as $post_item): ?>

                <h3><?= esc($post_item['email']) ?></h3>

                <div class="main">
                    <?= esc($post_item['content']) ?>
                </div>

            <?php endforeach ?>

            <?php else: ?>

            <h3>No Posts now</h3>

            <p>Create one yourself?</p>

            <?php endif ?>

        </div>
    </div>
     
</div>
  
<?=$this->endSection()?>