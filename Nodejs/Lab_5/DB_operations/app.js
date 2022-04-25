const express = require("express");
const app = express();
require("dotenv").config();
require("express-async-errors");

app.use(express.json());

// Connect DB
const connectDB = require("./db/connectDB");

// --------> Middleware <--------
// error handler middleware
const errorHandlerMiddleware = require("./middleware/error-handler");
// not found error
const notFoundMiddleware = require("./middleware/not-found");

// Routers
const clientsRouter = require("./routes/clients");

// Routes
app.use("/api", clientsRouter);
app.use(notFoundMiddleware); // if route does not exist
app.use(errorHandlerMiddleware);

// Port
const port = process.env.PORT || 3000;

// Starting the server
const start = async () => {
  try {
    await connectDB(process.env.MONGO_URI);
    app.listen(port, () =>
      console.log(`Server is listening on port ${port}...`)
    );
  } catch (error) {
    console.log(error);
  }
};

start();