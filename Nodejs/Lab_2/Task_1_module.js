let Emitter = require('events')
let util = require('util')

// function that inhiret from Emitter
function constructor() {
    Emitter.call(this)
    this.greet = function() {
        console.log("module message")
        this.emit('greet')
    }
}
util.inherits(constructor, Emitter)

module.exports = {
    emitter: constructor
}

