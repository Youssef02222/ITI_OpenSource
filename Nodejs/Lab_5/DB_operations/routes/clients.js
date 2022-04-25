const express = require("express");
const router = express.Router();

const {
  createClient,
  getAllClients,
  getClient,
  updateClient,
  deleteClient,
} = require("../controllers/client");

router.route("/").post(createClient).get(getAllClients);
router.route("/:id").get(getClient).patch(updateClient).delete(deleteClient);

module.exports = router;