$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "../getData/getListsData.php",
    dataType: "html",
    success: function (data) {
      $("#database-container").html(data); //replacing the div with the appropriate data from the database
      handleDeleteBtn();
    },
  });

  const handleDeleteBtn = () => {
    $(".delete-btn").each((index, element) => {
      $(element).on("click", () => {
        //giving each delete button the ability to delete user
        const id = $(element).attr("item");
        console.log(id);
        $.ajax({
          method: "GET",
          url: "../interactions/deleteList.php",
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
  };
});
