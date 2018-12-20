define(["knockout","config","jquery","jquery.modal"], function(ko,config,$,_) {
    // TODO refactor this to not use jQuery directly but use a binding helper instead
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    function Security() {
        var self = this;
        self.authenticated = ko.observable(false);
        self.passAttempt = ko.observable("");

        self.authenticate = function(options) {
            $.get(config.auth + "?token=" + self.passAttempt()).done(function() {
                $.modal.close();
                self.authenticated(true);
            }).fail(function() {
                console.log("Test failed");
                if (options && options.onFail && options.onFail.call) {
                    options.onFail();
                }
                $("#TipRanksValidateMessage").text("Invalid Credentials.");
            });
        };
        var initial = getParameterByName("code");
        if (initial != "") {
            //console.log("Got Code from GET param");
            self.passAttempt(initial);
            $("#TipRanksCredentialValidate").val(initial);
            self.authenticate({
                onFail: ready
            });

        } else {
            ready();
        }

        function ready() {

            $(function() {
                $("#TipRanksSecureModal").modal({
                    zIndex: 10001
                });
                $("#TipRanksValidateSubmit").click(function() {
                    self.passAttempt($("#TipRanksCredentialValidate").val());
                    self.authenticate();
                });

            });
        }
    }

    return Security;
});