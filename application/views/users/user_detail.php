<div id="gp-fixed-header-padding"></div>
<div class="gp-clear"></div>
<div id="gp-page-wrapper">
    <div id="gp-buddypress-header">
        <header id="gp-page-header" class="gp-has-header-bg">
            <div id="gp-page-header-inner" style="background-image: url(<?= base_url() ?>assets/avatar/default_cover.jpg);">
                <div id="header-cover-image"></div>
                <div class="gp-container" style="height: auto;">
                    <div id="item-header-avatar">
                        <a href="">
                            <?php if ($user['profil_picture'] == null) { ?>
                                <img loading="lazy" src="<?= base_url() ?>assets/avatar/<?= $user['gender'] == "male" ? 'avatar_male.png' : 'avatar_femal.png' ?>" class="avatar user-72-avatar avatar-210 photo" width="210" height="210" alt="Profile picture of <?= $user['firstname'] . ' ' . $user['lastname'] ?>" />
                            <?php } else { ?>
                            <?php } ?>
                        </a>
                    </div>
                    <div id="item-header-content">
                        <div class="gp-bp-header-title"><?= $user['firstname'] . ' ' . $user['lastname'] ?></div>
                        <!-- <h2 class="gp-bp-header-highlight user-nicename">@multidev</h2> <span class="activity" data-livestamp="2021-10-08T08:10:12+0000">Active 4 hours, 59 minutes ago</span> -->
                        <div class="gp-bp-header-actions"></div>
                        <div id="gp-author-social-icons">
                            <?php if ($this->session->userdata('logged_in')) { ?>
                                <!-- <a href="javascript:void(0)" title="Envoyer une demande" data-id="<?= $user['user_id'] ?>" onclick="request($(this).attr('data-id'))" class="gp-bp-header-button gp-plus-icon"><span class="vc_icon_element-icon fa fa-hand-paper-o" style="color:#777777 !important"></span></a> -->
                                <button class="button type1" title="Envoyer une demande" data-id="<?= $user['user_id'] ?>" onclick="request($(this).attr('data-id'))">
                                    Envoyer une demande
                                </button>
                            <?php } else { ?>
                                <!-- <a href="javascript:void(0)" title="Envoyer une demande" onclick="openloginDialog()" class="gp-bp-header-button"><span class="vc_icon_element-icon fa fa-hand-paper-o" style="color:#777777 !important"></span></a> -->
                                <button class="button type1" title="Envoyer une demande" onclick="openloginDialog()">
                                    Envoyer une demande
                                </button>
                            <?php } ?>

                            <!-- <a href="#" class="gp-bp-header-button gp-facebook-icon"></a>
                            <a href="#" class="gp-bp-header-button gp-pinterest-icon"></a> -->
                        </div>
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
                    <div id="item-body">
                        <div class="profile">
                            <div class="bp-widget profile-info">
                                <h2></h2>
                                <table class="profile-fields">
                                    <tr class="field_1 field_name required-field visibility-public field_type_textbox">
                                        <td class="label">Name</td>
                                        <td class="data">
                                            <p><?= $user['firstname'] . ' ' . $user['lastname'] ?></p>
                                        </td>
                                    </tr>
                                    <tr class="field_29 field_age required-field visibility-public alt field_type_datebox">
                                        <td class="label">Age</td>
                                        <td class="data">
                                            <p>02/04/1987</p>
                                        </td>
                                    </tr>
                                    <!-- <tr class="field_53 field_i-am optional-field visibility-public field_type_selectbox">
                                        <td class="label">I Am</td>
                                        <td class="data">
                                            <p><a href="../../index9f8e.html?members_search=A+man" rel="nofollow">A man</a></p>
                                        </td>
                                    </tr>
                                    <tr class="field_56 field_seeking optional-field visibility-public alt field_type_selectbox">
                                        <td class="label">Seeking</td>
                                        <td class="data">
                                            <p><a href="../../indexe149.html?members_search=A+woman" rel="nofollow">A woman</a></p>
                                        </td>
                                    </tr>
                                    <tr class="field_32 field_looking-for optional-field visibility-public field_type_selectbox">
                                        <td class="label">Looking For</td>
                                        <td class="data">
                                            <p><a href="../../indexabba.html?members_search=Relationship" rel="nofollow">Relationship</a></p>
                                        </td>
                                    </tr>
                                    <tr class="field_36 field_interests optional-field visibility-public alt field_type_textarea">
                                        <td class="label">Interests</td>
                                        <td class="data">
                                            <p>Continually customize top-line technologies rather than accurate sources. Completely evolve efficient architectures through goal-oriented innovation. Synergistically coordinate economically sound
                                                catalysts for change without state of the.</p>
                                        </td>
                                    </tr>
                                    <tr class="field_25 field_bio-info optional-field visibility-public field_type_textarea">
                                        <td class="label">Bio Info</td>
                                        <td class="data">
                                            <p>Seamlessly fabricate flexible bandwidth before efficient methodologies. Assertively leverage other&#8217;s e-business information whereas multimedia based ideas. Objectively expedite cross-platform
                                                users rather than out-of-the-box e-tailers.</p>
                                            <p>Objectively create technically sound platforms through cost effective strategic theme areas. Efficiently productize backend testing procedures after bleeding-edge solutions. Conveniently fashion
                                                vertical action items without best-of-breed platforms. Conveniently matrix dynamic meta-services whereas an expanded array of technology. Quickly deliver market-driven value via economically
                                                sound partnerships.</p>
                                            <p>Completely synergize principle-centered imperatives before flexible opportunities. Assertively initiate intuitive core competencies and.</p>
                                        </td>
                                    </tr> -->
                                </table>
                            </div>
                            <!-- <div class="bp-widget physical">
                                <h2>Physical</h2>
                                <table class="profile-fields">
                                    <tr class="field_38 field_height optional-field visibility-public field_type_textbox">
                                        <td class="label">Height</td>
                                        <td class="data">
                                            <p>5&#039;10</p>
                                        </td>
                                    </tr>
                                    <tr class="field_40 field_hair-color optional-field visibility-public alt field_type_textbox">
                                        <td class="label">Hair Color</td>
                                        <td class="data">
                                            <p><a href="../../index8930.html?members_search=Brown" rel="nofollow">Brown</a></p>
                                        </td>
                                    </tr>
                                    <tr class="field_41 field_eye-color optional-field visibility-public field_type_textbox">
                                        <td class="label">Eye Color</td>
                                        <td class="data">
                                            <p><a href="../../index8930.html?members_search=Brown" rel="nofollow">Brown</a></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="bp-widget developer-info">
                                <h2>Developer Info</h2>
                                <table class="profile-fields">
                                    <tr class="field_2 field_skills optional-field visibility-public field_type_selectbox">
                                        <td class="label">Skills</td>
                                        <td class="data">
                                            <p><a href="../../index0f92.html?members_search=Graphic+Design" rel="nofollow">Graphic Design</a>, <a href="../../index296f.html?members_search=JavaScript" rel="nofollow">JavaScript</a>, <a href="../../index2d7b.html?members_search=PHP" rel="nofollow">PHP</a></p>
                                        </td>
                                    </tr>
                                    <tr class="field_16 field_price-rate optional-field visibility-public alt field_type_number_minmax">
                                        <td class="label">Price Rate</td>
                                        <td class="data">
                                            <p>50</p>
                                        </td>
                                    </tr>
                                    <tr class="field_7 field_country optional-field visibility-public field_type_selectbox">
                                        <td class="label">Country</td>
                                        <td class="data">
                                            <p><a href="../../index5251.html?members_search=UK" rel="nofollow">UK</a></p>
                                        </td>
                                    </tr>
                                    <tr class="field_24 field_website optional-field visibility-public alt field_type_web">
                                        <td class="label">Website</td>
                                        <td class="data">
                                            <p><a href="https://ghostpool.com/" rel="nofollow">ghostpool.com</a></p>
                                        </td>
                                    </tr>
                                </table>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="gp-sidebar-divider"></div>
        </div>
        <div class="gp-clear"></div>
    </div>
    <div class="gp-clear"></div>
</div>
<script>
    function request(user) {
        // console.log(user)
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>forum/sendrequest",
            data: {
                user: user
            },
            success: function(msg) {
                // console.log(msg)
                if (msg == "ok") {
                    // alert('invitation envoué');
                    toastr.success('invitation envoué')
                }
            }
        })
    }

    function openloginDialog() {
        // alert("ok")
        $("#click_login").click()
    }
</script>