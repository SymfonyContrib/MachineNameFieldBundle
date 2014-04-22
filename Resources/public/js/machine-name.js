/**
 * Machine name UX niceness.
 *
 * Automatically creates the machine name based on a scrubbed version of
 * the label entered.
 */
(function ($) {
    'use strict';

    var $name  = $('input.field-name');
    var $label = $('input.field-label');

    $name
        .closest('.form-group').hide()
        .closest('form').submit(function (e) {
            $name.val(transformLabelToName($label.val()));
        });

    $label
        .after('<span id="machine-name-display"></span>')
        .on('keypress input', function (e) {
            return setTimeout(function (e) {
                var name = transformLabelToName($label.val());
                $('#machine-name-display').text(name);
                $name.val(name);
            }, 5);
        });

    function transformLabelToName(label) {
        return label
            .toLowerCase()
            .replace(/(\s+|_+|-+)+/g, '_')
            .replace(/[^a-z0-9_]+/g, '')
            .replace(/^[_]+/, '')
            .replace(/[_]+$/, '');
    }

    function initForm() {
        var name = $name.val();

        if (!name) {
            name = transformLabelToName($label.val());
            $name.val(name);
        }

        $('#machine-name-display').text(name);
    }

    initForm();

})(jQuery);
