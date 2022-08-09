// search btn
var search = document.querySelector(".search");
var searchBtn = document.querySelector(".btn-search");
var usersList = document.querySelector(".users-list");

searchBtn.onclick = () => {
  if (search.type == "text") {
    search.type = "search";
    search.classList.remove("opacity-[0]");
    search.classList.add("search-active");
    search.focus();
    search.value = "";
  } else {
    search.type = "text";
    search.classList.remove("search-active");
    search.classList.add("opacity-[0]");
  }
};

search.onkeyup = () => {
  let searchTerm = search.value;
  if (searchTerm != "") {
    search.classList.add("aktif");
  } else {
    search.classList.remove("aktif");
  }
  let xhr = new XMLHttpRequest(); // creating XML object
  xhr.open("POST", "php/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        usersList.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}


setInterval(() => {
  let xhr = new XMLHttpRequest(); // creating XML object
  xhr.open("GET", "php/users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        // jika aktif aktif tidak berisi di bilah pencarian maka tambahkan data ini
        if (!search.classList.contains("aktif")) {
          usersList.innerHTML = data;
        }
      }
    }
  };
  xhr.send();
}, 500); // 500ms