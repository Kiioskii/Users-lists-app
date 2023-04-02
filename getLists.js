$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "getListsData.php",
    dataType: "html",
    success: function (data) {
      $("#database-container").html(data);

      $(".delete-btn").each((index, element) => {
        $(element).on("click", () => {
          const id = $(element).attr("item");
          console.log(id);
          $.ajax({
            method: "GET",
            url: "deleteList.php",
            data: {
              isDeleted: true,
              id: id,
            },
            dataType: "html",
            success: (data) => {
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
    },
  });
});
