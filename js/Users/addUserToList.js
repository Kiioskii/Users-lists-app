$(document).ready(function () {
  const edit_id = window.location.search.substring(1);
  $.ajax({
    type: "GET",
    url: "../getData/getSetOfLists.php",
    dataType: "html",
    data: {
      lists: true,
    },
    success: function (data) {
      $("#database-container").html(data);
      checboxHandler();
    },
  });

  $.ajax({
    type: "GET",
    url: "../getData/getSetOfLists.php",
    dataType: "html",
    data: {
      user: true,
      id: edit_id,
    },
    success: function (data) {
      $("#user-database-container").html(data);
    },
  });

  $("#add-uset-to-Lists").on("click", () => {
    const arr = [];
    $(".table-checkbox").each((index, value) => {
      if ($(value).is(":checked")) {
        arr.push($(value).attr("item"));
      }
    });
    const jsonArr = JSON.stringify(arr); //converting data to json format

    $.ajax({
      method: "POST",
      url: "./addUserToList.php",
      data: {
        isEdited: true,
        user_id: edit_id,
        ids: jsonArr,
      },
      dataType: "html",
      success: (res) => {
        if (res == "success") {
          $("#list-err").fadeOut();
          window.setTimeout(() => {
            window.location.href = "users.php";
          }, 1000);
        }
      },
    });
  });

  const checboxHandler = () => {
    //adding user to list
    $.ajax({
      type: "GET",
      url: "./addUserToList.php",
      data: {
        toCheck: true,
        id: edit_id,
      },
      success: (res) => {
        $(".table-checkbox").each((index, element) => {
          const id = $(element).attr("item");
          if (res.includes(id)) {
            $(element).prop("checked", true);
          }
        });
      },
      dataType: "text",
    });
  };
});
