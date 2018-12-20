
require(["jQuery", "viewmodel", "knockout"], function ($, ViewModel, ko) {




    // MUST SHIM array.map
    /**
    TipRanks integrated system v.0.1 
    22.05.2013 ~Benji
    
    */

    $.support.cors = true;
  

    $(function () {
        initAnalytics(); // Call KissMetrics
        var vm = new ViewModel();
        vm.update([]);
        vm.security.authenticated.subscribe(function (valChange) {
            _kmq = _kmq || {}
            _kmq.push(['record', 'yahoo-finance-site-mock'], { code: vm.security.passAttempt() });
            if (vm.security.authenticated() == true) {
                vm.fetch();
                vm.stat.fetch();
                vm.fetchLiveFeed();
            }
        });


        //debug
        window.vm = vm;
        window.ko = ko;

        //tooltip
        $(document).on("mouseenter", ".HelpToolTip", function () {
            $(this).parent().find(".AnalystToolTip").addClass("AnalystOpenToolTip");
        });
        $(document).on("mouseleave", ".AnalystOpenToolTip", function () {
            $(this).parent().find(".AnalystToolTip").removeClass("AnalystOpenToolTip");
        });
        $(document).on("mouseleave", ".AnalystOpenToolTip", function () {
            $(this).removeClass("AnalystOpenToolTip");
        });
        new Image().src = "../img/tooltip.png"; //prefetch
        ko.applyBindings(vm, document.getElementById("yfi_investing_content"));


        //live feed tooltip
        $(document).on("mouseenter", ".tooltip", function () {
            $(this).next(".tooltip-details").removeClass("hide");
        });
        $(document).on("mouseleave", ".tooltip-details", function () {
            $(this).addClass("hide");
        });
        
        $(document).on("click", "#TRLiveFeed-content .feed-item", function () {
            var position = $(this).position();
            var analystDetails = $(this).next(".analyst-details");

            if (position.top >= 330) {
                analystDetails.css("top", 400);
            } else {
                analystDetails.css("top", position.top + 73);
            }
        });
        
        $(document).on("mouseleave", "#TRLiveFeed-content", function () {
            $("#TRLiveFeed-content .feed-close").trigger("click");
        });


    });

    function initAnalytics() {
        var _kmq = _kmq || [];
        var _kmk = _kmk || 'f08d4d1dbb9776ff051dd6c5d331b4fa8e298d78';
        function _kms(u) {
            setTimeout(function () {
                var d = document,
                    f = d.getElementsByTagName('script')[0],
                    s = d.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.src = u;
                f.parentNode.insertBefore(s, f);
            }, 1);
        }
        _kms('//i.kissmetrics.com/i.js');
        _kms('//doug1izaerwt3.cloudfront.net/' + _kmk + '.1.js');
        window._kms = _kms; // Leak global just cause :(
        window._kmk = _kmk; // Leak global just cause :(
        window._kmq = _kmq;
    }
});