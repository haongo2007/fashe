<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.chat-box .box-tools button').click(function(event) {
            $('.chat-box').removeClass('pop-up');
            $('.btn-back-to-top').css('right', '40px');
        });
        $('.chat-box .box-title').click(function(event) {
            $('.chat-box').addClass('pop-up');
            $('.btn-back-to-top').css('right', '350px');
        });
        var pusher = new Pusher('101d71ba1f48fc65f0f8', {
          cluster: 'ap1',
          forceTLS: true
        });
        
        $.ajax({
            url: '<?php echo base_url('pusher') ?>',
            type: 'post',
            data: {data: 'pop-up'}
        });
        var channel = pusher.subscribe('ci_load');
        channel.bind('my-event', function(data) {
            $('.chat-box').addClass(data.open_chat);
            $('.btn-back-to-top').css('right', '350px');
        });

        $("#myvoteform").submit(function(e) {
            e.preventDefault();
            var _this = $(this);
            var vl = _this.find('input[name="message"]').val();
            var action = _this.attr('action');
            $.post(action, {data: 'client',value : vl}, function(data, textStatus, xhr) {
                _this.find('input[name="message"]').val('');
                $('.direct-chat-messages').animate({scrollTop: $('.direct-chat-messages')[0].scrollHeight}, 500);
            });
        });
        var channel = pusher.subscribe('chat_client');
        channel.bind('my-event', function(data) {
            $('.direct-chat-messages').append('<div class="direct-chat-msg right">'+
              '<div class="direct-chat-info clearfix">'+
                '<span class="direct-chat-name pull-left">Alexander Pierce</span>'+
                '<span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>'+
              '</div>'+
              '<img class="direct-chat-img" src="<?php echo public_url('admin/LTE/dist/img/user1-128x128.jpg') ?>" alt="Message User Image">'+
              '<div class="direct-chat-text">'
              +data.message+
              '</div>'+
              '</div>');
        });

        var channel = pusher.subscribe('chat_admin');
        channel.bind('my-event', function(data) {
            $('.direct-chat-messages').append('<div class="direct-chat-msg">'+
              '<div class="direct-chat-info clearfix">'+
                '<span class="direct-chat-name pull-left">Alexander Pierce</span>'+
                '<span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>'+
              '</div>'+
              '<img class="direct-chat-img" src="<?php echo public_url('admin/LTE/dist/img/user1-128x128.jpg') ?>" alt="Message User Image">'+
              '<div class="direct-chat-text">'
              +data.message+
              '</div>'+
              '</div>');
        });
    })
</script>