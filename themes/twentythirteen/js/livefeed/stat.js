define(["knockout", "jQuery", "config"], function (ko, $, config) {
    //  TipRanks Statistics
    function TipRanksStat() {
        var self = this;
        this.numAnalysts = ko.observable(1900);
        this.fetch = function () {
            $.get(config.stat).done(function (data) {
                var asNum = parseInt(data.NumAnalysts);
                if ((asNum !== asNum) || asNum < 100) {
                    setTimeout(self.fetch, 6000);
                }
                self.numAnalysts(data.NumAnalysts);
            });
        };
    }

    return TipRanksStat;
});