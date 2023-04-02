$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "getLastAdded.php",
    dataType: "html",
    success: function (data) {
      console.log("holibka");
      $("#last-added").html(data);
    },
  });
  $.ajax({
    type: "GET",
    url: "index.php",
    dataType: "html",
    data: {
      toGet: true,
    },
    success: function (res) {
      const data = res.split(";");
      console.log(data);
      $("#users-count").html(`<p>Liczba użytkowników: ${data[0]}</p>`);
      $("#lists-count").html(`<p>Liczba list: ${data[1]}</p>`);
    },
  });
});
