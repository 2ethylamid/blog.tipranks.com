var selectedFilter = 'all';
//var dataTypes = ['stocks', 'bloggers', 'analysts', 'insiders', 'institutions'];
var dataTypes = ['stocks', 'bloggers', 'analysts', 'insiders'];
var headerText = {
    'stocks' : '<div class="client-components-search-search-results__categoryHeader undefined">Ticker / Company</div>',
    'bloggers' : '<div class="client-components-search-search-results__categoryHeader undefined">Bloggers</div>',
    'analysts' : '<div class="client-components-search-search-results__categoryHeader undefined">Analysts</div>',
    'insiders' : '<div class="client-components-search-search-results__categoryHeader undefined">Corporate Insiders</div>',
    'institutions' : '<div class="client-components-search-search-results__categoryHeader undefined">Hedge Funds</div>'
};
var searchPlaceHolderText = {
    'all': 'Type Expert Name or Stock',
    'stocks': 'Search for Companies…',
    'bloggers': 'Search for Bloggers…',
    'analysts': 'Search for Analysts…',
    'instiders': 'Search for Insiders…',
    'institutions': 'Search for Hedge Funds…'
};

(function($){

    $(document).ready(function(){

        $('.client-components-mobile-container-menu-items__header-item-text.client-components-mobile-container-menu-items__hasItems').click(function(){

            if ($(this).next().height() > 0) {
                $(this).next().css({'max-height': '0', 'visibility' : 'invisible'});
                $(this).removeClass('client-components-mobile-container-menu-items__isOpen');
            } else {
                $(".client-components-mobile-container-menu-items__header-items.client-components-mobile-container-menu-items__header-items-level-2").css({'max-height': '0', 'visibility' : 'invisible'});
                $(this).addClass('client-components-mobile-container-menu-items__isOpen');
                $(this).after().toggleClass('rotate90');
                $(this).next().css({'max-height': '100px', 'visibility' : 'visible'});
            }
        });

        $('label.menu.link').click(function(){
            $('.client-components-SlidingMenuWrapper-styles__wrapper').toggleClass('slideLeft');
        });

        $(".client-components-search-category-menu__button").click(function() {
            $(".client-components-search-category-menu__ul").toggleClass('dropdown_visible');
        });

        //$(".client-components-search-category-menu__button").focusout(function() {
        //    $(".client-components-search-category-menu__ul").toggleClass('dropdown_visible');
        //});

        $(".client-components-search-category-menu__li").click(function(event) {
            selectedFilter = event.target.id;
            $(".client-components-search-category-menu__li").removeClass("client-components-search-category-menu__selected");
            $(".client-components-search-category-menu__li .fa").hide();
            $(this).addClass("client-components-search-category-menu__selected");
            $(".client-components-search-category-menu__li.client-components-search-category-menu__selected .fa").show();
            $(".client-components-search-category-menu__svg").hide();

            var newIconImg = $(this).children().first().attr('src');

            var activeIcon = '<img src="' + newIconImg + '" class="client-components-search-category-menu__img">';

            $(".client-components-search-category-menu__button .client-components-search-category-menu__img").remove();

            if (selectedFilter != 'all') {
                $(".client-components-search-category-menu__button").append(activeIcon);
            } else {
                $(".client-components-search-category-menu__svg").show();
            }

            $(".client-components-search-category-menu__ul").toggleClass('dropdown_visible');

            $(".client-components-search-auto-complete__input").attr('placeholder', searchPlaceHolderText[selectedFilter])
        });

        $('html').click(function(e) {
            if(!$(e.target).hasClass('client-components-search-search-results__wrapper') )
            {
                $(".client-components-search-search-results__wrapper ul.basic_ul").empty();
                $(this).val('');
                $(".client-components-search-search-results__wrapper").hide();
            }
        });

        $('.client-components-search-search-results__wrapper undefined').focusout(function(){
            $(".client-components-search-search-results__wrapper ul.basic_ul").empty();
            $(this).val('');
            $(".client-components-search-search-results__wrapper").hide();
        });

        $('input[name=top_search_autocomplete]').keyup(function(e){
            $(".client-components-search-search-results__wrapper ul.basic_ul").empty();
            if(e.keyCode == 8) {
                $(".client-components-search-search-results__wrapper ul.basic_ul").empty();
                $(".client-components-search-search-results__wrapper").hide();
            }

            if (e.keyCode == 27) {
                $(".client-components-search-search-results__wrapper ul.basic_ul").empty();
                $(this).val('');
                $(".client-components-search-search-results__wrapper").hide();
                return;
            }
        });


        $('input[name=top_search_autocomplete]').keyup(delay(function(e){

            var input = $(this).val();
            var url = "https://autocomplete.tipranks.com/api/Autocomplete/getAutoCompleteNoSecondary";
            if (input.length >= 2) {

                $(".client-components-search-auto-complete__loader").show();

                var request = $.getJSON(url+'/?name='+input, function(data) {

                    var arrangedData = {};

                    for (var i = 0; i < dataTypes.length; i++) {
                        arrangedData[dataTypes[i]] = new Array();
                    }

                    for (var i = 0; i < data.length; i++) {
                        var link = "http://tipranks.com";
                        switch(data[i]['category']) {
                            case 'ticker' :
                                link += '/stocks/';
                                data[i]['link'] = link + data[i]['value'];
                                arrangedData['stocks'].push(data[i]);
                                break;
                            case 'blogger':
                                link += '/bloggers/';
                                data[i]['link'] = link + convertToSlug(data[i]['value']);
                                arrangedData['bloggers'].push(data[i]);
                                break;
                            case 'analyst':
                                link += '/analysts/';
                                data[i]['link'] = link + convertToSlug(data[i]['value']);
                                arrangedData['analysts'].push(data[i]);
                                break;
                            case 'insider':
                                link += '/insiders/';
                                data[i]['link'] = link + convertToSlug(data[i]['value']);
                                arrangedData['insiders'].push(data[i]);
                                break;
                            case 'fund':
                                //link += '/hedge-funds/';
                                //data[i]['link'] = link + convertToSlug(data[i]['value']);
                                //arrangedData['institutions'].push(data[i]);
                                break;
                        }
                    }

                    console.log(arrangedData);
                    $(".client-components-search-auto-complete__loader").hide();
                    if (selectedFilter == 'all') {
                        if (data.length > 0) {
                            $(".client-components-search-search-results__wrapper").show();
                            for (var i = 0; i < dataTypes.length; i++) {
                                searchResultsOutput (arrangedData, dataTypes[i], input);
                            }
                        }
                    } else {
                        if (arrangedData[selectedFilter].length > 0) {
                            $(".client-components-search-search-results__wrapper").show();
                        }
                        searchResultsOutput (arrangedData, selectedFilter, input);
                    }

                });
            }
        }, 500));
    });

    function searchResultsOutput (arrangedData, selectedFilter, input) {
        if (arrangedData[selectedFilter].length > 0) {
            $(".client-components-search-search-results__wrapper ul.basic_ul").append('<li><div class="group_' + selectedFilter + '"></div></li>');
        }

        $(".group_" + selectedFilter).append(headerText[selectedFilter]);
        $(".group_" + selectedFilter).append('<ul class="client-components-search-search-results__categoryList"></ul>');

        var face_or_ticker, humanName, company;

        for (var j = 0; j < arrangedData[selectedFilter].length; j++) {

            switch (selectedFilter) {
                case 'stocks' :
                    face_or_ticker = '<span class="highlighted">'+ arrangedData[selectedFilter][j]['value'] +'</span>';
                    break;
                case 'bloggers':
                    face_or_ticker = '<span class="highlighted"><img src="http://tipranks.com/new-images/search-blogger.png"></span>';
                    break;
                case 'analysts':
                    face_or_ticker = '<span class="highlighted"><img src="http://tipranks.com/new-images/search-analyst.png"></span>';
                    break;
                case 'insiders':
                    face_or_ticker = '<span class="highlighted"><img src="http://tipranks.com/new-images/search-insider.png"></span>';
                    break;
                case 'institutions':
                    face_or_ticker = '<span class="highlighted"><img src="http://tipranks.com/new-images/search-hedgefund.png"></span>';

                    break;
            }
            humanName = arrangedData[selectedFilter][j]['value'];
            company = arrangedData[selectedFilter][j]['label'];

            if (selectedFilter == 'stocks') {
               $(".group_" + selectedFilter + " ul").append('<li class="client-components-search-search-results__categoryItem"><a href="'+arrangedData[selectedFilter][j]['link']+'/" class="client-components-search-search-results__link"><span class="client-components-search-search-results__cell client-components-search-search-results__before undefined"><span class="client-components-search-search-results__highlight"><span>'+ face_or_ticker +'</span></span></span><span class="client-components-search-search-results__cell client-components-search-search-results__option client-components-search-search-results__tickerOption"><span class="client-components-search-search-results__highlight"><span>' + highlightedInput(arrangedData[selectedFilter][j]['label'],input) + '</span></span></span></a></li>');
            } else {
               $(".group_" + selectedFilter + " ul").append('<li class="client-components-search-search-results__categoryItem"><a href="'+arrangedData[selectedFilter][j]['link']+'/" class="client-components-search-search-results__link"><span class="client-components-search-search-results__cell client-components-search-search-results__before undefined"><span class="client-components-search-search-results__highlight"><span>'+ face_or_ticker +'</span></span></span><span class="client-components-search-search-results__cell client-components-search-search-results__option"><span class="client-components-search-search-results__highlight"><span>' + highlightedInput(humanName, input) + '</span></span></span><span class="client-components-search-search-results__cell client-components-search-search-results__label"><span class="client-components-search-search-results__highlight"><span>' + highlightedInput(company, input) + '</span></span></span></span></a></li>');
            }


        }
    }

    function highlightedInput(string, input) {
        var newString;
        var matchString = string.match(new RegExp(input, "i"));
        var replaceString = '<span class="highlighted">' + matchString + '</span>';
        var regEx = new RegExp(input, "ig");
        newString = string.replace(regEx, replaceString);
        return newString;
    }

    function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                callback.apply(context, args);
            }, ms || 0);
        };
    }

    function convertToSlug(Text) {
        return Text
            .toLowerCase()
            .replace(/ /g,'-');
            //.replace(/[^\w-]+/g,'');
    }

})(jQuery);

