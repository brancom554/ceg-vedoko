<div id="gp-fixed-header-padding"></div>
<div class="gp-clear"></div>
<div id="gp-page-wrapper">
    <div id="gp-buddypress-header">
        <header id="gp-page-title" class="gp-container">
            <div class="gp-container">
                <div id="gp-breadcrumbs" class="gp-active"><span><span><a href="<?= base_url() ?>">Accueil</a></span></div>
                <div id="gp-page-title-text">
                    <h1> Membres</h1>
                </div>
            </div>
            <div class="gp-clear"></div>
        </header>
    </div>
    <div id="gp-content-wrapper" class="gp-container">
        <div id="gp-inner-container">
            <div id="gp-content">
                <div id="buddypress">
                    <div id="members-dir-search" class="dir-search" role="search">
                        <form id="sear_form">
                            <label for="members_search" class="bp-screen-reader-text">Search Members...</label>
                            <input type="text" name="search_key" id="search_key" onkeypress="search()" placeholder="Rechercher un contact.." />
                            <!-- <input type="submit" id="members_search_submit" name="members_search_submit" value="Search" /> -->
                        </form>
                    </div>
                    <div class="item-list-tabs" aria-label="Members directory main navigation" role="navigation">
                        <!-- <ul>
                            <li class="selected" id="members-all"><a href="index.html">All Members <span>53</span></a></li>
                        </ul> -->
                    </div>
                    <!-- <div class="item-list-tabs" id="subnav" aria-label="Members directory secondary navigation" role="navigation">
                        <ul>
                            <li id="members-order-select" class="last filter">
                                <label for="members-order-by">Order By:</label>
                                <select id="members-order-by">
                                    <option value="active">Last Active</option>
                                    <option value="newest">Newest Registered</option>
                                    <option value="alphabetical">Alphabetical</option>
                                </select>
                            </li>
                        </ul>
                    </div> -->
                    <h2 class="bp-screen-reader-text">Members directory</h2>
                    <div id="members-dir-list" class="members dir-list">
                        <div id="pag-top" class="pagination">
                            <!-- <div class="pag-count" id="member-dir-count-top"> Viewing 1 - 20 of 54 active members</div> -->
                            <!-- <div class="pagination-links" id="member-dir-pag-top"> <span aria-current="page" class="page-numbers current">1</span> <a class="page-numbers" href="indexbc3a.html?upage=2">2</a> <a class="page-numbers" href="index9fa1.html?upage=3">3</a> <a class="next page-numbers" href="indexbc3a.html?upage=2">&rarr;</a></div> -->
                        </div>
                        <ul id="member_list" class="gp-bp-wrapper gp-posts-masonry gp-columns-4 gp-style-classic gp-align-center" aria-live="" aria-relevant="">
                            <?php foreach ($members as $member) : ?>
                                <?php
                                $imgsrc = ($member->profil_picture) ? 'uploads/profil_im/' . $member->profil_picture : 'assets/avatar/avatar_male.png';

                                ?>
                                <li class="gp-post-item even">
                                    <div class="gp-loop-content gp-no-cover-image">
                                        <div class="gp-bp-col-avatar">
                                            <a href="<?= base_url() ?>user/detail/<?= $member->user_id ?>"> <span class="gp-bp-hover-effect"></span> <img alt="Profile" src="<?= base_url().$imgsrc ?>" class="avatar avatar-90 photo" width="90" height="90" />
                                                <div class="gp-user-offline"></div>
                                            </a>
                                        </div>
                                        <div class="gp-loop-title"> <a href="'.base_url().'user/detail/'.$members->user_id.'"><?= ucfirst($member->firstname) . ' ' . ucfirst($member->lastname) ?></a></div>
                                        <div class="gp-loop-meta"> <span class="activity" data-livestamp="2018-07-02T00:15:57+0000">Active 3 years, 3 months ago</span></div>
                                        <div class="gp-bp-col-action"></div>
                                    </div>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                        <div id="pag-bottom" class="pagination">
                            <!-- <div class="pag-count" id="member-dir-count-bottom"> Viewing 1 - 20 of 54 active members</div> -->
                            <!-- <div class="pagination-links" id="member-dir-pag-bottom"> <span aria-current="page" class="page-numbers current">1</span> <a class="page-numbers" href="indexbc3a.html?upage=2">2</a> <a class="page-numbers" href="index9fa1.html?upage=3">3</a> <a class="next page-numbers" href="indexbc3a.html?upage=2">&rarr;</a></div> -->
                        </div>
                    </div>
                    <input type="hidden" id="_wpnonce-member-filter" name="_wpnonce-member-filter" value="ccca270631" />
                    <input type="hidden" name="_wp_http_referer" value="/original/members/" />
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<script>
    function search() {
        // console.log("ok")
        var key = $("#search_key").val();
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>user/sear_member",
            data: {
                key: key
            },
            success: function(member) {
                // console.log(member);
                $("#member_list").html(member);
            }
        })
    }


    function request(user) {
        console.log(user)
    }
</script>