$(document).ready(function () {
  $("#nick-err").fadeOut(0);
  $("#pass-err").fadeOut(0);
  $("#name-err").fadeOut(0);
  $("#usrname-err").fadeOut(0);
  $("#date-err").fadeOut(0);
  $("#succes-container").fadeOut(0);

  const edit_id = window.location.search.substring(1);
  $.ajax({
    type: "GET",
    url: "editUser.php",
    data: {
      toCheck: true,
      id: edit_id,
    },
    success: (res) => {
      console.log(res);
      const data = res.split(";");
      console.log(data);

      $("#nick").val(data[0]);
      $("#password").val(data[1]);
      $("#name").val(data[2]);
      $("#surname").val(data[3]);
      $("#birthday").val(data[4]);
    },
    dataType: "text",
  });

  $("#edit_user").on("click", () => {
    const nick = $("#nick").val();
    const password = $("#password").val();
    const name = $("#name").val();
    const surname = $("#surname").val();
    const birthday = $("#birthday").val();
    let error = false;
    console.log(nick);
    console.log(password);
    console.log(name);
    console.log(surname);
    console.log(birthday);

    if (nick == "") {
      $("#nick-err").fadeIn(1);
      error = true;
    }
    if (password == "") {
      $("#pass-err").fadeIn(1);
      error = true;
    }
    if (name == "") {
      $("#name-err").fadeIn(1);
      error = true;
    }
    if (surname == "") {
      $("#usrname-err").fadeIn(1);
      error = true;
    }

    if (error == false) {
      $.ajax({
        type: "POST",
        url: "editUser.php",
        data: {
          isEdited: true,
          id: edit_id,
          nick: nick,
          password: password,
          name: name,
          surname: surname,
          birthday: birthday,
        },
        success: (res) => {
          console.log("udao sie");
          console.log(res);
          if ((res.toString() === "success") == true) {
            console.log("udao sie");
            console.log("udao sie XDDD");
            $("#succes-container").fadeOut(1);
            $("#nick").val("");
            $("#password").val("");
            $("#name").val("");
            $("#surname").val("");
            $("#birthday").val("");
            window.setTimeout(() => {
              window.location.href = "users.php";
            }, 1000);
          }
        },
        dataType: "text",
      });
    }
  });
});
