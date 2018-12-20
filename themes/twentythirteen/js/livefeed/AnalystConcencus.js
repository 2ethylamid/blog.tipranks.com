define(["knockout"], function(ko) {

    //Accepts an _observable_ array of analysts
    function AnalystConcencus(analysts) {
        var self = this;
        this.totalAnalysts = ko.computed(function() {
            return analysts().length;
        });
        this.concencusRating = ko.computed(function() {
            var buy = analysts().filter(function(x) {
                return x.rating === "BUY";
            });
            var hold = analysts().filter(function(x) {
                return x.rating === "HOLD";
            });
            var sell = analysts().filter(function(x) {
                return x.rating === "SELL";
            });
            if (buy > hold && hold > sell) {
                if (buy > hold + sell) {
                    return "STRONG BUY";
                }
                return "MODERATE BUY";
            }
            if (sell > hold && sell > buy) {
                if (sell > hold + buy) {
                    return "STRONG SELL";
                }
                return "MODERATE SELL";
            }
            return "HOLD";
        });
        this.concencusClass = ko.computed(function() {
            return ({
                "STRONG BUY":"BuyConcencus",
                "MODERATE BUY":"BuyConcencus",
                "HOLD":"HoldConcencus",
                "MODERATE SELL":"SellConcencus",
                "STRONG SELL":"SellConcencus"
            })[self.concencusRating().toUpperCase()] || "BuyConcencus";
        });

    }

    return AnalystConcencus;
});