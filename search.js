var helpers = ["Search by keywords in title",
"Search by genre of music",
"Search by style of dance",
"Search by user that uploaded video",
""]

function messages(adviceNumber) {
  document.getElementById("adviceBox").value = helpers[adviceNumber];
}
