<div id="gp-fixed-header-padding"></div>
<div class="gp-clear"></div>
<div id="gp-page-wrapper">
    <div id="gp-buddypress-header">
        <header id="gp-page-title" class="gp-container">
            <div class="gp-container">
                <div id="gp-breadcrumbs" class="gp-active"><span><span><a href="<?= base_url() ?>">Home</a></span></div>
                <div id="gp-page-title-text">
                    <h1> Register</h1>
                </div>
            </div>
            <div class="gp-clear"></div>
        </header>
    </div>
    <div id="gp-content-wrapper" class="gp-container">
        <div id="gp-inner-container">
            <div id="gp-content">
                <div id="buddypress">
                    <div class="page" id="register-page">
                        <form action="#" id="signup_form" class="standard-form">
                            <div id="message" style="display: none;">
                                <p id="error_message"></p>
                            </div>
                            <div id="template-notices" role="alert" aria-atomic="true"></div>
                            <p>Parainer Par : <?= $ref['firstname'].' '.$ref['lastname'] ?>.</p>
                            <div class="register-section" id="basic-details-section">
                                <h2>Account Details</h2>
                                <label for="email">Email Address *</label>
                                <input type="email" name="email" id="email" value="" />
                                <label for="signup_password">Mot de passe *</label>
                                <input type="password" name="password" id="password" value="" class="password-entry" spellcheck="false" autocomplete="off" />
                                <div id="pass-strength-result"></div>
                                <label for="signup_password_confirm">Confirmer Mot de passe *</label>
                                <input type="password" name="password_confirm" id="password_confirm" value="" class="password-entry-confirm" spellcheck="false" autocomplete="off" />
                                <input type="hidden" value="<?= $ref['user_id'] ?>" id="ref_id">
                            </div>
                            <div class="register-section" id="profile-details-section">
                                <h2>Profile Details</h2>
                                <div class="editfield field_1 field_name required-field visibility-public field_type_textbox">
                                    <fieldset>
                                        <legend id="field_1-1"> Nom <span class="bp-required-field-label">*</span></legend>
                                        <input id="lastname" name="lastname" type="text" value="" aria-required="true" required aria-labelledby="field_1-1" aria-describedby="field_1-3">
                                        <p class="field-visibility-settings-notoggle" id="field-visibility-settings-toggle-1"> This field can be seen by: <span class="current-visibility-level">Everyone</span></p>
                                    </fieldset>
                                </div>
                                <div class="editfield field_1 field_name required-field visibility-public alt field_type_textbox">
                                    <fieldset>
                                        <legend id="field_1-1"> Prénom <span class="bp-required-field-label">*</span></legend>
                                        <input id="firstname" name="firstname" type="text" value="" aria-required="true" required aria-labelledby="field_1-1" aria-describedby="field_1-3">
                                        <p class="field-visibility-settings-notoggle" id="field-visibility-settings-toggle-1"> This field can be seen by: <span class="current-visibility-level">Everyone</span></p>
                                    </fieldset>
                                </div>
                                <div class="editfield field_1 field_name required-field visibility-public field_type_textbox">
                                    <fieldset>
                                        <legend id="field_1-1"> Téléphone <span class="bp-required-field-label">*</span></legend>
                                        <input id="phone" name="phone" type="text" value="" aria-required="true" required aria-labelledby="field_1-1" aria-describedby="field_1-3">
                                        <p class="field-visibility-settings-notoggle" id="field-visibility-settings-toggle-1"> This field can be seen by: <span class="current-visibility-level">Everyone</span></p>
                                    </fieldset>
                                </div>

                                <div class="editfield field_1 field_name required-field visibility-public field_type_textbox">
                                    <fieldset>
                                        <legend id="field_1-1"> Sexe <span class="bp-required-field-label">*</span></legend>
                                        <select id="gender" name="gender" type="text" value="" aria-required="true" required aria-labelledby="field_1-1" aria-describedby="field_1-3">
                                            <option value="">---</option>
                                            <option value="male">Masculin</option>
                                            <option value="female">Féminin</option>
                                        </select>
                                        <p class="field-visibility-settings-notoggle" id="field-visibility-settings-toggle-1"> This field can be seen by: <span class="current-visibility-level">Everyone</span></p>
                                    </fieldset>
                                </div>

                                <div class="editfield field_1 field_name required-field visibility-public field_type_textbox">
                                    <fieldset>
                                        <legend id="field_1-1"> Derniére Classe <span class="bp-required-field-label">*</span></legend>
                                        <select id="class" name="class" type="text" value="" aria-required="true" required aria-labelledby="field_1-1" aria-describedby="field_1-3">
                                            <option value="">---</option>
                                            <?php foreach ($classes as $class) : ?>
                                                <option value="<?= $class->classe_id ?>"><?= $class->classe_name . ' (' . $class->class_code . ')' ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <p class="field-visibility-settings-notoggle" id="field-visibility-settings-toggle-1"> This field can be seen by: <span class="current-visibility-level">Everyone</span></p>
                                    </fieldset>
                                </div>

                                <div class="editfield field_1 field_name required-field visibility-public field_type_textbox">
                                    <fieldset>
                                        <legend id="field_1-1"> Promotion <span class="bp-required-field-label">*</span></legend>
                                        <select id="prom" name="prom" type="text" value="" aria-required="true" required aria-labelledby="field_1-1" aria-describedby="field_1-3">
                                            <option value="">---</option>
                                            <?php foreach ($proms as $prom) : ?>
                                                <option value="<?= $prom->promotion_id ?>"><?= $prom->promotion_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <p class="field-visibility-settings-notoggle" id="field-visibility-settings-toggle-1"> This field can be seen by: <span class="current-visibility-level">Everyone</span></p>
                                    </fieldset>
                                </div>

                                <input type="hidden" name="signup_profile_field_ids" id="signup_profile_field_ids" value="1,29,53,120,56,121,32,122,36,123,124,25" />
                            </div>
                            <div class="submit" id="signupbtn">
                                <input type="button" name="signup_submit" id="signup_submit" value="Inscription" onclick="register()" />
                            </div>
                            <div id="loader" style="display: none;">
                                <p id="loadertxt"></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="gp-clear"></div>
    </div>
    <div class="gp-clear"></div>
</div>