<div id="gp-fixed-header-padding"></div>
<div class="gp-clear"></div>
<div id="gp-page-wrapper">
    <div id="gp-buddypress-header">
        <header id="gp-page-header" class="gp-has-header-bg">
            <div id="gp-page-header-inner" style="background-image: url(<?= base_url() ?>assets/avatar/default_cover.jpg);">
                <div id="header-cover-image"></div>
                <div class="gp-container" style="height: auto;">
                    <div id="item-header-avatar">
                        <a href="index.html">
                            <div class="gp-user-offline"></div>
                            <?php if ($this->session->userdata('profil_picture') == null) { ?>
                                <img loading="lazy" src="<?= base_url() ?>assets/avatar/<?= $this->session->userdata('gender') == "male" ? 'avatar_male.png' : 'avatar_femal.png' ?>" class="avatar user-72-avatar avatar-210 photo" width="210" height="210" alt="Profile picture of Kevin Agastra" />
                            <?php } else { ?>
                            <?php } ?>

                        </a>
                    </div>
                    <div id="item-header-content">
                        <div class="gp-bp-header-title"><?= ucfirst($this->session->userdata('firstname')) . ' ' . ucfirst($this->session->userdata('lastname')) ?> </div>
                        <!-- <h2 class="gp-bp-header-highlight user-nicename">@demo</h2> <span class="activity" data-livestamp="2021-10-08T10:00:32+0000">Active 3 minutes ago</span> -->
                        <!-- <div class="gp-bp-header-desc"> <a href="../../activity/p/8977/index.html" rel="nofollow ugc">View</a></div> -->
                        <div class="gp-bp-header-actions"></div>
                        <div id="gp-author-social-icons"></div>
                        <div id="template-notices" role="alert" aria-atomic="true"></div>
                    </div>
                </div>
            </div>
            <div id="gp-bp-header-overlay"></div>
            <div class="gp-blurred-bg" style="background-image: url(<?= base_url() ?>assets/avatar/default_cover.jpg);"></div>
        </header>
    </div>
    <div id="gp-content-wrapper" class="gp-container">
        <div id="gp-inner-container">
            <div id="gp-content">
                <div id="buddypress">
                    <div id="item-nav">
                        <div class="item-list-tabs no-ajax" id="object-nav" aria-label="Member primary navigation" role="navigation">
                            <ul>
                                <li id="activity-personal-li" <?= ($active_class == "activity") ? 'class="current selected"' : '' ?>><a id="user-activity" href="<?= base_url() ?>user/myaccount/activity">Activité</a></li>
                                <li id="xprofile-personal-li" <?= ($active_class == "profile") ? 'class="current selected"' : '' ?>><a id="user-xprofile" href="<?= base_url() ?>user/myaccount/profile">Profil</a></li>
                                <li id="groups-personal-li" <?= ($active_class == "group") ? 'class="current selected"' : '' ?>><a id="user-groups" href="<?= base_url() ?>user/myaccount/group">Groupes <span class="count">1</span></a></li>
                                <li id="forums-personal-li" <?= ($active_class == "forum") ? 'class="current selected"' : '' ?>><a id="user-forums" href="<?= base_url() ?>user/myaccount/forum">Forums</a></li>
                                <li id="media-personal-li" <?= ($active_class == "media") ? 'class="current selected"' : '' ?>><a id="user-media" href="<?= base_url() ?>user/myaccount/media">Media </a></li>
                                <li id="logout-personal-li" <?= ($active_class == "media") ? 'class="current selected"' : '' ?>><a id="user-logout" href="<?= base_url() ?>auth/logout">Se déconnecter </a></li>
                            </ul>
                        </div>
                    </div>