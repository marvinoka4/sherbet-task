
            <div class="">

                <form id="nlf-form">

                    <div data-closable id="success-alert-messages" class="callout success flex-container alert-callout-border light-success radius form-label" style="display:none;">
                        <strong> <i class="uil uil-check-circle"></i> </strong> <div id="success-alert-messages-text" class="padding-horizontal-1" style="display:none;"></div>
                        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                            <span aria-hidden="true"><i class="uil uil-times"></i></span>
                        </button>
                    </div>

                    <div data-closable id="error-alert-messages" class="callout warning flex-container alert-callout-border light-warning radius form-label" style="display:none;">
                        <strong> <i class="uil uil-exclamation-triangle"></i> </strong> <div id="error-alert-messages-text" class="padding-horizontal-1" style="display:none;"></div>
                        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                            <span aria-hidden="true"><i class="uil uil-times"></i></span>
                        </button>
                    </div>

                    <div class="grid-x grid-padding-x">
                        <div class="large-6 medium-6 cell">
                            <label for="form-name" class="form-label"> Name *
                                <input id="form-name" type="text" name="form-name" class="form-control" required/>
                            </label>
                        </div>
                        <div class="large-6 medium-6 cell">
                            <label for="form-email" class="form-label"> Email *
                                <input id="form-email" type="email" name="form-email" class="form-control" required/>
                            </label>
                        </div>
                    </div>
                    <div class="grid-x grid-padding-x">
                        <div class="large-6 medium-6 cell">
                            <label for="form-phone" class="form-label"> Phone *
                                <input id="form-phone" type="tel" name="form-phone" class="form-control" required/>
                            </label>
                        </div>
                        <div class="large-6 medium-6 cell">
                            <label for="form-enquiry" class="form-label"> Enquiry Type *
                                <select  class="form-select" id="form-enquiry" name="form-enquiry" required>
                                    <option value="General">General Enquiry</option>
                                    <option value="Personal Injury">Personal Injury</option>
                                    <option value="Immigration">Immigration</option>
                                    <option value="Family Law">Family Law</option>
                                    <option value="Criminal Law">Criminal Law</option>
                                </select>
                            </label>
                        </div>
                    </div>

                    <div class="grid-x grid-padding-x">
                        <div class="large-12 cell">
                            <label for="form-message" class="form-label"> Message *
                                <textarea id="form-message" name="form-message" class="form-control" style="height: 150px" required></textarea>
                            </label>
                        </div>
                    </div>

                    <div class="grid-x grid-padding-x">
                        <div class="large-12 cell">
                            <input type="submit" class="button expanded primary" value="Send message">
                        </div>
                    </div>

                </form>
                <!-- /form -->

            </div>



            <script>
                jQuery('#nlf-form').submit( function (event) {

                    let form_enquiry = jQuery('#form-enquiry').val();

                    event.preventDefault();

                    let endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';

                    let form = jQuery('#nlf-form').serialize();

                    let form_data = new FormData;

                    form_data.append('action', 'nlf-form');
                    form_data.append('nlf-form', form);

                    jQuery.ajax(endpoint, {

                        type: 'POST',
                        data: form_data,
                        processData: false,
                        contentType: false,

                        success: function (res) {

                            jQuery('#error-alert-messages').hide();
                            jQuery('#nlf-form').fadeOut(200);
                            jQuery('#success-alert-messages').show();
                            jQuery('#success-alert-messages-text').text('Message delivered successfully!').show();
                            window.dataLayer.push({'event': 'generate_lead', 'form_enquiry' : form_enquiry, 'form_status' : 'delivered'});
                            jQuery('#nlf-form').trigger('reset');
                            jQuery('#nlf-form').fadeIn(500);

                        },

                        error: function (err) {

                            jQuery('#success-alert-messages').hide();
                            jQuery('#nlf-form').fadeOut(200);
                            jQuery('#error-alert-messages').show();
                            jQuery('#error-alert-messages-text').text('Error, please try again!').show();
                            window.dataLayer.push({'event': 'generate_lead', 'form_enquiry' : form_enquiry, 'form_status' : 'error'});
                            jQuery('#nlf-form').trigger('reset');
                            jQuery('#nlf-form').fadeIn(500);

                        }

                    })

                })

            </script>
