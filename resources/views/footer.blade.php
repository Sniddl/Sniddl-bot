<script>

  window.laravel = {
    token: '{{csrf_token()}}',
    @if(Auth::check())
      id: '{{Auth::user()->id}}',
      notifications: '{{Auth::user()->unreadNotifications->count()}}'
    @endif
  }
</script>
<script src="/js/layouts/post.js" charset="utf-8"></script>
<script src="/js/global.js" charset="utf-8"></script>
<script src="/js/community.js" charset="utf-8"></script>
<script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>
<!-- <script src="/js/bootstrap.js" charset="utf-8"></script> -->
<!-- <script type="text/javascript">
var post_count = 0;
var reply_count = 0;
  Echo.private(`App.User.${window.laravel.id}`)
      .listen('NotificationUpdate', (e) => {
          $('.notification-circle').show();
      });

  Echo.channel(`post-channel`)
      .listen('CreatedPost', (e) => {
        post_count ++;
        if (post_count == 1){
          $('#new-post-event').html('Load '+ post_count + " new post.");}
        else{
          $('#new-post-event').html('Load '+ post_count + " new posts.")}
        $('#new-post-event').parent().parent().show();
      });

  Echo.channel(`reply-channel`)
      .listen('CreatedPost', (e) => {
        reply_count ++;
        if (reply_count == 1){
          $('#new-reply-event').html('Load '+ reply_count + " new reply.");}
        else{
          $('#new-reply-event').html('Load '+ reply_count + " new replies.")}
        $('#new-reply-event').parent().parent().show();
      });
</script> -->


<script id="socket-script">
var socket = io.connect("{{env('NODE_HOST', '\n**** MISSING .ENV NODE_HOST VARIABLE ****\n')}}");
var userId = $('meta[name=uid]').attr("content");
var post_count = 0;
var reply_count = 0;

socket.on('post-channel:App\\Events\\CreatedPost', function(data){
  post_count ++;
  if (post_count == 1){
    $('#new-post-event').html('Load '+ post_count + " new post.");}
  else{
    $('#new-post-event').html('Load '+ post_count + " new posts.")}
  $('#new-post-event').parent().parent().show();
});

socket.on('reply-channel:App\\Events\\CreatedPost', function(data){
  reply_count ++;
  if (reply_count == 1){
    $('#new-reply-event').html('Load '+ reply_count + " new reply.");}
  else{
    $('#new-reply-event').html('Load '+ reply_count + " new replies.")}
  $('#new-reply-event').parent().parent().show();
});

socket.on('private-App.User.'+window.laravel.id+':App\\Events\\NotificationUpdate', function(data){
  $('.notification-circle').show();
  $.playSound("/notify")
});
if (window.laravel.notifications > 0 && !base_url_is('notifications')) {
$('.notification-circle').show();
$.playSound("/notify")}



</script>
