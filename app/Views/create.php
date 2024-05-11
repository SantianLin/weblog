<?=$this->extend("layout")?>
  
<?=$this->section("content")?>
  
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?php echo base_url('/dashboard'); ?>">Home</a>
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
            <?= session()->getFlashdata('error') ?>
            <?= validation_list_errors() ?>
               
            <?php $useremail = session() -> get('email') ?>

            <form class="form-horizontal" enctype="multipart/form-data" action="/newpost" method="post" >
            <!-- <?= form_open_multipart("/newpost") ?> -->
                <?= csrf_field() ?>
                
                <input type="hidden" name="email" value="<?php echo $useremail ?>">

                <div class="form-group">
                    <label class="control-label col-sm-2" for="content">Enter Post Text:</label>
                    <textarea name="content" cols="45" rows="3"><?= set_value('content') ?></textarea>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="post_image">Attach a image:</label>
                    <div class="col-sm-10">
                    <input type="file" class="form-control" id="post_image" name="post_image">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="tags">add tags(separated by comma ,)</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="tags" name="tags">
                    </div>
                </div>
                <input type="submit" name="submit" value="Create A new Post!">
            </form>


        </div>
    </div>
     
</div>
  
<?=$this->endSection()?>