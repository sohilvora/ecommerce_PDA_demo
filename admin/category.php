<?php require_once "includes/header.php"; ?>

<div class="container">
    <section class="category-section">
        <h1 class="text-uppercase border-bottom">category</h1>
        <button class="btn btn-primary add_category">Add New Category</button>
        <div class="modal fade" id="catModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" id="cat_form">
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" name="category_name" id="category_name ">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary save">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require_once "includes/footer.php"; ?>
<script>
    $(document).ready(function(){
        $(document).on('submit','#cat_form',function(e){
            e.preventDefault();
           var fd = new FormData(this);
           $.ajax({
            url:'insert/cat_insert.php',
            type:'POST',
            data:fd,
            dataTypr:'json',
            processData:false,
            contentType:false,
            success: function(response){
                console.log(response);
            }
           })
        });
    });
</script>