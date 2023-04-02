$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "getUsersData.php",
    dataType: "html",
    success: function (data) {
      $("#database-container").html(data);
    },
  });

  $(".delete-btn").each((index, element) => {
    $(element).on("click", () => {
      const id = $(element).attr("item");
      $.ajax({
        method: "GET",
        url: "deleteUser.php",
        data: {
          isDeleted: true,
          id: id,
        },
        dataType: "html",
        success: (data) => {
          console.log(data);
          $(".users-data-row").each((i, ele) => {
            const ID = $(ele).attr("item");
            if (id === ID) {
              $(ele).fadeOut();
            }
          });
        },
      });
    });
  });
});
