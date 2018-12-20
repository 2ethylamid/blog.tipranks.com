// Author: Benjamin Gruenbaum.
//
// The Analyst class represents a TipRanks analyst view model

define(["knockout", "jQuery", "ratings", "config", "moment"], function (ko, $, Ratings, config, moment) {

    // Constructor
    // m - mapping object from the server. The model
    // stat - A TipRanks statistics object, (constructor DI)
    function FeedItem(m, stat) {
        
        var self = this;
        
        // Basic Information
        this.name = m.name;
        this.id = m.id;
        this.firm = m.firm;
        this.rank = m.rank;
        this.stock = m.stockTicker;
        this.actionId = m.ActionID;
        
        if (m.img && m.img.length > 10) {
            this.img = "http://trstorage1.blob.core.windows.net/expert-pictures/" + m.img;
        } else {
            this.img = "../img/emptyanalyst.png";
        }

        //Ranking
        //this.rankings = ko.observableArray(m.rankings || []);
        //Performance
        this.profitOverSector = m.profitOverSector * 100;
        this.recSuccess = m.recSuccess;
        this.recTotal = m.recTotal;
        this.rating = m.rating.toUpperCase();
        this.ratingDate = moment.utc(m.ratingDate).format("DD MMM YYYY");
        this.articleLink = m.articleLink;

        this.successRate = ko.computed(function () {
            return Math.round(((+self.recSuccess) / (+self.recTotal)) * 100) + "%";
        });

        this.starRank = ko.computed(function () {
            return ((stat.numAnalysts() - self.rank) / stat.numAnalysts());
        });
        this.say = ko.computed(function () {
            var operationActionEnum = {
                InitiatedCoverage: 1,
                ResumedCoverage: 2,
                Upgraded: 3,
                Downgraded: 4,
                Maintained: 5,
                Reiterated: 6,
                HasStatus: 7,
                Released: 8,    
                Last: 9
            };
            
            
            if (self.actionId === operationActionEnum.InitiatedCoverage) {
                return ("initiated coverage on <span class='link'>" + self.stock + "</span> with a <span class='black bold'>" + self.rating + "</span>");
            }

            if (self.actionId === operationActionEnum.ResumedCoverage) {
                return ("resumed coverage on <span class='link'>" + self.stock + "</span> with a <span class='black bold'>" + self.rating + "</span> rating");
            }
            
            if (self.actionId === operationActionEnum.Upgraded) {
                return ("upgraded rating on <span class='link'>" + self.stock + "</span> to <span class='black bold'>" + self.rating + "</span>");
            }
            
            if (self.actionId === operationActionEnum.Downgraded) {
                return ("downgraded rating on <span class='link'>" + self.stock + "</span> to <span class='black bold'>" + self.rating + "</span>");
            }
            
            if (self.actionId === operationActionEnum.Maintained) {
                return ("maintained a <span class='black bold'>" + self.rating + "</span> rating on <span class='link'>" + self.stock + "</span>");
            }
            
            if (self.actionId === operationActionEnum.Reiterated) {
                return ("reiterated a <span class='black bold'>" + self.rating + "</span> rating on <span class='link'>" + self.stock + "</span>");
            }
            
            if (self.actionId === operationActionEnum.HasStatus) {
                return ("has status a <span class='black bold'>" + self.rating + "</span> rating on <span class='link'>" + self.stock + "</span>");
            }
            
            if (self.actionId === operationActionEnum.Released) {
                return ("released a <span class='black bold'>" + self.rating + "</span> rating on <span class='link'>" + self.stock + "</span>");
            }
            
            if (self.actionId === operationActionEnum.Last) {
                return ("last a <span class='black bold'>" + self.rating + "</span> rating on <span class='link'>" + self.stock + "</span>");
            }

        });

        this.profitPercent = ko.computed(function () {
            var usedProfit = Math.abs(self.profitOverSector).toFixed(1);
            var profitNum = +(self.profitOverSector.toFixed(1));//cast to double
            var sign = (function () {
                if (profitNum === 0) return "";
                return profitNum > 0 ? "+" : "-";
            })();
            return sign + usedProfit + "%";
        });

        this.getBoxGoodOrBad = ko.computed(function () {
            return (parseFloat(self.profitPercent()) >= 0) ? "visual-excess-return-pos-img" : "visual-excess-return-neg-img";
        });


        // End Model State, begin ViewModel state
        this.selected = ko.observable(false);
        //this.performanceTab = ko.observable(true); //open performance by default
        //this.ratingTab = ko.observable(false);
        //this.scrollbars = ko.observable(false);
        //this.ratingError = ko.observable("");
        // actions

        //Update Rankings
        //this.fetchRankings = function () {
        //    $.get(config.portfolios + self.id).done(function (model) {
        //        self.rankings(new Ratings(model));
        //        self.scrollbars(true);
        //    }).fail(function (e) {
        //        if (e.status == 403) {
        //            self.ratingError("Authentication Error, Inactive Session. Please Log In Again.");
        //        } else {
        //            self.ratingError("Error fetching data from server " + e.status);
        //        }

        //    });
        //};


        // When opening the analyst (that is, its state changes to "selected"), we
        // want to fetch the rankings from the data broker server.

        //var selectedAlready = false;
        //this.selected.subscribe(function () {
        //    if (!selectedAlready) {
        //        self.fetchRankings();
        //    }
        //    selectedAlready = true;
        //});

        //this.select = function () {
        //    self.selected(true);
        //    self.extreDetails(true);
        //};

        // Open a single analyst rating, that is, mark all other rankings as closed
        // and the one you clicked on as open.
        //this.openRating = function (rating) {
        //    var rank = self.rankings();
        //    for (var i = 0; i < rank.length; i++) {
        //        rank[i].isOpen(false);
        //    }
        //    rating.isOpen(true);
        //};

         //maps a CSS class from the rating for the background
            this.ratingStatusClass = ko.computed(function () {
                return ({
                    "BUY": "analyst-rating-buy",
                    "HOLD": "analyst-rating-hold",
                    "SELL": "analyst-rating-sell"
                })[self.rating] || "INVALID";
            });
    }

    return FeedItem;
})