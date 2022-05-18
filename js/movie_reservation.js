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

  movieGenreChange();

