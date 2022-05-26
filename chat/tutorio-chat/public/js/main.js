const chatForm = document.getElementById('chat-form');
const chatMessages = document.querySelector('.chat-messages');
const roomName = document.getElementById('room-name');
const userList = document.getElementById('users');

// Get username and room from URL
const { username, room } = Qs.parse(location.search, {
  ignoreQueryPrefix: true,
});

const socket = io();

// Join chatroom
socket.emit('joinRoom', { username, room });

// Get room and users
socket.on('roomUsers', ({ room, users }) => {
  outputRoomName(room);
  outputUsers(users);
});

// Message from server
socket.on('message', (message) => {
  console.log(message);
  outputMessage(message);

  // Scroll down
  chatMessages.scrollTop = chatMessages.scrollHeight;
});

// Message submit
chatForm.addEventListener('submit', (e) => {
  e.preventDefault();

  // Get message text
  let msg = e.target.elements.msg.value;

  msg = msg.trim();

  if (!msg) {
    return false;
  }

  // Emit message to server
  socket.emit('chatMessage', msg);

  // Clear input
  e.target.elements.msg.value = '';
  e.target.elements.msg.focus();
});

//file upload
var uploader = new SocketIOFileUpload(socket);
    uploader.listenOnInput(document.getElementById("upload"));
    uploader.chunkSize = 1024 * 100;
    uploader.listenOnSubmit(
        document.getElementById("send_message"),
        document.getElementById("upload")
    );

    uploader.addEventListener("progress", function(event) {
        socket.emit("uploader_name", { uname: i_username });
        var percent = (event.bytesLoaded / event.file.size) * 100;
        console.log("File is", percent.toFixed(2), "percent loaded");
    });

    var tempfile;

    uploader.addEventListener("complete", function(event) {
        console.log(event.success);
        console.log(event.file);
        var objDiv = document.getElementById("chatroom");
        objDiv.scrollTop = objDiv.scrollHeight;
    });

    socket.on("uploaded", (data) => {
        alert("File successfully uploaded by " + data.usrname);
        const byteCharacters = window.atob(data.file);
        const byteNumbers = new Array(byteCharacters.length);
        for (let i = 0; i < byteCharacters.length; i++) {
            byteNumbers[i] = byteCharacters.charCodeAt(i);
        }
        const byteArray = new Uint8Array(byteNumbers);
        const blob = new Blob([byteArray], { type: "application/octet-stream" });

        const objectURL = URL.createObjectURL(blob);
        feedback.html("");
        message.val("");
        chatroom.append(
            "<p class='message'>" +
            data.usrname +
            ": " +
            "<a id= 'FileObject' href='" +
            objectURL +
            "' download='" +
            data.name +
            "'>" +
            data.name +
            "</a>" +
            "</p>"
        );
        console.log(data.file);
        var objDiv = document.getElementById("chatroom");
        objDiv.scrollTop = objDiv.scrollHeight;
    });

// Output message to DOM
function outputMessage(message) {
  const div = document.createElement('div');
  div.classList.add('message');
  const p = document.createElement('p');
  p.classList.add('meta');
  p.innerText = message.username;
  p.innerHTML += `<span>${message.time}</span>`;
  div.appendChild(p);
  const para = document.createElement('p');
  para.classList.add('text');
  para.innerText = message.text;
  div.appendChild(para);
  document.querySelector('.chat-messages').appendChild(div);
}

// Add room name to DOM
function outputRoomName(room) {
  roomName.innerText = room;
}

// Add users to DOM
function outputUsers(users) {
  userList.innerHTML = '';
  users.forEach((user) => {
    const li = document.createElement('li');
    li.innerText = user.username;
    userList.appendChild(li);
  });
}

//Prompt the user before leave chat room
document.getElementById('leave-btn').addEventListener('click', () => {
  const leaveRoom = confirm('Are you sure you want to leave the chatroom?');
  if (leaveRoom) {
    window.location = '../index.html';
  } else {
  }
});
