define(["knockout", "jQuery", "kobindings", "stat", "stockstatistics", "analyst", "config", "security", "AnalystConcencus", "FeedItem", "scrollbox"], function (ko, $, _, TipRanksStat, StockStatistics, Analyst, config, Security, AnalystConcencus, FeedItem, scrollbox) {

    function ViewModel() {
        var self = this;
        this.actualAnalysts = ko.observableArray([]);

        this.isSortOnDate = ko.observable(true);
        this.isSortOnRank = ko.observable(false);

        this.analysts = ko.computed(function () {
            if (self.isSortOnDate()) {
                return self.actualAnalysts();
            }

            return self.actualAnalysts().slice(0).sort(function (x, y) { return x.rank - y.rank; });
        });
        //this.actualAnalysts.subscribe(buildScrollbar);
        //this.isSortOnDate.subscribe(buildScrollbar);
        //function buildScrollbar() {
        //    //This is a dirty hack :(
        //    // If we leave this here too long all hell will break loose :(
        //    $("#TipRanks ul").mCustomScrollbar({
        //        advanced: {
        //            updateOnBrowserResize: true,
        //            updateOnContentResize: true
        //        },
        //        scrollEasing: "easeOutCirc",
        //        mouseWheel: "auto",
        //        autoDraggerLength: true
        //    });

        //}

        this.sortByDate = function () {
            self.isSortOnDate(true);
            self.isSortOnRank(false);
        };
        this.sortByRank = function () {
            self.isSortOnDate(false);
            self.isSortOnRank(true);
        };

        this.stat = new TipRanksStat();

        //update analysts
        this.update = function (arr) {
            if (typeof arr === "string") {//JSON string 
                arr = JSON.parse(arr);
            }
            self.actualAnalysts(arr.map(function (model) {
                return new Analyst(model, self.stat);
            }));
        };
        this.selectedAnalyst = null;

        this.actualAnalysts.subscribe(function () {
            $("#yfi_investing_nav").height($("#TipRanks").height() + 90);
        });

        this.openAnalystData = function (el) {
            if (self.selectedAnalyst !== null) { // close the old one
                self.selectedAnalyst.selected(false);
            }
            el.selected(true);
            self.selectedAnalyst = el;
        };
        //RESTful update
        this.fetch = function (elem) {
            if (typeof elem === "string") {//got inject
                setTimeout(function () {
                    self.update(JSON.parse(elem));
                }, 5);
            }
            var l = window.location.href.split("/"); // get from server
            l = l[l.length - 1].split(".")[0];
            $.get(config.stocks + l, self.update);
        };

        //Side data
        this.stockData = new StockStatistics(self.analysts);

        //Concencus Widget
        this.concencus = new AnalystConcencus(self.actualAnalysts);
        
        //Live Feed Widget
        this.feedItems = ko.observableArray([]);
        
        this.selectedFeed = null;
        
        this.openFeed = function (el) {
            
            if (self.selectedFeed !== null) { // close the old one
                self.selectedFeed.selected(false);
            }
           
            if (self.selectedFeed == el) {
                self.selectedFeed = null;
                return;
            }
            
            el.selected(true);
            self.selectedFeed = el;
        };
        
        this.closeFeed = function (el) {
            el.selected(false);
            self.selectedFeed = null;
        };
        
        this.fetchLiveFeed = function () {
            
            $.get(config.livefeed, function(data) {
                self.feedItems(data.map(function (feed) {
                    return new FeedItem(feed, self.stat);
                }));
                
                //$('#TRLiveFeed-content').scrollbox({
                //    linear: true,
                //    step: 1,
                //    delay: 0,
                //    speed: 100
                //});
                
                //will also work on different zooms
                $('#TRLiveFeed-content').scrollbox();
            });
        };
        
        //Security
        this.security = new Security();


    }

    return ViewModel;
});