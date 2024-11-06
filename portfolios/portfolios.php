<?php require '../includes/header.php'?>

<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-center text-white">Add new Portfolio</h1>
            </div>
            <div class="card-body">
                <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" value="<?= (isset($_SESSION['title'])? $_SESSION['title']:'') ?>" name="title" class="form-control" placeholder="Enter your portfolio title!">
                </div>
                <div class="mb-3">
                    <label class="form-label">Sub Title</label>
                    <input type="text" value="<?= (isset($_SESSION['sub_title']) ? $_SESSION['sub_title']:'') ?>" name="sub_title" class="form-control" placeholder="Enter your sub title!">
                </div>
                <div class="mb-3">
                    <label class="form-label">Link</label>
                    <input type="text" value="<?= (isset($_SESSION['link']) ? $_SESSION['link']:'') ?>" name="link" class="form-control" placeholder="Enter your portfolio link!">
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                    <img id="img" class="mt-3 rounded" width="200"/>
                    <?php if(isset($_SESSION['error_image'])){ ?>
                    <strong class="alret alert-dagner"><br><?=$_SESSION['error_image']?></strong>
                    <?php } 
                    unset($_SESSION['error_image']);
                    unset($_SESSION['title']);
                    unset($_SESSION['sub_title']);
                    ?>
                </div>
                <div class="mb-3">
                    <button type="submit" name="portfoilo" class="btn btn-primary">Add Portfolio</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    
    
</div>
            
 <?php include '../includes/footer.php' ?>