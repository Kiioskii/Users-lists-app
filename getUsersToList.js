$(document).ready(function () {
  $("#nick-err").fadeOut(0);
  $("#list-err").fadeOut(0);
  $("#list-empty-err").fadeOut(0);

  $.ajax({
    type: "GET",
    url: "getUsersDataToList.php",
    dataType: "html",
    success: function (data) {
      console.log("holibka");
      $("#database-container").html(data);
    },
  });

  $(".main-btn").on("click", () => {
    console.log("click clikc");
    const arr = [];
    $(".table-checkbox").each((index, value) => {
      if ($(value).is(":checked")) {
        arr.push($(value).attr("item"));
      }
    });
    const jsonArr = JSON.stringify(arr);
    const name = $("#nick_list").val();
    console.log("XD " + name);
    $.ajax({
      method: "GET",
      url: "addList.php",
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
            window.location.href = "lists.php";
          }, 2000);
        }
      },
    });
  });
});
