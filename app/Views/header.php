<?=$this->extend("layout")?>
<?=$this->section("content")?>
  
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <?php
                            if ($nav == 1)
                                echo '<a class="nav-item nav-link active" href="/dashboard">Home <span class="sr-only">(current)</span></a>';
                            else
                                echo '<a class="nav-item nav-link" href="/dashboard">Home</a>';

                            if ($nav == 2)
                                echo '<a class="nav-item nav-link active" href="/allpost">All Post <span class="sr-only">(current)</span></a>';
                            else
                                echo '<a class="nav-item nav-link" href="/allpost">All Post</a>';
                            
                            if ($nav == 3)
                                echo '<a class="nav-item nav-link active" href="/newpost">New Post <span class="sr-only">(current)</span></a>';
                            else
                                echo '<a class="nav-item nav-link" href="/newpost">New Post</a>';

                        ?>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="<?php echo base_url('/logout'); ?>">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- <div class="container-fluid">
                    <div class="d-flex">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="<?php echo base_url('/logout'); ?>">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </nav>