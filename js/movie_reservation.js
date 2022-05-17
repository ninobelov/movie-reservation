function movieGenreChange(){
$("#genre").on("change", function () {
    $.ajax({
      url: "./movie_reservation?movie_type=" +$("#genre").val(),
      type: "GET",
      success: function () {
        window.location.href = "./movie_reservation?movie_type=" + $("#genre").val();
      }
    });
  })
  }

  movieGenreChange();

