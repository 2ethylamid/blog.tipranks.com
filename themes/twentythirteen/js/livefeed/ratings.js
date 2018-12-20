define(["knockout", "jQuery"], function(ko, $) {
    // Analyst's Rankings

    function Ratings(rating) {
        var rankings = [];

        for (var i = 0; i < rating.length; i++) {
            (function(i) {
                try {
                    var reason = rating[i].closedReason || "";
                    var status = rating[i].status;
                    var perf = ((rating[i].performance > 0) ? "+" : "") + (rating[i].performance * 100).toFixed(1) + "%";
                    var open = moment.utc(rating[i].opened).format("D MMM YYYY");
                    var close = moment.utc(rating[i].closed).format("D MMM YYYY");
                    var expired = moment.utc(rating[i].expired).format("D MMM YYYY");

                } catch(e) {
                }
                rankings.push({
                    rating: rating[i].rating,
                    performance: rating[i].performance,
                    companyName: rating[i].companyName,
                    opened: open,
                    reason: rating[i].reason,
                    isExpired: rating[i].isExpired,
                    closedReason: rating[i].closedReason,
                    expired: expired || "",
                    close: close || "",
                    isOpen: ko.observable(false),
                    //view model attributes
                    performanceFixed: perf,
                    getRatingImageSmall: ko.computed(function() {
                        if (rating[i].rating.toUpperCase() === "SELL") {
                            return "SellSmall";
                        } else if (rating[i].rating.toUpperCase() === "BUY") {
                            return "BuySmall";
                        } else {
                            return "HoldSmall";
                        }
                    }),
                    getRatingType: ko.computed(function() {
                        return parseFloat(perf)>=0 ? "TipRanksPortfolioProfit" : "TipRanksPortfolioLoss";
                    }),
                    ratingStatus: ko.computed(function() {
                        if (status == 6 && reason.length === 0) {
                            return "Expired";
                        } else if (status == 4 || reason.length > 0) {
                            return "Closed";
                        } else {
                            return "Open";
                        }

                    })
                });
            })(i);
        }
        return rankings;
    }

    return Ratings;
});