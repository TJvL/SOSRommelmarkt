/**
 * Rules
 */
module.exports = {

    required: /.+/,
    digits: /^\d+$/,
    price: /^(\$|)([1-9]\d{0,2}(\,\d{3})*|([1-9]\d*))(\.\d{2})?$/,
    email: /^[^@]+@[^@]+\..{2,6}$/,
    username: /^[a-z](?=[\w.]{3,31}$)\w*\.?\w*$/i,
    name: /^([A-z\s]{3,10})+$/,
    lastname: /^([A-z\s]{3,10})+$/,
    place: /^([A-z\s]{3,10})+$/,
    companyname: /^([A-z\s]{3,10})+$/,
    kvknr: /^([0-9]{8})+$/,
    street: /^([1-9][e][\s])*([a-zA-Z]+(([\.][\s])|([\s]))?)+[1-9][0-9]*(([-][1-9][0-9]*)|([\s]?[a-zA-Z]+))?$/i,
    pass: /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/,
    strongpass: /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/,
    phone: /(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)/,
    fax: /(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)/,
    gsm: /(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)/,
    zip: /[0-9]{4}\s*[a-zA-Z]{2}/,
    url: /^(?:(ftp|http|https):\/\/)?(?:[\w\-]+\.)+[a-z]{2,6}([\:\/?#].*)?$/i,

    number: function(input, value) {
        return !isNaN(value);
    },

    range: function(input, value, min, max) {
        return Number(value) >= min && Number(value) <= max;
    },

    min: function(input, value, min) {
        return value.length >= min;
    },

    max: function(input, value, max) {
        return value.length <= max;
    },

    minoption: function(input, value, min) {
        return this._getRelated(input).filter(':checked').length >= min;
    },

    maxoption: function(input, value, max) {
        return this._getRelated(input).filter(':checked').length <= max;
    },

    minmax: function(input, value, min, max) {
        return value.length >= min && value.length <= max;
    },

    select: function(input, value, def) {
        return value != def;
    },

    extension: function(input) {

        var extensions = [].slice.call(arguments, 1)
            , valid = false;

        $.each(input.files || [{name: input.value}], function(i, file) {
            valid = $.inArray(file.name.split('.').pop().toLowerCase(), extensions) > -1;
        });

        return valid;
    },

    equalto: function(input, value, target) {

        var self = this
            , $target = $('[name="'+ target +'"]');

        if (this.getInvalid().find($target).length) return false;

        $target.off('keyup.equalto').on('keyup.equalto', function() {
            self._getField(input).removeData('idealforms-value');
            self._validate(input, false, true);
        });

        return input.value == $target.val();
    },

    date: function(input, value, format) {

        format = format || 'dd/mm/yyyy';

        var delimiter = /[^mdy]/.exec(format)[0]
            , theFormat = format.split(delimiter)
            , theDate = value.split(delimiter);

        function isDate(date, format) {

            var m, d, y;

            for (var i = 0, len = format.length; i < len; i++) {
                if (/m/.test(format[i])) m = date[i];
                if (/d/.test(format[i])) d = date[i];
                if (/y/.test(format[i])) y = date[i];
            }

            if (!m || !d || !y) return false;

            return m > 0 && m < 13 &&
                y && y.length == 4 &&
                d > 0 && d <= (new Date(y, m, 0)).getDate();
        }

        return isDate(theDate, theFormat);
    }

};