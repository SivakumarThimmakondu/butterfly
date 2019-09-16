/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/*eslint max-nested-callbacks: 0*/
define([
    'jquery',
    'squire'
], function ($, Squire) {
    'use strict';

    describe('NegotiableQuote/js/create-negotiable-quote', function () {
        var obj,
            tplForm,
            injector = new Squire(),
            mocks = {
                'Magento_Checkout/js/model/quote': jasmine.createSpy()
            };

        beforeAll(function (done) {
            tplForm = $('<form id="test-form"/>');
            tplForm.append($('<input type="file" name="file[0]"/>'));
            $(document.body).append(tplForm);

            done();
        });

        afterAll(function (done) {
            tplForm.remove();
            done();
        });

        beforeEach(function (done) {
            injector.mock(mocks);
            injector.require([
                'Magento_NegotiableQuote/js/create-negotiable-quote'
            ], function (CreateNegotiableQuote) {
                obj = new CreateNegotiableQuote({
                    form: '#test-form'
                });

                done();
            });
        });

        describe('"_getFilteredFormData" method', function () {
            it('Check for defined', function () {
                expect(obj._getFilteredFormData).toBeDefined();
                expect(obj._getFilteredFormData).toEqual(jasmine.any(Function));
            });

            it('Check input type file filter', function () {
                var formData;

                spyOn(obj, '_getFormData').and.callFake(function () {
                    return jasmine.createSpyObj('FormData', ['delete']);
                });

                formData = obj._getFilteredFormData();
                expect(formData.delete).toHaveBeenCalledWith('file[0]');
            });
        });
    });
});
