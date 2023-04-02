$(document).ready(function () {
  $("#nick-err").fadeOut(0);
  $("#list-err").fadeOut(0);
  const edit_id = window.location.search.substring(1);

  $.ajax({
    type: "GET",
    url: "getUsersDataToList.php",
    dataType: "html",
    success: function (data) {
      $("#database-container").html(data);

      $.ajax({
        type: "GET",
        url: "editList.php",
        data: {
          toCheck: true,
          id: edit_id,
        },
        success: (res) => {
          console.log(res);
          const data = res.split(";");
          console.log(data);
          $("#nick_list").val(data[0]);
          $(".table-checkbox").each((index, element) => {
            const id = $(element).attr("item");
            if (data[1].includes(id)) {
              $(element).prop("checked", true);
            }
          });
        },
        dataType: "text",
      });

      $(".main-btn").on("click", () => {
        const arr = [];
        $(".table-checkbox").each((index, value) => {
          if ($(value).is(":checked")) {
            arr.push($(value).attr("item"));
          }
        });
        const jsonArr = JSON.stringify(arr);
        const name = $("#nick_list").val();

        $.ajax({
          method: "POST",
          url: "editList.php",
          data: {
            isEdited: true,
            list_id: edit_id,
            ids: jsonArr,
            name: name,
          },
          dataType: "html",
          success: (res) => {
            if (res === "existed") {
              $("#list-err").fadeIn();
            } else if (res == "success") {
              $("#list-err").fadeOut();
              window.setTimeout(() => {
                window.location.href = "lists.php";
              }, 2000);
            }
          },
        });
      });
    },
  });
});
