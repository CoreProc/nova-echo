import Echo from 'laravel-echo'

window.Pusher = require('pusher-js')

let echoOptions = {
  broadcaster: document.head.querySelector('meta[name="broadcaster"]').content,
  key: document.head.querySelector('meta[name="pusher_key"]').content,
  cluster: document.head.querySelector('meta[name="pusher_cluster"]').content,
  wsHost: document.head.querySelector('meta[name="pusher_host"]').content,
  wsPort: document.head.querySelector('meta[name="pusher_port"]').content,
  encrypted: true,
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
