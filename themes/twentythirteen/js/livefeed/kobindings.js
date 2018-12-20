define(["knockout", "jQuery", "scrollbar", "raphael","g.pie"], function (ko, $,_0, Raphael,_1) {
    ko.bindingHandlers.showCustomScroll = {
        init: function(element, valueAccessor) {
        },
        update: function(element, valueAccessor) {
            if (ko.utils.unwrapObservable(valueAccessor)) {
                updateScrollBar(element);
            }

        }
    };
    ko.bindingHandlers.slideVisible = {
        init: function(element, valueAccessor) {
            // Initially set the element to be instantly visible/hidden depending on the value
            var value = valueAccessor();
            $(element).toggle(ko.utils.unwrapObservable(value)); // Use "unwrapObservable" so we can handle values that may or may not be observable
        },
        update: function(element, valueAccessor) {
            // Whenever the value subsequently changes, slowly fade the element in or out
            var value = valueAccessor();
            if (ko.utils.unwrapObservable(value)) {
                if ($(element).is(":hidden")) {
                    $(element).stop(true, true).slideDown("fast");
                }
            } else {
                $(element).stop(true, true).slideUp("fast");
            }
        }
    };


    ko.bindingHandlers.showStars = {
        init: updateStars,
        update: updateStars
    };

    ko.bindingHandlers.showSmallStars = {
        init: updateSmallStars,
        update: updateSmallStars
    };
    
    function updateStars(element, valueAccessor, allBindingsAccessor, viewModel, bindingContext) {
        var value = ko.utils.unwrapObservable(valueAccessor()); // Get the current value of the current property we're bound to
        element.innerHTML = ""; //empty();//clear element
        var stars = document.createElement("div");
        stars.style.backgroundImage = "url(../img/sadstars.png)";
        var goodStars = document.createElement("div");
        stars.style.height = "34px";
        goodStars.style.backgroundImage = "url(../img/happystars.png)";
        value = Math.abs(value);
        goodStars.style.width = 157 * (value) + "px";
        goodStars.style.height = "34px";
        stars.appendChild(goodStars);
        element.appendChild(stars);

    }

    function updateSmallStars(element, valueAccessor, allBindingsAccessor, viewModel, bindingContext) {
        var value = ko.utils.unwrapObservable(valueAccessor()); // Get the current value of the current property we're bound to
        element.innerHTML = ""; //empty();//clear element
        var stars = document.createElement("div");
        stars.style.backgroundImage = "url(../img/smallsadstars.png)";
        var goodStars = document.createElement("div");
        stars.style.height = "17px";
        goodStars.style.backgroundImage = "url(../img/smallhappystars.png)";
        goodStars.style.width = 100 * (value) + "px";
        goodStars.style.height = "17px";
        stars.appendChild(goodStars);
        element.appendChild(stars);
    }
    
    ko.bindingHandlers.fadeVisible = {
        init: function(element, valueAccessor) {
            // Initially set the element to be instantly visible/hidden depending on the value
            var value = valueAccessor();
            $(element).toggle(ko.utils.unwrapObservable(value)); // Use "unwrapObservable" so we can handle values that may or may not be observable
        },
        update: function(element, valueAccessor) {
            // Whenever the value subsequently changes, slowly fade the element in or out
            var value = valueAccessor();
            if (ko.utils.unwrapObservable(value)) {
                if ($(element).is(":hidden")) {
                    $(element).stop(true, true).fadeIn("fast");
                }
            } else {
                $(element).stop(true, true).hide();
            }
        }
    };

    ko.bindingHandlers.showBar = {
        init: function(element) {
            updateBar.apply(null, arguments);
            $(element).on("click", function(e) {
                //console.log(e.getTarget())
            });
        },
        update: updateBar
    };

    function updateBar(element, valueAccessor, allBindingsAccessor, viewModel, bindingContext) {
        var value = ko.utils.unwrapObservable(valueAccessor()); // Get the current value of the current property we're bound to
        var x = Math.round((parseInt(value) / 100) * 20);
        element.style.backgroundImage = "url(../img/YahooFinanceSuccessRateBar/" + x + ".png)";
    }


    var alreadyApplied = [];

    function updateScrollBar(elemForScrollBar) { //scrollbar
        var already = false;
        for (var i = 0; i < alreadyApplied.length; i++) {
            if (elemForScrollBar === alreadyApplied[i]) {
                already = true;
                return;
            }
        }
        alreadyApplied.push(elemForScrollBar);
        $(elemForScrollBar).mCustomScrollbar({
            advanced: {
                updateOnBrowserResize: true,
                updateOnContentResize: true
            },
            scrollEasing: "easeOutCirc",
            mouseWheel: "auto",
            autoDraggerLength: true
        });
        $(".mCSB_container", elemForScrollBar).css("margin-right", "0px");
        $(".mCSB_scrollTools .mCSB_draggerRail", elemForScrollBar).css("width", "8px");
        $(".mCSB_scrollTools", elemForScrollBar).css("left", "448px");
        setTimeout(function() {
            $(".mCSB_dragger", elemForScrollBar).css("height", "30px");
        }, 200);
    };

    ko.bindingHandlers.piChart = {
        init: function() {
        },
        update: drawPiChart
    };

    function drawPiChart(element, valueAccessor, allBindingsAccessor, viewModel, bindingContext) {
        var val = ko.utils.unwrapObservable(valueAccessor());
        element.innerHTML = "";
        
        var values = [
            { num: val.getBuy, color: "#3abac3", legend:'Buy' },       //BUY
            { num: val.getHold, color: "#747474",legend:'Hold'  },       //HOLD
            { num: val.getSell, color: "#90408f", legend: 'Sell' }];      //SELL
        

        //cant be 0 on ie8
        for (var i = 0; i < values.length; i++) {
            if (values[i].num == 0) {
                values[i].num = 0.001;
            }
        }
        
        values.sort(function (a, b) { return b.num - a.num; });
        
        
        var r = Raphael(element, "300px", "230px");
        pie = r.piechart(110, 115, 90, [values[0].num, values[1].num, values[2].num], {colors: [values[0].color, values[1].color, values[2].color], legend: [values[0].legend+"\n%%", values[1].legend+"\n%% ", values[2].legend+"\n%%"], legendpos: "east" });
       
        pie.hover(function() {
            this.sector.stop();
            this.sector.scale(1.05, 1.05, this.cx, this.cy);

            if (this.label) {
                this.label[0].stop();
                this.label[0].attr({ r: 7.5 });
                this.label[1].attr({ "font-weight": 800 });
            }
        }, function() {
            this.sector.animate({ transform: 's1 1 ' + this.cx + ' ' + this.cy }, 500, "bounce");

            if (this.label) {
                this.label[0].animate({ r: 5 }, 500, "bounce");
                this.label[1].attr({ "font-weight": 400 });
            }
        });

    }
});