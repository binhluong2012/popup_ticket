const express = require("express");
const { createServer } = require("http");
const { Server } = require("socket.io");
const port = 3000;
const app = express();
const httpServer = createServer(app);
const io = new Server(httpServer, { /* options */ });
const bodyParser = require("body-parser");
app.use(bodyParser.json({ type: "application/json" }));
io.on("connection", (socket) => {
    console.log("Socket User Connected: " + socket.id);
});

app.post("/greet", (req, res) => {
    var body = req.body;

    console.log("Received Data", body);
    if (body.user > 0 && body.event == 'answer') {
        io.sockets.emit("chatMessage_" + body.user, body);
    }
    return res.status(200).json({
        message: "OK",
        data: body,
    });
});

httpServer.listen(port, function () {
    console.log("Listening on port: " + port);
});