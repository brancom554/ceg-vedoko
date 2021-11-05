<div id="item-body">
    <div class="item-list-tabs no-ajax" id="subnav" aria-label="Member secondary navigation" role="navigation">
        <ul>
            <li id="groups-order-select" class="last filter"> <label for="groups-order-by">Order By:</label> <select id="groups-order-by">
                    <option value="active">Last Active</option>
                    <option value="popular">Most Members</option>
                    <option value="newest">Newly Created</option>
                    <option value="alphabetical">Alphabetical</option>
                </select></li>
        </ul>
    </div>
    <h2 class="bp-screen-reader-text">Member's groups</h2>
    <div class="groups mygroups">
        <div id="pag-top" class="pagination">
            <div class="pag-count" id="group-dir-count-top"> Viewing 1 - 20 of 34 groups</div>
            <div class="pagination-links" id="group-dir-pag-top"> <span aria-current="page" class="page-numbers current">1</span> <a class="page-numbers" href="indexea24.html?grpage=2&amp;num=20">2</a> <a class="next page-numbers" href="indexea24.html?grpage=2&amp;num=20">&rarr;</a></div>
        </div>
        <ul id="groups-list" class="gp-bp-wrapper gp-posts-masonry gp-columns-4 gp-style-classic gp-align-center gp-bp-masonry-enabled" aria-live="assertive" aria-atomic="true" aria-relevant="all">
            <li class="gp-gutter-size"></li>

            <li class="gp-post-item odd public group-has-avatar">
                <div class="gp-loop-content gp-no-cover-image"> <span class="gp-bp-col-cover-overlay">10</span>
                    <div class="gp-bp-col-avatar">
                        <a href="<?= base_url() ?>user/forum/group/home/<?= $promgroup['forum_id'] ?>"> <span class="gp-bp-hover-effect"></span> <img loading="lazy" src="<?= base_url() ?>assets/avatar/group_avatar.png" class="avatar group-26-avatar avatar-90 photo" width="90" height="90" alt="Group logo of Kill Bill" /> </a>
                    </div>
                    <div class="gp-loop-title"><a href="javascript:void(0)" class="bp-group-home-link kill-bill-home-link"><?= strtoupper($promgroup['forum_name']) ?></a></div>

                </div>
            </li>
        </ul>

        <br>

        <ul id="groups-list" class="gp-bp-wrapper gp-posts-masonry gp-columns-4 gp-style-classic gp-align-center gp-bp-masonry-enabled" aria-live="assertive" aria-atomic="true" aria-relevant="all">
            <li class="gp-gutter-size"></li>
            <?php foreach ($chatgroups as $chatgroup) : ?>

                <li class="gp-post-item odd public group-has-avatar">
                    <div class="gp-loop-content gp-no-cover-image"> <span class="gp-bp-col-cover-overlay">10</span>
                        <div class="gp-bp-col-avatar">
                            <a href="<?= base_url() ?>user/forum/group/home/<?= $chatgroup->forum_id ?>"> <span class="gp-bp-hover-effect"></span> <img loading="lazy" src="<?= base_url() ?>assets/avatar/group_avatar.png" class="avatar group-26-avatar avatar-90 photo" width="90" height="90" alt="Group logo of Kill Bill" /> </a>
                        </div>
                        <div class="gp-loop-title"><a href="javascript:void(0)" class="bp-group-home-link kill-bill-home-link">Discussion avec <?= $chatgroup->firstname.' '.$chatgroup->lastname ?></a></div>

                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <div id="pag-bottom" class="pagination">
            <!-- <div class="pag-count" id="group-dir-count-bottom"> Viewing 1 - 20 of 34 groups</div> -->
            <div class="pagination-links" id="group-dir-pag-bottom"> <span aria-current="page" class="page-numbers current">1</span> <a class="page-numbers" href="indexea24.html?grpage=2&amp;num=20">2</a> <a class="next page-numbers" href="indexea24.html?grpage=2&amp;num=20">&rarr;</a></div>
        </div>
    </div>
</div>
<br><br><br>