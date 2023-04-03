$(document).ready(function () {
  $.ajax({
    //transferring information to the backend
    type: "GET",
    url: "../getData/getUsersData.php",
    dataType: "html",
    success: function (data) {
      $("#database-container").html(data); //replacing the div with the appropriate data from the database
      handleDeleteBtn();
    },
  });

  const handleDeleteBtn = () => {
    // delete user
    $(".delete-btn").each((index, element) => {
      $(element).on("click", () => {
        const id = $(element).attr("item");
        $.ajax({
          //transferring information to the backend
          method: "GET",
          url: "../interactions/deleteUser.php",
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
