<?php require '../includes/header.php'?>

<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-center text-white">Add new skill</h1>
            </div>
            <div class="card-body">
                <form action="skills_post.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Skill name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your name!">
                </div>
                <div class="mb-3">
                <label class="form-label">percentage</label>
                <input type="number" name="percentage" class="form-control" placeholder="Enter your percenage!">
                </div>
                <div class="mb-3">
                    <button type="submit" name="skills" class="btn btn-primary">Add skill</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    
    
</div>
            
 <?php include '../includes/footer.php' ?>