$(document).ready(function () {
  $("#nick-err").fadeOut(0); //hiding error information
  $("#list-err").fadeOut(0); //hiding error information
  const edit_id = window.location.search.substring(1);

  $.ajax({
    type: "GET",
    url: "../getData/getUsersDataToList.php",
    dataType: "html",
    success: function (data) {
      $("#database-container").html(data); //replacing the div with the appropriate data from the database

      $.ajax({
        //transferring information to the backend
        type: "GET",
        url: "./editList.php",
        data: {
          toCheck: true,
          id: edit_id,
        },
        success: (res) => {
          const data = res.split(";");
          $("#nick_list").val(data[0]); //giving a value to the input
          $(".table-checkbox").each((index, element) => {
            const id = $(element).attr("item");
            if (data[1].includes(id)) {
              $(element).prop("checked", true); //ticking the appropriate checkboxes
            }
          });
        },
        dataType: "text",
      });
      handleClick();
    },
  });

  const handleClick = () => {
    //handle adding selected users to the list
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
        //transferring information to the backend
        method: "POST",
        url: "./editList.php",
        data: {
          isEdited: true,
          list_id: edit_id,
          ids: jsonArr,
          name: name,
        },
        dataType: "html",
        success: (res) => {
          if (res === "existed") {
            $("#list-err").fadeIn(); //adding selected users to the list
          } else if (res == "success") {
            $("#list-err").fadeOut(); //hiding error information
            window.setTimeout(() => {
              window.location.href = "./lists.php";
            }, 1000);
          }
        },
      });
    });
  };
});
