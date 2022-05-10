const mongoose = require("mongoose");

const ClientSchema = new mongoose.Schema({
  username: {
    type: String,
    required: [true, "Please provide a name"],
    minlength: 3,
    maxlength: 20,
    // unique
    unique: true,
  },
  email: {
    type: String,
    required: [true, "Please provide an email"],
    // match with regex
    match: [
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
      ,
      "Please provide valid email",
    ],
  },
  firstname: {
    type: String,
    minlength: 3,
    maxlength: 20,
  },
  lastname: {
    type: String,
    minlength: 3,
    maxlength: 20,
  },
  phone: {
    type: String,
    maxlength: 15,
  },
});

module.exports = mongoose.model("Client", ClientSchema);