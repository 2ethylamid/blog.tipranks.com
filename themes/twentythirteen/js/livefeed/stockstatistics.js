define(["knockout"], function(ko) {
    function StockStatistics(analysts) {
        var getRating = function (rating) {

            return ko.computed(function () {
                return analysts().filter(function (elem) {
                    return elem.rating.toUpperCase() === rating;
                }).length;

            });
        };
        this.getBuy = getRating("BUY");
        this.getSell = getRating("SELL");
        this.getHold = getRating("HOLD");
        this.getRatings = ko.computed(function () {
            return { getBuy: this.getBuy(), getSell: this.getSell(), getHold: this.getHold() };
        }, this);
    }

    return StockStatistics;
});
