$(document).ready(function () {
  $(".menu-btn").click(function () {
    $(".sidebar").css({
      width: "70px",
      "font-size": "35px",
      "margin-top": "-5px",
    });
    $(".text-link").hide();
    $(".close-btn").show();
    $(".menu-btn").hide();
  });

  $(".close-btn").click(function () {
    $(".sidebar").css({
      width: "300px",
      "font-size": "16px",
    });
    $(".text-link").show();
    $(".close-btn").hide();
    $(".menu-btn").show();
  });
  $('.add-category-btn').click(function(){
    alert('worked');
  });

  $('.add_category').click(function(){
    $('#catModal').modal('show');
    $('.modal-title').text('Add a New Category');
    $('#form_type').val('save');
  });
  $('.add_brand').click(function(){
    $('#brandModal').modal('show');
    $('.modal-title').text('Add a New Brand');
    $('#form_type').val('save');
  });
});
