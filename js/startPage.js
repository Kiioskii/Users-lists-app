$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "./php/getData/getLastAdded.php",
    dataType: "html",
    success: function (data) {
      $("#last-added").html(data); //getting data of 4 last added users
    },
  });

  $.ajax({
    type: "GET",
    url: "./index.php",
    dataType: "html",
    data: {
      toGet: true,
    },
    success: function (res) {
      const data = res.split(";");
      $("#users-count").html(`<p>Liczba użytkowników: ${data[0]}</p>`); //replacing the div with the appropriate data from the database
      $("#lists-count").html(`<p>Liczba list: ${data[1]}</p>`); //replacing the div with the appropriate data from the database
    },
  });
});
