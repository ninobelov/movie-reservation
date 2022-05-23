function movieGenreChange(){
$("#movie_genre").on("change", function () {
    $.ajax({
      url: "http://localhost/drupalprojekat/movie_reservation?movie_type=" +$("#movie_genre").val(),
      type: "GET",
      success: function () {
        window.location.href = "./movie_reservation?movie_type=" + $("#movie_genre").val();
      }
    });
  })
  }

function nameValidationReq() {
  $("#movieForm").on("submit",function (event) {

    event.preventDefault();

    const title = $(".movieTitle", this).text();
    const day = $("input[type=radio]:checked").val();
    const genre = $(".movieGenre",this).val();
    const name = $('#customer_name').val();
    const nameVal = /^[A-Z][a-z]+$/;

    if (nameVal.test(name)){

      $.ajax({
        url: "http://localhost/drupalprojekat/save_reservation?save_reservation",
        type: "POST",
        data: {
          title: title,
          day: day,
          genre: genre,
          name: name
        },
        success: function (){
          alert("You reserved the movie!");
        },
        error:function (){
          alert("Error!")
        }
    })
    } else {
      alert("Error! Please use first capital letter and don't use numbers in the name section, thank you!");
    }
  })
}

  nameValidationReq();
  movieGenreChange();
