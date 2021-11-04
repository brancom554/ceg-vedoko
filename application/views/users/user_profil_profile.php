<div class="profile">
    <div class="bp-widget profile-info">
        <h2>Profile Info</h2>
        <table class="profile-fields">
            <tr class="field_1 field_name required-field visibility-public field_type_textbox">
                <td class="label">Nom</td>
                <td class="data">
                    <input type="" class="form-control" value="<?= $this->session->userdata('lastname') ?>" id="user_lastname">
                </td>
            </tr>
            <tr class="field_1 field_name required-field visibility-public field_type_textbox">
                <td class="label">Prénom</td>
                <td class="data">
                    <input type="" class="form-control" value="<?= $this->session->userdata('firstname') ?>" id="user_firstname">
                </td>
            </tr>
            <tr class="field_53 field_i-am optional-field visibility-public alt field_type_selectbox">
                <td class="label">Referal URL</td>
                <td class="data">
                    <p><?= $this->session->userdata('referral_link') ?></p>
                </td>
            </tr>
            <!-- <tr class="field_120 field_first-name required-field visibility-public field_type_textbox">
                <td class="label">First Name</td>
                <td class="data">
                    <p>Bill</p>
                </td>
            </tr>
            <tr class="field_121 field_last-name required-field visibility-public alt field_type_textbox">
                <td class="label">Last Name</td>
                <td class="data">
                    <p>Clintonn</p>
                </td>
            </tr>
            <tr class="field_122 field_country required-field visibility-public field_type_textbox">
                <td class="label">Country</td>
                <td class="data">
                    <p>VIETNAM</p>
                </td>
            </tr>
            <tr class="field_123 field_city required-field visibility-public alt field_type_textbox">
                <td class="label">City</td>
                <td class="data">
                    <p>HỒ CHÍ MINH CITY</p>
                </td>
            </tr>
            <tr class="field_36 field_interests optional-field visibility-public field_type_textarea">
                <td class="label">Interests</td>
                <td class="data">
                    <p>The standard Lorem Ipsum passage, used since the 1500s<br /> &#8220;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                        enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&#8221;<br /> Section 1.10.32 of &#8220;de Finibus Bonorum et Malorum&#8221;,
                        written by Cicero in 45 BC<br /> &#8220;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                        veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                        voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                        aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit
                        qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&#8221;</p>
                </td>
            </tr>
            <tr class="field_25 field_bio-info optional-field visibility-public alt field_type_textarea">
                <td class="label">Bio Info</td>
                <td class="data">
                    <p>Bio info here</p>
                </td>
            </tr>
            <tr class="field_124 field_biographical-info required-field visibility-public field_type_textarea">
                <td class="label">Biographical Info</td>
                <td class="data">
                    <p>bmnmbnmbnwes3ee3</p>
                    <p>The standard Lorem Ipsum passage, used since the 1500s<br /> &#8220;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                        enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&#8221;<br /> Section 1.10.32 of &#8220;de Finibus Bonorum et Malorum&#8221;,
                        written by Cicero in 45 BC<br /> &#8220;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                        veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                        voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                        aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit
                        qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&#8221;</p>
                </td>
            </tr> -->
        </table>
    </div>
    <!-- <div class="bp-widget single-fields">
        <h2>Single Fields</h2>
        <table class="profile-fields">
            <tr class="field_76 field_url optional-field visibility-public field_type_url">
                <td class="label">URL</td>
                <td class="data">
                    <p><a href="https://www.clubedomalte.com.br/" rel="nofollow">http://www.clubedomalte.com.br</a></p>
                </td>
            </tr>
            <tr class="field_74 field_number optional-field visibility-public alt field_type_number">
                <td class="label">Number</td>
                <td class="data">
                    <p>123</p>
                </td>
            </tr>
            <tr class="field_72 field_datebox optional-field visibility-public field_type_datebox">
                <td class="label">DateBox</td>
                <td class="data">
                    <p>1977-07-07</p>
                </td>
            </tr>
        </table>
    </div>
    <div class="bp-widget multi-fields">
        <h2>Multi Fields</h2>
        <table class="profile-fields">
            <tr class="field_90 field_radios optional-field visibility-public field_type_radio">
                <td class="label">Radios</td>
                <td class="data">
                    <p><a href="../../index9cba.html?members_search=radio+1" rel="nofollow">radio 1</a></p>
                </td>
            </tr>
        </table>
    </div>
    <div class="bp-widget contact-info">
        <h2>Contact Info</h2>
        <table class="profile-fields">
            <tr class="field_125 field_e-mail required-field visibility-public field_type_textbox">
                <td class="label">E-mail</td>
                <td class="data">
                    <p><a href="mailto:teasgse@gmail.com">teasgse@gmail.com</a></p>
                </td>
            </tr>
            <tr class="field_127 field_address required-field visibility-public alt field_type_textbox">
                <td class="label">Address</td>
                <td class="data">
                    <p>Rua da Flores 157</p>
                </td>
            </tr>
            <tr class="field_128 field_website required-field visibility-public field_type_textbox">
                <td class="label">Website</td>
                <td class="data">
                    <p><a href="https://www.clubedomalte.com.br/" rel="nofollow">https://www.clubedomalte.com.br/</a></p>
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
                    <p><a href="../../index1a54.html?members_search=SEO" rel="nofollow">SEO</a></p>
                </td>
            </tr>
            <tr class="field_7 field_country optional-field visibility-public alt field_type_selectbox">
                <td class="label">Country</td>
                <td class="data">
                    <p><a href="../../index56b4.html?members_search=USA" rel="nofollow">USA</a></p>
                </td>
            </tr>
        </table>
    </div> -->
</div>