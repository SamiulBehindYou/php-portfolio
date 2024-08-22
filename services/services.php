<?php require '../includes/header.php'?>

<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-center text-white">Add new Service</h1>
            </div>
            <div class="card-body">
                <form action="service_post.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter your service title!">
                </div>
                <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4" id=""></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" name="service" class="btn btn-primary">Add Service</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    
    
</div>
            
 <?php include '../includes/footer.php' ?>