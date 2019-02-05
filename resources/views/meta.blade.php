<meta name="broadcaster" content="{{ config('broadcasting.connections.' . config('broadcasting.nova', config('broadcasting.default')) . '.broadcaster', config('broadcasting.nova', config('broadcasting.default'))) }}">

@if(!is_null(\Coreproc\NovaEcho\NovaEcho::config('host')))
  <meta name="host" content="{{ \Coreproc\NovaEcho\NovaEcho::config('host') }}">
@endif

@if(!is_null(\Coreproc\NovaEcho\NovaEcho::config('key')))
  <meta name="pusher_key" content="{{ \Coreproc\NovaEcho\NovaEcho::config('key') }}">
@endif

@if(!is_null(\Coreproc\NovaEcho\NovaEcho::config('options.cluster')))
  <meta name="pusher_cluster" content="{{ \Coreproc\NovaEcho\NovaEcho::config('options.cluster') }}">
@endif

@if(!is_null(\Coreproc\NovaEcho\NovaEcho::config('options.encrypted')))
  <meta name="pusher_encrypted" content="{{ \Coreproc\NovaEcho\NovaEcho::config('options.encrypted') ? 1 : 0 }}">
@endif

@if(!is_null(\Coreproc\NovaEcho\NovaEcho::config('options.host')))
  <meta name="pusher_host" content="{{ \Coreproc\NovaEcho\NovaEcho::config('options.host') }}">
@endif

@if(!is_null(\Coreproc\NovaEcho\NovaEcho::config('options.port')))
  <meta name="pusher_port" content="{{ \Coreproc\NovaEcho\NovaEcho::config('options.port') }}">
@endif

@if(!is_null(\Coreproc\NovaEcho\NovaEcho::config('auth_endpoint')))
  <meta name="auth_endpoint" content="{{ \Coreproc\NovaEcho\NovaEcho::config('auth_endpoint') }}">
@endif

@if(method_exists(request()->user(), 'receivesBroadcastNotificationsOn'))
  <meta name="user_private_channel" content="{{ request()->user()->receivesBroadcastNotificationsOn() }}">
@else
  <meta name="user_private_channel" content="{{ str_replace('\\', '.', get_class(request()->user())).'.'.request()->user()->id }}">
@endif
