<div id="gp-page-wrapper">
    <div id="gp-buddypress-header">
        <header id="gp-page-header" class="gp-has-header-bg">
            <div id="gp-page-header-inner" style="background-image: url(../../wp-content/uploads/buddypress/groups/12/cover-image/5a101c2577438-bp-cover-image.jpg);">
                <div id="header-cover-image"></div>
                <div class="gp-container" style="height: 320px;">
                    <div id="item-header-avatar">
                        <a href="index.html" class="bp-tooltip" data-bp-tooltip="Robotics Appreciators"> <img loading="lazy" src="../../wp-content/uploads/group-avatars/12/5a101c3ab15b6-bpfull.jpg" class="avatar group-12-avatar avatar-210 photo" width="210" height="210" alt="Group logo of Robotics Appreciators" /> </a>
                    </div>
                    <div id="item-header-content">
                        <h2 class="gp-bp-header-title"><?= $groupdata['forum_name'] ?></h2> <span class="gp-bp-header-highlight">Public Group</span> <span class="activity" data-livestamp="2021-10-07T12:54:29+0000">active %s</span>
                        <div class="gp-bp-header-desc">
                            <p>Proactively incentivize unique schemas through corporate portals.</p>
                        </div>
                        <div class="gp-bp-header-actions"></div>
                        <div class="gp-bp-header-members">
                            <div class="gp-bp-header-members-title">Group Admins</div> <span class="activity">No Admins</span>
                        </div>
                        <div id="template-notices" role="alert" aria-atomic="true"></div>
                    </div>
                </div>
            </div>
            <div id="gp-bp-header-overlay"></div>
            <div class="gp-blurred-bg" style="background-image: url(../../wp-content/uploads/buddypress/groups/12/cover-image/5a101c2577438-bp-cover-image.jpg);"></div>
        </header>
    </div>
    <div id="gp-content-wrapper" class="gp-container">
        <div id="gp-inner-container">
            <div id="gp-content">
                <div id="buddypress">
                    <div id="item-nav">
                        <div class="item-list-tabs no-ajax" id="object-nav" aria-label="Group primary navigation" role="navigation">
                            <ul>
                                <li id="home-groups-li" <?= ($active_class == "home") ? 'class="current selected"' : ' ' ?>><a id="home" href="<?= base_url() ?>user/forum/group/home/<?= $groupdata['forum_id'] ?>">Discussions</a></li>
                                <li id="members-groups-li" <?= ($active_class == "member") ? 'class="current selected"' : ' ' ?>><a id="members" href="<?= base_url() ?>user/forum/group/member/<?= $groupdata['forum_id'] ?>">Members <span></span></a></li>
                                <!-- <li id="media-groups-li"><a id="media" href="media/index.html">Media <span>3</span></a></li> -->
                            </ul>
                        </div>
                    </div>