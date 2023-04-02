$(document).ready(function () {
  const edit_id = window.location.search.substring(1);
  console.log(edit_id);
  $.ajax({
    type: "GET",
    url: "getUsersOfList.php",
    dataType: "html",
    data: {
      id: edit_id,
    },
    success: function (data) {
      $("#database-container").html(data);
      console.log("XD");
      console.log(data);
    },
  });
});
