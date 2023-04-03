$(document).ready(function () {
  const edit_id = window.location.search.substring(1); //taking id from site
  $.ajax({
    //transferring information to the backend
    type: "GET",
    url: "../getData/getUsersOfList.php",
    dataType: "html",
    data: {
      id: edit_id,
    },
    success: function (data) {
      $("#database-container").html(data); //replacing the div with the appropriate data from the database
    },
  });
});
