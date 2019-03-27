import Echo from 'laravel-echo'

window.Pusher = require('pusher-js')

let echoOptions = {
  broadcaster: document.head.querySelector('meta[name="broadcaster"]').content
}

if (document.head.querySelector('meta[name="host"]') !== null) {
  echoOptions.host = document.head.querySelector('meta[name="host"]').content
}

if (document.head.querySelector('meta[name="pusher_key"]') !== null) {
  echoOptions.key = document.head.querySelector('meta[name="pusher_key"]').content
}

if (document.head.querySelector('meta[name="pusher_cluster"]') !== null) {
  echoOptions.cluster = document.head.querySelector('meta[name="pusher_cluster"]').content
}

if (document.head.querySelector('meta[name="pusher_host"]') !== null) {
  echoOptions.wsHost = document.head.querySelector('meta[name="pusher_host"]').content
}

if (document.head.querySelector('meta[name="pusher_port"]') !== null) {
  echoOptions.wsPort = document.head.querySelector('meta[name="pusher_port"]').content
}

if (document.head.querySelector('meta[name="pusher_port"]') !== null) {
  echoOptions.wssPort = document.head.querySelector('meta[name="pusher_port"]').content
}

if (document.head.querySelector('meta[name="pusher_encrypted"]') !== null) {
  echoOptions.encrypted = (document.head.querySelector('meta[name="pusher_encrypted"]').content === '1')
}

// Check if we need to define auth endpoint
if (document.head.querySelector('meta[name="auth_endpoint"]') !== null) {
  echoOptions.authEndpoint = document.head.querySelector('meta[name="auth_endpoint"]').content
}

window.Echo = new Echo(echoOptions)

let userReceivesBroadcastOn = document.head.querySelector('meta[name="user_private_channel"]').content

if (userReceivesBroadcastOn !== null) {
  window.userPrivateChannel = window.Echo.private(userReceivesBroadcastOn)
}
