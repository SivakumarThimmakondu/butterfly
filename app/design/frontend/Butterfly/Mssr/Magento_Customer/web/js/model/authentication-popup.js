/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'jquery',
    'Magento_Ui/js/modal/modal'
], function ($, modal) {
    'use strict';

    return {
        modalWindow: null,

        /**
         * Create popUp window for provided element
         *
         * @param {HTMLElement} element
         */
        createPopUp: function (element) {
            var options = {
                'type': 'popup',
                'modalClass': 'popup-authentication',
                'focus': '[name=username]',
                'responsive': true,
                'innerScroll': false,
                'trigger': '.proceed-to-checkout, .trigger-auth-popup, .signup-auth-popup',
                'buttons': []
            };

            this.modalWindow = element;
            modal(options, $(this.modalWindow));
        },
 createPopUp: function (element) {
            var options = {
                'type': 'popup',
                'modalClass': 'popup-signupauthentication',
                'focus': '[name=username]',
                'responsive': true,
                'innerScroll': false,
                'trigger': '.proceed-to-checkout, .signup-auth-popup',
                'buttons': []
            };

            this.modalWindow = element;
            modal(options, $(this.modalWindow));
        },

        /** Show login popup window */
        showModal: function () {
            $(this.modalWindow).modal('openModal').trigger('contentUpdated');
        }
    };
});
