let object = require('./task_1_module').emitter

let event = new object()

event.on('greet', function() {
    console.log("The Main File")
})

event.greet()