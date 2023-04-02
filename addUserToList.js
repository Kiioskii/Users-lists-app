$(document).ready(function () {
  const edit_id = window.location.search.substring(1);
  $.ajax({
    type: "GET",
    url: "getSetOfLists.php",
    dataType: "html",
    data: {
      lists: true,
    },
    success: function (data) {
      $("#database-container").html(data);

      $.ajax({
        type: "GET",
        url: "addUserToList.php",
        data: {
          toCheck: true,
          id: edit_id,
        },
        success: (res) => {
          console.log(res);
          $(".table-checkbox").each((index, element) => {
            const id = $(element).attr("item");
            if (res.includes(id)) {
              $(element).prop("checked", true);
            }
          });
        },
        dataType: "text",
      });
    },
  });

  $.ajax({
    type: "GET",
    url: "getSetOfLists.php",
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
    const jsonArr = JSON.stringify(arr);

    $.ajax({
      method: "POST",
      url: "addUserToList.php",
      data: {
        isEdited: true,
        user_id: edit_id,
        ids: jsonArr,
      },
      dataType: "html",
      success: (res) => {
        console.log(res);
        if (res == "success") {
          $("#list-err").fadeOut();
          window.setTimeout(() => {
            window.location.href = "users.php";
          }, 2000);
        }
      },
    });
  });
});
