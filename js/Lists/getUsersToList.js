$(document).ready(function () {
  $("#nick-err").fadeOut(0); //hiding error information
  $("#list-err").fadeOut(0); //hiding error information
  $("#list-empty-err").fadeOut(0); //hiding error information

  $.ajax({
    //transferring information to the backend
    type: "GET",
    url: "../getData/getUsersDataToList.php",
    dataType: "html",
    success: function (data) {
      $("#database-container").html(data); //replacing the div with the appropriate data from the database
    },
  });

  $(".main-btn").on("click", () => {
    const arr = [];
    $(".table-checkbox").each((index, value) => {
      if ($(value).is(":checked")) {
        //ticking checkboxes
        arr.push($(value).attr("item"));
      }
    });
    const jsonArr = JSON.stringify(arr);
    const name = $("#nick_list").val();
    $.ajax({
      //transferring information to the backend
      method: "GET",
      url: "./addList.php",
      data: {
        created: true,
        id: jsonArr,
        name: name,
      },
      dataType: "html",
      success: (res) => {
        if (res === "existed") {
          $("#list-err").fadeIn();
        } else if (res == "empty") {
          $("#list-empty-err").fadeIn();
        } else if (res == "success") {
          $("#list-err").fadeOut();
          $("#list-empty-err").fadeOut(0);
          window.setTimeout(() => {
            window.location.href = "./lists.php";
          }, 1000);
        }
      },
    });
  });
});
