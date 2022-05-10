const Client = require("../models/Client");
const { StatusCodes } = require("http-status-codes");
const { BadRequestError, NotFoundError } = require("../errors");

// ------------> Create Client  <-------------
const createClient = async (req, res) => {
  const client = await Client.create(req.body);
  res.status(StatusCodes.CREATED).json({ client });
};

// -------------> Get All Clients  <-------------
const getAllClients = async (req, res) => {
  const clients = await Client.find();
  res.status(StatusCodes.OK).json({ clients, count: clients.length });
};

// -------------> Get a single Client <-------------
const getClient = async (req, res) => {
  const {
    params: { id: clientId },
  } = req;

  const client = await Client.findOne({ _id: clientId });

  // check of a client exist
  if (!client) {
    throw new NotFoundError(`No client with id ${clientId}`);
  }

  res.status(StatusCodes.OK).json({ client });
};

// -------------> Update Client <-------------
const updateClient = async (req, res) => {
  const {
    params: { id: clientId },
  } = req;

  // check if the name is empty
  if (req.body === "") {
    throw new BadRequestError("Client updated info cannot be empty");
  }

  const client = await Client.findByIdAndUpdate({ _id: clientId }, req.body, {
    new: true,
    runValidators: true,
  });

  if (!client) {
    throw new NotFoundError(`No client with id ${clientId}`);
  }

  res.status(StatusCodes.OK).json({ client });
};

// -------------> Delete Client <-------------
const deleteClient = async (req, res) => {
  const {
    params: { id: clientId },
  } = req;

  const client = await Client.findByIdAndRemove({
    _id: clientId,
  });

  if (!client) {
    throw new NotFoundError(`No client with id ${clientId}`);
  }

  res.status(StatusCodes.OK).send();
};

module.exports = {
  createClient,
  getAllClients,
  getClient,
  updateClient,
  deleteClient,
};