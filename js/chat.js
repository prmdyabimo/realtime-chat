const formMessage = document.querySelector(".typing-message");
const fieldMessage = document.querySelector(".field-message");
const sendMessage = document.querySelector(".send-message");
const chatBox = document.querySelector(".chat-box");

formMessage.onsubmit = (e) => {
  e.preventDefault();
};

sendMessage.onclick = () => {
  // ajax
  let xhr = new XMLHttpRequest(); // creating XML object
  xhr.open("POST", "php/insert-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        fieldMessage.value = "";
      }
    }
  };
  // mengirim data dari form melalui ajax ke php
  let formData = new FormData(formMessage); // creating new formData object
  xhr.send(formData); // mengirim data form ke php
};

chatBox.onmouseenter = () => {
  chatBox.classList.add("active");
};

chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");
};

setInterval(() => {
  let xhr = new XMLHttpRequest(); // creating XML object
  xhr.open("POST", "php/get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
        if (!chatBox.classList.contains("active")) { // apabila tidak ada class active
          scrollToBottom();
        }
      }
    }
  };
  // mengirim data dari form melalui ajax ke php
  let formData = new FormData(formMessage); // creating new formData object
  xhr.send(formData); // mengirim data form ke php
}, 500); // 500ms

function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}