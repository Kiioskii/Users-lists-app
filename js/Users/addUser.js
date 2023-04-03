$(document).ready(function () {
  const handleError = () => {
    //hiding errors
    $("#nick-err").fadeOut(0);
    $("#pass-err").fadeOut(0);
    $("#name-err").fadeOut(0);
    $("#usrname-err").fadeOut(0);
    $("#date-err").fadeOut(0);
    $("#succes-container").fadeOut(0);
  };
  handleError();

  $("#add_user").on("click", () => {
    handleError();
    const nick = $("#nick").val();
    const password = $("#password").val();
    const name = $("#name").val();
    const surname = $("#surname").val();
    const birthday = $("#birthday").val();

    const error = dataValidation(); //displaing errors

    if (error == false) {
      $.ajax({
        //transferring information to the backend
        method: "POST",
        url: "./addUser.php",
        data: {
          created: true,
          nick: nick,
          password: password,
          name: name,
          surname: surname,
          birthday: birthday,
        },
        success: (res) => {
          if ((res.toString() === "success") == true) {
            successOperation();
            window.setTimeout(() => {
              window.location.href = "./users.php";
            }, 1000);
          }
        },
        dataType: "text",
      });
    }
  });

  $("#add_user_and_next").on("click", () => {
    handleError();
    const nick = $("#nick").val();
    const password = $("#password").val();
    const name = $("#name").val();
    const surname = $("#surname").val();
    const birthday = $("#birthday").val();

    const error = dataValidation(); //displaing errors

    if (error == false) {
      $.ajax({
        url: "./addUser.php",
        method: "POST",
        data: {
          created: true,
          nick: nick,
          password: password,
          name: name,
          surname: surname,
          birthday: birthday,
        },
        success: (res) => {
          if ((res.toString() === "success") == true) {
            successOperation();
          }
        },
        dataType: "text",
      });
    }
  });

  const dataValidation = () => {
    //checking input data
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
    return false;
  };

  const successOperation = () => {
    $("#succes-container").fadeOut(1);
    $("#nick").val("");
    $("#password").val("");
    $("#name").val("");
    $("#surname").val("");
    $("#birthday").val("");
  };
});
