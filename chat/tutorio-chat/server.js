const path = require('path');
const http = require('http');
const express = require('express');
const socketio = require('socket.io');
const formatMessage = require('./utils/messages');
const siofu = require("socketio-file-upload");
const {
  userJoin,
  getCurrentUser,
  userLeave,
  getRoomUsers
} = require('./utils/users');

const app = express().use(siofu.router);;
const server = http.createServer(app);
const io = socketio(server);

// Set static folder
app.use(express.static(path.join(__dirname, 'public')));

const botName = 'Tutorio Chat';

// Run when client connects
io.on('connection', socket => {
  socket.on('joinRoom', ({ username, room }) => {
    const user = userJoin(socket.id, username, room);

    socket.join(user.room);

    // Welcome current user
    socket.emit('message', formatMessage(botName, 'Tutorio Chat rooms!'));

    // Broadcast when a user connects
    socket.broadcast
      .to(user.room)
      .emit(
        'message',
        formatMessage(botName, `${user.username} has joined the chat`)
      );

    // Send users and room info
    io.to(user.room).emit('roomUsers', {
      room: user.room,
      users: getRoomUsers(user.room)
    });
  });

  socket.on("i_name", (data) => {
    socket.username = data.name;
    // socket.broadcast.emit("joined")
    socket.broadcast.emit("joined", { username: socket.username });
});

console.log(socket.username + " connected");

var uploader = new siofu();
uploader.dir = "/opt/lampp/htdocs/Tutorio/";
uploader.listen(socket);

var uname = socket.username;
socket.on("uploader_name", (data) => {
    socket.username = data.uname;
    uname = data.uname;
});

uploader.on("saved", function(event) {
    console.log(event.file);
    console.log(event.reader);

    var dir = uploader.dir;
    dir += "/";
    dir += event.file.name;

    const data = fs.readFileSync(dir, "base64");

    io.sockets.emit("uploaded", {
        file: data,
        name: event.file.name,
        dir: uploader.dir,
        usrname: uname,
    });
});

socket.on("change_username", (data) => {
    socket.username = data.username;
});

  // Listen for chatMessage
  socket.on('chatMessage', msg => {
    const user = getCurrentUser(socket.id);

    io.to(user.room).emit('message', formatMessage(user.username, msg));
  });

  // Runs when client disconnects
  socket.on('disconnect', () => {
    const user = userLeave(socket.id);

    if (user) {
      io.to(user.room).emit(
        'message',
        formatMessage(botName, `${user.username} has left the chat`)
      );

      // Send users and room info
      io.to(user.room).emit('roomUsers', {
        room: user.room,
        users: getRoomUsers(user.room)
      });
    }
  });
});

const PORT = process.env.PORT || 3003;

server.listen(PORT, () => console.log(`Server running on port ${PORT}`));
