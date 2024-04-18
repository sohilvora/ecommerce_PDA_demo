<?php
require_once "includes/header.php";
require_once "../class/Crud.php";
$obj = new Crud();
$no_of_records_per_page=2;

if(isset($_GET['pageno']))
{
    $pageno = $_GET['pageno'];
}
else
{
    $pageno = 1;
}
$offset = ($pageno-1)* $no_of_records_per_page;
?>

<div class="container">
    <section class="category-section">
        <h1 class="text-uppercase border-bottom">category</h1>
        <button class="btn btn-primary add_category">Add New Category</button>
        <div class="modal fade" id="catModal" tabindex="-1" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="cat_form">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId"></h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" name="category_name" class="form-control shadow-none" id="category_name">
                                <span id="error" class="text-danger">
                                </span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="category_id" id="category_id">
                            <input type="hidden" name="form_type" id="form_type">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary save" id="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Category Name</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php 
            foreach($obj->get('category',$offset,$no_of_records_per_page)as $row)
            {?>
            <tr>
                <td><?=$row['category_id']; ?></td>
                <td><?=$row['category_name']; ?></td>
                <td><?=$row['cat_created_at']; ?></td>
                <td><a href="" class="btn btn-primary">Edit</a></td>
                <td><a href="" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
            }?>
        </table>
        <ul class="pagination">
        <li class="page-item "><a href="?pageno=1" class="page-link">First</a></li>
        <li class="page-item <?php if($pageno<=1){echo 'disabled';}?>"><a href="<?php if($pageno<=1){echo '#';}else{echo'?pageno='.($pageno-1);}?>" class="page-link">Previous</a></li>

        <?php
        $total_pages=$obj->pagination('category',$no_of_records_per_page);
        for ($i = 1; $i <= $total_pages; $i++) {
            if($pageno == $i)
            {
                echo '<li class="page-item active"><a href="?pageno='.$i.'" class="page-link">'. $i.'</a></li>';
            }
            else{
                echo '<li class="page-item"><a href="?pageno='.$i.'" class="page-link">'. $i.'</a></li>';
            }

        } 
        ?>
        <li class="page-item <?php if($pageno >= $total_pages){echo 'disabled';}?>"><a href="<?php if($pageno>=$total_pages){echo '#';}else{echo'?pageno='.($pageno+ 1);}?>" class="page-link">Next</a></li>
        <li class="page-item <?php if($pageno >= $total_pages){echo 'disabled';} ?>"><a href="?pageno=<?= $total_pages;?>" class="page-link">Last</a></li>
        </ul>
    </section>
</div>
<?php require_once "includes/footer.php"; ?>
<script>
    $(document).ready(function() {
        $(document).on('submit', '#cat_form', function(e) {
            e.preventDefault();
            var fd = new FormData(this);
            $.ajax({
                url: 'insert/cat_insert.php',
                type: 'POST',
                data: fd,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {

                    if (response.status == 0) {
                        $("#error").html(response.msg_error);
                    }
                    if (response.status == 1) {
                        $("#cat_form")[0].reset();
                        $("#catModal").modal('hide');
                        $("#error").html('');
                        location.reload();
                    }
                }
            });
        });
    });
</script>