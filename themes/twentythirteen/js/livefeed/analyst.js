// Author: Benjamin Gruenbaum.
//
// The Analyst class represents a TipRanks analyst view model

define(["knockout", "jQuery", "ratings", "config", "moment"], function (ko, $, Ratings, config, moment) {

    // Constructor
    // m - mapping object from the server. The model
    // stat - A TipRanks statistics object, (constructor DI)
    function Analyst(m, stat) { 
        var self = this;
        // Basic Information
        this.name = m.name;
        this.id = m.id;
        this.firm = m.firm;
        this.rank = m.rank;
        if (m.img && m.img.length > 10) {
            this.img = "http://trstorage1.blob.core.windows.net/expert-pictures/" + m.img;
        } else {
            this.img = "../img/emptyanalyst.png";
        }

        //Ranking
        this.rankings = ko.observableArray(m.rankings || []);
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
            return (parseFloat(self.profitPercent()) >= 0) ? "GoodAnalystBox" : "BadAnalystBox";
        });



        // Link to the article
        this.article = m.article;

        // End Model State, begin ViewModel state
        this.selected = ko.observable(false);
        this.performanceTab = ko.observable(true); //open performance by default
        this.ratingTab = ko.observable(false);
        this.scrollbars = ko.observable(false);
        this.ratingError = ko.observable("");
        // actions
        
        //Update Rankings
        this.fetchRankings = function () {
            $.get(config.portfolios + self.id).done(function (model) {
                self.rankings(new Ratings(model));
                self.scrollbars(true);
            }).fail(function(e){
                if (e.status == 403) {
                    self.ratingError("Authentication Error, Inactive Session. Please Log In Again.");
                } else {
                    self.ratingError("Error fetching data from server "+e.status);
                }
                
            });
        };

        // When opening the analyst (that is, its state changes to "selected"), we
        // want to fetch the rankings from the data broker server.

        var selectedAlready = false;
        this.selected.subscribe(function () {
            if (!selectedAlready) {
                self.fetchRankings();
            }
            selectedAlready = true;
        });

        this.selectRatingTab = function () {
            self.performanceTab(false);
            self.ratingTab(true);
        };

        this.selectPerformanceTab = function () {
            self.performanceTab(true);
            self.ratingTab(false);
        };

        // Open a single analyst rating, that is, mark all other rankings as closed
        // and the one you clicked on as open.
        this.openRating = function (rating) {
            var rank = self.rankings();
            for (var i = 0; i < rank.length; i++) {
                rank[i].isOpen(false);
            }
            rating.isOpen(true);
        };

        // maps a CSS class from the rating for the background
        this.ratingStatusClass = ko.computed(function () {
            return ({
                "BUY":"TipRanksBuyRating",
                "HOLD":"TipRanksHoldRating",
                "SELL":"TipRanksSellRating"
            })[self.rating] || "INVALID";
        });
    }

    return Analyst;
})