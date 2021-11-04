<br>
<input type="hidden" value="<?= $groupdata['forum_id'] ?>" id="forum_id">
<div id="item-body">
    <!-- <div class="item-list-tabs no-ajax" id="subnav" aria-label="Group secondary navigation" role="navigation">
        <ul>
            <li class="feed"> <a href="feed/index.html" class="bp-tooltip" data-bp-tooltip="RSS Feed" aria-label="RSS Feed"> RSS </a></li>
            <li id="activity-filter-select" class="last"> <label for="activity-filter-by">Show:</label> <select id="activity-filter-by">
                    <option value="-1">&mdash; Everything &mdash;</option>
                    <option value="activity_update">Updates</option>
                    <option value="rtmedia_update">rtMedia Updates</option>
                    <option value="joined_group">Group Memberships</option>
                    <option value="group_details_updated">Group Updates</option>
                    <option value="bbp_topic_create">Topics</option>
                    <option value="bbp_reply_create">Replies</option>
                    <option value="bbp_topic_create">Topics</option>
                    <option value="bbp_reply_create">Replies</option>
                </select></li>
        </ul>
    </div> -->
    <div class="activity single-group" aria-live="polite" aria-atomic="true" aria-relevant="all">
        <ul id="activity-stream" class="activity-list item-list">
            
        </ul>
        <form action="#" name="activity-loop-form" id="activity-loop-form" method="post"> <input type="hidden" id="_wpnonce_activity_filter" name="_wpnonce_activity_filter" value="603266593b" /><input type="hidden" name="_wp_http_referer" value="/original/groups/robotics-appreciators/" /></form>
    </div>
    <div id="no-reply-355" class="bbp-no-reply">
        <div style="background-color:#00a0e3; display: none;" id="notif_success">
            <p><span id="success_notif_text" style="color: #ffffff;"></span></p>
        </div>
        <div style="background-color:red; display: none;" id="notif_error">
            <p><span id="error_notif_text" style="color: #ffffff;"></span></p>
        </div>
        <br>

        <form method="post" action="" class="bbp-login-form" id="msg_form">
            <div class="bbp-username">
                <!-- <label for="user_login">Username: </label> -->
                <textarea name="msg" size="20" maxlength="100" id="msg">
                </textarea>
            </div>
            <div class="bbp-submit-wrapper">
                <button type="submit" name="user-submit" id="user-submit" class="button submit user-submit" onclick="send();return false">Envoyer</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(function() {
        load_msg()
    })

    function load_msg() {
        var forumid = $("#forum_id").val();
        console.log(forumid);
        $.ajax({
            mothod: "POST",
            url: "<?= base_url() ?>forum/promformmsg",
            data: {
                forumid: forumid
            },
            success: function(msg) {
                // console.log(msg)
                $("#activity-stream").html(msg);
            }
        })
    }


    function send() {
        // alert("ok")
        var text = $('#msg').val();
        var forum = $('#forum_id').val();
        // console.log(msg);
        $.ajax({
            method: "POST",
            url: '<?= base_url() ?>forum/newmsg',
            data: {
                text: text,
                forumid: forum
            },
            success: function(msg) {
                // console.log(msg)
                var val = msg.split("||");
                if (val[0] == "false") {
                    $("#notif_error").show();
                    $("#error_notif_text").html(val[1]);
                } else if (val[0] == "true") {
                    $("#notif_success").show();
                    $("#success_notif_text").html(val[1]);
                    $("#msg_form")[0].reset();
                    load_msg();
                }
            }
        })
    }
</script>