<h2 class="text-center mt-5"><?= esc($title) ?></h2  >
<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>
    
<?php $useremail = session() -> get('email') ?>

<form class="form-horizontal" enctype="multipart/form-data" action="/newpost" method="post" >
<!-- <?= form_open_multipart("/newpost") ?> -->
    <?= csrf_field() ?>
    
    <input type="hidden" name="email" value="<?php echo $useremail ?>">


    <div class="mb-3">
        <label for="content" class="form-label">Enter Post Text:</label>
        <textarea name="content" class="form-control" id="content" rows="3"><?= set_value('content') ?></textarea>
    </div>
    
    <div class="mb-3">
        <label class="form-label" for="post_image">Attach a image:</label>
        <input type="file" class="form-control" id="post_image" name="post_image">
    </div>
    <div class="mb-3">
        <label class="form-label" for="tags">Add tags(separated by comma,)</label>
        <input type="text" class="form-control" id="tags" name="tags">
    </div>
    <input type="submit" name="submit" value="Create A new Post!">
</form>
