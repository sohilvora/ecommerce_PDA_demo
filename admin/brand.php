<?php
require_once "includes/header.php";
require_once "../class/Crud.php";


?>

<div class="container">
    <section class="category-section">
        <h1 class="text-uppercase border-bottom">Brand</h1>
        <button class="btn btn-primary add_brand">Add New Brand</button>
        <div class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="brand_form">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId"></h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                        <div class="form-group">
                            <label for="category_name">CAtegory Name</label>
                            <select name="category_name" id="category_name" class="form-control">
                                <option value="0">Category Name 1</option>
                                <option value="0 ">Category Name 1</option>
                                <option value="0">Category Name 1</option>
                            </select>
                        </div>
                            <div class="form-group">
                                <label for="brand_name">Brand Name</label>
                                <input type="text" name="category_name" class="form-control shadow-none" id="brand_name" placeholder="Brand Name">
                                <span id="error" class="text-danger">
                                </span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="brand_id" id="brand_id">
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

        <table class="table table-bordered mt-3">
            <tr>
                <th>Id</th>
                <th>Brand Name</th>
                <th>Category Name</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
              
        </table>
        
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
        $('.edit').click(function() {
            var cat_id = $(this).attr('id');
            var btn = "edit";
            $('#catModal').modal('show');
            $('.modal-title').text('update Your Category');
            $('#submit').removeClass('btn-primary save').addClass('btn-warning update').text('Update');

            $('#form_type').val('edit');
            $.ajax({
                url: "action/cat_action.php",
                method: "POST",
                data: {
                    cat_id: cat_id,
                    action: btn,
                },
                dataType: "json",
                success: function(res) {
                    console.log(res);
                    $('#category_name').val(res.category_name);
                    $('#cat_id').val(res.category_id);
                }
            })
        });
        $('.delete').click(function() {
            var id = $(this).data('id');
            var confirm = window.confirm('Are you want to sure you want to delete this Category?');
            if(confirm)
            {
                $.ajax({
                url: "action/cat_action.php",
                method: "POST",
                data: {
                    cat_id: id,
                    action: "delete",
                },
                dataType: "json",
                success: function(res) {
                    if(res.status == 200){
                        $("#"+res.cat_id).remove();
                    }
                    
                }
            })
            }
        })
    });
</script>