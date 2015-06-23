
function getCookie(name) {
    var pattern = RegExp(name + "=.[^;]*")
    matched = document.cookie.match(pattern)
    if (matched) {
        var cookie = matched[0].split('=')
        return decodeURIComponent(cookie[1])
    }
    return false
}


var Modal = {
    error_label: 'Erro',
    success_label: 'Sucesso',
    confirm_label: 'Confirmar',
    
    error: function(message) {
        bootbox.alert({
            title: '<span class="error-message"><i class="fa fa-exclamation-triangle"></i> '+Modal.error_label+'</span>',
            message: message
        });
    },
    
    success: function(message) {
        bootbox.alert({
            title: '<span class="success-message"><i class="fa fa-check"></i> '+Modal.success_label+'</span>',
            message: message
        });
    },
    
    confirm: function(message, callback) {
        bootbox.dialog({
            message: message,
            title: "<span class='question-message'><i class='fa fa-question-circle fa-lg'></i> "+Modal.confirm_label+"</span>",
            buttons: {
                cancel: {
                    label: "Cancelar",
                    className: "btn-default",
                    callback: function() {
                        callback(false);
                    }
                },
                main: {
                    label: "OK",
                    className: "btn-primary",
                    callback: function() {
                        callback(true);
                    }
                }
            }
        });
    }
};


$(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-XSRF-TOKEN': getCookie('XSRF-TOKEN')
        }
    });


    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
    
    
    // Javascript to enable link to tab
    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show');
    } 

    // Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
        window.scrollTo(0, 0);
    });
});



var Form = function(fields) {
    this.fields = fields;
};

Form.prototype = {
    validate: function(errors) {
        for (field in this.fields) {
            var el = $(this.fields[field].el);

            var formGroup = this._getFormGroup(el);

            if (!(field in errors)) {
                this._cleanErrors(formGroup);
                continue;
            }
            
            this._setErrors(formGroup, errors[field].join('<br>'));
        }
    },
    
    getValues: function() {
        var values = {};
        var errors = {};
        var hasErrors = false;
        
        for (field in this.fields) {
            var el = $(this.fields[field].el);
            
            if (el.prop('type') == 'checkbox')
                values[field] = el.prop('checked');
            else
                values[field] = el.val();
            
            if (this.fields[field].required == true && (values[field] == null || values[field].length == 0)) {
                hasErrors = true;
                errors[field] = ["O campo :attribute é obrigatório.".replace(":attribute", field)];
            }
        }
        
        return {values: values, errors: errors, hasErrors: hasErrors};
    },
    
    setValues: function(values) {
        for (field in this.fields) {
            var el = $(this.fields[field].el);
            
            if (el.prop('type') == 'checkbox')
                el.prop('checked', values[field]);
            else
                el.val(values[field]);
        }
    },
    
    cleanValues: function() {
        for (field in this.fields) {
            var el = $(this.fields[field].el);
            
            if (el.prop('type') == 'checkbox') {
                el.prop('checked', false);
            } else {
                el.val("");
            }
            
            var formGroup = this._getFormGroup(el);
            this._cleanErrors(formGroup);
        }
    },
    
    _getFormGroup: function(el) {
        if (el.prop('type') == 'checkbox')
            return el.parent().parent();
        else
            return el.parent();
    },
    
    _setErrors: function(formGroup, errorMessage) {
        var msgLabel = $(formGroup).find('.control-label');
        $(formGroup).addClass('has-error');
        $(msgLabel).removeClass('hidden');
        
        $(msgLabel).html(errorMessage);
    },
    
    _cleanErrors: function(formGroup) {
        var msgLabel = $(formGroup).find('.control-label');
        $(formGroup).removeClass('has-error');
        $(msgLabel).addClass('hidden');
    }
};

var Lang = (function() {
    var data = {};

    return {
        register: function(k, v) {
            data[k] = v;
        },

        registerAll: function(items) {
            for (attr in items) {
                data[attr] = items[attr];
            }
        },

        get: function(k) {
            if (k in data) {
                return data[k];
            } else {
                return null;
            }
        }
    };
})();

var Router = (function() {
    var data = {};

    return {
        register: function(k, v) {
            data[k] = v;
        },

        registerAll: function(items) {
            for (attr in items) {
                data[attr] = items[attr];
            }
        },

        get: function(k) {
            if (k in data) {
                return data[k];
            } else {
                return null;
            }
        }
    };
})();