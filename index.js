$(document).ready(function () {
  $("#nick-err").fadeOut(0);
  $("#pass-err").fadeOut(0);
  $("#name-err").fadeOut(0);
  $("#usrname-err").fadeOut(0);
  $("#date-err").fadeOut(0);
  $("#succes-container").fadeOut(0);

  $("#add_user").on("click", () => {
    console.log("XD");
    const nazwa = $("#nazwa").val();
    const haslo = $("#haslo").val();
    const imie = $("#imie").val();
    const nazwisko = $("#nazwisko").val();
    const data_urodzenia = $("#data_urodzenia").val();
    let error = false;
    console.log(nazwa);
    console.log(haslo);
    console.log(imie);
    console.log(nazwisko);
    console.log(data_urodzenia);

    if (nazwa == "") {
      $("#nick-err").fadeIn(1);
      error = true;
    }
    if (haslo == "") {
      $("#pass-err").fadeIn(1);
      error = true;
    }
    if (imie == "") {
      $("#name-err").fadeIn(1);
      error = true;
    }
    if (nazwisko == "") {
      $("#usrname-err").fadeIn(1);
      error = true;
    }
    // const now = new Date.;
    // console.log(now);
    // console.log(data_urodzenia > now);
    // if (Date.) {
    //   $("#date-err").fadeIn(1);
    //   error = true;
    // }

    if (error == false) {
      $.ajax({
        method: "POST",
        url: "addUser.php",
        data: {
          created: true,
          nazwa: nazwa,
          haslo: haslo,
          imie: imie,
          nazwisko: nazwisko,
          data_urodzenia: data_urodzenia,
        },
        success: (res) => {
          console.log("udao sie");
          if ((res.toString() === "success") == true) {
            console.log("udao sie");
            $("#succes-container").fadeOut(1);
            $("#nazwa").val("");
            $("#haslo").val("");
            $("#imie").val("");
            $("#nazwisko").val("");
            $("#data_urodzenia").val("");
            window.setTimeout(() => {
              window.location.href = "users.html";
            }, 1000);
          }
        },
        dataType: "text",
      });
    }
  });

  $("#add_user_and_next").on("click", () => {
    const nazwa = $("#nazwa").val();
    const haslo = $("#haslo").val();
    const imie = $("#imie").val();
    const nazwisko = $("#nazwisko").val();
    const data_urodzenia = $("#data_urodzenia").val();
    let error = false;
    console.log(nazwa);
    console.log(haslo);
    console.log(imie);
    console.log(nazwisko);
    console.log(data_urodzenia);

    if (nazwa == "") {
      $("#nick-err").fadeIn(1);
      error = true;
    }
    if (haslo == "") {
      $("#pass-err").fadeIn(1);
      error = true;
    }
    if (imie == "") {
      $("#name-err").fadeIn(1);
      error = true;
    }
    if (nazwisko == "") {
      $("#usrname-err").fadeIn(1);
      error = true;
    }

    if (error == false) {
      $.ajax({
        url: "addUser.php",
        method: "POST",
        data: {
          created: true,
          nazwa: nazwa,
          haslo: haslo,
          imie: imie,
          nazwisko: nazwisko,
          data_urodzenia: data_urodzenia,
        },
        success: (res) => {
          console.log("udao sie");
          if ((res.toString() === "success") == true) {
            $("#succes-container").fadeOut(1);
            $("#nazwa").val("");
            $("#haslo").val("");
            $("#imie").val("");
            $("#nazwisko").val("");
            $("#data_urodzenia").val("");
          }
        },
        dataType: "text",
      });
    }
  });
});
