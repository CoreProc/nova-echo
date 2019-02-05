<meta name="broadcaster" content="{{ config('broadcasting.connections.' . config('broadcasting.nova', config('broadcasting.default')) . '.broadcaster', config('broadcasting.nova', config('broadcasting.default'))) }}">
<meta name="pusher_key" content="{{ config('broadcasting.connections.' . config('broadcasting.nova', config('broadcasting.default')) . '.key') }}">
<meta name="pusher_cluster" content="{{ config('broadcasting.connections.' . config('broadcasting.nova', config('broadcasting.default')) . '.options.cluster') }}">
<meta name="pusher_host" content="{{ config('broadcasting.connections.' . config('broadcasting.nova', config('broadcasting.default')) . '.host') }}">
<meta name="pusher_port" content="{{ config('broadcasting.connections.' . config('broadcasting.nova', config('broadcasting.default')) . '.port') }}">

@if(!is_null(config('broadcasting.connections.' . config('broadcasting.nova', config('broadcasting.default')) . '.auth_endpoint')))
  <meta name="auth_endpoint" content="{{ config('broadcasting.connections.' . config('broadcasting.nova', config('broadcasting.default')) . '.auth_endpoint') }}">
@endif

@if(method_exists(request()->user(), 'receivesBroadcastNotificationsOn'))
  <meta name="user_private_channel" content="{{ request()->user()->receivesBroadcastNotificationsOn() }}">
@else
  <meta name="user_private_channel" content="{{ str_replace('\\', '.', get_class(request()->user())).'.'.request()->user()->id }}">
@endif
