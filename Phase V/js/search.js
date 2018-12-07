var helpers = ["Search by keywords in title",
"Search by genre of music",
"Search by style of dance",
"Search by user that uploaded video",
"Hover over a text box for help"]

function messages(adviceNumber) {
  document.getElementById("adviceBox").value = helpers[adviceNumber];
}
