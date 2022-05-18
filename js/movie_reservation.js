function movieGenreChange(){
$("#movie_genre").on("change", function () {
    $.ajax({
      url: "./movie_reservation?movie_type=" +$("#movie_genre").val(),
      type: "GET",
      success: function () {
        window.location.href = "./movie_reservation?movie_type=" + $("#movie_genre").val();
      }
    });
  })
  }

function nameValidationReq() {
  $(".btn-submit").click(function(){
    const name = $('#customer_name').val();
    const nameVal = /^[A-Z][a-z]+$/;
    if (nameVal.test(name)) {
      alert("Good, thank you!");
    } else {
      alert("Error! Please use first capital letter and don't use numbers in the name section, thank you!");
    }
  })
}
  nameValidationReq();
  movieGenreChange();
