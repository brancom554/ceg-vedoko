<div id="item-body">
    <div class="item-list-tabs no-ajax" id="subnav" aria-label="Member secondary navigation" role="navigation">
        <!-- <ul>
            <li id="just-me-personal-li" class="current selected"><a id="just-me" href="activity/index.html">Personal</a></li>
            <li id="activity-mentions-personal-li"><a id="activity-mentions" href="activity/mentions/index.html">Mentions</a></li>
            <li id="activity-favs-personal-li"><a id="activity-favs" href="activity/favorites/index.html">Favorites</a></li>
            <li id="activity-friends-personal-li"><a id="activity-friends" href="activity/friends/index.html">Friends</a></li>
            <li id="activity-groups-personal-li"><a id="activity-groups" href="activity/groups/index.html">Groups</a></li>

        </ul> -->
    </div>
    <div class="activity" aria-live="polite" aria-atomic="true" aria-relevant="all">
        <ul id="activity-stream" class="activity-list item-list">
            <?php foreach ($requests as $request) : ?>
                <li class="groups activity_updategroups activity_update activity-item" id="activity-8980">
                    <div class="activity-avatar">
                        <a href="index.html"> <img loading="lazy" src="<?= base_url() ?>assets/avatar/avatar_male.png" class="avatar user-72-avatar avatar-90 photo" width="90" height="90" alt="Profile picture of Kevin Agastra" /> </a>
                    </div>
                    <div class="activity-content">
                        <div class="activity-header">
                            <p><a href=""><?= $request->firstname . ' ' . $request->lastname ?></a> a envoyé une demande de discussion :
                                <a href="javascript:void(0)" data-id="<?= $request->forum_id ?>" onclick="accept($(this).attr('data-id'))">Accepter</a> <a href="" class="view activity-time-since bp-tooltip" data-bp-tooltip="View Discussion"><span class="time-since" data-livestamp="2021-10-07T12:54:29+0000"></span></a>
                            </p>
                        </div>
                        <div class="activity-meta"></div>
                    </div>
                    <div class="activity-comments"></div>
                </li>
            <?php endforeach; ?>
        </ul>
        <form action="#" name="activity-loop-form" id="activity-loop-form" method="post">
            <input type="hidden" id="_wpnonce_activity_filter" name="_wpnonce_activity_filter" value="b96223835f" />
            <input type="hidden" name="_wp_http_referer" value="/original/members/demo/" />
        </form>
    </div>
</div>
<div>
    <input type="text" id="url" value="<?= $this->session->userdata('referral_link') ?>" readonly>
</div>

<script>
    function accept(forum) {
        // console.log(forum)
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>forum/generateLink",
            data: {
                forum: forum
            },
            success: function(msg) {
                console.log(msg);
                var val = msg.split("||");
                if (val[0] == "ok") {
                    toastr.error(val[1])
                } else if (val[0] == "no") {
                    toastr.error(val[1]);
                }
            }
        })

    }
</script>