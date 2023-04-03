$(document).ready(function () {
  const hideError = () => {
    $("#nick-err").fadeOut(0);
    $("#pass-err").fadeOut(0);
    $("#name-err").fadeOut(0);
    $("#usrname-err").fadeOut(0);
    $("#date-err").fadeOut(0);
    $("#succes-container").fadeOut(0);
  };

  hideError();
  const edit_id = window.location.search.substring(1);

  $.ajax({
    //transferring information to the backend
    type: "GET",
    url: "./editUser.php",
    data: {
      toCheck: true,
      id: edit_id,
    },
    success: (res) => {
      const data = res.split(";");

      //getting data from backend and set value at frontend
      $("#nick").val(data[0]);
      $("#password").val(data[1]);
      $("#name").val(data[2]);
      $("#surname").val(data[3]);
      $("#birthday").val(data[4]);
    },
    dataType: "text",
  });

  $("#edit_user").on("click", () => {
    hideError();
    const nick = $("#nick").val();
    const password = $("#password").val();
    const name = $("#name").val();
    const surname = $("#surname").val();
    const birthday = $("#birthday").val();
    let error = dataValidate();

    if (error == false) {
      $.ajax({
        //transferring information to the backend
        type: "POST",
        url: "./editUser.php",
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
          if ((res.toString() === "success") == true) {
            $("#succes-container").fadeOut(1);
            $("#nick").val("");
            $("#password").val("");
            $("#name").val("");
            $("#surname").val("");
            $("#birthday").val("");
            window.setTimeout(() => {
              window.location.href = "../pages/users.php";
            }, 1000);
          }
        },
        dataType: "text",
      });
    }
  });

  const dataValidate = () => {
    const nick = $("#nick").val();
    const password = $("#password").val();
    const name = $("#name").val();
    const surname = $("#surname").val();
    if (nick == "") {
      $("#nick-err").fadeIn(1);
      return true;
    }
    if (password == "") {
      $("#pass-err").fadeIn(1);
      return true;
    }
    if (name == "") {
      $("#name-err").fadeIn(1);
      return true;
    }
    if (surname == "") {
      $("#usrname-err").fadeIn(1);
      return true;
    }
  };
});
