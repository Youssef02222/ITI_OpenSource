(function () {
    const app = document.querySelector(".app");
    const socket = io();
  
    let client;
  
    app
      .querySelector(".join-screen #join-user")
      .addEventListener("click", function () {
        //   console.log("hola");
        let username = app.querySelector(".join-screen #username").value;
        if (username.length == 0) {
          return;
        }
        socket.emit("newuser", username);
        client = username;
        app.querySelector(".join-screen").classList.remove("active");
        app.querySelector(".chat-screen").classList.add("active");
      });
  
    app
      .querySelector(".chat-screen #send-message")
      .addEventListener("click", function () {
        let message = app.querySelector(".chat-screen #message-input").value;
        if (message.length == 0) {
          return;
        }
        renderMessage("my", {
          username: client,
          text: message,
        });
        socket.emit("chat", {
          username: client,
          text: message,
        });
        app.querySelector(".chat-screen #message-input").value = "";
      });
  
    app
      .querySelector(".chat-screen #exit-chat")
      .addEventListener("click", function () {
        socket.emit("exituser", client);
        window.location.href = window.location.href;
      });
  
    socket.on("update", function (update) {
      renderMessage("update", update);
    });
  
    socket.on("chat", function (message) {
      renderMessage("other", message);
    });
  
    function renderMessage(type, message) {
      let messageContainer = app.querySelector(".chat-screen .messages");
      if (type == "my") {
        let elem = document.createElement("div");
        elem.setAttribute("class", "message my-message");
        elem.innerHTML = ` 
        <div>
          <div class="name">You</div>
          <div class="text">${message.text}</div>
        </div>
        `;
        //   console.log(elem);
        //   console.log(messageContainer);
  
        messageContainer.appendChild(elem);
      } else if (type == "other") {
        let elem = document.createElement("div");
        elem.setAttribute("class", "message other-message");
        elem.innerHTML = ` 
          <div>
            <div class="name">${message.username}</div>
            <div class="text">${message.text}</div>
          </div>
          `;
        messageContainer.appendChild(elem);
      } else if (type == "update") {
        let elem = document.createElement("div");
        elem.setAttribute("class", "update");
        elem.innerText = message;
        messageContainer.appendChild(elem);
      }
      messageContainer.scrollTop =
        messageContainer.scrollHeight - messageContainer.clientHeight;
    }
  })();